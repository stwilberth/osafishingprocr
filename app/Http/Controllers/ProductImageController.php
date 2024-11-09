<?php

namespace App\Http\Controllers;
//Using version ^3.9 for intervention/image
use Illuminate\Support\Facades\URL;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Models\Product;
use App\Models\ProductImage;
use Image;
use DB;

class ProductImageController extends Controller
{
    //aspect ratio list
    public const ASPECT_RATIO = [
        '16:9',
        '4:3',
        '1:1',
        '3:2',
        '2:3',
        '3:4',
        '9:16',
    ];

    public function create(Product $product)
    {
        $aspect_ratio_list = self::ASPECT_RATIO;

        return view('images.create', compact('product', 'aspect_ratio_list'));
    }

    public function store(Product $Product, Request $request)
    {
        function getMeasurement($aspectRatio){
            $w = 960;
            switch ($aspectRatio) {
                case '16:9':
                    $h = 540;
                    break;
                case '4:3':
                    $h = 720;
                    break;
                case '1:1':
                    $h = 960;
                    break;
                case '3:2':
                    $h = 640;
                    break;
                case '2:3':
                    $h = 1440;
                    break;
                case '3:4':
                    $h = 1280;
                    break;
                case '9:16':
                    $h = 1440;
                    break;
                default:
                    $h = 540;
                    break;
            }
            return ['w' => $w, 'h' => $h];
        }

        function getMeasurementThumb($aspectRatio){
            $thumb_w = 240;

            switch ($aspectRatio) {
                case '16:9':
                    $thumb_h = 135;
                    break;
                case '4:3':
                    $thumb_h = 180;
                    break;
                case '1:1':
                    $thumb_h = 240;
                    break;
                case '3:2':
                    $thumb_h = 160;
                    break;
                case '2:3':
                    $thumb_h = 360;
                    break;
                case '3:4':
                    $thumb_h = 320;
                    break;
                case '9:16':
                    $thumb_h = 360;
                    break;
                default:
                    $thumb_h = 135;
                    break;
            }

            return ['w' => $thumb_w, 'h' => $thumb_h];
        }

        $imageCount = $Product->images->count();

        //verificar que el product no tenga mas de 5 imagenes
        if ($imageCount >= 5) {
            return redirect()->back()->with('error', 'Error al guardar la imagen: El producto ya tiene 5 imágenes.');
        }

        // Validar la solicitud con condición
        $request->validate([
            'img' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            'name' => 'required|string|max:50',
            'medidas_crop' => 'required|json',
            'aspect_ratio' => 'required_if:imageCount,0|in:16:9,4:3,1:1,3:2,2:3,3:4,9:16',
        ]);


        try {
            $crop = json_decode($request->medidas_crop);
            $img = $request->file('img');
            $name = $request->name;

            $w = (int)$crop->w;
            $h = (int)$crop->h;
            $x = (int)$crop->x;
            $y = (int)$crop->y;

            $unique_name = Str::uuid()->toString() . '_' . time() . '.' . $img->getClientOriginalExtension();

            if($imageCount > 0){
                $aspectRatio = $Product->images->first()->aspect_ratio;
            }else{
                $aspectRatio = $request->aspect_ratio;
            }

            $measurements = getMeasurement($aspectRatio);
            $w = $measurements['w'];
            $h = $measurements['h'];

            $measurementsThumb = getMeasurementThumb($aspectRatio);
            $thumb_w = $measurementsThumb['w'];
            $thumb_h = $measurementsThumb['h'];
            

            $img_crop = Image::read($img->getRealPath())->crop($w, $h, $x, $y)->resize($w, $h);
            $img_thumb = Image::read($img->getRealPath())->crop($w, $h, $x, $y)->resize($thumb_w, $thumb_h);

            $img_thumb_path = 'products/thumb_'.$unique_name;
            $img_crop_path = 'products/'.$unique_name;

            Storage::disk('public')->put($img_thumb_path, $img_thumb->encode()) or throw new \Exception('Error storing thumbnail');
            Storage::disk('public')->put($img_crop_path, $img_crop->encode()) or throw new \Exception('Error storing cropped image');

            //si ya hay imagenes se usa el aspect ratio de la primera
            if ($Product->images->count() > 0) {
                $aspectRatio = $Product->images->first()->aspect_ratio;
            }

            $image = new ProductImage();
            $image->product_id = $Product->id;
            $image->name = $name;
            $image->path = $img_crop_path;
            $image->url = $unique_name;
            $image->aspect_ratio = $aspectRatio;
            $image->save();

            return redirect()->back()->with('status', 'OK');

        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Error al guardar la imagen: ' . $th->getMessage());
        }
    }

    public function destroy(ProductImage $image)
    {
        try {
            $image->delete();
            Storage::disk('public')->delete('products/'.$image->url);
            Storage::disk('public')->delete('products/thumb_'.$image->url);

            return redirect()->back()->with('status', 'OK');

        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Error al eliminar la imagen: ' . $th->getMessage());
        }
    }

}

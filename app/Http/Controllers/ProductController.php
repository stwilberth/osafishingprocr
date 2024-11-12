<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // if ($request->has('category_id')) {
        //     $products = $products->where('category_id', $request->input('category_id'));
        // }
    
        // if ($request->has('brand_id')) {
        //     $products = $products->where('brand_id', $request->input('brand_id'));
        // }
    
        // // Return the products with a view
        // return view('products.index', compact('products', 'categories', 'brands'));

        // Get all products
        $products = Product::all();

        //categories
        $categories = Category::all();

        //brands
        $brands = Brand::all();

        // Return the products with a view
        return view('products.index', compact('products'));
    }
    // Filter products by category and brand

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //get the categories
        $categories = Category::all();

        //get the brands
        $brands = Brand::all();

        //create a new product
        return view('products.create', compact('categories', 'brands'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {        
        
        // Validar los datos
        $validated = $request->validate([
            'code' => 'required|unique:products,code|max:20',
            'name' => 'required|max:255',
            'description' => 'required|max:1000',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id', // para las categorías
            'brand_id' => 'required|exists:brands,id', // para la marca
        ]);
        
        // Generate the initial slug from the name
        $slug = Str::slug($request->input('name'));

        // Check if the generated slug already exists in the database
        $originalSlug = $slug;
        $counter = 1;
        while (Product::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }

        // Add the slug to the validated data
        $validated['slug'] = $slug;

        // Crear el producto
        $product = Product::create($validated);

        // Redirigir a la vista del producto
        return redirect()->route('products.show', $product);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //show the product
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {

        //get the categories
        $categories = Category::all();

        //get the brands
        $brands = Brand::all();

        //edit the product
        return view('products.edit', compact('product', 'categories', 'brands'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        // Validar los datos
        $validated = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required|max:1000',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|numeric|min:0',
            'category_id' => 'exists:categories,id', // para las categorías
            'brand_id' => 'required|exists:brands,id', // para la marca
        ]);

        //update the product
        $product->update($validated);

        //redirect to the product
        return redirect()->route('products.show', $product);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //delete the product
        $product->delete();

        //delete the product images from the storage
        foreach ($product->images as $image) {
            Storage::delete($image->path);
        }

        //delete the product images
        $product->images()->delete();

        //redirect to the products index
        return redirect()->route('products.index');
    }
}

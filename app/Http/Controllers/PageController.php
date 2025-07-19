<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class PageController extends Controller
{

    //home page
    public function index()
    {
        // Selecciona 6 productos aleatorios para destacar
        $featuredProducts = \App\Models\Product::inRandomOrder()->limit(6)->get();
        
        // Obtener un producto destacado de cada categoría principal
        $spinningProduct = \App\Models\Product::where('category_id', 3)->inRandomOrder()->first();
        $baitcastProduct = \App\Models\Product::where('category_id', 4)->inRandomOrder()->first();
        $luresProduct = \App\Models\Product::where('category_id', 5)->inRandomOrder()->first();
        
        return view('pages.index', compact('featuredProducts', 'spinningProduct', 'baitcastProduct', 'luresProduct'));
    }

    //about page
    public function about()
    {
        return view('pages.about');
    }
}

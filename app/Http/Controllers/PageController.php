<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class PageController extends Controller
{

    //home page
    public function index()
    {
        $products = Product::limit(3)->get();
        return view('pages.index', compact('products'));
    }

    //about page
    public function about()
    {
        return view('pages.about');
    }
}

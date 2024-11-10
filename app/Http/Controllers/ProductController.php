<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get all products
        $products = Product::all();

        // Return the products with a view
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //get the categories
        $categories = Category::all();

        //create a new product
        return view('products.create', compact('categories'));
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
            'categories' => 'array', // para las categorías
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

        // Asignar categorías seleccionadas
        if ($request->has('categories')) {
            $product->categories()->sync($request->categories);
        }

        // Redirigir a la lista de productos
        return redirect()->route('products.index');
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
        //edit the product
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //update the product
        $product->update($request->all());

        //redirect to the products index
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //delete the product
        $product->delete();

        //redirect to the products index
        return redirect()->route('products.index');
    }
}

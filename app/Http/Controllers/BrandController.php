<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;

class BrandController extends Controller
{
    //create a function to get all brands
    public function index()
    {
        $brands = Brand::all();
        return view('brands.index', compact('brands'));
    }

    //create a function to get a brand by id
    public function show($id)
    {
        $brand = Brand::findOrFail($id);
        return view('brands.show', compact('brand'));
    }

    //create a function to get the create form
    public function create()
    {
        return view('brands.create');
    }

    //create a function to get the edit form
    public function edit($id)
    {
        $brand = Brand::findOrFail($id);
        return view('brands.edit', compact('brand'));
    }

    //create a function to create a brand
    public function store(Request $request)
    {
        //validate the request, name is unique
        $request->validate([
            'name' => 'required|string|max:255|unique:brands',
        ]);

        //create the brand
        $brand = Brand::create($request->all());
        return redirect()->route('brands.index');
    }

    //create a function to update a brand
    public function update(Request $request, $id)
    {
        //validate the request, name is unique
        $request->validate([
            'name' => 'required|string|max:255|unique:brands,name,' . $id,
        ]);

        //update the brand
        $brand = Brand::findOrFail($id);
        $brand->update($request->all());
        return redirect()->route('brands.index');
    }

    //create a function to delete a brand
    public function destroy($id)
    {
        //verify that brand dont have products
        $brand = Brand::findOrFail($id);
        if ($brand->products->count() > 0) {
            return redirect()->route('brands.index')->with('error', 'Brand has products');
        }
        //delete the brand
        $brand->delete();
        return redirect()->route('brands.index');
    }
}

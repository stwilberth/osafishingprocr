<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //get all categories
        $categories = Category::all();

        //return the categories with a view
        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //create a new category

        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validate the data
        $validated = $request->validate([
            'name' => 'required|max:20',
            'description' => 'required|max:100',
        ]);

        

        //create the category
        Category::create($validated);

        //redirect to the list of categories
        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //get the category
        $category = Category::findOrFail($id);

        //return the category with a view
        return view('categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //get the category
        $category = Category::findOrFail($id);

        //edit the category
        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //get the category
        $category = Category::findOrFail($id);

        //validate the data
        $validated = $request->validate([
            'name' => 'required|max:20',
            'description' => 'required|max:100',
        ]);

        //update the category
        $category->update($validated);

        //redirect to the list of categories
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //get the category
        $category = Category::findOrFail($id);

        //verify that the category dont have products
        if ($category->products->count() > 0) {
            return redirect()->route('categories.index')->with('error', 'Category has products');
        }

        //delete the category
        $category->delete();

        //redirect to the list of categories
        return redirect()->route('categories.index');
    }
}

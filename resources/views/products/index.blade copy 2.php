@extends('layouts.app')

@section('content')
    <!-- list products -->
    <div class="mx-auto bg-white rounded-lg shadow-md mt-5">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-semibold text-gray-800">Product List</h1>
            <a href="/products/create"
                class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white rounded-md font-semibold hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Add New Product
            </a>
        </div>

        <table class="min-w-full bg-white border border-gray-300 rounded-md">
            <thead>
                <tr>
                    <th class="px-4 py-2 border-b text-left text-sm font-medium text-gray-700">Name</th>
                    <th class="px-4 py-2 border-b text-left text-sm font-medium text-gray-700">Description</th>
                    <th class="px-4 py-2 border-b text-left text-sm font-medium text-gray-700">Categories</th>
                    <th class="px-4 py-2 border-b text-left text-sm font-medium text-gray-700">Price</th>
                    <th class="px-4 py-2 border-b text-left text-sm font-medium text-gray-700">Stock</th>
                    <th class="px-4 py-2 border-b text-center text-sm font-medium text-gray-700">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr class="hover:bg-gray-100">
                        <td class="px-4 py-2 border-b text-gray-800">{{ $product->name }}</td>
                        <td class="px-4 py-2 border-b text-gray-800">{{ Str::limit($product->description, 50) }}</td>
                        <!-- categories -->
                        <td class="px-4 py-2 border-b text-gray-800">
                            @foreach ($product->categories as $category)
                                <span class="bg-gray-200 text-gray-800 rounded-full px-2 py-1 text-xs font-semibold mr-1">{{ $category->name }}</span>
                            @endforeach
                        </td>
                        <td class="px-4 py-2 border-b text-gray-800">$ {{ number_format($product->price, 2) }}</td>
                        <td class="px-4 py-2 border-b text-gray-800">{{ $product->stock }} units</td>
                        <td class="px-4 py-2 border-b text-center">
                            <a href="/products/{{ $product->id }}" class="text-blue-600 hover:underline">View</a>
                            <a href="/products/{{ $product->id }}/edit"
                                class="ml-2 text-yellow-600 hover:underline">Edit</a>
                            <form action="/products/{{ $product->id }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="ml-2 text-red-600 hover:underline"
                                    onclick="return confirm('Are you sure you want to delete this product?')">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <x-customize.products title="Popular Products">
            @foreach ($products as $product)
                <x-customize.product :product="$product" />
            @endforeach
        </x-customize.products>

    </div>

@endsection

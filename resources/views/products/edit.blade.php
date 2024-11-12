@extends('layouts.app')

@section('content')

    <div class="p-5">
        <!-- People find pleasure in different ways. I find it in keeping my mind clear. - Marcus Aurelius -->
        <form action="{{ route('products.update', $product) }}" method="POST"
            class="max-w-lg mx-auto p-6 bg-white rounded-lg shadow-md space-y-4">
            @csrf
            @method('PUT') <!-- Use PUT method for updating -->

            <!-- product code -->
            {{-- <div>
                <label for="code" class="block text-sm font-medium text-gray-700">Product Code</label>
                <input type="text" name="code" id="code" value="{{ old('code', $product->code) }}" required
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
            </div> --}}

            <!-- product category -->
            <div>
                <label for="category_id" class="block text-sm font-medium text-gray-700">Category</label>
                <select name="category_id" id="category_id" required
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" @if ($category->id == old('category_id', $product->category_id)) selected @endif>
                            {{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Product Brand -->
            <div>
                <label for="brand_id" class="block text-sm font-medium text-gray-700">Brand</label>
                <select name="brand_id" id="brand_id" required
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    @foreach ($brands as $brand)
                        <option value="{{ $brand->id }}" @if ($brand->id == old('brand_id', $product->brand_id)) selected @endif>
                            {{ $brand->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Product Name -->
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Product Name</label>
                <input type="text" name="name" id="name" value="{{ old('name', $product->name) }}" required
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
            </div>

            <!-- Product Description -->
            <div>
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <textarea name="description" id="description" rows="4" required
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">{{ old('description', $product->description) }}</textarea>
            </div>

            <!-- Product Price -->
            <div>
                <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
                <input type="number" name="price" id="price" value="{{ old('price', $product->price) }}" required
                    min="0"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
            </div>

            <!-- Product Stock -->
            <div>
                <label for="stock" class="block text-sm font-medium text-gray-700">Stock</label>
                <input type="number" name="stock" id="stock" value="{{ old('stock', $product->stock) }}" required
                    min="0"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
            </div>


            <!-- show errors -->
            @if ($errors->any())
                <div class="text-red-500">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Update Button -->
            <div class="flex justify-end">

                <a href="{{ route('products.show', $product) }}"
                    class="mr-4 inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                    Cancel
                </a>
                <button type="submit"
                    class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Update Product
                </button>
            </div>
        </form>

    </div>

@endsection

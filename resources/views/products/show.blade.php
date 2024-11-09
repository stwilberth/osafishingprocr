@extends('layouts.app')

@section('content')
<div class="mt-5">
    <!-- Very little is needed to make a happy life. - Marcus Aurelius -->
    <div class="max-w-lg mx-auto p-6 bg-white rounded-lg shadow-md space-y-4">
        <!-- Product Name -->
        <div>
            <h2 class="text-xl font-semibold text-gray-800">{{ $product->name }}</h2>
        </div>

        <!-- Product Categories -->
        {{-- <div>
            <h3 class="text-lg font-semibold text-gray-800">Categorías</h3>
            <div class="flex flex-wrap mt-1">
                @foreach ($product->categories as $category)
                <span
                    class="bg-gray-200 text-gray-800 rounded-full px-2 py-1 text-xs font-semibold mr-1">{{ $category->name }}</span>
                @endforeach
            </div>
        </div> --}}

        <!-- Product Image -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
            <!-- Product Image -->
            <div>
                @if ($product->images->count() > 0)
                <img src="{{ asset('storage/products/thumb_'. $product->images->first()->url) }}" alt="{{  $product->images->first()->name }}"
                    class="w-full object-cover mb-4 rounded-lg">
                @else
                <img src="{{ asset('images/no_image.jpg') }}" alt="Placeholder" class="w-full object-cover mb-4 rounded-lg">
                @endif
            </div>

            <!-- Product Info -->
            <div class="space-y-4">
                <!-- Product Description -->
                <div>
                    <p class="mt-1 text-gray-600">{{ $product->description }}</p>
                </div>

                <!-- Product Price -->
                <div>
                    <h3 class="text-lg font-semibold text-gray-800">₡ {{ number_format($product->price, 0) }}</h3>
                </div>

                <!-- Product Stock -->
                <div>
                    <h3 class="text-lg font-semibold text-gray-800">Cantidad</h3>
                    <p class="mt-1 text-gray-600">{{ $product->stock }} unidades</p>
                </div>
            </div>
        </div>

        <!-- Back Button -->
        <div class="flex justify-end mt-4">
            @if(Auth::user()->hasRole('admin'))
            <a href="{{ route('products.images.create', $product) }}"
                class="m-2 inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                Add Image
            </a>
            @endif

            <a href="/products"
                class="m-2 inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                Productos
            </a>
        </div>
    </div>

</div>

@endsection
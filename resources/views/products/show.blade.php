@extends('layouts.app')

@php
    if ($product->images->count() > 0) {
        $image = asset('storage/products/thumb_' . $product->images->first()->url);
    } else {
        $image = asset('images/osa_transparent_circle.png');
    }

@endphp

@section('meta')
    <meta name="description" content="{{ $product->description }}">
    <meta name="keywords" content="{{ $product->name }}">
    <meta name="author" content="Osa Fishing Pro">
    <meta name="twitter-domain" content="osafishingpro.com">
    <meta name="twitter-image" content="{{ asset('images/osa_transparent_circle.png') }}">
    <meta name="twitter-title" content="{{ $product->name }} | Osa Fishing Pro CR">
    <meta name="twitter-description" content="{{ $product->description }}">
    <meta name="og:image" content="{{ $image }}">
    <meta name="og:title" content="{{ $product->name }} | Osa Fishing Pro CR">
    <meta name="og:description" content="Precio: ₡ {{ number_format($product->price, 0) }} - {{ $product->category->name }} - {{ $product->brand->name }}">
    <meta name="og:url" content="{{ url()->current() }}">
    <meta name="og:type" content="product">
    <meta name="og:locale" content="es_CR">
    <meta name="og:site_name" content="Osa Fishing Pro">
    <meta name="og:availability" content="{{ $product->stock > 0 ? 'in stock' : 'out of stock' }}">
    <meta name="og:product:category" content="{{ $product->category->name }}">
    <meta name="og:product:brand" content="{{ $product->brand->name }}">
    <meta name="og:product:condition" content="new">
    <meta name="og:product:availability" content="in stock">
    <meta name="og:product:price:amount" content="{{ number_format($product->price, 0) }}">
    <meta name="og:product:price:currency" content="CRC">
    <title>{{ $product->name }} | Osa Fishing Pro CR</title>

@endsection

@section('content')
    <div class="mt-5">
        <!-- Very little is needed to make a happy life. - Marcus Aurelius -->
        <div class="max-w-lg mx-auto p-6 bg-white rounded-lg shadow-md space-y-4">
            <!-- Product Name -->
            <div>
                <h2 class="text-xl font-semibold text-gray-800">{{ $product->name }}</h2>
            </div>
            <!-- Product Image -->
            <div>
                @if ($product->images->count() > 1)
                    <x-customize.carousel-product :images="$product->images" />
                @elseif ($product->images->count() == 1)
                    <img src="{{ asset('storage/products/' . $product->images->first()->url) }}"
                        alt="{{ $product->images->first()->name }}" class="w-full object-cover mb-4 rounded-lg">
                @else
                    <img src="{{ $image }}" alt="Placeholder" class="w-full object-cover mb-4 rounded-lg">
                @endif
            </div>

            <!-- Product Image -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">

                <!-- Product Info -->
                <div class="space-y-4">
                    <!-- Product categories -->
                    @if ($product->category)
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800">Categoría</h3>
                            <p class="mt-1 text-gray-600">{{ $product->category->name }}</p>
                        </div>
                    @endif

                    <!-- Product Brand -->
                    @if ($product->brand)
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800">Marca</h3>
                            <p class="mt-1 text-gray-600">{{ $product->brand->name }}</p>
                        </div>
                    @endif

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

            <!-- Button -->
            <div class="flex flex-wrap justify-center space-x-2">
                @if (Auth::user() && Auth::user()->hasRole('admin'))
                    <a href="{{ route('products.images.create', $product) }}"
                        class="m-2 inline-flex items-center px-2 py-1 sm:px-3 sm:py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 text-xs sm:text-sm">
                        Add Image
                    </a>
                    <!-- Edit Button -->
                    <a href="{{ route('products.edit', $product) }}"
                        class="m-2 inline-flex items-center px-2 py-1 sm:px-3 sm:py-2 bg-yellow-600 border border-transparent rounded-md font-semibold text-white hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500 text-xs sm:text-sm">
                        Editar
                    </a>

                    <!-- Delete Button -->
                    <form action="{{ route('products.destroy', $product) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="m-2 inline-flex items-center px-2 py-1 sm:px-3 sm:py-2 bg-red-600 border border-transparent rounded-md font-semibold text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 text-xs sm:text-sm">
                            Eliminar
                        </button>
                    </form>
                @endif

                <!-- ask for more whatsapp -->
                <a href="https://api.whatsapp.com/send?phone=60283248&text=Hola,%20me%20gustaría%20saber%20más%20sobre%20{{ $product->name }}"
                    class="m-2 inline-flex items-center px-2 py-1 sm:px-3 sm:py-2 bg-green-600 border border-transparent rounded-md font-semibold text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 text-xs sm:text-sm">
                    {{-- whatsapp icon --}}
                    <i class="fab fa-whatsapp-square fa-2x mr-2"></i>
                    Preguntar
                </a>

                <a href="/products"
                    class="m-2 inline-flex items-center px-2 py-1 sm:px-3 sm:py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 text-xs sm:text-sm">
                    Productos
                </a>
            </div>

            <!-- title sharing -->
            <div>
                <h3 class="text-lg font-semibold text-gray-800">Compartir</h3>
            </div>

            <!-- sharing buttons -->
            <div class="flex justify-end space-x-2">
                <a href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}"
                    class="text-blue-600 hover:text-blue-800">
                    <i class="fab fa-facebook-square fa-2x"></i>
                </a>
                <a href="https://twitter.com/intent/tweet?url={{ url()->current() }}"
                    class="text-blue-400 hover:text-blue-600">
                    <i class="fab fa-twitter-square fa-2x"></i>
                </a>
                <a href="https://www.linkedin.com/shareArticle?url={{ url()->current() }}"
                    class="text-blue-800 hover:text-blue-900">
                    <i class="fab fa-linkedin fa-2x"></i>
                </a>
                <a href="https://api.whatsapp.com/send?text={{ url()->current() }}"
                    class="text-green-400 hover:text-green-600">
                    <i class="fab fa-whatsapp-square fa-2x"></i>
                </a>
                <!-- instagram -->
                <a href="https://www.instagram.com/" class="text-pink-600 hover:text-pink-800">
                    <i class="fab fa-instagram-square fa-2x"></i>
                </a>
            </div>

        </div>
    @endsection

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
    <meta name="og:image:secure_url" content="{{ $image }}">
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
    {{-- Implementación de Schema.org para productos --}}
    <x-schema.product-schema :product="$product" />
    
    <div class="py-8 bg-gray-50">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                <div class="md:flex">
                    <!-- Product Image Section -->
                    <div class="md:w-1/2 p-6">
                        @if ($product->images->count() > 1)
                            <img src="{{ asset('storage/products/' . $product->images->first()->url) }}"
                                alt="{{ $product->images->first()->name }}" 
                                class="w-full h-full object-cover rounded-lg shadow-md transition-transform duration-300 hover:scale-105">
                        @else
                            <img src="{{ $image }}" alt="Placeholder" 
                                class="w-full h-full object-cover rounded-lg shadow-md transition-transform duration-300 hover:scale-105">
                        @endif
                    </div>

                    <!-- Product Info Section -->
                    <div class="md:w-1/2 p-8 bg-white">
                        <div class="mb-6">
                            <h1 class="text-3xl font-bold text-gray-900 mb-2">{{ $product->name }}</h1>
                            <div class="flex items-center space-x-4 mb-4">
                                @if ($product->category)
                                    <span class="px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-sm font-medium">
                                        {{ $product->category->name }}
                                    </span>
                                @endif
                                @if ($product->brand)
                                    <span class="px-3 py-1 bg-gray-100 text-gray-800 rounded-full text-sm font-medium">
                                        {{ $product->brand->name }}
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="mb-6">
                            <p class="text-gray-600 text-lg leading-relaxed">{{ $product->description }}</p>
                        </div>

                        <div class="mb-6">
                            <div class="flex items-center justify-between">
                                <div class="text-3xl font-bold text-blue-600">
                                    ₡ {{ number_format($product->price, 0) }}
                                </div>
                                <div class="text-sm text-gray-500">
                                    {{ $product->stock }} unidades disponibles
                                </div>
                            </div>
                        </div>

            <!-- Action Buttons -->
            <div class="space-y-4">
                <!-- Admin Actions -->
                @if (Auth::user() && Auth::user()->hasRole('admin'))
                    <div class="flex flex-wrap gap-3">
                        <a href="{{ route('products.images.create', $product) }}"
                            class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors duration-200 shadow-sm hover:shadow-md">
                            <i class="fas fa-image mr-2"></i>
                            Agregar Imagen
                        </a>
                        <a href="{{ route('products.edit', $product) }}"
                            class="inline-flex items-center px-4 py-2 bg-yellow-500 text-white rounded-lg hover:bg-yellow-600 transition-colors duration-200 shadow-sm hover:shadow-md">
                            <i class="fas fa-edit mr-2"></i>
                            Editar
                        </a>
                        <form action="{{ route('products.destroy', $product) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="inline-flex items-center px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition-colors duration-200 shadow-sm hover:shadow-md">
                                <i class="fas fa-trash-alt mr-2"></i>
                                Eliminar
                            </button>
                        </form>
                    </div>
                @endif

                <!-- Customer Actions -->
                <div class="flex flex-wrap gap-3">
                    <a href="https://api.whatsapp.com/send?phone=60283248&text=Hola,%20me%20gustaría%20saber%20más%20sobre%20{{ $product->name }}"
                        class="flex inline-flex items-center px-6 py-3 bg-green-500 text-white rounded-lg hover:bg-green-600 transition-colors duration-200 shadow-sm hover:shadow-md text-lg font-medium">
                        <i class="fab fa-whatsapp mr-2"></i> Consultar
                    </a>
                    <a href="/products"
                        class="inline-flex items-center px-6 py-3 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors duration-200 shadow-sm hover:shadow-md text-lg font-medium">
                        <i class="fas fa-arrow-left mr-2"></i>
                        Volver
                    </a>
                </div>

                <!-- Social Sharing -->
                <div class="mt-8 border-t pt-6">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Compartir este producto</h3>
                    <div class="flex items-center justify-center gap-4">
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}"
                            class="p-2 text-blue-600 hover:text-blue-800 hover:bg-blue-50 rounded-full transition-colors duration-200">
                            <i class="fab fa-facebook fa-2x"></i>
                        </a>
                        <a href="https://twitter.com/intent/tweet?url={{ url()->current() }}"
                            class="p-2 text-blue-400 hover:text-blue-600 hover:bg-blue-50 rounded-full transition-colors duration-200">
                            <i class="fab fa-twitter fa-2x"></i>
                        </a>
                        <a href="https://www.linkedin.com/shareArticle?url={{ url()->current() }}"
                            class="p-2 text-blue-700 hover:text-blue-900 hover:bg-blue-50 rounded-full transition-colors duration-200">
                            <i class="fab fa-linkedin-in fa-2x"></i>
                        </a>
                        <a href="https://api.whatsapp.com/send?text={{ url()->current() }}"
                            class="p-2 text-green-500 hover:text-green-700 hover:bg-green-50 rounded-full transition-colors duration-200">
                            <i class="fab fa-whatsapp fa-2x"></i>
                        </a>
                        <a href="https://www.instagram.com/"
                            class="p-2 text-pink-500 hover:text-pink-700 hover:bg-pink-50 rounded-full transition-colors duration-200">
                            <i class="fab fa-instagram fa-2x"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    @endsection

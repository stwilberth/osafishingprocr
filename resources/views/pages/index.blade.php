@extends('layouts.app')

@section('meta')
    <meta name="description"
        content="Tienda especializada en equipos de pesca para pescadores recreativos de la zona sur de Costa Rica. Cañas, carretes y señuelos ideales para pesca de consumo en ríos y mar de la Península de Osa.">
    <meta name="keywords"
        content="pesca deportiva, zona sur Costa Rica, Osa, pesca para consumo, equipo de pesca, cañas, carretes, señuelos, pesca artesanal, pesca en mar, pesca en río, Golfito, Puerto Jiménez, Bahía Drake, Península de Osa">
    <meta name="author" content="Osa Fishing Pro CR">
    <meta name="robots" content="index, follow">
    <meta name="googlebot" content="index, follow">
    <meta name="geo.region" content="CR-P">
    <meta name="geo.placename" content="Zona Sur, Costa Rica">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:domain" content="osafishingpro.com">
    <meta name="twitter:image" content="{{ asset('images/osa_transparent_circle.png') }}">
    <meta name="twitter:title"
        content="Osa Fishing Pro CR | Equipos para pesca deportiva y de consumo en la zona sur de Costa Rica">
    <meta name="twitter:description"
        content="Equipos especializados para pescadores que disfrutan la pesca como pasatiempo y para consumo propio en la Península de Osa y alrededores.">
    <meta property="og:image" content="{{ asset('images/osa_transparent_circle.png') }}">
    <meta property="og:title"
        content="Osa Fishing Pro CR | Equipos para pesca deportiva y de consumo en la zona sur de Costa Rica">
    <meta property="og:description"
        content="Equipos especializados para pescadores que disfrutan la pesca como pasatiempo y para consumo propio en la Península de Osa y alrededores.">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">
    <meta property="og:locale" content="es_CR">
    <meta property="og:site_name" content="Osa Fishing Pro CR - Equipos para pesca deportiva y de consumo">
    <link rel="canonical" href="{{ url()->current() }}" />
    <title>Osa Fishing Pro CR | Equipos para pesca deportiva y de consumo en la zona sur de Costa Rica</title>
@endsection

@section('content')
    <!-- home -->
    <div class="container mx-auto mt-5">

        <!-- Bienvenido -->
        <div class="w-5/6 mx-auto">
            <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                <h1 class="text-2xl font-bold mb-4 text-red-800">¡Bienvenido a Osa Fishing Pro CR!</h1>
                <h2 class="text-xl font-semibold mb-3 text-gray-800">Tu tienda especializada en equipos para pesca deportiva
                    y de consumo en la zona sur de Costa Rica</h2>
                <p class="text-gray-700 text-base">
                    Somos la tienda en línea preferida por pescadores de la Península de Osa y alrededores. Aquí encontrarás
                    equipos de calidad seleccionados especialmente para la pesca en ríos y mar de nuestra región, ideales
                    tanto para quienes disfrutan la pesca como pasatiempo como para quienes aprovechan su captura para
                    consumo propio.
                </p>
                <p class="text-gray-700 text-base mt-4">
                    Nuestros productos están seleccionados considerando las especies locales y las condiciones específicas
                    de pesca en la zona sur de Costa Rica.
                </p>
                <p class="text-gray-700 text-base mt-4">
                    Si tienes alguna duda, puedes contactarnos por medio de nuestro <a href="https://wa.me/60283248"
                        target="_blank" class="text-green-500">chat de WhatsApp</a> o llamarnos al
                    teléfono <a href="tel:60283248" class="text-blue-500">6028-3248</a>.
                </p>
            </div>
        </div>



        <!-- Categorías más populares -->
        <section class="py-16 bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-50">
            <div class="max-w-7xl mx-auto px-4">
                <div class="text-center mb-12">
                    <h2 class="text-4xl font-bold text-slate-800 mb-4">Categorías Destacadas</h2>
                    <p class="text-lg text-slate-600 max-w-2xl mx-auto">Descubre nuestras categorías más populares con
                        equipos seleccionados especialmente para la pesca en Costa Rica</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <!-- Carretes Spinning -->
                    <div
                        class="group relative overflow-hidden rounded-3xl shadow-2xl hover:shadow-3xl transition-all duration-700 transform hover:-translate-y-3">
                        <div
                            class="absolute inset-0 bg-gradient-to-br from-sky-400 via-blue-500 to-indigo-600 opacity-95 group-hover:opacity-100 transition-opacity duration-700">
                        </div>
                        <!-- Overlay blanco para mejorar legibilidad del texto -->
                        <div class="absolute inset-0 bg-white bg-opacity-80"></div>
                        <div class="relative p-8 text-gray-800 h-full flex flex-col justify-between">
                            <div class="text-center">
                                <div class="mb-6">
                                    @if ($spinningProduct && $spinningProduct->images->first())
                                        <img src="{{ asset('storage/' . $spinningProduct->images->first()->path) }}"
                                            alt="{{ $spinningProduct->name }}"
                                            class="w-28 h-28 object-cover rounded-2xl mx-auto mb-4 border-4 border-blue-200 border-opacity-60 shadow-lg group-hover:scale-110 transition-transform duration-500">
                                    @else
                                        <i
                                            class="fas fa-fish text-5xl mb-4 text-blue-600 opacity-90 group-hover:opacity-100 transition-opacity"></i>
                                    @endif
                                </div>
                                <h3 class="text-2xl font-bold mb-4 text-gray-800">Carretes Spinning</h3>
                                @if ($spinningProduct)
                                    <p class="text-gray-700 text-sm font-semibold mb-2">{{ $spinningProduct->name }}</p>
                                    <p class="text-blue-600 text-xl font-bold mb-4">
                                        ₡{{ number_format($spinningProduct->price, 0, ',', '.') }}</p>
                                @endif
                                <p class="text-gray-600 text-sm leading-relaxed mb-6">
                                    Carretes de spinning ideales para pesca en ríos y mar. Perfectos para principiantes y
                                    expertos.
                                </p>
                            </div>
                            <a href="/products?category=3&brand="
                                class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold py-4 px-8 rounded-full transition-all duration-500 transform hover:scale-105 shadow-lg">
                                Ver Productos
                                <i class="fas fa-arrow-right ml-2"></i>
                            </a>
                        </div>
                    </div>

                    <!-- Carretes Baitcast -->
                    <div
                        class="group relative overflow-hidden rounded-3xl shadow-2xl hover:shadow-3xl transition-all duration-700 transform hover:-translate-y-3">
                        <div
                            class="absolute inset-0 bg-gradient-to-br from-emerald-400 via-teal-500 to-cyan-600 opacity-95 group-hover:opacity-100 transition-opacity duration-700">
                        </div>
                        <!-- Overlay blanco para mejorar legibilidad del texto -->
                        <div class="absolute inset-0 bg-white bg-opacity-80"></div>
                        <div class="relative p-8 text-gray-800 h-full flex flex-col justify-between">
                            <div class="text-center">
                                <div class="mb-6">
                                    @if ($baitcastProduct && $baitcastProduct->images->first())
                                        <img src="{{ asset('storage/' . $baitcastProduct->images->first()->path) }}"
                                            alt="{{ $baitcastProduct->name }}"
                                            class="w-28 h-28 object-cover rounded-2xl mx-auto mb-4 border-4 border-green-200 border-opacity-60 shadow-lg group-hover:scale-110 transition-transform duration-500">
                                    @else
                                        <i
                                            class="fas fa-anchor text-5xl mb-4 text-green-600 opacity-90 group-hover:opacity-100 transition-opacity"></i>
                                    @endif
                                </div>
                                <h3 class="text-2xl font-bold mb-4 text-gray-800">Carretes Baitcast</h3>
                                @if ($baitcastProduct)
                                    <p class="text-gray-700 text-sm font-semibold mb-2">{{ $baitcastProduct->name }}</p>
                                    <p class="text-green-600 text-xl font-bold mb-4">
                                        ₡{{ number_format($baitcastProduct->price, 0, ',', '.') }}</p>
                                @endif
                                <p class="text-gray-600 text-sm leading-relaxed mb-6">
                                    Carretes profesionales para pesca deportiva. Máximo control y precisión en cada
                                    lanzamiento.
                                </p>
                            </div>
                            <a href="/products?category=4&brand="
                                class="inline-block bg-green-600 hover:bg-green-700 text-white font-semibold py-4 px-8 rounded-full transition-all duration-500 transform hover:scale-105 shadow-lg">
                                Ver Productos
                                <i class="fas fa-arrow-right ml-2"></i>
                            </a>
                        </div>
                    </div>

                    <!-- Señuelos -->
                    <div
                        class="group relative overflow-hidden rounded-3xl shadow-2xl hover:shadow-3xl transition-all duration-700 transform hover:-translate-y-3">
                        <div
                            class="absolute inset-0 bg-gradient-to-br from-violet-400 via-purple-500 to-fuchsia-600 opacity-95 group-hover:opacity-100 transition-opacity duration-700">
                        </div>
                        <!-- Overlay blanco para mejorar legibilidad del texto -->
                        <div class="absolute inset-0 bg-white bg-opacity-80"></div>
                        <div class="relative p-8 text-gray-800 h-full flex flex-col justify-between">
                            <div class="text-center">
                                <div class="mb-6">
                                    @if ($luresProduct && $luresProduct->images->first())
                                        <img src="{{ asset('storage/' . $luresProduct->images->first()->path) }}"
                                            alt="{{ $luresProduct->name }}"
                                            class="w-28 h-28 object-cover rounded-2xl mx-auto mb-4 border-4 border-purple-200 border-opacity-60 shadow-lg group-hover:scale-110 transition-transform duration-500">
                                    @else
                                        <i
                                            class="fas fa-water text-5xl mb-4 text-purple-600 opacity-90 group-hover:opacity-100 transition-opacity"></i>
                                    @endif
                                </div>
                                <h3 class="text-2xl font-bold mb-4 text-gray-800">Señuelos</h3>
                                @if ($luresProduct)
                                    <p class="text-gray-700 text-sm font-semibold mb-2">{{ $luresProduct->name }}</p>
                                    <p class="text-purple-600 text-xl font-bold mb-4">
                                        ₡{{ number_format($luresProduct->price, 0, ',', '.') }}</p>
                                @endif
                                <p class="text-gray-600 text-sm leading-relaxed mb-6">
                                    Amplia variedad de señuelos para atraer las mejores especies. Desde artificiales hasta
                                    naturales.
                                </p>
                            </div>
                            <a href="/products?category=5&brand="
                                class="inline-block bg-purple-600 hover:bg-purple-700 text-white font-semibold py-4 px-8 rounded-full transition-all duration-500 transform hover:scale-105 shadow-lg">
                                Ver Productos
                                <i class="fas fa-arrow-right ml-2"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Call to Action adicional -->
                <div class="text-center mt-12">
                    <a href="/products"
                        class="inline-flex items-center bg-gradient-to-r from-slate-700 via-slate-800 to-slate-900 hover:from-slate-800 hover:to-slate-900 text-white font-bold py-5 px-10 rounded-full transition-all duration-500 transform hover:scale-105 shadow-2xl hover:shadow-3xl border border-slate-600">
                        <i class="fas fa-shopping-bag mr-3 text-amber-400"></i>
                        Ver Todas las Categorías
                        <i class="fas fa-chevron-right ml-3 text-amber-400"></i>
                    </a>
                </div>
            </div>
        </section>


        <!-- PRODUCTOS DESTACADOS -->
        <section class="bg-white py-12 w-full">
            <h2 class="text-3xl font-bold text-blue-900 text-center mb-8">Productos Destacados</h2>
            <div class="w-full px-2">
                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-6">
                    @foreach ($featuredProducts as $product)
                        <div
                            class="bg-white rounded-lg shadow-md hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1 p-4 flex flex-col items-center">
                            @php
                                $mainImage = $product->images->first();
                            @endphp
                            <img src="{{ $mainImage ? asset('storage/' . $mainImage->path) : asset('images/osa_transparent_circle.png') }}"
                                alt="{{ $product->name }}"
                                class="object-cover rounded-lg mb-3 w-full">

                            <h3 class="text-sm font-semibold text-gray-800 mb-1 text-center">{{ $product->name }}</h3>

                            <span
                                class="text-lg text-blue-600 font-bold mb-3">₡{{ number_format($product->price, 0, ',', '.') }}</span>

                            <a href="{{ route('products.show', $product->slug) }}"
                                class="w-full bg-blue-600 hover:bg-blue-700 text-white text-xs font-semibold py-2 px-3 rounded-md transition-colors text-center">
                                Ver Producto
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>


        <!-- sobre nosotros -->
        <div class="w-5/6 mx-auto pt-10 pb-4">
            <h1 class="text-2xl font-bold mb-4 text-center">Sobre nosotros</h1>
            <p class="text-gray-500 text-md text-center">Somos una empresa dedicada a la venta de productos de pesca de
                alta calidad. Nos enfocamos en ofrecer productos de la mejor calidad para que puedas disfrutar de la pesca
                al máximo.</p>
        </div>

        <!-- Features Section -->
        <div class="w-5/6 mx-auto pb-10">
            <div class="grid md:grid-cols-3 gap-8 mt-12">
                <div class="bg-white rounded-lg p-6 shadow-lg hover:shadow-xl transition-shadow duration-300">
                    <div class="mb-4">

                    </div>
                    <h3 class="text-xl font-semibold mb-2">Experiencia</h3>
                    <p class="text-gray-600">Años de experiencia en pesca local y conocimiento del área.</p>
                </div>

                <div class="bg-white rounded-lg p-6 shadow-lg hover:shadow-xl transition-shadow duration-300">
                    <div class="text-blue-500 mb-4">

                    </div>
                    <h3 class="text-xl font-semibold mb-2">Comunidad</h3>
                    <p class="text-gray-600">Parte activa de la comunidad de pescadores locales.</p>
                </div>
            </div>
        </div>
    </div>
@endsection

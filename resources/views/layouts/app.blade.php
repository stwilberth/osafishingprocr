<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-MQXY01X6RM"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-MQXY01X6RM');
    </script>
    
    <!-- Schema.org para la organización -->
    <x-schema.organization-schema />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/ico">
    <!-- tags for sharing social media -->
    @hasSection('meta')
        @yield('meta')
    @else
        <x-customize.meta-tags-optimized title="{{ config('app.name', 'OsaFishingProCR.com') }}"
            description="Tienda de pesca en Costa Rica especializada en equipos para pesca recreativa y de consumo en la zona sur. Cañas, carretes y señuelos para pescadores que disfrutan la pesca como pasatiempo y para consumo propio." image="{{ asset('images/osa_transparent_circle.png') }}" />
    @endif



    <!-- icons awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    @yield('styles')

    <!-- production -->
    <link rel="preload" as="style" href="/build/assets/app-Bvo_Z76y.css" />
    <link rel="modulepreload" href="/build/assets/app-aHOSkUm3.js" />
    <link rel="stylesheet" href="/build/assets/app-Bvo_Z76y.css" />
    <script type="module" src="/build/assets/app-aHOSkUm3.js"></script>
    <!-- development -->
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}

    <style>
        /* Mantener el estilo existente del botón WhatsApp */
        .whatsapp-btn {
            animation: pulse 2s infinite;
            box-shadow: 0 0 0 0 rgba(37, 211, 102, 0.7);
            z-index: 1000;
        }

        @keyframes pulse {
            0% {
                box-shadow: 0 0 0 0 rgba(37, 211, 102, 0.7);
            }

            70% {
                box-shadow: 0 0 0 20px rgba(37, 211, 102, 0);
            }

            100% {
                box-shadow: 0 0 0 0 rgba(37, 211, 102, 0);
            }
        }
    </style>

</head>

<body class="font-sans antialiased">
<div class="min-h-screen bg-secondary-50">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @isset($header)
            <header class="bg-secondary-500 shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <!-- Page Content -->
        <main>
            @isset($slot)
                {{ $slot }} <!-- Render slot content if available (for components) -->
            @else
                @yield('content') <!-- Fall back to sections if no slot content -->
            @endisset

            @yield('scripts')
        </main>
    </div>

    <!-- Botón flotante de WhatsApp -->
    <a href="https://api.whatsapp.com/send?phone=60283248&text="
        class="fixed bottom-5 right-5 flex items-center justify-center w-[60px] h-[60px] text-3xl bg-green-500 hover:bg-green-600 text-white rounded-full whatsapp-btn"
        target="_blank">
        <i class="fab fa-whatsapp"></i>
    </a>
    <footer class="bg-primary-800 text-secondary-500 border-t-4 border-primary-400">
        <!-- Sección principal del footer -->
        <div class="max-w-7xl mx-auto px-4 py-12">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                
                <!-- Información de la empresa -->
                <div class="space-y-4">
                    <div class="flex items-center space-x-3">
                        <img src="{{ asset('images/logo_blanco.png') }}" alt="Osa Fishing Pro" class="w-12 h-12">
                        <div>
                            <h3 class="text-xl font-bold text-primary-200">Osa Fishing Pro</h3>
                            <p class="text-sm text-secondary-300">Tu tienda de confianza para equipos de pesca</p>
                        </div>
                    </div>
                    <p class="text-secondary-300 text-sm leading-relaxed">
                        Especialistas en equipos de pesca deportiva y de consumo para la zona sur de Costa Rica.
                        Productos de calidad seleccionados para pescadores locales.
                    </p>
                    <div class="flex space-x-4">
                        <a href="https://wa.me/60283248" target="_blank" class="text-green-600 hover:text-green-700 transition-colors">
                            <i class="fab fa-whatsapp text-xl"></i>
                        </a>
                        <a href="tel:60283248" class="text-blue-600 hover:text-blue-700 transition-colors">
                            <i class="fas fa-phone text-xl"></i>
                        </a>
                        <a href="https://www.facebook.com/osafishingpro" target="_blank" class="text-blue-600 hover:text-blue-700 transition-colors">
                            <i class="fab fa-facebook text-xl"></i>
                        </a>
                        <a href="https://www.instagram.com/osafishingpro" target="_blank" class="text-pink-600 hover:text-pink-700 transition-colors">
                            <i class="fab fa-instagram text-xl"></i>
                        </a>
                    </div>
                </div>

                <!-- Enlaces rápidos -->
                <div class="space-y-4">
                    <h4 class="text-lg font-semibold text-primary-200 border-b-2 border-primary-300 pb-2">Enlaces Rápidos</h4>
                    <ul class="space-y-2">
                        <li><a href="/products" class="text-secondary-300 hover:text-primary-200 transition-colors text-sm">Todos los Productos</a></li>
                        <li><a href="/products?category=3" class="text-secondary-300 hover:text-primary-200 transition-colors text-sm">Carretes Spinning</a></li>
                        <li><a href="/products?category=4" class="text-secondary-300 hover:text-primary-200 transition-colors text-sm">Carretes Baitcast</a></li>
                        <li><a href="/products?category=5" class="text-secondary-300 hover:text-primary-200 transition-colors text-sm">Señuelos</a></li>
                        <li><a href="/contact" class="text-secondary-300 hover:text-primary-200 transition-colors text-sm">Contacto</a></li>
                    </ul>
                </div>

                <!-- Información de contacto -->
                <div class="space-y-4">
                    <h4 class="text-lg font-semibold text-primary-200 border-b-2 border-primary-300 pb-2">Contacto</h4>
                    <div class="space-y-3">
                        <div class="flex items-center space-x-3">
                            <i class="fas fa-map-marker-alt text-primary-300"></i>
                            <span class="text-secondary-300 text-sm">Zona Sur, Costa Rica</span>
                        </div>
                        <div class="flex items-center space-x-3">
                            <i class="fas fa-phone text-primary-300"></i>
                            <a href="tel:60283248" class="text-secondary-300 hover:text-primary-200 transition-colors text-sm">6028-3248</a>
                        </div>
                        <div class="flex items-center space-x-3">
                            <i class="fab fa-whatsapp text-primary-300"></i>
                            <a href="https://wa.me/60283248" target="_blank" class="text-secondary-300 hover:text-primary-200 transition-colors text-sm">WhatsApp</a>
                        </div>
                        <div class="flex items-center space-x-3">
                            <i class="fas fa-clock text-primary-300"></i>
                            <span class="text-secondary-300 text-sm">Lun-Vie: 8:00-18:00</span>
                        </div>
                    </div>
                </div>

                <!-- Seguridad y confianza -->
                <div class="space-y-4">
                    <h4 class="text-lg font-semibold text-primary-200 border-b-2 border-primary-300 pb-2">Seguridad</h4>
                    <div class="space-y-3">
                        <div class="flex items-center space-x-2">
                            <i class="fas fa-shield-alt text-green-400"></i>
                            <span class="text-secondary-300 text-sm">Pagos Seguros</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <i class="fas fa-truck text-primary-300"></i>
                            <span class="text-secondary-300 text-sm">Envío Nacional</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <i class="fas fa-undo text-purple-400"></i>
                            <span class="text-secondary-300 text-sm">Garantía de Productos</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sección de métodos de pago y certificaciones -->
        <div class="bg-secondary-500 border-t-2 border-primary-300">
            <div class="max-w-7xl mx-auto px-4 py-6">
                <div class="flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">

                    <!-- Métodos de pago -->
                    <div class="flex items-center space-x-4">
                        <span class="text-primary-800 text-sm font-medium">Métodos de Pago:</span>
                        <div class="flex space-x-2">
                            <div class="bg-secondary-500 rounded px-2 py-1 border border-primary-300">
                                <i class="fab fa-cc-visa text-blue-600 text-lg"></i>
                            </div>
                            <div class="bg-secondary-500 rounded px-2 py-1 border border-primary-300">
                                <i class="fab fa-cc-mastercard text-red-600 text-lg"></i>
                            </div>
                            <div class="bg-secondary-500 rounded px-2 py-1 border border-primary-300">
                                <i class="fab fa-cc-paypal text-blue-500 text-lg"></i>
                            </div>
                            <div class="bg-secondary-500 rounded px-2 py-1 text-sm font-bold text-primary-800 border border-primary-300">
                                SINPE
                            </div>
                        </div>
                    </div>

                    <!-- Certificaciones de seguridad -->
                    <div class="flex items-center space-x-4">
                        <div class="flex items-center space-x-2">
                            <i class="fas fa-lock text-green-600"></i>
                            <span class="text-primary-800 text-sm">Sitio Seguro SSL</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Copyright y enlaces legales -->
        <div class="bg-primary-50 border-t-2 border-primary-200">
            <div class="max-w-7xl mx-auto px-4 py-4">
                <div class="flex flex-col md:flex-row justify-between items-center space-y-2 md:space-y-0">
                    <div class="text-primary-600 text-sm">
                        © {{ date('Y') }} Osa Fishing Pro CR. Todos los derechos reservados.
                    </div>
                    <div class="flex space-x-6 text-sm">
                        <a href="/privacy" class="text-primary-600 hover:text-primary-700 transition-colors">Política de Privacidad</a>
                        <a href="/terms" class="text-primary-600 hover:text-primary-700 transition-colors">Términos y Condiciones</a>
                        <a href="/shipping" class="text-primary-600 hover:text-primary-700 transition-colors">Política de Envíos</a>
                        <a href="/returns" class="text-primary-600 hover:text-primary-700 transition-colors">Devoluciones</a>
                    </div>
                    <div class="text-primary-600 text-sm">
                        Desarrollado con ❤️ por <a href="https://wilberth.com" class="text-primary-700 hover:text-primary-800">Wilberth.com</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
</body>

</html>

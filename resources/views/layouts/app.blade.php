<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-MQXY01X6RM"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-MQXY01X6RM');
    </script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/ico">
    <!-- tags for sharing social media -->
    @hasSection('meta')
        @yield('meta')
    @else
        <x-customize.meta-tags
            title="{{ config('app.name', 'OsaFishingProCR.com') }}"
            description="Tienda de pesca en Costa Rica"
            image="{{ asset('images/osa_transparent_circle.png') }}" />
    @endif
    <meta property="og:url" content="{{ url()->current() }}" />



    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <!-- icons awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    @yield('styles')

    <!-- production -->
    @if (app()->environment('production'))
        <script src="{{ asset('build/assets/app1_1.js') }}" type="module" defer></script>
        <link href="{{ asset('build/assets/app1_1.css') }}" rel="stylesheet">
    @else
        @vite(['resources/css/app.css'])
    @endif



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
    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @isset($header)
            <header class="bg-white shadow">
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
    {{-- footer --}}
    <footer class="bg-gradient-to-b from-blue-50 to-blue-100 border-t border-blue-200">
        <div class="max-w-7xl mx-auto px-4 py-6">
            <div class="flex flex-col md:flex-row justify-between items-center gap-4">
                <!-- Logo y copyright -->
                <div class="flex items-center gap-2">
                    <img src="{{ asset('images/osa_transparent_circle.png') }}" alt="Logo" class="w-10 h-10">
                    <p class="text-gray-600 text-sm">
                        © {{ date('Y') }} Osa Fishing Pro CR.
                        <span class="block md:inline">Todos los derechos reservados.</span>
                    </p>
                </div>

                <!-- Enlaces sociales -->
                <div class="flex gap-4">
                    <a href="#" class="text-blue-500 hover:text-blue-700 transition-colors">
                        <i class="fab fa-facebook text-xl"></i>
                    </a>
                    <a href="#" class="text-blue-400 hover:text-blue-600 transition-colors">
                        <i class="fab fa-instagram text-xl"></i>
                    </a>
                    <a href="#" class="text-green-500 hover:text-green-700 transition-colors">
                        <i class="fab fa-whatsapp text-xl"></i>
                    </a>
                </div>
            </div>

            <!-- Decoración marina minimalista -->
            <div class="relative h-1 w-full mt-4 mb-2">
                <div class="absolute inset-0 bg-blue-200 opacity-50">
                    <svg class="w-full h-full" preserveAspectRatio="none" viewBox="0 0 1200 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0 3C300 3 300 1 600 1C900 1 900 5 1200 5" stroke="currentColor" stroke-width="2" pathLength="1"/>
                    </svg>
                </div>
            </div>

            <!-- Créditos del desarrollador -->
            <div class="text-center text-lg text-gray-500 mt-2">
                Desarrollado por <a href="https://wilberth.com" class="text-blue-500 hover:text-blue-700 transition-colors" target="_blank">Wilberth.com</a>
            </div>
        </div>
    </footer>
</body>

</html>

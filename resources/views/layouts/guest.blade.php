<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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



    @yield('styles')
    <!-- production -->
    <link rel="preload" as="style" href="/build/assets/app-DGhkTmTU.css" />
    <link rel="modulepreload" href="/build/assets/app-aHOSkUm3.js" />
    <link rel="stylesheet" href="/build/assets/app-DGhkTmTU.css" />
    <script type="module" src="/build/assets/app-aHOSkUm3.js"></script>
    <!-- development -->
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
</head>

<body class="font-sans text-gray-900 antialiased">
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div class="flex justify-center items-center mt-6">
            <a href="/">
                <img src="{{ asset('images/osa_transparent_circle.png') }}" alt="Osa Fishing Pro CR" class="max-w-40">
            </a>
        </div>

        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            @isset($slot)
                {{ $slot }} <!-- Render slot content if available (for components) -->
            @else
                @yield('content') <!-- Fall back to sections if no slot content -->
            @endisset
        </div>
    </div>
</body>

</html>

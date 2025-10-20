@extends('layouts.app')
@section('meta')
    <title>Contacto - Osa Fishing Pro CR</title>
    <meta name="description" content="Contacta con Osa Fishing Pro - Tienda de pesca en Costa Rica. Información de contacto, WhatsApp, teléfono, email y ubicación en la zona sur.">
@endsection


@section('content')
    <!-- contact form -->
    <div class="container mt-5">
            <!-- contact info -->
            <h1 class="text-2xl font-bold mb-4 text-center">Contacto</h1>

            <div class="w-full max sm:w-1/2 mx-auto">
                <h2 class="text-2xl font-bold mb-4">Información</h2>
                <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                    <!-- social media -->
                    <!-- whatsapp -->
                    <p class="text-gray-700 text-base">
                       <i class="fab fa-whatsapp"></i> WhatsApp: <a href="https://wa.me/60283248" target="_blank" class="text-green-500">6028-3248</a>
                    </p>
                    <!-- phone -->
                    <p class="text-gray-700 text-base">
                        <i class="fas fa-phone"></i> Teléfono: <a href="tel:60283248" class="text-blue-500">6028-3248</a>
                    </p>
                    <!-- email -->
                    <p class="text-gray-700 text-base">
                        <i class="fas fa-envelope"></i> Email: <a href="mailto:osafishingpro@gmail.com" class="text-blue-500">osafishingpro@gmail.com</a>
                    </p>
                    <!-- address -->
                    <p class="text-gray-700 text-base">
                        <i class="fas fa-map-marker-alt"></i> Dirección: <a href="https://maps.app.goo.gl/xJLTmmg2NLbKyf658" target="_blank" class="text-blue-500">Finca Alajuela, Priedras Blancas, Osa, Puntarenas, Costa Rica</a>
                    </p>
                    <!-- opening hours -->
                    <p class="text-gray-700 text-base">
                        <i class="fas fa-clock"></i> Horario de atención: <span class="text-blue-500">Lunes a Viernes, 9:00 AM - 6:00 PM</span>
                    </p>
                </div>
            </div>

            <div class="w-full max sm:w-1/2 mx-auto sm:hidden">
                <div class="flex justify-center gap-4 my-10">
                    <!-- whatsapp -->
                    <a href="https://wa.me/60283248" target="_blank" class="text-green-500"><i class="fab fa-whatsapp"></i></a>
                    <!-- phone -->
                    <a href="tel:60283248" class="text-blue-500"><i class="fas fa-phone"></i></a>
                    <!-- facebook -->
                    <a href="https://www.facebook.com/osafishingpro" target="_blank" class="text-blue-500"><i class="fab fa-facebook"></i></a>
                    <!-- instagram -->
                    <a href="https://www.instagram.com/osafishingpro" target="_blank" class="text-purple-500"><i class="fab fa-instagram"></i></a>
                    <!-- twitter -->
                    <a href="https://www.twitter.com/osafishingpro" target="_blank" class="text-blue-500"><i class="fab fa-twitter"></i></a>
                    <!-- youtube -->
                    <a href="https://www.youtube.com/osafishingpro" target="_blank" class="text-red-500"><i class="fab fa-youtube"></i></a>
                    <!-- tiktok -->
                    <a href="https://www.tiktok.com/osafishingpro" target="_blank" class="text-pink-500"><i class="fab fa-tiktok"></i></a>
                    <!-- google maps -->
                    <a href="https://maps.app.goo.gl/xJLTmmg2NLbKyf658" target="_blank" class="text-green-500"><i class="fas fa-map-marker-alt"></i></a>
                </div>
            </div>


            <div class="w-full max sm:w-1/2 mx-auto hidden sm:block">
                <div class="flex justify-center gap-10 my-10">
                    <!-- whatsapp -->
                    <a href="https://wa.me/60283248" target="_blank" class="text-green-500"><i class="fab fa-whatsapp fa-2x"></i></a>
                    <!-- phone -->
                    <a href="tel:60283248" class="text-blue-500"><i class="fas fa-phone fa-2x"></i></a>
                    <!-- facebook -->
                    <a href="https://www.facebook.com/osafishingpro" target="_blank" class="text-blue-500"><i class="fab fa-facebook fa-2x"></i></a>
                    <!-- instagram -->
                    <a href="https://www.instagram.com/osafishingpro" target="_blank" class="text-purple-500"><i class="fab fa-instagram fa-2x"></i></a>
                    <!-- twitter -->
                    <a href="https://www.twitter.com/osafishingpro" target="_blank" class="text-blue-500"><i class="fab fa-twitter fa-2x"></i></a>
                    <!-- youtube -->
                    <a href="https://www.youtube.com/osafishingpro" target="_blank" class="text-red-500"><i class="fab fa-youtube fa-2x"></i></a>
                    <!-- tiktok -->
                    <a href="https://www.tiktok.com/osafishingpro" target="_blank" class="text-pink-500"><i class="fab fa-tiktok fa-2x"></i></a>
                    <!-- google maps -->
                    <a href="https://maps.app.goo.gl/xJLTmmg2NLbKyf658" target="_blank" class="text-green-500"><i class="fas fa-map-marker-alt fa-2x"></i></a>
                </div>
            </div>

        <div class="flex justify-center">

            <!-- contact form -->
            <div class="w-full max sm:w-1/2">
                    <h2 class="text-2xl font-bold mb-4">Formulario de contacto</h2>
                <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-10">
                    <form action="{{ route('contacts.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Nombre</label>
                            <input type="text" name="name" id="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        </div>
                        <div class="mb-4">
                            <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                            <input type="email" name="email" id="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        </div>
                        <!-- phone number -->
                        <div class="mb-4">
                            <label for="phone" class="block text-gray-700 text-sm font-bold mb-2">Teléfono</label>
                            <input type="text" name="phone" id="phone" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        </div>
                        <div class="mb-6">
                            <label for="message" class="block text-gray-700 text-sm font-bold mb-2">Mensaje</label>
                            <textarea name="message" id="message" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required></textarea>
                        </div>
                        <!-- recaptcha -->
                        <div class="mb-6">
                            <div class="g-recaptcha" data-sitekey="{{ env('GOOGLE_RECAPTCHA_KEY') }}"></div>
                        </div>

                        <div class="flex items-center justify-between">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
                                <i class="fas fa-paper-plane"></i>
                                Enviar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

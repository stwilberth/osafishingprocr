<!-- Popular product section -->
<section id="popular-products" class="py-8 bg-gray-50">
    <div class="container mx-auto px-4">
        <h2 class="text-2xl md:text-3xl font-bold mb-8 text-center">{{ $title }}</h2>

        {{-- Grid actualizado para mejor visualización en móvil --}}
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-3 md:gap-6">
            @foreach ($products as $product)
                <div class="bg-white p-3 md:p-4 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300">
                    <div class="aspect-w-1 aspect-h-1 mb-3">
                        @if ($product->images->count() > 0)
                            <a href="{{ route('products.show', $product) }}">
                                <img src="{{ asset('storage/' . $product->images->first()->path) }}"
                                    alt="{{ $product->images->first()->name }}"
                                    class="w-full h-32 md:h-48 object-contain rounded-lg">
                            </a>
                        @else
                            <a href="{{ route('products.show', $product) }}">
                                <img src="{{ asset('images/osa_transparent_circle.png') }}"
                                    alt="Placeholder"
                                    class="w-full h-32 md:h-48 object-contain rounded-lg">
                            </a>
                        @endif
                    </div>

                    <a href="{{ route('products.show', $product) }}"
                       class="text-sm md:text-lg font-semibold hover:text-primary block truncate">
                        {{ $product->name }}
                    </a>


                    <div class="flex items-center justify-between">
                        @if ($product->category)
                            <span class="inline-block bg-blue-100 text-blue-800 rounded-full text-xs md:text-sm font-semibold">
                                {{ $product->category->name }}
                            </span>
                        @endif
                    </div>

                    <div class="flex items-center justify-between">
                        <a href="https://api.whatsapp.com/send?phone=60283248&text={{ route('products.show', $product) }} Hola,%20me%20interesa%20el%20producto%20{{ $product->name }}"
                            class="text-green-500 font-semibold rounded-lg text-center text-xs md:text-sm transition-colors duration-200">
                            <i class="fab fa-whatsapp text-lg"></i>
                            <span class="hidden md:inline">Chat</span>
                        </a>
                        <span class="text-lg md:text-xl font-bold text-red-900">₡{{ number_format($product->price, 0) }}</span>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

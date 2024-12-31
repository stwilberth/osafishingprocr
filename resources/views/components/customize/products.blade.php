<!-- Popular product section -->
<section id="popular-products">
    <div class="container mx-auto px-4">
        <h2 class="text-2xl font-bold mb-8">{{ $title }}</h2>
        <div class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-5 gap-4">
            @foreach ($products as $product)
                <div class="bg-white p-3 rounded-lg shadow-lg">
                    {{-- {{ asset('storage/' . $image->path) }} --}}
                    @if ($product->images->count() > 0)
                        <img src="{{ asset('storage/' . $product->images->first()->path) }}"
                            alt="{{ $product->images->first()->name }}" class="w-full object-cover mb-4 rounded-lg">
                    @else
                        <img src="{{ asset('images/osa_transparent_circle.png') }}" alt="Placeholder"
                            class="w-full object-cover mb-4 rounded-lg">
                    @endif
                    <a href="#" class="text-lg font-semibold mb-2">{{ $product->name }}</a>
                    {{-- <p class="my-2">Women</p> --}}
                    </br>

                    @if ($product->category)
                        <span class="bg-gray-200 text-gray-800 rounded-full px-2 py-1 text-xs font-semibold mr-1">
                            {{ $product->category->name }}
                        </span>
                    @endif

                    <div class="flex items-center mb-4">
                        <span class="text-lg font-bold text-primary">₡{{ number_format($product->price, 0) }}</span>
                        {{-- <span class="text-sm line-through ml-2">$24.99</span> --}}
                    </div>

                    <div class="grid grid-cols-2 gap-2">
                        <a href="{{ route('products.show', $product) }}"
                            class="bg-red-500 border border-transparent hover:bg-transparent hover:border-red-500 text-white hover:text-red-500 font-semibold py-2 px-4 rounded-full text-center">
                            Ver
                        </a>

                        <!-- button chat whatsapp -->
                        <a href="https://api.whatsapp.com/send?phone=60283248&text={{ route('products.show', $product) }} Hola,%20me%20interesa%20el%20producto%20{{ $product->name }}"
                            class="bg-green-500 border border-transparent hover:bg-transparent hover:border-green-500 text-white hover:text-green-500 sm:font-normal font-semibold py-2 px-4 sm:px-2 sm:py-1 rounded-full text-center">
                            Chat
                        </a>
                    </div>

                </div>
            @endforeach
        </div>
    </div>
</section>

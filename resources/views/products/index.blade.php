@extends('layouts.app')

@section('content')
    <!-- create product link -->
    @if (Auth::check() && Auth::user()->hasRole('admin'))
        <div class="flex justify-center w-full mt-2">
            <div class="relative inline-block text-left">
                <button id="createButton"
                    class="inline-flex justify-center w-full rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-blue-500 text-white font-bold hover:bg-blue-700">
                    Create
                </button>
                <div id="dropdownMenu"
                    class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 hidden">
                    <div class="py-1" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
                        <a href="{{ route('products.create') }}"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">
                            Producto
                        </a>
                        <a href="{{ route('brands.create') }}"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">
                            Marca
                        </a>
                        <a href="{{ route('categories.create') }}"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">
                            Categoría
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endif

    {{-- filter products --}}
    <x-customize.filter-products :categories="$categories" :brands="$brands" />

    <!-- list products -->
    <x-customize.products title="" :products="$products" />
@endsection

@section('scripts')
    <script>
        document.getElementById('createButton').addEventListener('click', function() {
            var dropdownMenu = document.getElementById('dropdownMenu');
            dropdownMenu.classList.toggle('hidden');
        });
    </script>
@endsection

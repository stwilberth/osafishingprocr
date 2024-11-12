<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        {{-- section where show the links fors users, products, create product --}}
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-4">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <h1 class="text-2xl font-bold">Users</h1>
                        <p class="text-lg">Manage users</p>
                        <a href="{{ route('users.index') }}" class="text-blue-500">View Users</a>
                    </div>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <h1 class="text-2xl font-bold">Products</h1>
                        <p class="text-lg">Manage products</p>
                        <a href="{{ route('products.index') }}" class="text-blue-500">View Products</a>
                    </div>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <h1 class="text-2xl font-bold">Create Product</h1>
                        <p class="text-lg">Create a new product</p>
                        <a href="{{ route('products.create') }}" class="text-blue-500">Create Product</a>
                    </div>
                </div>
                {{-- manage categories --}}
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <h1 class="text-2xl font-bold">Categories</h1>
                        <p class="text-lg">Manage categories</p>
                        <a href="{{ route('categories.index') }}" class="text-blue-500">View Categories</a>
                    </div>
                </div>
                {{-- watch all contacts --}}
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <h1 class="text-2xl font-bold">Contacts</h1>
                        <p class="text-lg">View all contacts</p>
                        <a href="{{ route('contacts.index') }}" class="text-blue-500">View Contacts</a>
                    </div>
                </div>
                <!-- manage permissions -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <h1 class="text-2xl font-bold">Permissions</h1>
                        <p class="text-lg">Manage permissions</p>
                        <a href="{{ route('permissions.index') }}" class="text-blue-500">View Permissions</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

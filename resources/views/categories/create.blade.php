@extends('layouts.app')

@section('content')

{{-- form for create categories --}}
<div class="container mx-auto mt-10">
    <form action="/categories" method="POST" class="max-w-lg mx-auto p-6 bg-white rounded-lg shadow-md space-y-4">
        @csrf
        
        <!-- Category Name -->
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700">Category Name</label>
            <input type="text" name="name" id="name" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
        </div>

        <!-- Category Description -->
        <div>
            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
            <textarea name="description" id="description" rows="4" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"></textarea>
        </div>

        <!-- Submit Button -->
        <div class="flex justify-end">
            <button type="submit"
                class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Save Category
            </button>
        </div>
        <!-- Validation Errors -->
        @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Holy smokes!</strong>
            <span class="block sm:inline">Something seriously bad happened.</span>
            <ul>
                @foreach ($errors->all() as $error)
                <li>
                    <span>{{ $error }}</span>
                </li>
                @endforeach
            </ul>
        </div>
        @endif
    </form>

    {{-- button to go back to the categories index --}}
    <div class="flex justify-center mt-4">
        <a href="{{ route('categories.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Categories
        </a>
    </div>
</div>

@endsection
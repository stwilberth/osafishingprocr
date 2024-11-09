@extends('layouts.app')

@section('content')

{{-- form for editing categories --}}
<div class="container mx-auto mt-10">
    <form action="/categories/{{ $category->id }}" method="POST" class="max-w-lg mx-auto p-6 bg-white rounded-lg shadow-md space-y-4">
        @csrf
        @method('PUT')
        
        <!-- Category Name -->
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700">Category Name</label>
            <input type="text" name="name" id="name" value="{{ $category->name }}" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
        </div>

        <!-- Category Description -->
        <div>
            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
            <textarea name="description" id="description" rows="4" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">{{ $category->description }}</textarea>
        </div>

        <!-- Submit Button -->
        <div class="flex justify-end">
            <button type="submit"
                class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Update Category
            </button>
        </div>
    </form>
</div>

@endsection
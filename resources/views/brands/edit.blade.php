@extends('layouts.app')

@section('content')
    <div class="container mx-auto w-1/2 mt-5">
        <h1 class="text-2xl font-bold mb-4 text-blue-800">Edit Brand</h1>
        {{-- create a form to edit a brand using the tailwind css --}}
        <form action="{{ route('brands.update', $brand->id) }}" method="POST" class="bg-white p-4 rounded-md shadow-md">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="name" class="block text-gray-700">Name</label>
                <input type="text" name="name" id="name" value="{{ $brand->name }}"
                    class="form-input mt-1 block w-full rounded-md" required>
            </div>
            <div class="flex justify-end">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Update
                </button>
            </div>
        </form>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="flex justify-center mt-4">
            {{-- button to go back to the brands index --}}
            <a href="{{ route('brands.index') }}"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Brands
            </a>
        </div>
    </div>

@endsection

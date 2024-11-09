@extends('layouts.app')

@section('content')

{{-- form for create categories --}}
<div class="container mx-auto mt-10">
    {{-- Display category card --}}
    <div class="container mx-auto mt-10">
        <div class="max-w-lg mx-auto p-6 bg-white rounded-lg shadow-md">
            <h2 class="text-2xl font-bold text-gray-900">{{ $category->name }}</h2>
            <p class="mt-4 text-gray-700">{{ $category->description }}</p>
        </div>
    </div>
</div>

@endsection

{{-- show the brand by id using the tailwind css and layouts --}}
@extends('layouts.app')

@section('content')
    <div class="container mx-auto w-1/2 mt-5">
        <h1 class="text-2xl font-bold">{{ $brand->name }}</h1>
        <a href="{{ route('brands.edit', $brand) }}" class="btn btn-primary">Edit</a>
    </div>
@endsection

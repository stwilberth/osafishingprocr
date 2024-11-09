@extends('layouts.app')

@section('content')
    <!-- list products -->
    <x-customize.products title="">
        @foreach ($products as $product)
            <x-customize.product :product="$product" />
        @endforeach
    </x-customize.products>
@endsection

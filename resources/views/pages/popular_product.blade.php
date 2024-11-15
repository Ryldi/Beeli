@extends('layouts.master')

@section('content')
<div class="container mx-auto mt-40 px-14">
    <div class="text-3xl font-semibold text-center mb-10">POPULAR PRODUCTS</div>
    @include('components.products_card', ['products' => $products])
</div>

@endsection
@extends('layouts.master')

@section('content')

@include('components.ads_carousel')

<div class="container mx-auto py-8">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold">POPULAR PRODUCTS</h2>
        <a href="#" class="text-black hover:text-accent transition-all duration-500">See All &gt;</a>
    </div>

    @include('components.products_card')
</div>

<div class="container mx-auto py-8">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold">UNIVERSITIES</h2>
    </div>

    @include('components.universities_card')
</div>

@endsection

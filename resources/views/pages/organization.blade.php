@extends('layouts.master')

@section('content')
<div class="container mx-auto mt-40 px-14 flex flex-col items-center">
    <div class="flex flex-col justify-center items-center md:flex-row gap-10 md:gap-8">
        <div class="flex flex-col items-center gap-5 md:flex-row">
            <img src="data:image/jpeg;base64,{{ base64_encode($organization->logo) }}" alt="" class="w-2/6 h-2/6 object-cover rounded-full">
            <div class="text-2xl font-semibold text-center">{{ $organization->name }}</div>
        </div>
        <div class="flex bg-accent/30 p-14 rounded-lg">
            {{ $organization->description }}
        </div>
    </div>
    <div class="text-2xl font-semibold text-center m-10">Products</div>
    @if ($organization->products->count() > 0)
    <div class="bg-grey/60 rounded-lg shadow-lg p-4 mb-20">
        @include('components.products_card', ['products' => $organization->products])
    </div>
    @endif
    
</div>

@if (count($organization->products) <= 0)
<div class="bg-white rounded-lg shadow-lg p-4 flex justify-center">
    <h3 class="font-semibold text-lg">No products found</h3>
</div>
@endif
@endsection
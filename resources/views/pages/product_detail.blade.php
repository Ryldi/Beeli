@extends('layouts.master')

@section('content')

@include('components.toast')

<div class="container mx-auto mt-40 px-14 flex flex-row">
    <div class="flex flex-col justify-start mb-6 gap-5">
        <div class="mr-16">
            <img src="data:image/jpeg;base64,{{ base64_encode($product->image) }}" alt="" width="400" class="rounded-2xl">
        </div>
        <a href="{{ route('organization.view', $product->organization->id) }}" class="flex gap-5">
            <img src="data:image/jpeg;base64,{{ base64_encode($product->organization->logo) }}" style="border-radius: 50%; width: 70px; height:70px" alt="">
            <div class="flex flex-col justify-center">
                <span class="font-semibold text-xl">{{ $product->organization->name }}</span>
                <span class="text-black/60">{{ $university->name }}</span>
            </div>
        </a>
    </div>

    <div class="">
        <div class="h-100 flex flex-col gap-7">
            <div>
                <p class="font-semibold text-4xl">{{ $product->name }}</p>
                <p class="text-xl mt-1">Tersisa {{ $product->stock }}</p>
            </div>
            <p class="font-semibold text-4xl">Rp {{ number_format($product->price, 0, ',', '.') }},00</p>
            <div>
                <p class="font-semibold text-2xl">Description</p>
                <p class="text-xl text-black/60 mt-1">{{ $product->description }}</p>
            </div>
        </div>
        @if (session('student'))
        <div class="my-10 md:my-0 md:mt-10">
            <form method="POST" action="{{ route('cart.add') }}">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <button 
                    type="submit" 
                    class="border border-accent py-1 px-8 rounded-lg hover:text-accent text-white bg-accent hover:bg-white transition-all duration-500 text-lg">
                    + Add to cart
                </button>
            </form>
        </div>
        @endif
    </div>
</div>

@endsection
@extends('layouts.master')

@section('content')
<div class="container mx-auto mt-40 mb-10 px-14 flex flex-col items-center">
    <img src="data:image/jpeg;base64,{{ base64_encode($university->logo) }}" alt="" class="w-1/6 object-cover mb-10">
    <div class="text-2xl font-semibold text-center mb-10">{{ $university->name }}</div>
    @foreach ($university->organizations as $organization)
        @if ($organization->products->count() > 0)
        <div class="bg-grey/60 rounded-lg shadow-lg p-4">
            <a href="{{ route('organization.view', $organization->id) }}" class="flex gap-4 items-center mb-5">
                <img src="data:image/jpeg;base64,{{ base64_encode($organization->logo) }}" alt="" class="w-14 object-cover rounded-full">
                <h3 class="font-semibold text-lg">{{ $organization->name }}</h3>
            </a>
            @include('components.products_card', ['products' => $organization->products])
        </div>
        @endif
    @endforeach
</div>

@if (count($products) <= 0)
<div class="bg-white rounded-lg shadow-lg p-4 flex justify-center">
    <h3 class="font-semibold text-lg">No products found</h3>
</div>
@endif
@endsection
<div class="grid grid-cols-2 md:grid-cols-4 gap-6">
    @foreach ($products as $prod)
    <div class="bg-white p-4">
        <a href="{{ route('product_detail.view', $prod->id) }}" class="cursor-pointer">
            <img src="data:image/jpeg;base64,{{ base64_encode($prod->image) }}" alt="" class="w-full object-cover mb-4 rounded-xl">
        </a>
        <h3 class="font-semibold text-lg">{{ $prod->name }}</h3>
        <p class="text-gray-500 mt-2">Rp {{ number_format($prod->price, 0, ',', '.') }},00</p>
    </div>
    @endforeach
</div>


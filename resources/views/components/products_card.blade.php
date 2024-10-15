<div class="grid grid-cols-2 md:grid-cols-4 gap-6">
    @for($i = 0; $i < 4; $i++)
        <div class="bg-white rounded-lg shadow-lg p-4 text-center">
            <img src="{{ asset('img/product/1.png')}}" alt="" class="w-full object-cover mb-4 rounded-lg">
            <h3 class="font-semibold text-lg">Boneka Wisuda Binus</h3>
            <p class="text-gray-500 mt-2">Rp 109.000,00</p>
        </div>
    @endfor
</div>

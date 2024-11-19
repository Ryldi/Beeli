<div class="flex flex-col md:flex-row justify-between pt-3">
    <div class="flex items-center gap-5">
        <img
            src="data:image/jpeg;base64,{{ base64_encode($detail->product->image) }}"
            class="w-20 h-20 rounded"
            alt="Product Image"
        >
        <div class="ms-1 font-normal text-gray-900 dark:text-gray-300">
            {{ $detail->product->name }}
        </div>
    </div>
    <div class="flex items-center gap-6">
        <div class="font-medium">Quantity: {{ $detail->quantity }}</div>
        <div class="font-medium">IDR {{ number_format($detail->product->price, 0, ',', '.') }},00</div>
    </div>
</div>
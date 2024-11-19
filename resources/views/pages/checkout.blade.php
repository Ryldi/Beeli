@extends('layouts.master')

@section('content')

@include('components.toast')

<div class="container mx-auto mt-40 px-14">
    <div class="flex flex-col">
        <div class="text-5xl font-bold">Checkout</div>
    </div>
    <div class="py-5">
        <div class="flex flex-col gap-4 border-b border-b-black mb-3 pb-5">
            <div class="text-3xl font-semibold">Your Order</div>
            @foreach ($product_details as $detail)
            <div class="flex flex-col md:flex-row justify-between">
                <div class="flex items-center gap-5">
                    <img src="data:image/jpeg;base64,{{ base64_encode($detail['product']->image) }}" class="w-20 h-20" alt="">
                    <div class="ms-1 font-normal text-gray-900 dark:text-gray-300">
                        {{ $detail['product']->name }}
                    </div>
                </div>
                <div class="flex items-center gap-6">
                    <div class="font-medium">Quantity: {{ $detail['quantity'] }}</div>
                    <div class="font-medium">IDR {{ number_format($detail['product']->price, 0, ',', '.') }},00</div>
                </div>
            </div>
            <input type="hidden" name="product_details[{{ $loop->index }}][id]" value="{{ $detail['product']->id }}">
            <input type="hidden" name="product_details[{{ $loop->index }}][quantity]" value="{{ $detail['quantity'] }}">
            <input type="hidden" name="product_details[{{ $loop->index }}][price]" value="{{ $detail['product']->price }}">
            @endforeach
        </div>
        <div class="py-3 flex justify-between">
            <span class="font-semibold">Total ({{ array_sum(array_column($product_details, 'quantity')) }} item)</span>
            <span class="font-semibold">IDR {{ number_format($total_price, 0, ',', '.') }},00</span>
        </div>
    </div>
    <div class="py-5">
        <div class="flex gap-8 pb-4">
            <div class="text-3xl font-semibold">Shipping Address</div>
            <button data-modal-target="select-modal" data-modal-toggle="select-modal" class="block text-black/60 hover:text-white bg-white hover:bg-accent focus:ring-4 focus:outline-none focus:ring-accent font-medium rounded-lg text-md px-5 py-1 text-center dark:bg-accent dark:hover:bg-accent-hover dark:focus:ring-accent border border-dark/60 hover:border-accent transition-all duration-500" type="button">
                Change
            </button>
            @include('components.list_address_modal')
        </div>
        @if (session('student')->addresses->count() == 0)
        <div class="bg-white rounded-lg shadow-lg p-4 flex justify-center">
            <h3 class="font-semibold text-lg">No address yet, click change to add addresses</h3>
        </div>
        @else 
        @foreach (session('student')->addresses as $address)
            @if ($address->main == 1)
            <div class="flex flex-col">
                <div class="font-normal">{{ $address->recipient_name }}</div>
                <div class="font-normal">+62 {{ $address->phone }}</div>
                <div class="font-normal">{{ $address->street }}</div>
                <div class="font-normal">{{ $address->subdistrict }}, Kota {{ $address->city }}, {{ $address->province }}</div>
                <div class="font-normal">{{ $address->postal_code }}</div>
            </div>
            @endif
        @endforeach
        @endif
    </div>
    <div class="py-5">
        <div class="flex gap-8 pb-4">
            <div class="text-3xl font-semibold">Order Summary</div>
        </div>
        <div class="flex flex-col">
            <div class="flex justify-between">
                <div class="font-semibold">Subtotal ({{ array_sum(array_column($product_details, 'quantity')) }} item)</div>
                <div class="font-semibold">IDR {{ number_format($total_price, 0, ',', '.') }},00</div>
            </div>
            <div class="flex justify-between">
                <div class="font-semibold">Shipping Fee</div>
                <div class="font-semibold">IDR 10.000,00</div>
            </div>
            <div class="flex justify-between">
                <div class="font-semibold">Total</div>
                <div class="font-semibold">IDR {{ number_format($total_price + 10000, 0, ',', '.') }},00</div>
            </div>
            <input type="number" name="grand_total" value="{{ $total_price + 10000 }}" class="hidden">
        </div>
    </div>
    <div class="py-5">
        <div class="flex justify-between pb-4">
            <div class="text-3xl font-semibold">Grand Total</div>
            <div class="text-3xl font-semibold">IDR {{ number_format($total_price + 10000, 0, ',', '.') }},00</div>
        </div>
    </div>
    <div class="pt-5 pb-20 flex justify-center">
        <form action="{{ route('checkout.transaction') }}" method="POST">
            @csrf
            @method('POST')
            <input type="hidden" name="selected_products" id="selected-products">
            @if(session('student')->addresses->where('main', 1)->first() != null)
                <input type="hidden" name="address_id" value="{{ session('student')->addresses->where('main', 1)->first()->id }}">
            @endisset
            <input type="hidden" name="total_price" value="{{ $total_price }}">
            <button type="submit" class="text-xl px-4 py-1 bg-accent text-white rounded-lg hover:bg-white hover:text-accent hover:border hover:border-accent transition-all duration-500" onclick="prepareSelectedProducts()">
                Checkout
            </button>
        </form>
    </div>
</div>

<script>
    function prepareSelectedProducts() {
        const productDetails = [];
        document.querySelectorAll('input[name^="product_details"]').forEach(input => {
            const nameParts = input.name.match(/product_details\[(\d+)\]\[(.+?)\]/);
            if (nameParts) {
                const index = parseInt(nameParts[1], 10);
                const key = nameParts[2];

                if (!productDetails[index]) {
                    productDetails[index] = {};
                }

                productDetails[index][key] = input.value;
            }
        });

        const selectedProductsJson = JSON.stringify(productDetails);

        document.getElementById('selected-products').value = selectedProductsJson;
    }

</script>
@endsection
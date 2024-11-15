@extends('layouts.master')

@section('content')

@include('components.toast')

<div class="container mx-auto mt-40 px-14">
    <div class="flex justify-between">
        <div class="text-5xl font-bold text-center mb-10">CART</div>
        <a href="">
              <div class="border border-dark hover:border-accent text-dark py-1 px-6 rounded-lg hover:text-white hover:bg-accent transition-all duration-500" href="">Remove sold out</div>
        </a>
    </div>
    <form method="POST" action="" class="">
        @csrf
        {{-- @method('POST') --}}
        <div class="flex flex-col space-y-4">
            <div class="flex items-center me-4 border-b-2 border-spacing-3 pb-4">
                <input 
                    id="check-all" 
                    type="checkbox" 
                    class="w-4 h-4 text-accent bg-gray-100 border-gray-300 rounded-full focus:ring-accent dark:focus:ring-accent dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600 transition-all duration-500"
                    onclick="toggleAll(this)">
                <label for="check-all" class="ms-4 font-normal font-poppins text-gray-900 dark:text-gray-300">Select all items</label>
            </div>
        
            @foreach ($carts as $cart)
            <div id="cart-items" class="flex flex-col space-y-2 border-b-2 border-spacing-1 py-4">
                <div class="flex items-center justify-between gap-4">
                    <div class="flex items-center gap-4">
                        <input 
                            id="cart-item-{{ $cart->id }}" 
                            type="checkbox" 
                            value="{{ $cart->product->id }}" 
                            name="product_id"
                            class="individual-checkbox w-4 h-4 text-accent bg-gray-100 border-gray-300 rounded-full focus:ring-accent dark:focus:ring-accent dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600 transition-all duration-500"
                            {{ $cart['checked'] ? 'checked' : '' }} 
                            {{ $cart['disabled'] ?? false ? 'disabled' : '' }}>
                        <img src="data:image/jpeg;base64,{{ base64_encode($cart->product->image) }}" class="w-20 h-20" alt="">
                        <label for="cart-item-{{ $cart['id'] }}" class="ms-1 font-normal text-gray-900 dark:text-gray-300">
                            {{ $cart->product->name }}
                        </label>
                    </div>

                    <form method="POST" action="{{ route('cart.destroy') }}">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="product_id" value="{{ $cart->product->id }}">
                        <button type="submit" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-success" aria-label="Close">
                            <span class="sr-only">Close</span>
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                        </button>
                    </form>
                </div>
                <div class="bg-gray-200 ms-8 flex items-center justify-between p-5">
                    <div class="flex items-center justify-between border-b-2 border-spacing-1">
                        <form action="{{ route('cart.update') }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="product_id" value="{{ $cart->product->id }}">
                            <div class="flex items-center">
                                <div class="flex items-center border border-gray-300 rounded-lg quantity">
                                    <button type="submit" class="px-2 py-1 text-xl text-black border-white focus:outline-none focus:ring-2 focus:ring-accent" onclick="updateQuantity('decrease', {{ $cart->product->id }})">-</button>
                                    <input id="quantity-{{ $cart->product->id }}" name="quantity" type="number" min="1" max="{{ $cart->product->stock }}" value="{{ $cart->quantity }}" class="w-12 text-center border-none focus:ring-0"/>
                                    <button type="submit" class="px-2 py-1 text-xl text-black  border-l border-white hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-accent" onclick="updateQuantity('increase', {{ $cart->product->id }})">+</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="">
                        <span>IDR {{ number_format($cart->product->price, 0, ',', '.') }},00</span>
                    </div>
                </div>
                <div class="py-3 flex justify-between">
                    <span class="font-semibold">Total ({{ $cart->quantity }} item)</span>
                    <span class="font-semibold">IDR {{ number_format($cart->product->price * $cart->quantity, 0, ',', '.') }},00</span>
                </div>
            </div>
            @endforeach
        </div>

        <div class="grid place-content-end mb-24 mt-6">
            <button type="submit" class="px-4 py-1 bg-accent text-white rounded-lg">
                Checkout
            </button>
        </div>
    </form>
</div>


<script>
    function toggleAll(source) {
        const checkboxes = document.querySelectorAll('.individual-checkbox:not([disabled])');
        checkboxes.forEach(checkbox => {
            checkbox.checked = source.checked;
        });
    }

    function updateQuantity(action, product_id) {
        var input = document.getElementById('quantity-' + product_id);
        var currentQuantity = parseInt(input.value);

        if (action === 'decrease' && currentQuantity > 1) {
            input.value = currentQuantity - 1;
        } else if (action === 'increase' && currentQuantity < input.max) {
            input.value = currentQuantity + 1;
        }
    }
</script>

<style>
.quantity input[type=number]::-webkit-inner-spin-button, 
.quantity input[type=number]::-webkit-outer-spin-button { 
  -webkit-appearance: none; 
  margin: 0; 
}
</style>

@endsection
@extends('layouts.master')

@section('content')

<div class="container mx-auto mt-40 px-14">
    <div class="flex flex-col">
        <div class="text-5xl font-bold">Order Details</div>
    </div>
    <div class="py-8">
        <div class="flex justify-between gap-4 border-b border-b-black mb-3 pb-3">
            <div class="flex flex-col gap-3">
                <div class="font-medium">{{ $transaction->created_at->format('M d, Y H:i:s') }}</div>
                <div class="">Order number {{ $transaction->id }}</div>
            </div>
            <div class="">
                <div class="font-medium {{ $transaction->status == 'Unpaid' ? 'text-red-500' : 'text-green-500' }}">{{ $transaction->status }}</div>
            </div>
        </div>
        <div class="py-3 flex justify-between">
            <div class="flex gap-5">
                <img src="data:image/jpeg;base64,{{ base64_encode($transaction->details->first()->product->organization->logo) }}" style="border-radius: 50%; width: 50px; height:50px" alt="">
                <div class="flex flex-col justify-center">
                    <span class="font-medium text-md">{{ $transaction->details->first()->product->organization->name }}</span>
                    <span class="text-black/60 text-sm">{{ $transaction->details->first()->product->organization->university->name }}</span>
                </div>
            </div>
        </div>

        @foreach ($transaction->details as $detail)
            @include('components.small_product_card', ['product' => $detail->product])
        @endforeach

        <div class="py-3 grid place-content-end border-b border-b-black mb-2">
            <span class="font-normal">
                Total {{ count($transaction->details) }} product{{ count($transaction->details) > 1 ? 's' : '' }}: 
                <span class="font-semibold">IDR {{ number_format($transaction->total_price, 0, ',', '.') }},00</span>
            </span>
        </div>
    </div>
    <div class="py-5">
        <div class="flex gap-8 pb-4">
            <div class="text-3xl font-semibold">Shipping Address</div>
        </div>
        <div class="flex flex-col">
            <div class="font-normal">{{ $address->recipient_name }}</div>
            <div class="font-normal">+62 {{ $address->phone }}</div>
            <div class="font-normal">{{ $address->street }}</div>
            <div class="font-normal">{{ $address->subdistrict }}, Kota {{ $address->city }}, {{ $address->province }}</div>
            <div class="font-normal">{{ $address->postal_code }}</div>
        </div>
    </div>
    <div class="py-5">
        <div class="flex gap-8 pb-4">
            <div class="text-3xl font-semibold">Order Summary</div>
        </div>
        <div class="flex flex-col">
            <div class="flex justify-between">
                <div class="font-semibold">Subtotal ({{ $transaction->details->pluck('quantity')->sum() }} item)</div>
                <div class="font-semibold">IDR {{ number_format($transaction->total_price, 0, ',', '.') }},00</div>
            </div>
            <div class="flex justify-between">
                <div class="font-semibold">Shipping Fee</div>
                <div class="font-semibold">IDR 10.000,00</div>
            </div>
        </div>
    </div>
    <div class="pt-5 pb-12">
        <div class="flex justify-between pb-4">
            <div class="text-3xl font-semibold">Grand Total</div>
            <div class="text-3xl font-semibold">IDR {{ number_format($transaction->grand_total, 0, ',', '.') }},00</div>
        </div>
    </div>
    @if ($transaction->status == 'Unpaid')
    <form action="{{ route('order.update', ['id' => $transaction->id]) }}" method="POST" class="py-5 flex justify-center">
        @csrf
        @method('PUT')
        <input type="hidden" name="status" value="Paid">
        <button id="pay-button" type="submit" class="text-xl px-4 py-1 bg-accent text-white rounded-lg hover:bg-white hover:text-accent hover:border hover:border-accent transition-all duration-500" >
            Pay
        </button>
    </form>
    @endif
    
    @if (session('success'))
    <div id="small-modal" class="fixed inset-0 flex justify-center items-center z-[35] w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                        BEELI
                    </h3>
                    <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#small-modal" aria-label="Close">
                        <span class="sr-only">Close</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5 space-y-4 flex flex-col items-center justify-center">
                    <img src="{{ asset('img/payment_success.png') }}" alt="">
                    <div class="text-green-500 text-xl">
                        {{ session('success') }}
                    </div>
                </div>
                <!-- Modal footer (Lifeline) -->
                <div class="absolute bottom-0 left-0 w-full h-1 bg-green-200 rounded-b-full">
                    <div id="toast-progress" class="h-1 bg-green-500 animate-progress rounded-b-full"></div>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>

<script>
    setTimeout(() => {
        const modal = document.getElementById('small-modal');
        if (modal) {
            modal.remove();
        }
    }, 5000);
</script>

<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.clientKey') }}"></script>
<script type="text/javascript">
    document.getElementById('pay-button').onclick = function(){
        event.preventDefault();
        // SnapToken acquired from previous step
        snap.pay('{{ $transaction->snap_token }}', {
            // Optional
            onSuccess: function(result){
                const form = document.querySelector('form[action="{{ route('order.update', ['id' => $transaction->id]) }}"]');
                if (form) {
                    form.submit(); // Submit the form after payment success
                }
            },
            // Optional
            onPending: function(result){
            /* You may add your own js here, this is just example */ document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
            },
            // Optional
            onError: function(result){
            /* You may add your own js here, this is just example */ document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
            }
        });
    };
</script>


<style>
    @keyframes progress {
        from {
            width: 100%;
        }
        to {
            width: 0%;
        }
    }
    .animate-progress {
        animation: progress 5s linear forwards; /* Matches the auto-hide duration */
    }
</style>

@endsection
@extends('layouts.master')

@section('content')

@include('components.toast')

<div class="container mx-auto mt-40 px-14">
    <div class="flex flex-col">
        <div class="text-5xl font-bold">My Orders</div>
    </div>
    @if (count($transactions) > 0)
    <div class="pt-16 pb-5">
        @foreach ($transactions as $transaction)
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

            @include('components.order_accordion', ['details' => $transaction->details, 'transaction_id' => $transaction->id])
    
            <div class="py-3 grid place-content-end border-b border-b-black mb-2">
                <span class="font-normal">
                    Total {{ count($transaction->details) }} product{{ count($transaction->details) > 1 ? 's' : '' }}: 
                    <span class="font-semibold">IDR {{ number_format($transaction->grand_total, 0, ',', '.') }},00</span>
                </span>
            </div>
    
            <div class="flex items-center pb-3 gap-2 font-light">
                <img src="{{ asset('img/time.png') }}" alt="" class="w-3 h-3">
                <span class="text-sm">Order history can be reviewed for up to 1 year.</span>
            </div>
        </div>
        @endforeach
    </div>
    @else
    <div class="bg-white rounded-lg shadow-lg p-4 flex justify-center mt-10">
        <h3 class="font-semibold text-lg">No order done yet</h3>
    </div>
    @endif
</div>

<script>
    document.querySelectorAll('[id^="toggle-button-"]').forEach(button => {
        button.addEventListener('click', function () {
            const index = this.id.split('-')[2];
            const accordionBody = document.getElementById(`accordion-body-${index}`);
            const toggleText = document.getElementById(`toggle-text-${index}`);

            // Toggle the accordion visibility
            accordionBody.classList.toggle('hidden');

            // Update the button text
            const isHidden = accordionBody.classList.contains('hidden');
            toggleText.textContent = isHidden ? 'View All ⮟' : 'See Less ⮝';
        });
    });
</script>

@endsection
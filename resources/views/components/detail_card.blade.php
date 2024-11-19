<a href="{{ route('order_detail.view', ['id' => $transaction_id]) }}">
    @include('components.small_product_card', ['product' => $detail->product])
</a>
@if($details->count() > 1)
    <!-- First Detail (Visible by Default) -->
    @php $firstDetail = $details->first(); @endphp
    @include('components.detail_card', ['detail' => $firstDetail, 'transaction_id' => $transaction_id])

    <!-- Accordion for Remaining Details -->
    <div id="accordion-{{ $loop->index }}" data-accordion="collapse" class="w-full">
        <!-- Accordion Body -->
        <div id="accordion-body-{{ $loop->index }}" class="hidden" aria-labelledby="accordion-heading-{{ $loop->index }}">
            @foreach ($details->skip(1) as $detailIndex => $detail)
                @include('components.detail_card', ['detail' => $detail, 'transaction_id' => $transaction_id])
            @endforeach
        </div>

        <!-- Accordion Button -->
        <h2 id="accordion-heading-{{ $loop->index }}" class="flex justify-center items-center p-3 w-full font-normal text-gray-900">
            <button
                type="button"
                id="toggle-button-{{ $loop->index }}"
                class="bg-white dark:text-gray-300 hover:text-accent-hover transition-all duration-500"
                data-accordion-target="#accordion-body-{{ $loop->index }}"
                aria-expanded="false"
                aria-controls="accordion-body-{{ $loop->index }}"
            >
                <span id="toggle-text-{{ $loop->index }}">View All ⮟</span>
            </button>
        </h2>
    </div>
@else
    <!-- Show Single Detail (No Accordion Needed) -->
    @foreach ($details as $detailIndex => $detail)
        @include('components.detail_card', ['detail' => $detail, 'transaction_id' => $transaction_id])
    @endforeach
@endif

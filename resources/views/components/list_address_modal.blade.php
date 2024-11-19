<!-- Main modal -->
<div id="select-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full min-h-[80vh]">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <div class="grid place-content-end pt-2 pr-2">
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm h-8 w-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="select-modal">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>

            @include('components.add_address_modal')
            
            <!-- Modal body -->
            <div class="p-4 md:p-5">
                <form action="{{ route('address.select') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <ul class="mb-4 overflow-y-auto max-h-[50vh]">
                        @foreach (session('student')->addresses as $address)
                        <li class="mb-2 flex items-center">
                            <input type="radio" 
                            id="address-{{ $address->id }}" 
                            name="address_id" 
                            value="{{ $address->id }}" 
                            class="peer hidden" 
                            required 
                            @if ($address->main == 1) checked @endif
                            />
                            <label for="address-{{ $address->id }}" class="inline-flex items-center justify-between ms-2 w-full p-5 text-gray-900 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-500 dark:peer-checked:text-accent peer-checked:border-accent peer-checked:text-accent hover:text-gray-900 hover:bg-gray-100 dark:text-white dark:bg-gray-600 dark:hover:bg-gray-500 transition-all duration-500">
                                <div class="block">
                                    <div class="font-semibold">{{ $address->recipient_name }}</div>
                                    <div class="font-normal">+62 {{ $address->phone }}</div>
                                    <div class="font-normal">{{ $address->street }}</div>
                                    <div class="font-normal">{{ $address->subdistrict }}, Kota {{ $address->city }}, {{ $address->province }}</div>
                                    <div class="font-normal">{{ $address->postal_code }}</div>
                                </div>
                            </label>
                        </li>
                        @endforeach
                        @if (session('student')->addresses->count() == 0)
                        <li class="mb-2 flex items-center justify-center">
                            <div class="bg-white rounded-lg shadow-lg p-4 flex justify-center">
                                <h3 class="font-normal text-md">No address yet</h3>
                            </div>
                        </li>
                        @endif
                    </ul>
                    <button type="submit" class="text-white inline-flex w-full justify-center bg-accent hover:bg-accent-hover focus:ring-4 focus:outline-none focus:ring-yellow-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-accent dark:hover:bg-accent-hover dark:focus:ring-yellow-900">
                        Done
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

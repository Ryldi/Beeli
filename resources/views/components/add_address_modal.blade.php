<!-- Modal header -->
<div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
        Select Shipping Address
    </h3>

    <!-- Modal toggle -->
    <button data-modal-target="crud-modal" data-modal-toggle="crud-modal" class="block text-md px-4 py-1 bg-accent text-white rounded-lg hover:bg-white hover:text-accent hover:border hover:border-accent transition-all duration-500" type="button">
        + Add
    </button>
    
    <!-- Main modal -->
    <div id="crud-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-lg max-h-full min-h-[80vh]">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center p-4 md:p-5 border-b rounded-t gap-5">
                    <button type="button" class="text-accent bg-transparent hover:text-accent-hover rounded-lg text-sm inline-flex transition-all duration-500" data-modal-toggle="crud-modal">
                        < Back
                    </button>
                    <h3 class="ms-4 md:ms-16 text-lg font-semibold text-gray-900 dark:text-white">
                        Add Shipping Address
                    </h3>
                </div>
                <!-- Modal body -->
                <form class="p-4 md:p-5 flex flex-col justify-center" method="POST" action="{{ route('address.add') }}">
                    @csrf
                    @method('PATCH')
                    <div class="grid gap-4 mb-4 grid-cols-2">
                        <div class="col-span-2">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                            <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-accent focus:border-accent block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type recipient name" required="">
                        </div>
                        <div class="col-span-2">
                            <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone Number</label>
                            <input type="number" name="phone" id="phone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-accent focus:border-accent block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="08XXXXXXXXX" required="">
                        </div>
                        <div class="col-span-2">
                            <label for="street" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Address</label>
                            <input type="text" id="street" name="street" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-accent focus:border-accent dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-accent dark:focus:border-accent" placeholder="Write recipient street address here"></input>                    
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="province" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Province</label>
                            <input type="text" name="province" id="province" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-accent focus:border-accent block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="DKI Jakarta" required="">
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="city" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">City</label>
                            <input type="text" name="city" id="city" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-accent focus:border-accent block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Jakarta Barat" required="">
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="subdistrict" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Subdistrict</label>
                            <input type="text" name="subdistrict" id="subdistrict" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-accent focus:border-accent block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Palmerah" required="">
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="postal_code" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Postal Code</label>
                            <input type="number" name="postal_code" id="postal_code" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-accent focus:border-accent block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="11580" required="">
                        </div>
                    </div>
                    <button type="submit" class="text-accent inline-flex items-center justify-center border border-accent hover:border-accent hover:text-white hover:bg-accent focus:ring-4 focus:outline-none focus:ring-accent-selected font-medium rounded-lg text-sm px-5 py-2.5 my-8 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 transition-all duration-500">
                        <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                        Add Address
                    </button>
                </form>
            </div>
        </div>
    </div> 
</div>
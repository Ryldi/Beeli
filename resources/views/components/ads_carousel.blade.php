<div id="default-carousel" class="relative w-full px-12 mt-40 md:mt-10 lg:mt-16 xl:mt-20" data-carousel="slide">
    <!-- Carousel wrapper -->
    <div class="relative h-56 overflow-hidden md:h-96  rounded-3xl">
        <div class="flex transition-transform duration-700 ease-in-out" id="carousel-items">
        <!-- Item 1 -->
            <div class="flex gap-4 w-full" data-carousel-item>
                <div class="relative w-full md:w-1/2 rounded-3xl flex justify-center items-center">
                    <img src="{{ asset('img/ads/ads1.png') }}" alt="" class="w-full h-auto object-cover rounded-3xl">
                </div>
                <div class="relative w-full md:w-1/2 rounded-3xl hidden md:flex justify-center items-center">
                    <img src="{{ asset('img/ads/ads2.png') }}" alt="" class="w-full h-auto object-cover rounded-3xl">
                </div>
            </div>
            <!-- Item 2 -->
            <div class="flex gap-4 w-full" data-carousel-item>
                <div class="relative w-full md:w-1/2 rounded-3xl flex justify-center items-center">
                    <img src="{{ asset('img/ads/ads2.png') }}" alt="" class="w-full h-auto object-cover rounded-3xl">
                </div>
                <div class="relative w-full md:w-1/2 rounded-3xl hidden md:flex justify-center items-center">
                    <img src="{{ asset('img/ads/ads1.png') }}" alt="" class="w-full h-auto object-cover rounded-3xl">
                </div>
            </div>
            <!-- Item 3 -->
            <div class="flex gap-4 w-full" data-carousel-item>
                <div class="relative w-full md:w-1/2 rounded-3xl flex justify-center items-center">
                    <img src="{{ asset('img/ads/ads1.png') }}" alt="" class="w-full h-auto object-cover rounded-3xl">
                </div>
                <div class="relative w-full md:w-1/2 rounded-3xl hidden md:flex justify-center items-center">
                    <img src="{{ asset('img/ads/ads2.png') }}" alt="" class="w-full h-auto object-cover rounded-3xl">
                </div>
            </div>
        </div>
    </div>
    <!-- Slider indicators -->
    <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
        <button type="button" class="w-3 h-3 rounded-full border-2 border-accent hover:bg-accent-hover bg-accent" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
        <button type="button" class="w-3 h-3 rounded-full border-2 border-accent hover:bg-accent-hover" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
        <button type="button" class="w-3 h-3 rounded-full border-2 border-accent hover:bg-accent-hover" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
    </div>
    <!-- Slider controls -->
    <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full hover:bg-accent/20">
            <svg class="w-4 h-4 text-accent dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
            </svg>
            <span class="sr-only">Previous</span>
        </span>
    </button>
    <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full hover:bg-accent/20" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
            <svg class="w-4 h-4 text-accent dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
            </svg>
            <span class="sr-only">Next</span>
        </span>
    </button>
</div>
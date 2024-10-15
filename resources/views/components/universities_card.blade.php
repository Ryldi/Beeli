<div class="grid grid-cols-3 md:grid-cols-5 gap-6">
    @for($i = 0; $i < 5; $i++)
        <div class="bg-white rounded-3xl shadow-lg text-center">
            <div>
                <img src="{{ asset('img/univ/binus.png')}}" alt="" class="w-full object-cover mb-4 rounded-lg p-10">
            </div>
            <p class="bg-accent rounded-b-3xl py-3">Universitas Bina Nusantara</p>
        </div>
    @endfor
</div>

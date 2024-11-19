<div class="grid grid-cols-3 md:grid-cols-5 gap-6 mb-10">
    @foreach ($universities as $univ)
        <a href="{{ route('university.view', $univ->id) }}" class="bg-white rounded-lg md:rounded-3xl drop-shadow-lg text-center cursor-pointer">
            <div class="h-3/4 flex justify-center items-center">
                <img src="data:image/jpeg;base64,{{ base64_encode($univ->logo) }}" alt="" class="w-full object-cover mb-4 rounded-lg p-3 md:p-8">
            </div>
            <div class="h-1/4 flex item-center justify-center w-full bg-accent rounded-b-lg md:rounded-b-3xl">
                <div class="p-3 hidden md:flex md:items-center md:justify-center">{{ $univ->name }}</div>
                <div class="p-3 flex items-center justify-center md:hidden">{{ $univ->acronym }}</div>
            </div>
        </a>
    @endforeach
</div>

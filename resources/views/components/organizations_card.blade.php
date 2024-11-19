<div class="grid grid-cols-3 md:grid-cols-5 gap-6 mb-10">
    @foreach ($organizations as $org)
        <a href="{{ route('organization.view', $org->id) }}" class="bg-white rounded-lg md:rounded-3xl drop-shadow-lg text-center cursor-pointer">
            <div class="h-3/4 flex justify-center items-center">
                <img src="data:image/jpeg;base64,{{ base64_encode($org->logo) }}" alt="" class="w-full object-cover mb-4 rounded-full p-3 md:p-8">
            </div>
            <div class="h-1/4 flex item-center justify-center w-full bg-accent rounded-b-lg md:rounded-b-3xl">
                <div class="p-3 hidden md:flex md:items-center md:justify-center">{{ $org->name }}</div>
                <div class="p-3 flex items-center justify-center md:hidden">{{ $org->acronym }}</div>
            </div>
        </a>
    @endforeach
</div>

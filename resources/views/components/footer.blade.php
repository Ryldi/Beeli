<footer class="bg-accent/80">
    <div class="container flex justify-center items-center p-6 gap-20">
        <div class="flex justify-center items-center gap-2 md:gap-6">
            <img src="{{ asset('img/logo.png') }}" alt="logo" class="w-16 md:w-24">
            <span class="text-white text-4xl md:text-5xl font-pattaya hover:text-accent-hover transition-all duration-500">Beeli</span>
        </div>
        <div class="flex flex-row gap-10 justify-center text-white items-center font-semibold">
            <div class="text-2xl font-pattaya">Follow us on</div>
            <a href="https://www.instagram.com/beeli.id" class="ig-icon"><img src="{{ asset('img/ig.before.png') }}" alt="instagram" class="w-8 md:w-10 transition-all duration-500"></a>
        </div>
    </div>
</footer>

<style>
    .ig-icon:hover img {
        content: url('{{ asset('img/ig.after.png') }}'); /* Changes the image on hover */
    }
</style>
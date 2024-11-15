<navbar class="bg-white flex justify-between items-center border-b border-accent py-5 fixed w-full z-50 top-0 shadow-lg">
  <div class="flex justify-between items-center container mx-auto">
    <a class="flex items-center gap-2" href="{{ route('home.view') }}">
      <img src="{{ asset('img/logo.png') }}" alt="" class="w-14">
      <span class="text-accent text-3xl font-pattaya hover:text-accent-hover transition-all duration-500">Beeli</span>
    </a>

    @if (session('student'))
    <div class="md:flex gap-8">
      <ul class="flex gap-4">
          <a href="" class="py-1 px-6 rounded-full hover:bg-accent-selected transition-all duration-500">
              <img src="{{ asset('img/transaction.png') }}" alt="" class="w-8 h-8">
          </a>
          <a href="{{ route('cart.view') }}" class="py-1 px-6 rounded-full hover:bg-accent-selected transition-all duration-500 {{ request()->routeIs('cart.view') ? 'bg-accent-selected' : '' }}">
            <img src="{{ asset('img/cart.png') }}" alt="" class="w-8 h-8">
          </a>
          <a href="" class="py-1 px-6 rounded-full hover:bg-accent-selected transition-all duration-500">
            <img src="{{ asset('img/profile.png') }}" alt="" class="w-8 h-8">
          </a>
      </ul>
    </div>
    @endif

    @if (!session('student'))
    <div class="md:flex gap-8">
      <ul class="flex gap-4">
          <li class="border border-accent py-1 px-6 rounded-full text-accent hover:text-white hover:bg-accent transition-all duration-500">
              <a class="" href="{{ route('login_personal.view') }}">Log In</a>
          </li>
          <li class="border border-accent py-1 px-6 rounded-full text-accent hover:text-white hover:bg-accent transition-all duration-500">
              <a class="" href="{{ route('register_personal.view') }}">Sign Up</a>
          </li>
      </ul>
    </div>
    @endif

  </div>
</navbar>
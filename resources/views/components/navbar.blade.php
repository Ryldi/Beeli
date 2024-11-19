<navbar class="bg-white flex justify-between items-center border-b border-accent py-5 fixed w-full z-40 top-0 shadow-lg">
  <div class="flex justify-between items-center container mx-auto">
    <a class="flex items-center gap-2" href="{{ route('home.view') }}">
      <img src="{{ asset('img/logo.png') }}" alt="" class="w-14">
      <span class="text-accent text-3xl font-pattaya hover:text-accent-hover transition-all duration-500">Beeli</span>
    </a>

    @if (session('student'))
    <div class="md:flex md:gap-8">
      <ul class="flex md:gap-4">
          <a href="{{ route('order.view') }}" class="flex items-center py-1 px-4 md:px-6 rounded-full hover:bg-accent-selected transition-all duration-500 {{ request()->routeIs('order.view') ? 'bg-accent-selected' : '' }}">
              <img src="{{ asset('img/transaction.png') }}" alt="" class="w-8 h-8">
          </a>
          <a href="{{ route('cart.view') }}" class="flex items-center py-1 px-4 md:px-6 rounded-full hover:bg-accent-selected transition-all duration-500 {{ request()->routeIs('cart.view') ? 'bg-accent-selected' : '' }}">
            <img src="{{ asset('img/cart.png') }}" alt="" class="w-8 h-8">
          </a>
          <div class="flex items-center py-1 px-4 md:px-6 rounded-full hover:bg-accent-selected transition-all duration-500 {{ request()->routeIs('profile.view') ? 'bg-accent-selected' : '' }}">
            <button id="dropdownHoverButton" data-dropdown-toggle="dropdownHover" data-dropdown-trigger="hover" type="button">
              <img src="{{ asset('img/profile.png') }}" alt="" class="w-8 h-8">
            </button>
          </div>
          <!-- Dropdown menu -->
          <div id="dropdownHover" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
              <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownHoverButton">
                <li>
                  <a href="{{ route('profile.view') }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Profile</a>
                </li>
                <li>
                  <a href="{{ route('logout_personal') }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Sign out</a>
                </li>
              </ul>
          </div>
  
      </ul>
    </div>
    @endif

    @if (!session('student'))
    <div class="md:flex gap-8">
      <ul class="flex gap-2 md:gap-4">
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
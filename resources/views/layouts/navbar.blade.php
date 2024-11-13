<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('img/favicon.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Pattaya&display=swap" rel="stylesheet">
    {{-- <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="{{ asset('js/script.js') }}" defer></script> --}}
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js" defer></script>

    @vite(['resources/css/app.css','resources/js/app.js'])
    <title>Beeli</title>
</head>
<body>
    <div class="container">
        <header class="flex justify-between items-center border-b border-accent">
            <div class="flex justify-between items-center container mx-auto">
              <a class="flex items-center gap-2" href="#">
                <img src="{{ asset('img/favicon.png') }}" alt="" class="w-20">
                <span class="text-accent text-3xl font-pattaya hover:text-accent-hover transition-all duration-500">Beeli</span>
              </a>
    
              <div class="hidden md:flex gap-8">
                <ul class="flex gap-4">
                    <li class="border border-accent py-1 px-6 rounded-full text-accent hover:text-white hover:bg-accent transition-all duration-500">
                        <a class="" href="#">Log In</a>
                    </li>
                    <li class="border border-accent py-1 px-6 rounded-full text-accent hover:text-white hover:bg-accent transition-all duration-500">
                        <a class="" href="#">Sign Up</a>
                    </li>
                </ul>
              </div>
    
              <div class="md:hidden">
                
              </div>
            </div>
          </header>
        <div class="container">
            @yield('content')
        </div>
    </div>
</body>
</html>
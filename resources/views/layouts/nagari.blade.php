<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <title>@yield('title', 'Public Page')</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
 
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <header
    class="fixed top-0 left-0 w-full z-50 transition-all duration-300 ease-in-out bg-white"
    id="navbar">
    <div class="relative mx-auto flex max-w-screen-lg flex-col py-4 sm:flex-row sm:items-center sm:justify-between ">
      <a class="flex items-center text-2xl font-Green">
        <img src="{{ asset('icon.jpeg') }}" alt="" class="h-11 w-11  mr-1 flex items-center">
        
        <span class="">Kubang Bayang Pesisir Selatan</span>
      </a>
      <input class="peer hidden" type="checkbox" id="navbar-open" />
      <label class="absolute right-6 mt-1 cursor-pointer text-xl sm:hidden" for="navbar-open">
        <span class="sr-only"></span>
        <svg xmlns="http://www.w3.org/2000/svg" width="0.88em" height="1em" preserveAspectRatio="xMidYMid meet"
          viewBox="0 0 448 512">
          <path fill="currentColor"
            d="M0 96c0-17.7 14.3-32 32-32h384c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32zm0 160c0-17.7 14.3-32 32-32h384c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32zm448 160c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32h384c17.7 0 32 14.3 32 32z" />
        </svg>
      </label>
      <nav aria-label="Header Navigation" class="peer-checked:block hidden pl-2 py-6 sm:block sm:py-0">
        <ul class="flex flex-col gap-y-4 sm:flex-row sm:gap-x-8">
          <li class="hover:text-green-600"><a href="{{ route('home') }}">Home</a></li>
          <li class="hover:text-green-600"><a href="{{ route('Sejarah') }}">Sejarah</a></li>
          <li class="">
            <div class="relative">
              <input type="checkbox" id="dd" class="peer hidden">
              <label for="dd" class="cursor-pointer px-4 py-2 hover:text-green-600">
                Potensi Nagari
              </label>
              <div class="absolute left-0 mt-2 hidden w-40 rounded bg-white shadow-lg peer-checked:block">
                <a href="{{ route('pertanian') }}" class="block px-4 py-2 hover:text-green-600">Pertanian</a>
                <a href="{{ route('Peternakan') }}" class="block px-4 py-2 hover:text-green-600">Peternakan</a>
              </div>
            </div>
          </li>
          <li class=""><a class=" hover:text-green-600" href="login">Login</a>
          <li class=""><a class=" hover:text-green-600" href="{{ route('contact') }}">Hubungi kami</a>
        </ul>
      </nav>
    </div>

    <script>
      const navbar = document.getElementById('navbar');
      let lastScrollY = window.scrollY;

      window.addEventListener('scroll', () => {
        const currentScrollY = window.scrollY;

        if (currentScrollY > lastScrollY && currentScrollY > 100) {
          navbar.style.opacity = '0';
          navbar.style.transform = 'translateY(-100%)';
        } else {
          navbar.style.opacity = '1';
          navbar.style.transform = 'translateY(0)';
        }

        lastScrollY = currentScrollY;
      });
    </script> 
  </header>
</head>
<body class=" ">
  <main class="mx-auto">
    @yield('content')
  </main>
</body>

</html>
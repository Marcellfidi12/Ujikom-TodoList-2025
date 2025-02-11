<!-- Navbar landing page -->
<nav id="navbar" class="fixed w-full z-20 top-0 start-0 transition-all duration-300">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="#" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="{{ asset('assets/image/logo.png') }}" class="h-8" alt="To-Do Logo">
            <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">To-Do</span>
        </a>
        <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
            <a href="{{ route('login') }}">
                <button type="button" class="text-white bg-blue-600 hover:bg-blue-400 focus:ring-4 focus:outline-none focus:ring-blue-600 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-400 dark:focus:ring-blue-600">
                    Login
                </button>
            </a>
        </div>
        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
            <ul class="flex flex-col p-4 md:p-0 mt-4 font-medium border rounded-lg md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0">
                <li>
                    <a href="{{ route('home') }}" class="block py-2 px-3 rounded-sm md:p-0 {{ request()->routeIs('home') ? 'text-white bg-blue-600 md:bg-transparent md:text-blue-600' : 'text-gray-900 hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-600' }}">
                        Home
                    </a>
                </li>
                <li>
                    <a href="{{ route('features') }}" class="block py-2 px-3 rounded-sm md:p-0 {{ request()->routeIs('features') ? 'text-white bg-blue-600 md:bg-transparent md:text-blue-600' : 'text-gray-900 hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-600' }}">
                        Features
                    </a>
                </li>
                <li>
                    <a href="{{ route('changelogs') }}" class="block py-2 px-3 rounded-sm md:p-0 {{ request()->routeIs('changelogs') ? 'text-white bg-blue-600 md:bg-transparent md:text-blue-600' : 'text-gray-900 hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-600' }}">
                        Changelogs
                    </a>
                </li>
            </ul>
        </div>
    </div>
  </nav>
  
  <script>
    window.addEventListener('scroll', function() {
        var navbar = document.getElementById('navbar');
        if (window.scrollY > 50) {
            navbar.classList.add('bg-white/30', 'backdrop-blur-md', 'shadow');
        } else {
            navbar.classList.remove('bg-white/30', 'backdrop-blur-md', 'shadow');
        }
    });
  </script>
<nav id="navbar" class="fixed w-full z-20 top-0 start-0 transition-all duration-300 bg-white/30 backdrop-blur-md shadow">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="{{ route('home') }}" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="{{ asset('assets/image/logo.png') }}" class="h-8" alt="To-Do Logo">
            <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">M-Todo</span>
        </a>
        
        <button id="menu-toggle" class="md:hidden text-gray-900 dark:text-white focus:outline-none">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
            </svg>
        </button>
        
        <div id="navbar-sticky" class="hidden w-full md:flex md:w-auto md:order-1">
            <ul class="flex flex-col p-4 md:p-0 mt-4 font-medium border rounded-lg md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0">
                <li>
                    <a href="{{ route('home') }}" class="block py-2 px-3 rounded-sm md:p-0 {{ request()->routeIs('home') ? 'md:text-blue-600 text-blue-600' : 'text-gray-900 hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-600' }}">
                        Home
                    </a>
                </li>
                <li>
                    <a href="{{ route('features') }}" class="block py-2 px-3 rounded-sm md:p-0 {{ request()->routeIs('features') ? 'md:text-blue-600 text-blue-600' : 'text-gray-900 hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-600' }}">
                        Features
                    </a>
                </li>
                <li>
                    <a href="{{ route('changelogs') }}" class="block py-2 px-3 rounded-sm md:p-0 {{ request()->routeIs('changelogs') ? 'md:text-blue-600 text-blue-600' : 'text-gray-900 hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-600' }}">
                        Changelogs
                    </a>
                </li>
                <li class="md:hidden">
                    <a href="{{ route('login') }}" class="block py-2 px-3 rounded-sm md:p-0 {{ request()->routeIs('login') ? 'md:text-blue-600 text-blue-600' : 'text-gray-900 hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-600' }}">
                        Login
                    </a>
                </li>
            </ul>
        </div>
        
        <div class="hidden md:flex md:order-2">
            <a href="{{ route('login') }}" class="{{ request()->routeIs('login') ? 'text-blue-600' : 'text-gray-900 hover:text-blue-600' }}">
                <button type="button" class="text-white bg-blue-600 hover:bg-blue-400 focus:ring-4 focus:outline-none focus:ring-blue-600 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-400 dark:focus:ring-blue-600">
                    Login
                </button>
            </a>
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

    document.getElementById('menu-toggle').addEventListener('click', function() {
        var navbarSticky = document.getElementById('navbar-sticky');
        navbarSticky.classList.toggle('hidden');
    });
</script>

<!-- Sidebar -->
<div class="hidden sm:flex">
    <!-- Sidebar Ikon Samping (Sidebar Biru Kecil) -->
    <aside id="icon-sidebar" class="fixed top-0 left-0 z-50 w-16 h-screen bg-blue-600 flex flex-col items-center py-4">
        <button id="toggle-sidebar" class="mb-5 text-white focus:outline-none">
            <i class="fa-solid fa-bars text-xl"></i>
        </button>
        <ul class="space-y-6 font-medium text-white">
            <li>
                <a href="{{ route('dashboard') }}" class="flex flex-col items-center p-2 group hover:bg-blue-700 rounded-lg">
                    <i class="fa-solid fa-house text-xl"></i>
                </a>
            </li>
            <li>
                <a href="{{ route('tasks.index') }}" class="flex flex-col items-center p-2 group hover:bg-blue-700 rounded-lg relative">
                    <i class="fa-solid fa-list-check text-xl"></i>
                </a>
            </li>
            <li>
                <a href="{{ route('history') }}" class="flex flex-col items-center p-2 group hover:bg-blue-700 rounded-lg">
                    <i class="fa-regular fa-note-sticky text-xl"></i>
                </a>
            </li>
        </ul>
    </aside>

    <!-- Sidebar Utama (Sidebar Putih) -->
    <aside id="logo-sidebar" class="fixed top-0 left-16 z-40 w-64 h-screen border-r transition-transform -translate-x-full bg-white dark:bg-gray-800">
        <div class="h-full px-3 py-4 overflow-y-auto">
            <a href="#" class="flex items-center ps-2.5 mb-5">
                <img src="{{ asset('assets/image/logo.png') }}" class="h-6 me-3 sm:h-7" alt="Todo-App Logo" />
                <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">Todo-App</span>
            </a>
            <div class="border-t mb-4"></div>
            <ul class="space-y-2 font-medium">
                <li>
                    <a href="{{ route('dashboard') }}" class="flex items-center p-2 pl-4 rounded-lg group 
                        {{ request()->routeIs('dashboard') ? 'bg-gray-200 text-blue-700 border-l-4 border-blue-700 dark:bg-gray-700' : 'text-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700' }}">
                        <i class="fa-solid fa-house"></i>
                        <span class="flex-1 ms-3 whitespace-nowrap">Home</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('tasks.index') }}" class="flex items-center p-2 pl-4 rounded-lg group 
                        {{ request()->routeIs('tasks.index') ? 'bg-gray-200 text-blue-700 border-l-4 border-blue-700 dark:bg-gray-700' : 'text-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700' }}">
                        <i class="fa-solid fa-list-check"></i>
                        <span class="flex-1 ms-3 whitespace-nowrap">My Task</span>
                        @php
                            $taskCount = \App\Models\Task::where('status', false)->count();
                        @endphp
                        <span class="inline-flex items-center justify-center w-5 h-5 ms-3 text-sm font-medium text-white bg-blue-600 rounded-full">
                            {{ $taskCount }}
                        </span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('history') }}" class="flex items-center p-2 pl-4 rounded-lg group 
                        {{ request()->routeIs('history') ? 'bg-gray-200 text-blue-700 border-l-4 border-blue-700 dark:bg-gray-700' : 'text-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700' }}">
                        <i class="fa-regular fa-note-sticky"></i>
                        <span class="flex-1 ms-3 whitespace-nowrap">History</span>
                    </a>
                </li>
            </ul>
        </div>
    </aside>
</div>

<!-- Bottom Navbar untuk Mobile -->
<nav id="bottom-navbar" class="fixed bottom-0 left-0 z-50 w-full bg-white border-t shadow-md sm:hidden">
    <ul class="flex justify-around py-2 text-gray-600">
        <li>
            <a href="{{ route('dashboard') }}" class="flex flex-col items-center {{ request()->routeIs('dashboard') ? 'text-blue-500' : '' }}">
                <i class="fa-solid fa-house text-xl"></i>
                <span class="text-xs">Home</span>
            </a>
        </li>
        <li>
            <a href="{{ route('tasks.index') }}" class="flex flex-col items-center {{ request()->routeIs('tasks.index') ? 'text-blue-500' : '' }}">
                <i class="fa-solid fa-list-check text-xl"></i>
                <span class="text-xs">Tasks</span>
            </a>
        </li>
        <li>
            <a href="{{ route('history') }}" class="flex flex-col items-center {{ request()->routeIs('history') ? 'text-blue-500' : '' }}">
                <i class="fa-regular fa-note-sticky text-xl"></i>
                <span class="text-xs">History</span>
            </a>
        </li>
    </ul>
</nav>

<script>
    document.getElementById('toggle-sidebar').addEventListener('click', function () {
        let sidebar = document.getElementById('logo-sidebar');
        let navbar = document.getElementById('navbar');
        let mainContent = document.getElementById('main-content');
        
        if (sidebar.classList.contains('-translate-x-full')) {
            sidebar.classList.remove('-translate-x-full');
            mainContent.classList.remove('sm:ml-20');
            mainContent.classList.add('sm:ml-80'); 
            navbar.classList.remove('sm:left-20');
            navbar.classList.add('sm:left-80');
        } else {
            sidebar.classList.add('-translate-x-full');
            mainContent.classList.remove('sm:ml-80');
            mainContent.classList.add('sm:ml-20');
            navbar.classList.remove('sm:left-80');
            navbar.classList.add('sm:left-20');
        }
    });
</script>
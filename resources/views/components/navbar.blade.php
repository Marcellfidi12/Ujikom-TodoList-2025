<!-- Navbar -->
<header id="navbar" class="bg-white dark:bg-gray-800 border rounded-md fixed top-6 left-6 sm:left-20 right-6 sm:right-12 sm:mx-6 z-50 transition-all duration-300 ease-in-out">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
        <div class="text-xl font-bold text-gray-800">
            
        </div>
        
        {{-- <nav class="hidden sm:block"> --}}
        <nav>
            <ul class="flex space-x-6 text-gray-600 dark:text-white">
                <li>
                    <button id="darkModeToggle" class="hover:text-blue-700">
                        <i class="fa-solid fa-moon"></i>
                    </button>
                </li>
                <li>
                    <button id="settingsButton" class="hover:text-blue-700">
                    <i class="fa-solid fa-gear"></i>
                    </button>
                    <div id="settingsDropdown" class="absolute right-0 mt-2 w-60 bg-white rounded-md shadow-lg hidden">
                        <div class="px-2 py-3 text-sm text-gray-900">
                            <div class="flex items-center space-x-4 bg-gray-100 p-4 rounded-lg">
                                <!-- Avatar -->
                                <div class="w-12 h-12 flex items-center justify-center rounded-full bg-orange-500 text-white text-lg font-bold">
                                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                                </div>
                                <!-- Nama & Email -->
                                <div class="flex flex-col">
                                    <div class="font-bold text-gray-900">{{ auth()->user()->name }}</div>
                                    <div class="text-gray-500">{{ auth()->user()->email }}</div>
                                </div>
                            </div>                            
                        </div>
                        <div class="border-t"></div>
                        <ul class="py-2 text-sm text-gray-700">
                            <li><button id="accountSettingsButton" class="block px-4 py-2 w-full text-left hover:bg-gray-100">Account Settings</button></li>
                            <li><a href="#" class="block px-4 py-2 hover:bg-gray-100">Theme Settings</a></li>
                        </ul>
                    </div>
                </li>
                <li>
                  <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                      @csrf
                      <button type="submit" class="hover:text-blue-700" style="background: none; border: none; cursor: pointer;">
                          <i class="fa-solid fa-arrow-right-from-bracket"></i>
                      </button>
                  </form>
              </li>
            </ul>
        </nav>
    </div>

</header>

<x-accountsettingmodal />

<script>
    document.getElementById('settingsButton').addEventListener('click', function () {
        document.getElementById('settingsDropdown').classList.toggle('hidden');
    });

    document.addEventListener('click', function (event) {
        var dropdown = document.getElementById('settingsDropdown');
        var button = document.getElementById('settingsButton');
        if (!button.contains(event.target) && !dropdown.contains(event.target)) {
            dropdown.classList.add('hidden');
        }
    });

    document.getElementById('accountSettingsButton').addEventListener('click', function () {
        document.getElementById('accountSettingsModal').classList.remove('hidden');
    });

    document.getElementById('closeModalButton').addEventListener('click', function () {
        document.getElementById('accountSettingsModal').classList.add('hidden');
    });

    const toggle = document.getElementById('darkModeToggle');
    const html = document.documentElement;
  
    if (localStorage.getItem('theme') === 'dark') {
      html.classList.add('dark');
    } 
  
    toggle.addEventListener('click', () => {
      if (html.classList.contains('dark')) {
        html.classList.remove('dark');
        localStorage.setItem('theme', 'light');
      } else {
        html.classList.add('dark');
        localStorage.setItem('theme', 'dark');
      }
    });
</script>
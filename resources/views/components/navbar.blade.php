<!-- Navbar -->
<header id="navbar" class="bg-white dark:bg-gray-800 border rounded-md fixed top-6 left-6 sm:left-16 right-6 sm:right-8 sm:mx-6 z-50 transition-all duration-300 ease-in-out">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
        <div class="text-xl font-bold text-gray-800">
            <div class="flex items-center space-x-2">
                <div class="relative">
                    <!-- Search Bar Toggle Button -->
                    <button id="toggleSearch" class="hover:text-blue-700 dark:text-white">
                        <i class="fa-solid fa-search"></i>
                    </button>
                    <!-- Search Dropdown Positioned Below the Button -->
                    <div id="searchContainer" class="absolute left-0 mt-2 w-64 bg-white dark:bg-gray-700 rounded-md shadow-lg hidden p-4">
                        <input type="text" id="searchInput" class="w-full px-4 py-2 border rounded-md text-gray-700 dark:bg-gray-600 dark:text-white" placeholder="Search tasks...">
                        <div id="searchResults" class="mt-2 w-full hidden"></div>
                    </div>
                </div>
            </div>
        </div>
        
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
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="button" class="hover:text-blue-700" id="logout-button" style="background: none; border: none; cursor: pointer;">
                            <i class="fa-solid fa-arrow-right-from-bracket"></i>
                        </button>
                    </form>
              </li>
            </ul>
        </nav>
    </div>
</header>

<script>
    window.addEventListener('scroll', function() {
        const navbar = document.getElementById('navbar');
        if (window.scrollY > 0) {
            navbar.classList.add('top-0', 'left-0', 'right-0', 'rounded-none');
            navbar.classList.remove('top-6', 'left-6', 'right-6', 'sm:right-8', 'sm:mx-6', 'rounded-md');
        } else {
            navbar.classList.remove('top-0', 'left-0', 'right-0', 'rounded-none');
            navbar.classList.add('top-6', 'left-6', 'right-6', 'sm:right-8', 'sm:mx-6', 'rounded-md');
        }
    });
</script>

<x-modalresultsearchtask />

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

    //Javascript Ajax Search
    document.getElementById('searchInput').addEventListener('input', function () {
        let query = this.value;
        let resultsDiv = document.getElementById('searchResults');

        if (query.length > 1) {
            fetch(`/search-tasks?q=${query}`)
                .then(response => response.json())
                .then(data => {
                    resultsDiv.innerHTML = '';

                    if (data.length > 0) {
                        data.forEach(task => {
                            let div = document.createElement('div');
                            div.classList.add('px-4', 'py-2', 'hover:bg-gray-100', 'cursor-pointer');
                            div.textContent = task.name;

                            div.addEventListener('click', function () {
                                fetch(`/tasks/${task.id}`) // Ambil data JSON dari server
                                    .then(response => response.json())
                                    .then(taskData => {
                                        showTaskModal(taskData);
                                    })
                                    .catch(error => console.error("Error fetching task data:", error));
                            });

                            resultsDiv.appendChild(div);
                        });
                    } else {
                        let noResultDiv = document.createElement('div');
                        noResultDiv.classList.add('px-4', 'py-2', 'text-gray-500');
                        noResultDiv.textContent = "Tugas tidak ada";
                        resultsDiv.appendChild(noResultDiv);
                    }

                    resultsDiv.classList.remove('hidden');
                });
        } else {
            resultsDiv.classList.add('hidden');
        }
    });

    function showTaskModal(task) {
        document.getElementById('modalTaskName').textContent = task.name || "Tidak ada nama";
        document.getElementById('modalTaskId').textContent = task.id ? `#${task.id}` : "#N/A";
        document.getElementById('modalTaskStart').textContent = task.created_at.split("T")[0] || "Tidak ada";
        document.getElementById('modalTaskDeadline').textContent = task.deadline || "Tidak ada";

        // Menentukan warna berdasarkan priority
        let priorityBadge = document.getElementById('modalTaskPriority');
        priorityBadge.textContent = task.priority || "Unknown";

        priorityBadge.classList.remove('bg-green-500', 'bg-yellow-500', 'bg-red-500');
        if (task.priority === "low") {
            priorityBadge.classList.add('bg-green-500');
        } else if (task.priority === "medium") {
            priorityBadge.classList.add('bg-yellow-500');
        } else if (task.priority === "high") {
            priorityBadge.classList.add('bg-red-500');
        } else {
            priorityBadge.classList.add('bg-gray-500');
        }

        // Menentukan status
        let statusBadge = document.getElementById('modalTaskStatus');
        if (task.status === 1) {
            statusBadge.textContent = "Selesai";
            statusBadge.classList.remove('bg-red-500');
            statusBadge.classList.add('bg-green-500');
        } else {
            statusBadge.textContent = "Belum Selesai";
            statusBadge.classList.remove('bg-green-500');
            statusBadge.classList.add('bg-red-500');
        }

        // Tampilkan modal
        document.getElementById('taskModal').classList.remove('hidden');
    }

    // Event untuk menutup modal
    document.getElementById('closeModal').addEventListener('click', function () {
        document.getElementById('taskModal').classList.add('hidden');
    });

    document.getElementById('toggleSearch').addEventListener('click', function () {
        let searchContainer = document.getElementById('searchContainer');
        searchContainer.classList.toggle('hidden');
    });

    // alert sweet alert logout
    document.getElementById("logout-button").addEventListener("click", function() {
        Swal.fire({
            title: "Yakin ingin logout?",
            text: "Anda akan keluar dari sesi ini!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Ya, Logout!",
            cancelButtonText: "Batal"
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById("logout-form").submit();
            }
        });
    });
</script>
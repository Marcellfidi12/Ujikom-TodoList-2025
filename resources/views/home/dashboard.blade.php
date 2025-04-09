@extends('layout.app')
@section('content')

  <x-popup :reminders="$reminders" />

  <main id="main-content" class="sm:ml-16 sm:mr-8 mt-24 px-6 transition-all duration-300 ease-in-out">
    <h2 class="text-2xl font-bold mb-4 text-gray-600 dark:text-white">Dashboard</h2>
    <div class="flex flex-col sm:flex-row gap-6">
      <!-- Card Kiri -->
      <div class="flex-1 flex flex-col gap-6">
        <!-- Card Atas -->
        <div class="bg-white dark:bg-gray-800 border rounded-lg p-6 h-auto">
          <!-- Content Navigation -->
          <div class="flex justify-between items-center mb-4">
            <button id="prev-content" class="text-gray-600 hover:text-gray-900">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
              </svg>
            </button>
            <h4 id="content-title" class="text-md font-semibold dark:text-white">Summary</h4>
            <button id="next-content" class="text-gray-600 hover:text-gray-900">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
              </svg>
            </button>
          </div>
        
          <!-- Content Sections -->
          <div id="content-sections">
            <!-- Summary Section -->
            <div id="summary-section" class="content-section">
              <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-6">
                <!-- Tasks Completed -->
                <div class="border border-green-500 bg-green-100 rounded-lg p-4 shadow-md flex flex-col items-center sm:items-start">
                  <h4 class="text-md font-semibold mb-2 text-green-700 text-center sm:text-left">Tasks Completed</h4>
                  <p class="text-lg text-green-700">{{ $completedTasks }}</p>
                </div>
                <!-- Tasks Pending -->
                <div class="border border-yellow-500 bg-yellow-100 rounded-lg p-4 shadow-md flex flex-col items-center sm:items-start">
                  <h4 class="text-md font-semibold mb-2 text-yellow-700 text-center sm:text-left">Tasks Pending</h4>
                  <p class="text-lg text-yellow-700">{{ $pendingTasks }}</p>
                </div>
                <!-- Overdue Tasks -->
                <div class="border border-red-500 bg-red-100 rounded-lg p-4 shadow-md flex flex-col items-center sm:items-start">
                  <h4 class="text-md font-semibold mb-2 text-red-700 text-center sm:text-left">Overdue Tasks</h4>
                  <p class="text-lg text-red-700">{{ $overdueTasks }}</p>
                </div>
              </div>
            </div>

        
            <!-- Time and Date Section -->
            <div id="date-time-section" class="content-section hidden">
              <div class="pt-4 mt-4">
                <div class="text-center">
                  <p id="current-time" class="text-4xl font-bold text-gray-800 dark:text-white"></p>
                  <p id="current-date" class="text-lg font-bold text-gray-800 dark:text-white"></p>
                </div>
              </div>
            </div>
          </div>
        
          <!-- Motivational Quote Section -->
          <div class="border-t pt-4 mt-4">
            <div class="overflow-hidden">
              <marquee id="motivational-quote" behavior="scroll" direction="left" class="italic text-gray-600 dark:text-gray-300">
                <!-- Kutipan akan diisi secara dinamis dengan JavaScript -->
              </marquee>
            </div>
          </div>
        </div>
  
        <div class="bg-white dark:bg-gray-800 border rounded-lg p-6 h-auto">
          <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-bold text-gray-800 dark:text-gray-200">Reminder<span class="ml-2 text-sm text-gray-500">({{ $tasks->whereBetween('deadline', [now(), now()->addDays(7)])->where('status', false)->count() }})</span></h2>
            <a href="{{ route('reminder')}}"><button class="text-gray-500 hover:text-blue-600">Lainnya...</button></a>
          </div>
          <ul class="space-y-4 mt-2">
              @forelse ($reminders as $reminder)
              <li class="flex justify-between items-center border rounded-2xl p-4 bg-white dark:bg-gray-800 shadow-md hover:shadow-lg transition duration-300">
                  <div class="flex items-center">
                      <i class="fa-solid fa-circle-exclamation text-blue-600"></i>
                      <span class="ml-3 text-gray-700 dark:text-gray-300">{{ $reminder->name }}</span>
                  </div>
                  <span class="text-sm text-gray-500">
                    {{ abs(floor(\Carbon\Carbon::parse($reminder->deadline)->diffInDays(\Carbon\Carbon::now()))) }} days left
                  </span>
              </li>
              @empty
              <p class="text-gray-500 dark:text-gray-300">No reminders for the next 7 days!</p>
              @endforelse
          </ul>
        </div>      
      </div>

      <!-- Card Kanan -->
      <div class="flex-1 bg-white dark:bg-gray-800 border rounded-lg p-6 overflow-hidden">
        <!-- Task Filter -->
        <div class="w-full overflow-x-auto whitespace-nowrap">
          <div class="flex space-x-4 mb-4 border-b pb-2 flex-nowrap">
              <button id="btn-all" class="px-4 py-2 border-b-2 border-transparent hover:border-blue-600 dark:text-white" onclick="filterTasks('all', this)">All</button>
              <button id="btn-high" class="px-4 py-2 border-b-2 border-transparent hover:border-blue-600 dark:text-white" onclick="filterTasks('high', this)">High</button>
              <button id="btn-medium" class="px-4 py-2 border-b-2 border-transparent hover:border-blue-600 dark:text-white" onclick="filterTasks('medium', this)">Medium</button>
              <button id="btn-normal" class="px-4 py-2 border-b-2 border-transparent hover:border-blue-600 dark:text-white" onclick="filterTasks('normal', this)">Normal</button>
              <button id="btn-completed" class="px-4 py-2 border-b-2 border-transparent hover:border-green-600 dark:text-white" onclick="filterTasks('completed', this)">Completed</button>
          </div>
        </div>
        
        <!-- Task List -->
        <div class="h-[50vh] pb-4 overflow-y-auto">
            <div id="empty-message" class="hidden h-full flex flex-col items-center justify-center italic text-gray-500">
              <i class="fa-solid fa-inbox text-6xl text-gray-300 mb-4"></i>
              <span class="text-lg font-semibold">Tidak ada tugas terbaru disini</span>
            </div>
            <ul id="task-list" class="space-y-4">
              @foreach ($tasks as $task)
              <li class="flex items-center border rounded-2xl p-4 bg-white dark:bg-gray-800 shadow-md hover:shadow-lg transition duration-300 task-item {{ $task->status ? 'hidden' : '' }}"
                  data-priority="{{ $task->priority }}" data-status="{{ $task->status ? 'completed' : 'pending' }}">
                  
                  <span class="ml-3 text-lg font-medium 
                      {{ $task->status ? 'text-gray-400 line-through' : 'text-gray-700 dark:text-gray-200' }}">
                      {{ $task->name }}
                  </span>

                  <span class="ml-auto px-3 py-1 border rounded-full text-xs font-semibold uppercase
                      {{ $task->priority === 'high' ? 'border-red-500 text-red-500 bg-red-100 dark:bg-red-900' : '' }}
                      {{ $task->priority === 'medium' ? 'border-yellow-500 text-yellow-500 bg-yellow-100 dark:bg-yellow-900' : '' }}
                      {{ $task->priority === 'normal' ? 'border-gray-500 text-gray-500 bg-gray-100 dark:bg-gray-900' : '' }}">
                      {{ ucfirst($task->priority) }}
                  </span>
              </li>                    
            @endforeach
            </ul>
        </div>
      </div>

    </div>
    <x-footerdashboard />
  </main>

  <script>
    //mengecek tugas saat pertama kali memuat halaman
    window.addEventListener("load", () => {
        checkEmptyTaskList();
    });
    
    const quotes = [
      "Rahasia untuk maju adalah dengan memulainya. – Mark Twain",
      "Jangan memperhatikan jam; melakukan apa yang dilakukannya. Terus berlanjut. – Sam Levenson",
      "Kesuksesan bukanlah sesuatu yang final, kegagalan bukanlah hal yang fatal: Yang terpenting adalah keberanian untuk melanjutkan. – Winston Churchill",
      "Percayalah Anda bisa dan Anda sudah setengah jalan menuju kesuksesan. – Theodore Roosevelt",
      "Cara memulainya adalah dengan berhenti berbicara dan mulai melakukan. – Walt Disney"
    ];

    // Pilih kutipan secara acak
    const randomQuote = quotes[Math.floor(Math.random() * quotes.length)];

    // Tampilkan kutipan ke elemen marquee
    document.getElementById("motivational-quote").textContent = randomQuote;

    // Javascript Waktu & Tanggal 
    function updateDateTime() {
      const optionsDate = { timeZone: 'Asia/Jakarta', year: 'numeric', month: 'long', day: 'numeric', weekday: 'long' };
      const optionsTime = { timeZone: 'Asia/Jakarta', hour: '2-digit', minute: '2-digit', second: '2-digit' };
        
      const currentDate = new Date().toLocaleDateString('id-ID', optionsDate);
      const currentTime = new Date().toLocaleTimeString('id-ID', optionsTime);
        
      document.getElementById('current-date').textContent = currentDate;
      document.getElementById('current-time').textContent = currentTime;
    }
        
    setInterval(updateDateTime, 1000);
        
    const sections = document.querySelectorAll('.content-section');
    const titles = ["Task Summary", "Time & Date Realtime"];
    let currentSectionIndex = 0;
        
    function updateTitle() {
      document.getElementById('content-title').textContent = titles[currentSectionIndex];
    }
        
    document.getElementById('prev-content').addEventListener('click', () => {
      sections[currentSectionIndex].classList.add('hidden');
      currentSectionIndex = (currentSectionIndex - 1 + sections.length) % sections.length;
      sections[currentSectionIndex].classList.remove('hidden');
      updateTitle();
    });
        
    document.getElementById('next-content').addEventListener('click', () => {
      sections[currentSectionIndex].classList.add('hidden');
      currentSectionIndex = (currentSectionIndex + 1) % sections.length;
      sections[currentSectionIndex].classList.remove('hidden');
      updateTitle();
    });
    
    updateDateTime();
    updateTitle();
  </script>
  
@endsection
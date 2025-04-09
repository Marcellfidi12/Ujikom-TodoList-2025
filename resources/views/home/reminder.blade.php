@extends('layout.app')
@section('content')

    <main id="main-content" class="sm:ml-16 sm:mr-8 mt-24 px-6 transition-all duration-300 ease-in-out">
        <h2 class="text-2xl font-bold mb-4 text-gray-600 dark:text-white">Dashboard</h2>
        <div class="mx-auto my-8 bg-white border rounded-lg p-6">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-bold text-gray-800 dark:text-gray-200">Reminder</h2>
                <a href="{{ route('dashboard')}}"><button class="text-gray-500 hover:text-blue-600">Kembali...</button></a>
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
        <x-footerdashboard />
    </main>

@endsection
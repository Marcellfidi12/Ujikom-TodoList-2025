<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | To Do List</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="flex flex-col md:flex-row min-h-screen">
        <!-- Section Kiri Login -->
        <div class="w-full md:w-1/2 flex flex-col justify-center items-center p-10 bg-white">
            <h2 class="text-3xl font-bold text-gray-800 mb-4">Sign in to To-Do List</h2>
            
            <p class="text-gray-600 mb-4">or use your email account:</p>
            
            <form action="{{ route('login') }}" method="POST" class="w-full max-w-sm">
                @csrf
                <div class="mb-4">
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required 
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" 
                        placeholder="Email" />
                    @error('email')
                        <span class="text-sm text-red-600">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4">
                    <input type="password" id="password" name="password" required 
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" 
                        placeholder="Password" />
                    @error('password')
                        <span class="text-sm text-red-600">{{ $message }}</span>
                    @enderror
                </div>
                <div class="text-right mb-4">
                    <a href="#" class="text-blue-600 text-sm hover:underline">Forgot your password?</a>
                </div>
                <button type="submit" class="w-full px-4 py-2 text-white bg-blue-600 rounded-lg hover:bg-blue-500">
                    Sign In
                </button>
            </form>
        </div>

        <!-- Section Kanan Sign Up -->
        <div class="w-full md:w-1/2 flex flex-col justify-center items-center bg-blue-600 text-white p-10">
            <h2 class="text-3xl font-bold mb-4">Hello, Friend!</h2>
            <p class="text-center mb-6">Masukkan detail pribadi Anda dan mulailah perjalanan bersama kami</p>
            <a href="{{ route('register') }}" class="px-6 py-2 border border-white rounded-lg hover:bg-white hover:text-blue-600">
                Sign Up
            </a>
        </div>
    </div>
</body>
</html>

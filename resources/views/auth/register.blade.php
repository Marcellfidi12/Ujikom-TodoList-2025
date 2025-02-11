<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | To Do List</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="flex flex-col md:flex-row min-h-screen">
        <!-- Section Kiri Login -->
        <div class="w-full md:w-1/2 flex flex-col justify-center items-center bg-blue-600 text-white p-10">
            <h2 class="text-3xl font-bold mb-4">Welcome Back!</h2>
            <p class="text-center mb-6">Untuk tetap terhubung dengan kami, silakan login dengan informasi pribadi Anda</p>
            <a href="{{ route('login') }}" class="px-6 py-2 border border-white rounded-lg hover:bg-white hover:text-blue-600">
                Sign In
            </a>
        </div>

        <!-- Section Kanan Sign Up -->
        <div class="w-full md:w-1/2 flex flex-col justify-center items-center p-10 bg-white">
            <h2 class="text-3xl font-bold text-gray-800 mb-4">Create Your Account</h2>
            
            <p class="text-gray-600 mb-4">or use your email for registration:</p>
            
            <form action="{{ route('register') }}" method="POST" class="w-full max-w-sm">
                @csrf
                <div class="mb-4">
                    <input type="text" name="name" value="{{ old('name') }}" required 
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" 
                        placeholder="Name" />
                    @error('name')
                        <span class="text-sm text-red-600">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4">
                    <input type="email" name="email" value="{{ old('email') }}" required 
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" 
                        placeholder="Email" />
                    @error('email')
                        <span class="text-sm text-red-600">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4">
                    <input type="password" name="password" required 
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" 
                        placeholder="Password" />
                    @error('password')
                        <span class="text-sm text-red-600">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4">
                    <input type="password" name="password_confirmation" required 
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" 
                        placeholder="Confirm Password" />
                    @error('password_confirmation')
                        <span class="text-sm text-red-600">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" class="w-full px-4 py-2 text-white bg-blue-600 rounded-lg hover:bg-blue-500">
                    Sign Up
                </button>
            </form>
        </div>
    </div>
</body>
</html>

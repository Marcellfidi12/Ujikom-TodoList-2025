<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | M CODE (Todo App)</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="flex items-center justify-center min-h-screen bg-gradient-to-r from-white to-blue-200 p-4">
    <div class="flex flex-col md:flex-row w-full max-w-4xl md:h-[550px] bg-white rounded-2xl shadow-lg overflow-hidden">
        <!-- Register Card -->
        <div class="w-full md:w-1/2 p-6 flex flex-col justify-center items-center">
            <div class="flex flex-col items-center mb-6">
                <img src="{{ asset('assets/image/logo.png') }}" alt="App Logo" class="w-20 h-20 mb-3">
                <h2 class="text-2xl font-bold text-gray-800 text-center">Create Your Account!</h2>
            </div>
            <form action="{{ route('register') }}" method="POST" class="space-y-4 w-full max-w-xs">
                @csrf
                <div>
                    <input type="text" name="name" value="{{ old('name') }}" required 
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" 
                        placeholder="Name" />
                    @error('name')
                        <span class="text-sm text-red-600">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <input type="email" name="email" value="{{ old('email') }}" required 
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" 
                        placeholder="Email" />
                    @error('email')
                        <span class="text-sm text-red-600">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <input type="password" name="password" required 
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" 
                        placeholder="Password" />
                    @error('password')
                        <span class="text-sm text-red-600">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <input type="password" name="password_confirmation" required 
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" 
                        placeholder="Confirm Password" />
                    @error('password_confirmation')
                        <span class="text-sm text-red-600">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex items-center">
                    <input type="checkbox" id="terms" name="terms" required class="mr-2">
                    <label for="terms" class="text-sm text-gray-700">Saya menyetujui <a href="#" class="text-blue-600 hover:underline" onclick="openModal()">syarat dan ketentuan</a></label>
                </div>
                <button type="submit" class="w-full px-4 py-2 text-white bg-blue-600 rounded-lg hover:bg-blue-500">
                    Sign Up
                </button>
            </form>
            <div class="mt-6 text-xs text-gray-500">
                ©Marcell Fia Dinata - Ujikom 2025 Paket 2
            </div>
        </div>

        <!-- Info Section -->
        <div class="w-full md:w-1/2 flex flex-col justify-center items-center bg-blue-600 text-white p-6 md:p-10">
            <h2 class="text-2xl md:text-3xl font-bold mb-4 text-center">Buat Akun Baru!</h2>
            <p class="text-center mb-6 text-sm md:text-base">Gabung sekarang dan mulai perjalanan produktifmu!</p>
            <a href="{{ route('login') }}" class="px-4 py-2 md:px-6 md:py-2 border border-white rounded-lg hover:bg-white hover:text-blue-600">
                Sign In
            </a>
        </div>
    </div>
    <x-loadingspinner />
    <x-modalsyaratdanketentuan />
</body>
</html>

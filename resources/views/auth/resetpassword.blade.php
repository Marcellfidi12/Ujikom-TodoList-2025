<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password | M CODE (Todo App)</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="flex items-center justify-center min-h-screen bg-gradient-to-r from-white to-blue-200 p-4">
    <div class="flex flex-col md:flex-row w-full max-w-4xl md:h-[550px] bg-white rounded-2xl shadow-lg overflow-hidden">
        <!-- Reset Password Card -->
        <div class="w-full md:w-1/2 p-6 flex flex-col justify-center items-center">
            <div class="flex flex-col items-center mb-6">
                <img src="{{ asset('assets/image/logo.png') }}" alt="App Logo" class="w-20 h-20 mb-3">
                <h2 class="text-2xl font-bold text-gray-800 text-center">Reset Your Password</h2>
                {{-- <p class="text-center text-gray-600 mb-4">Enter your email and new password to reset your account.</p> --}}
            </div>
            <form action="{{ route('password.update') }}" method="POST" class="space-y-4 w-full max-w-xs">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">

                <div>
                    <input type="email" name="email" required 
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Email" value="{{ old('email') }}">
                    @error('email')
                        <span class="text-sm text-red-600">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <input type="password" name="password" required 
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" 
                        placeholder="New Password">
                    @error('password')
                        <span class="text-sm text-red-600">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <input type="password" name="password_confirmation" required 
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" 
                        placeholder="Confirm New Password">
                </div>

                <button type="submit" class="w-full px-4 py-2 text-white bg-blue-600 rounded-lg hover:bg-blue-500">
                    Reset Password
                </button>
            </form>
            <div class="mt-6 text-xs text-gray-500">
                ©Marcell Fia Dinata - Ujikom 2025 Paket 2
            </div>
        </div>

        <!-- Info Section -->
        <div class="w-full md:w-1/2 flex flex-col justify-center items-center bg-blue-600 text-white p-6 md:p-10">
            <h2 class="text-2xl md:text-3xl font-bold mb-4 text-center">Amankan Akun Anda</h2>
            <p class="text-center mb-6 text-sm md:text-base">Buat kata sandi baru untuk menjaga keamanan akun Anda.</p>
            <a href="{{ route('login') }}" class="px-4 py-2 md:px-6 md:py-2 border border-white rounded-lg hover:bg-white hover:text-blue-600">
                Back to Login
            </a>
        </div>
    </div>
    <x-loadingspinner />
</body>
</html>

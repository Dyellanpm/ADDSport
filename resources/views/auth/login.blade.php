<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Login | TokoKita</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
  <style>
    html, body {
      height: 100%;
      margin: 0;
      overflow: hidden;
      font-family: 'Inter', sans-serif;
      scroll-behavior: smooth;
    }
  </style>
</head>
<body class="h-screen w-screen bg-gradient-to-r from-indigo-100 via-rose-50 to-indigo-200 flex items-center justify-center">

  <div class="w-full max-w-6xl h-[90vh] bg-white rounded-3xl shadow-2xl overflow-hidden flex flex-col md:flex-row items-stretch border border-indigo-200">
    
    <!-- Gambar -->
    <div class="hidden md:block md:w-1/2 bg-gradient-to-br from-indigo-300 via-emerald-100 to-indigo-100">
      <img src="{{ asset('images/cover.png') }}" alt="Ilustrasi Login" class="w-full h-full object-cover" />
    </div>

    <!-- Form Login -->
    <div class="w-full md:w-1/2 px-8 py-12 md:p-16 flex flex-col justify-center bg-gray-50">
      <div class="text-center mb-8">
        <h2 class="text-3xl font-bold text-indigo-700">Masuk ke Akun Anda</h2>
        <p class="text-sm text-gray-600">Selamat datang kembali di <span class="text-emerald-500 font-semibold">ADDsports</span></p>
      </div>

      {{-- Session Status --}}
      <x-auth-session-status class="mb-4" :status="session('status')" />

      <form method="POST" action="{{ route('login') }}" class="space-y-5">
        @csrf

        <!-- Email -->
        <div>
          <label for="email" class="block text-sm font-semibold text-slate-700">Email</label>
          <input id="email" type="email" name="email" :value="old('email')" required autofocus
            class="mt-1 w-full px-4 py-2 border border-indigo-200 bg-white rounded-lg shadow-inner focus:ring-emerald-400 focus:border-emerald-400 transition">
          <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div>
          <label for="password" class="block text-sm font-semibold text-slate-700">Password</label>
          <input id="password" type="password" name="password" required
            class="mt-1 w-full px-4 py-2 border border-indigo-200 bg-white rounded-lg shadow-inner focus:ring-emerald-400 focus:border-emerald-400 transition">
          <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me & Forgot -->
        <div class="flex items-center justify-between text-sm text-gray-600">
          <label for="remember_me" class="flex items-center">
            <input id="remember_me" type="checkbox" name="remember"
              class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500">
            <span class="ml-2">Ingat saya</span>
          </label>

          @if (Route::has('password.request'))
          <a href="{{ route('password.request') }}" class="text-amber-500 hover:underline">
            Lupa Password?
          </a>
          @endif
        </div>

        <!-- Tombol -->
        <div>
          <button type="submit"
            class="w-full bg-gradient-to-r from-indigo-600 via-emerald-500 to-emerald-600 hover:from-indigo-700 hover:to-emerald-700 text-white py-2 rounded-lg font-semibold shadow-md transition duration-200">
            Masuk
          </button>
        </div>
      </form>

      <!-- Link Daftar -->
      <div class="text-center mt-6 text-sm text-gray-600">
        Belum punya akun?
        <a href="{{ route('register') }}" class="text-amber-500 hover:underline font-medium">
          Daftar Sekarang
        </a>
      </div>
    </div>
  </div>
</body>
</html>

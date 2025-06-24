<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Daftar Akun | TokoKita</title>
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
      <img src="{{ asset('images/cover.png') }}" alt="Ilustrasi Register" class="w-full h-full object-cover" />
    </div>

    <!-- Form -->
    <div class="w-full md:w-1/2 px-8 py-12 md:p-16 flex flex-col justify-center bg-gray-50">
      <div class="text-center mb-8">
        <h2 class="text-3xl font-bold text-indigo-700">Buat Akun Baru</h2>
        <p class="text-gray-600 text-sm">Mulai belanja hemat dan mudah di <span class="font-semibold text-emerald-500">ADDsports!</span></p>
      </div>

      <form method="POST" action="{{ route('register') }}" class="space-y-5">
        @csrf

        <!-- Nama -->
        <div>
          <label for="name" class="block text-sm font-semibold text-slate-700">Nama Lengkap</label>
          <input id="name" type="text" name="name" :value="old('name')" required autofocus
            class="mt-1 w-full px-4 py-2 border border-indigo-200 bg-white rounded-lg shadow-inner focus:ring-emerald-400 focus:border-emerald-400 transition">
          <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email -->
        <div>
          <label for="email" class="block text-sm font-semibold text-slate-700">Email</label>
          <input id="email" type="email" name="email" :value="old('email')" required
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

        <!-- Konfirmasi Password -->
        <div>
          <label for="password_confirmation" class="block text-sm font-semibold text-slate-700">Konfirmasi Password</label>
          <input id="password_confirmation" type="password" name="password_confirmation" required
            class="mt-1 w-full px-4 py-2 border border-indigo-200 bg-white rounded-lg shadow-inner focus:ring-emerald-400 focus:border-emerald-400 transition">
          <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Tombol -->
        <div>
          <button type="submit"
            class="w-full bg-gradient-to-r from-indigo-600 via-emerald-500 to-emerald-600 hover:from-indigo-700 hover:to-emerald-700 text-white py-2 rounded-lg font-semibold shadow-md transition duration-200">
            Daftar
          </button>
        </div>
      </form>

      <!-- Link Masuk -->
      <div class="text-center mt-6 text-sm text-gray-600">
        Sudah punya akun?
        <a href="{{ route('login') }}" class="text-amber-500 hover:underline font-medium">
          Masuk
        </a>
      </div>
    </div>
  </div>
</body>
</html>

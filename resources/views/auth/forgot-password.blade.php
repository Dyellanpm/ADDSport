<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Lupa Kata Sandi | TokoKita</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
  <style>
    html {
      font-family: 'Inter', sans-serif;
    }
  </style>
</head>
<body class="bg-gradient-to-br from-indigo-50 via-blue-50 to-white min-h-screen flex items-center justify-center text-gray-800">

  <div class="w-full max-w-md bg-white border border-indigo-100 rounded-2xl shadow-xl p-8 space-y-6">
    <div class="text-center">
      <h2 class="text-2xl font-bold text-indigo-700">Lupa Kata Sandi</h2>
      <p class="text-sm text-gray-600 mt-1">
        Masukkan email Anda dan kami akan mengirimkan tautan untuk mengatur ulang kata sandi.
      </p>
    </div>

    <!-- Session Status -->
    @if (session('status'))
      <div class="bg-green-100 border border-green-400 text-green-700 text-sm px-4 py-2 rounded">
        {{ session('status') }}
      </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}" class="space-y-4">
      @csrf

      <!-- Email Address -->
      <div>
        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
        <input id="email" name="email" type="email" value="{{ old('email') }}" required autofocus
               class="mt-1 block w-full rounded-lg border border-indigo-200 shadow-inner focus:ring-indigo-500 focus:border-indigo-500" />
        @error('email')
          <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
        @enderror
      </div>

      <div class="flex items-center justify-between">
        <a href="{{ route('login') }}" class="text-sm text-indigo-600 hover:underline">← Kembali ke login</a>
        <button type="submit"
                class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white text-sm font-semibold rounded-lg hover:bg-indigo-700 transition">
          Kirim Tautan Reset
        </button>
      </div>
    </form>
  </div>

</body>
</html>

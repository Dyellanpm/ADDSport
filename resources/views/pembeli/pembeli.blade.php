<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Beranda Pembeli | ADDsports</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
  <style>
    html {
      font-family: 'Inter', sans-serif;
    }
  </style>
</head>
<body class="bg-gradient-to-b from-indigo-50 via-emerald-50 to-white min-h-screen text-gray-800">

  <!-- Navbar -->
  <nav class="bg-white shadow border-b border-gray-200">
    <div class="max-w-screen-xl mx-auto px-6 py-4 flex justify-between items-center">
      <div class="flex items-center space-x-3">
        <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-12 h-12 object-contain">
        <span class="text-xl font-bold text-indigo-700">ADDsports</span>
      </div>
      <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="text-sm font-semibold text-red-600 hover:text-white hover:bg-red-500 border border-red-500 px-4 py-2 rounded-lg transition">
          Logout
        </button>
      </form>
    </div>
  </nav>

  <!-- Konten -->
  <main class="max-w-4xl mx-auto py-16 px-6 text-center">
    <h1 class="text-4xl font-bold text-indigo-700">Halo, {{ auth()->user()->name }} 👋</h1>
    <p class="text-lg text-gray-600 mt-4">Selamat datang di halaman pembeli ADDsports. Selamat berbelanja!</p>

    <div class="mt-10">
      <a href="{{ url('/') }}" class="inline-block bg-emerald-600 hover:bg-emerald-700 text-white font-semibold px-6 py-3 rounded-lg shadow transition">
        Kembali ke Beranda
      </a>
    </div>
  </main>

</body>
</html>

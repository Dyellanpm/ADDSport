<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Beranda | Toko E-Commerce</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <script src="https://cdn.jsdelivr.net/npm/flowbite@2.3.0/dist/flowbite.min.js"></script>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
  <style>
    html {
      scroll-behavior: smooth;
      font-family: 'Inter', sans-serif;
    }
  </style>
</head>
<body id="dashboard" class="bg-gradient-to-b from-indigo-50 via-blue-50 to-white text-gray-800">

  <!-- Navbar -->
  <nav class="bg-white border-b border-gray-300 w-full">
    <div class="max-w-screen-xl flex items-center justify-between mx-auto px-6 py-2">
      <a href="#dashboard" class="flex items-center">
        <img src="{{ asset('images/logo.png') }}" alt="Logo" class="object-contain w-24 h-24" />
      </a>
      <div class="flex items-center space-x-4">
        <a href="#" class="text-rose-600 hover:text-rose-800">
          <svg width="24" height="24" fill="none" viewBox="0 0 24 24"><path d="M12.0049 2C15.3186 2 18.0049 4.68629 18.0049 8V9H22.0049V11H20.8379L20.0813 20.083C20.0381 20.6013 19.6048 21 19.0847 21H4.92502C4.40493 21 3.97166 20.6013 3.92847 20.083L3.17088 11H2.00488V9H6.00488V8C6.00488 4.68629 8.69117 2 12.0049 2Z" fill="currentColor"/></svg>
        </a>
        <a href="#" class="text-emerald-600 hover:text-emerald-800">
          <svg width="24" height="24" fill="none" viewBox="0 0 24 24"><path d="M4 22C4 17.5817 7.58172 14 12 14C16.4183 14 20 17.5817 20 22H4Z" fill="currentColor"/><path d="M12 13C8.685 13 6 10.315 6 7C6 3.685 8.685 1 12 1C15.315 1 18 3.685 18 7C18 10.315 15.315 13 12 13Z" fill="currentColor"/></svg>
        </a>
        <a href="{{ route('login') }}" class="text-sm font-semibold rounded px-4 py-1 border border-indigo-600 text-indigo-600 hover:bg-indigo-100 transition">Masuk</a>
        <a href="{{ route('register') }}" class="text-sm font-semibold rounded px-4 py-1 border border-rose-600 text-rose-600 hover:bg-rose-50 transition">Daftar</a>
      </div>
    </div>
  </nav>

  <!-- Navigation Buttons -->
  <div class="px-6 mt-6 flex justify-center">
    <div class="inline-flex rounded-md shadow-sm" role="group">
      <a href="#dashboard">
        <button class="px-4 py-2 text-sm font-medium bg-white border border-gray-200 rounded-s-lg hover:bg-indigo-100 hover:text-indigo-700">Dashboard</button>
      </a>
      <a href="#items">
        <button class="px-4 py-2 text-sm font-medium bg-white border-y border-gray-200 hover:bg-emerald-100 hover:text-emerald-700">Items</button>
      </a>
      <a href="#about">
        <button class="px-4 py-2 text-sm font-medium bg-white border border-gray-200 rounded-e-lg hover:bg-rose-100 hover:text-rose-700">About Us</button>
      </a>
    </div>
  </div>

  <!-- Carousel -->
  <div id="default-carousel" class="relative w-full mt-6" data-carousel="slide">
    <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
      <div class="hidden duration-700 ease-in-out" data-carousel-item>
        <img src="{{ asset('images/riki.jpg') }}" class="absolute block w-full h-full object-cover" alt="riki">
      </div>
      <div class="hidden duration-700 ease-in-out" data-carousel-item>
        <img src="{{ asset('images/delan.jpg') }}" class="absolute block w-full h-full object-cover" alt="delan">
      </div>
    </div>
    <div class="absolute z-30 flex -translate-x-1/2 bottom-4 left-1/2 space-x-3">
      <button type="button" class="w-3 h-3 rounded-full bg-white" data-carousel-slide-to="0"></button>
      <button type="button" class="w-3 h-3 rounded-full bg-white" data-carousel-slide-to="1"></button>
    </div>
    <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 group" data-carousel-prev>
      <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 group-hover:bg-white/50">
        <svg class="w-4 h-4 text-gray-800 rtl:rotate-180" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/></svg>
      </span>
    </button>
    <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 group" data-carousel-next>
      <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 group-hover:bg-white/50">
        <svg class="w-4 h-4 text-gray-800 rtl:rotate-180" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/></svg>
      </span>
    </button>
  </div>

  <!-- Promo Section -->
  <section class="py-16 px-6 bg-white">
    <div class="max-w-screen-xl mx-auto text-center">
      <h2 class="text-3xl font-bold text-indigo-700 mb-4">Promo Menarik Bulan Ini</h2>
      <p class="text-gray-600 text-lg mb-6">Dapatkan diskon hingga <span class="font-semibold text-rose-600">50%</span> untuk produk pilihan! Jangan lewatkan kesempatan ini.</p>
      <a href="#items" class="inline-block px-6 py-2 text-white bg-rose-600 rounded hover:bg-rose-700 transition">Lihat Promo</a>
    </div>
  </section>

  <!-- Items Section -->
  <section id="items" class="py-16 px-6 bg-blue-50">
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6 max-w-screen-xl mx-auto">
      @for ($i = 1; $i <= 8; $i++)
      <div class="bg-white border border-gray-200 rounded-lg shadow-md overflow-hidden">
        <a href="#">
          <img class="w-full h-40 object-cover" src="{{ asset('images/delan.jpg') }}" alt="Produk {{ $i }}">
        </a>
        <div class="p-4">
          <a href="#"><h5 class="text-xl font-bold text-indigo-800 mb-2">Produk Menarik {{ $i }}</h5></a>
          <p class="text-gray-600 text-sm mb-3">Temukan produk ke-{{ $i }} terbaik untuk kebutuhanmu.</p>
          <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-white bg-indigo-600 rounded-lg hover:bg-indigo-700 focus:ring-4 focus:outline-none focus:ring-indigo-300">
            Lihat Detail
            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
            </svg>
          </a>
        </div>
      </div>
      @endfor
    </div>
  </section>

  <!-- Testimonials Section -->
  <section class="py-16 px-6 bg-white">
    <div class="max-w-screen-xl mx-auto text-center">
      <h2 class="text-3xl font-bold text-emerald-700 mb-8">Apa Kata Pelanggan Kami</h2>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-blue-50 p-6 rounded shadow">
          <p class="text-gray-700 italic">"Sangat puas belanja di sini, pengiriman cepat dan kualitas produk memuaskan!"</p>
          <p class="mt-4 font-semibold text-indigo-700">- Andi Pratama</p>
        </div>
        <div class="bg-blue-50 p-6 rounded shadow">
          <p class="text-gray-700 italic">"Toko online terpercaya, selalu ada promo menarik setiap minggu!"</p>
          <p class="mt-4 font-semibold text-indigo-700">- Rina Aprilia</p>
        </div>
        <div class="bg-blue-50 p-6 rounded shadow">
          <p class="text-gray-700 italic">"Customer service sangat responsif dan membantu!"</p>
          <p class="mt-4 font-semibold text-indigo-700">- Deni Wijaya</p>
        </div>
      </div>
    </div>
  </section>

  <!-- About Us Section -->
  <section id="about" class="py-16 px-6 bg-gradient-to-t from-blue-50 to-white">
    <div class="max-w-screen-xl mx-auto text-center">
      <h2 class="text-3xl font-bold text-emerald-700 mb-4">Tentang Kami</h2>
      <p class="text-gray-700 text-lg">
        TokoKita adalah platform e-commerce yang menyediakan berbagai produk berkualitas dengan harga terjangkau.
        Kami berkomitmen untuk memberikan pengalaman belanja yang nyaman dan aman bagi pelanggan kami.
      </p>
    </div>
  </section>

  <!-- Footer -->
  <footer class="bg-indigo-800 text-white py-8 mt-16">
    <div class="max-w-screen-xl mx-auto px-6 grid grid-cols-1 md:grid-cols-3 gap-6 text-sm">
      <div>
        <h4 class="font-bold text-lg mb-2">TokoKita</h4>
        <p>Solusi belanja modern dengan produk terbaik dan harga terjangkau.</p>
      </div>
      <div>
        <h4 class="font-bold text-lg mb-2">Navigasi</h4>
        <ul class="space-y-1">
          <li><a href="#dashboard" class="hover:underline">Dashboard</a></li>
          <li><a href="#items" class="hover:underline">Items</a></li>
          <li><a href="#about" class="hover:underline">Tentang Kami</a></li>
        </ul>
      </div>
      <div>
        <h4 class="font-bold text-lg mb-2">Hubungi Kami</h4>
        <p>Email: info@tokokita.com</p>
        <p>Telp: +62 812 3456 7890</p>
      </div>
    </div>
    <div class="mt-8 text-center text-gray-300 text-xs">
      &copy; 2025 TokoKita. All rights reserved.
    </div>
  </footer>

</body>
</html>
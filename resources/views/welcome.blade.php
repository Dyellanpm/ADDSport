{{-- resources/views/welcome.blade.php --}}
<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8">
            <title>Beranda | ADDsports</title>
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <script src="https://cdn.tailwindcss.com"></script>
                <link
                    href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap"
                    rel="stylesheet">
                    <link
                        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
                        rel="stylesheet">
                        <style>
                            html {
                                font-family: 'Inter', sans-serif;
                            }

                            .hero-gradient {
                                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                            }

                            .gradient-text {
                                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                                -webkit-background-clip: text;
                                -webkit-text-fill-color: transparent;
                                display: inline-block;
                            }

                            .card-hover {
                                transition: 0.3s;
                            }

                            .card-hover:hover {
                                transform: translateY(-8px);
                                box-shadow: 0 20px 25px -5px #0001;
                            }

                            .category-chip {
                                background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
                            }

                            .price-tag {
                                background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
                            }
                        </style>
                    </head>
                    <body class="bg-gray-50 text-gray-800">
                        <!-- Navbar -->
                        <nav class="bg-white/90 border-b w-full fixed top-0 z-50 shadow-sm">
                            <div
                                class="max-w-screen-xl flex items-center justify-between mx-auto px-6 py-3">
                                <a href="#" class="flex items-center">
                                    <div
                                        class="w-10 h-10 bg-gradient-to-r from-indigo-500 to-purple-600 rounded-xl flex items-center justify-center mr-3">
                                        <i class="fas fa-running text-white"></i>
                                    </div>
                                    <span class="text-xl font-bold gradient-text">ADDsports</span>
                                </a>
                                <div class="hidden md:flex items-center space-x-8">
                                    <a href="#" class="text-gray-700 hover:text-indigo-600 font-medium">Dashboard</a>
                                    <a href="#" class="text-gray-700 hover:text-indigo-600 font-medium">Produk</a>
                                    <a href="#" class="text-gray-700 hover:text-indigo-600 font-medium">Tentang</a>
                                </div>
                                <div class="flex items-center space-x-4">
                                    <button class="p-2 text-gray-600 hover:text-rose-600">
                                        <i class="fas fa-shopping-cart"></i>
                                    </button>
                                    <a
                                        href="{{ route('login') }}"
                                        class="hidden sm:inline-block text-sm font-semibold px-4 py-2 border border-indigo-600 text-indigo-600 hover:bg-indigo-50">Masuk</a>
                                    <a
                                        href="{{ route('register') }}"
                                        class="text-sm font-semibold px-4 py-2 bg-gradient-to-r from-indigo-600 to-purple-600 text-white">Daftar</a>
                                </div>
                            </div>
                        </nav>

                        <!-- Hero Section -->
                        <section
                            class="hero-gradient min-h-screen flex items-center justify-center relative">
                            <div class="absolute inset-0 bg-black/20"></div>
                            <div class="relative z-10 text-center text-white px-6 max-w-3xl mx-auto">
                                <h1 class="text-5xl md:text-6xl font-bold mb-6">
                                    Gear Up for
                                    <span
                                        class="block text-transparent bg-gradient-to-r from-yellow-400 to-orange-500 bg-clip-text">Greatness</span>
                                </h1>
                                <p class="text-xl mb-8 text-gray-200">Temukan perlengkapan olahraga terbaik untuk performa maksimal Anda</p>
                                <a
                                    href="#"
                                    class="bg-white text-indigo-600 px-8 py-4 rounded-full font-semibold text-lg hover:bg-gray-100">Mulai Belanja</a>
                            </div>
                        </section>

                        <!-- Produk Terbaru -->
                        <main class="max-w-7xl mx-auto px-6 py-8">
                            <h2 class="text-2xl font-bold text-gray-800 mb-4">Produk Terbaru</h2>
                            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                                @foreach ($products as $product)
                                <div class="bg-white rounded-2xl shadow card-hover p-4">
                                    <!-- Gambar Produk -->
                                    <img
                                        src="{{ asset('storage/' . $product->gambar) }}"
                                        alt="{{ $product->nama }}"
                                        class="w-full h-48 object-contain bg-white rounded-xl mb-3">

                                        <!-- Kategori -->
                                        <span class="category-chip text-white px-3 py-1 rounded-full text-xs">
                                            {{ $product->kategori->nama ?? '-' }}
                                        </span>

                                        <!-- Nama Produk -->
                                        <h3 class="font-bold mt-1 mb-1 text-gray-800">{{ $product->nama }}</h3>

                                        <!-- Harga -->
                                        <span
                                            class="price-tag text-white px-4 py-2 rounded-xl font-bold text-sm inline-block mb-2">
                                            Rp
                                            {{ number_format($product->harga, 0, ',', '.') }}
                                        </span>

                                        <a
                                            href="{{ route('pembeli.detail', $product->id) }}"
                                            class="block mt-4 bg-indigo-600 hover:bg-indigo-700 text-white py-2 rounded-xl text-center">
                                            DETAIL PRODUK
                                        </a>
                                    </div>
                                    @endforeach
                                </div>
                            </main>

                            <!-- Footer -->
                            <footer class="bg-white border-t py-8 text-center text-gray-600">
                                &copy;
                                {{ date('Y') }}
                                <span class="font-bold gradient-text">ADDsports</span>. All rights reserved.
                            </footer>
                        </body>
                    </html>
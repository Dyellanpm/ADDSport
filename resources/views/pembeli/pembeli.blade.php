<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Beranda Pembeli | ADDsports</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        html { font-family: 'Inter', sans-serif; }
        .gradient-bg { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); }
        .card-hover { transition: .3s; }
        .card-hover:hover { transform: translateY(-8px); box-shadow: 0 20px 25px -5px #0001; }
        .category-chip { background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%); }
        .price-tag { background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%); }
    </style>
</head>
<body class="bg-gradient-to-br from-slate-50 to-blue-50 min-h-screen text-gray-800">
    <nav class="bg-white/80 shadow border-b sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <div class="flex items-center space-x-3">
                <div class="w-10 h-10 bg-gradient-to-r from-indigo-600 to-purple-600 rounded flex items-center justify-center">
                    <i class="fas fa-running text-white"></i>
                </div>
                <span class="text-xl font-bold bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent">ADDsports</span>
            </div>
            <div class="flex items-center space-x-4">
                <button class="relative p-3 bg-gray-100 rounded-xl"><i class="fas fa-heart text-gray-600"></i></button>
                <button class="relative p-3 bg-gray-100 rounded-xl"><i class="fas fa-shopping-cart text-gray-600"></i></button>
                <img src="https://ui-avatars.com/api/?name=User&background=6366f1&color=fff" alt="Profile" class="w-10 h-10 rounded-full">
                
                <!-- Logout -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="p-3 bg-gray-100 rounded-xl hover:text-red-600 text-gray-600 flex items-center space-x-1">
                        <i class="fas fa-sign-out-alt"></i>
                        <span class="hidden sm:inline">Logout</span>
                    </button>
                </form>
            </div>
        </div>
    </nav>

    <section class="gradient-bg text-white py-16 text-center">
        <h1 class="text-4xl font-bold mb-2">Selamat Datang di <span class="text-yellow-300">ADDsports</span></h1>
        <p class="mb-6">Temukan perlengkapan olahraga premium dengan kualitas terbaik dan harga bersahabat</p>
        <button class="bg-white text-indigo-600 px-8 py-3 rounded-2xl font-semibold">Mulai Belanja</button>
    </section>

    <section class="py-8 bg-white/50">
        <div class="max-w-7xl mx-auto px-6">
            <h2 class="text-2xl font-bold text-center mb-6 text-gray-800">Kategori Populer</h2>
            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4">
                <div class="category-chip text-white p-4 rounded-2xl text-center">Sepak Bola</div>
                <div class="bg-gradient-to-r from-green-400 to-blue-500 text-white p-4 rounded-2xl text-center">Basket</div>
                <div class="bg-gradient-to-r from-purple-400 to-pink-500 text-white p-4 rounded-2xl text-center">Lari</div>
                <div class="bg-gradient-to-r from-yellow-400 to-orange-500 text-white p-4 rounded-2xl text-center">Renang</div>
                <div class="bg-gradient-to-r from-teal-400 to-cyan-500 text-white p-4 rounded-2xl text-center">Fitness</div>
                <div class="bg-gradient-to-r from-indigo-400 to-purple-500 text-white p-4 rounded-2xl text-center">Voli</div>
            </div>
        </div>
    </section>

    <main class="max-w-7xl mx-auto px-6 py-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Produk Terbaru</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="bg-white rounded-2xl shadow card-hover p-4">
                <img src="https://images.unsplash.com/photo-1551698618-1dfe5d97d256?w=400&h=300&fit=crop" class="w-full h-40 object-cover rounded-xl mb-3">
                <span class="category-chip text-white px-3 py-1 rounded-full text-xs">Sepatu Lari</span>
                <h3 class="font-bold mt-2 mb-1">Sepatu Lari Premium Nike Air Max</h3>
                <span class="price-tag text-white px-4 py-2 rounded-xl font-bold text-lg">Rp 1.299.000</span>
                <a href="{{ route('pembeli.section') }}" class="block mt-4 bg-indigo-600 text-white py-2 rounded-xl text-center">Beli Sekarang</a>
            </div>

            <div class="bg-white rounded-2xl shadow card-hover p-4">
                <img src="https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?w=400&h=300&fit=crop" class="w-full h-40 object-cover rounded-xl mb-3">
                <span class="bg-gradient-to-r from-green-400 to-blue-500 text-white px-3 py-1 rounded-full text-xs">Basket</span>
                <h3 class="font-bold mt-2 mb-1">Bola Basket Spalding Original</h3>
                <span class="price-tag text-white px-4 py-2 rounded-xl font-bold text-lg">Rp 499.000</span>
                <a href="{{ route('pembeli.section') }}" class="block mt-4 bg-indigo-600 text-white py-2 rounded-xl text-center">Beli Sekarang</a>
            </div>

            <div class="bg-white rounded-2xl shadow card-hover p-4">
                <img src="https://images.unsplash.com/photo-1600181954320-e6ec9f41f8f1?w=400&h=300&fit=crop" class="w-full h-40 object-cover rounded-xl mb-3">
                <span class="bg-gradient-to-r from-purple-400 to-pink-500 text-white px-3 py-1 rounded-full text-xs">Lari</span>
                <h3 class="font-bold mt-2 mb-1">Jersey Lari Ringan Adidas</h3>
                <span class="price-tag text-white px-4 py-2 rounded-xl font-bold text-lg">Rp 259.000</span>
                <a href="{{ route('pembeli.section') }}" class="block mt-4 bg-indigo-600 text-white py-2 rounded-xl text-center">Beli Sekarang</a>
            </div>
        </div>
    </main>

    <footer class="bg-white/80 mt-12 py-6 border-t text-center text-sm text-gray-500">
        &copy; {{ date('Y') }} ADDsports. Semua hak dilindungi.
    </footer>
</body>
</html>

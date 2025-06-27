<html lang="id">
    <head>
        <meta charset="UTF-8">
        <title>Admin | ADDsports</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script src="https://cdn.jsdelivr.net/npm/flowbite@2.3.0/dist/flowbite.min.js"></script>
        <link
            href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
            rel="stylesheet">
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <style>
            html {
                scroll-behavior: smooth;
                font-family: 'Inter', sans-serif;
            }

            .glass-effect {
                backdrop-filter: blur(10px);
                background: rgba(255, 255, 255, 0.8);
            }

            .gradient-blue {
                background: linear-gradient(135deg, #1e40af 0%, #3b82f6 50%, #60a5fa 100%);
            }

            .gradient-blue-dark {
                background: linear-gradient(135deg, #1e3a8a 0%, #1e40af 50%, #3b82f6 100%);
            }

            .shadow-glow {
                box-shadow: 0 4px 15px 0 rgba(59, 130, 246, 0.2);
            }

            .nav-item {
                position: relative;
                overflow: hidden;
            }

            .nav-item::before {
                content: '';
                position: absolute;
                top: 0;
                left: -100%;
                width: 100%;
                height: 100%;
                background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
                transition: left 0.5s;
            }

            .nav-item:hover::before {
                left: 100%;
            }

            .card-hover {
                transition: all 0.3s ease;
            }

            .card-hover:hover {
                transform: translateY(-5px);
                box-shadow: 0 20px 40px rgba(59, 130, 246, 0.15);
            }

            .animate-fade-in {
                animation: fadeIn 0.5s ease-in;
            }

            @keyframes fadeIn {
                from {
                    opacity: 0;
                    transform: translateY(20px);
                }
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            .animate-slide-in {
                animation: slideIn 0.3s ease-out;
            }

            @keyframes slideIn {
                from {
                    transform: translateX(-100%);
                }
                to {
                    transform: translateX(0);
                }
            }

            .pulse-ring {
                animation: pulse-ring 1.5s ease-in-out infinite;
            }

            @keyframes pulse-ring {
                0% {
                    transform: scale(0.33);
                }
                100%,
                80% {
                    opacity: 0;
                }
            }

            /* Custom scrollbar */
            ::-webkit-scrollbar {
                width: 6px;
            }

            ::-webkit-scrollbar-track {
                background: #f1f5f9;
            }

            ::-webkit-scrollbar-thumb {
                background: #3b82f6;
                border-radius: 3px;
            }

            ::-webkit-scrollbar-thumb:hover {
                background: #2563eb;
            }
            
        </style>
    </head>
    <body
        class="bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-100 text-gray-800 min-h-screen flex">

        <!-- Sidebar -->
        <aside
            class="w-72 min-h-screen hidden lg:flex flex-col justify-between gradient-blue-dark text-white shadow-2xl relative overflow-hidden animate-slide-in">
            <!-- Decorative Elements -->
            <div
                class="absolute top-0 right-0 w-32 h-32 bg-white opacity-10 rounded-full -mr-16 -mt-16"></div>
            <div
                class="absolute bottom-0 left-0 w-24 h-24 bg-white opacity-5 rounded-full -ml-12 -mb-12"></div>

            <!-- Sidebar Header -->
            <div class="h-20 flex items-center px-8 border-b border-white/20 relative z-10">
                <div class="flex items-center gap-4">
                    <div class="relative">
                        <div
                            class="w-12 h-12 bg-white rounded-xl flex items-center justify-center shadow-lg">
                            <i class="fas fa-running text-blue-600 text-xl"></i>
                        </div>
                        <div
                            class="absolute -top-1 -right-1 w-4 h-4 bg-green-400 rounded-full pulse-ring"></div>
                    </div>
                    <div>
                        <span class="text-xl font-bold tracking-wide block">ADDsports</span>
                        <span class="text-xs text-blue-200 font-medium">Admin Panel</span>
                    </div>
                </div>
            </div>

            <!-- User Profile Card -->
            <div
                class="mx-6 mt-6 p-4 glass-effect rounded-2xl border border-white/20 backdrop-blur-sm">
                <div class="flex items-center gap-3">
                    <div
                        class="w-12 h-12 bg-gradient-to-br from-blue-400 to-purple-500 rounded-full flex items-center justify-center text-white font-bold text-lg shadow-lg">
                        {{ substr(Auth::user()->name, 0, 1) }}
                    </div>
                    <div>
                        <p class="text-black font-semibold text-sm">{{ Auth::user()->name }}</p>
                        <p class="text-blue-200 text-xs">{{ Auth::user()->email ?? 'admin@addsports.com' }}</p>
                    </div>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="flex-1 mt-8 space-y-2 text-sm font-medium px-6">
                <div class="mb-6">
                    <h3 class="text-xs font-semibold text-blue-200 uppercase tracking-wider mb-3">Menu Utama</h3>

                    <a
                        href="{{ route('dashboard') }}"
                        class="nav-item flex items-center gap-4 px-4 py-3 rounded-xl transition-all duration-300 {{ request()->routeIs('dashboard') ? 'bg-white/20 text-white shadow-lg backdrop-blur-sm' : 'hover:bg-white/10 text-white/80 hover:text-white' }}">
                        <div class="w-8 h-8 bg-white/20 rounded-lg flex items-center justify-center">
                            <i class="fas fa-chart-pie text-sm"></i>
                        </div>
                        <div>
                            <span class="font-medium">Dashboard</span>
                            <p class="text-xs text-blue-200">Overview & Analytics</p>
                        </div>
                    </a>

                    <a
                        href="{{ route('products.index') }}"
                        class="nav-item flex items-center gap-4 px-4 py-3 rounded-xl transition-all duration-300 {{ request()->routeIs('products.*') ? 'bg-white/20 text-white shadow-lg backdrop-blur-sm' : 'hover:bg-white/10 text-white/80 hover:text-white' }} mt-2">
                        <div class="w-8 h-8 bg-white/10 rounded-lg flex items-center justify-center">
                            <i class="fas fa-box text-sm"></i>
                        </div>
                        <div>
                            <span class="font-medium">Produk</span>
                            <p class="text-xs text-blue-200">Kelola Produk</p>
                        </div>
                    </a>

                   <a
                    href="{{ route('pesanan.index') }}"
                    class="nav-item flex items-center gap-4 px-4 py-3 rounded-xl transition-all duration-300 {{ request()->routeIs('pesanan.*') ? 'bg-white/20 text-white shadow-lg backdrop-blur-sm' : 'hover:bg-white/10 text-white/80 hover:text-white' }} mt-2">
                    <div class="w-8 h-8 bg-white/10 rounded-lg flex items-center justify-center">
                        <i class="fas fa-shopping-cart text-sm"></i>
                    </div>
                    <div>
                        <span class="font-medium">Pesanan</span>
                        <p class="text-xs text-blue-200">Kelola Pesanan</p>
                    </div>
                </a>


                    <a
                        href="{{ route('admin.users.index') }}"
                        class="nav-item flex items-center gap-4 px-4 py-3 rounded-xl transition-all duration-300 {{ request()->routeIs('pengguna.*') ? 'bg-white/20 text-white shadow-lg backdrop-blur-sm' : 'hover:bg-white/10 text-white/80 hover:text-white' }} mt-2">
                        <div class="w-8 h-8 bg-white/10 rounded-lg flex items-center justify-center">
                            <i class="fas fa-users text-sm"></i>
                        </div>
                        <div>
                            <span class="font-medium">Pengguna</span>
                            <p class="text-xs text-blue-200">Kelola Pengguna</p>
                        </div>
                    </a>
                </div>

            </nav>

            <!-- Logout -->
            <div class="mt-6 px-6 pb-8">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button
                        type="submit"
                        class="w-full flex items-center gap-3 px-4 py-3 text-red-200 hover:bg-red-500/20 hover:text-red-100 rounded-xl transition-all duration-300 text-sm font-medium border border-red-300/20 backdrop-blur-sm">
                        <div class="w-8 h-8 bg-red-500/20 rounded-lg flex items-center justify-center">
                            <i class="fas fa-sign-out-alt text-sm"></i>
                        </div>
                        <span>Logout</span>
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Top Navbar -->
            <header
                class="glass-effect px-8 py-6 shadow-lg border-b border-white/20 backdrop-blur-sm animate-fade-in">
                <div class="flex justify-between items-center">
                    <div>
                        <h1
                            class="text-2xl font-bold bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">@yield('title', 'Dashboard Overview')</h1>
                        <p class="text-gray-600 text-sm mt-1">Selamat datang kembali,
                            {{ Auth::user()->name }}!</p>
                    </div>

                </div>
            </header>

            <!-- Page Content -->
            <main class="px-8 pb-8 flex-1 overflow-y-auto">
                @yield('content')
            </main>
        </div>
@stack('scripts')
    </body>
</html>
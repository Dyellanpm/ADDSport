<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8">
        <title>Admin | ADDsports</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script src="https://cdn.jsdelivr.net/npm/flowbite@2.3.0/dist/flowbite.min.js"></script>
        <link
            href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap"
            rel="stylesheet">
        <style>
            html {
                scroll-behavior: smooth;
                font-family: 'Inter', sans-serif;
            }
        </style>
    </head>
    <body
        class="bg-gradient-to-b from-indigo-50 via-blue-50 to-white text-gray-800 min-h-screen flex">

        <!-- Sidebar -->
        <aside
            class="w-64 min-h-screen hidden md:flex flex-col justify-between text-white"
    style="background-color: #483AA0;">
            <!-- Sidebar Header -->
            <div class="h-16 flex items-center px-6 border-b border-white/30">
                <a href="{{ route('dashboard') }}" class="flex items-center space-x-2">
                    <img
                        src="{{ asset('images/logo.png') }}"
                        alt="Logo"
                        class="h-10 w-10 object-contain">
                    <span class="text-lg font-bold">ADDsports</span>
                </a>
            </div>

            <!-- Sidebar Menu -->
            <nav class="flex-1 mt-6 space-y-1 text-sm font-medium">
                <a
                    href="{{ route('dashboard') }}"
                    class="flex items-center px-6 py-2 rounded transition
       {{ request()->routeIs('dashboard') ? 'bg-white text-[#483AA0]' : 'hover:bg-white hover:text-[#483AA0] text-white' }}">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewbox="0 0 20 20">
                        <path
                            d="M10.707 1.293a1 1 0 00-1.414 0L2 8.586V17a1 1 0 001 1h5v-5h4v5h5a1 1 0 001-1V8.586l-7.293-7.293z"/>
                    </svg>
                    Dashboard
                </a>

                <a
                    href="{{ route('produk.index') }}"
                    class="flex items-center px-6 py-2 rounded transition hover:bg-white hover:text-[#483AA0] text-white">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewbox="0 0 20 20">
                        <path
                            d="M2 3a1 1 0 011-1h2a1 1 0 011 1v1h10V3a1 1 0 112 0v14a1 1 0 11-2 0v-1H6v1a1 1 0 11-2 0V3zm2 3v8h12V6H4z"/>
                    </svg>
                    Produk
                </a>

                <a
                    href="{{ route('pesanan.index') }}"
                    class="flex items-center px-6 py-2 rounded transition hover:bg-white hover:text-[#483AA0] text-white">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewbox="0 0 20 20">
                        <path
                            d="M5 3a3 3 0 00-3 3v4h16V6a3 3 0 00-3-3H5zM2 13a1 1 0 011-1h14a1 1 0 011 1v2a2 2 0 01-2 2H4a2 2 0 01-2-2v-2z"/>
                    </svg>
                    Pesanan
                </a>

                <a
                    href="{{ route('pengguna.index') }}"
                    class="flex items-center px-6 py-2 rounded transition hover:bg-white hover:text-[#483AA0] text-white">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewbox="0 0 20 20">
                        <path d="M10 2a4 4 0 100 8 4 4 0 000-8zM2 16a6 6 0 1112 0H2z"/>
                    </svg>
                    Pengguna
                </a>
            </nav>

            <!-- Logout at Bottom -->
            <div class="mt-auto px-6 mb-6">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button
                        type="submit"
                        class="w-full flex items-center px-3 py-2 text-red-200 hover:bg-red-100 hover:text-red-700 rounded transition text-sm font-medium">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewbox="0 0 20 20">
                            <path
                                fill-rule="evenodd"
                                d="M3 4a1 1 0 011-1h6a1 1 0 110 2H5v10h5a1 1 0 110 2H4a1 1 0 01-1-1V4zm10.293 3.293a1 1 0 011.414 1.414L13.414 10H17a1 1 0 110 2h-3.586l1.293 1.293a1 1 0 11-1.414 1.414l-3-3a1 1 0 010-1.414l3-3z"
                                clip-rule="evenodd"/>
                        </svg>
                        Logout
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main content -->
        <div class="flex-1 flex flex-col">
            <!-- Top Navbar -->
            <header
                class="bg-white shadow px-6 py-4 flex justify-between items-center border-b border-gray-200">
                <h1 class="text-xl font-bold text-indigo-700">@yield('title', 'Admin Panel')</h1>
                <div class="text-sm text-gray-600">
                    {{ Auth::user()->name }}
                </div>
            </header>

            <!-- Page Content -->
            <main class="p-6 flex-1">
                @yield('content')
            </main>
        </div>
         @stack('scripts')

    </body>
</html>
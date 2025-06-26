<!-- filepath: resources/views/pembeli/checkout-selesai.blade.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pesanan Berhasil | ADDsports</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        html { font-family: 'Inter', sans-serif; }
        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            transition: all 0.3s ease;
        }
        .btn-primary:hover {
            background: linear-gradient(135deg, #5b68d4 0%, #693b9f 100%);
            transform: scale(1.03);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body class="bg-gradient-to-br from-slate-50 to-blue-50 min-h-screen text-gray-800">

    <nav class="bg-white/80 shadow border-b sticky top-0 z-50">
        <div class="max-w-4xl mx-auto px-6 py-4 flex justify-between items-center">
            <div class="flex items-center space-x-3">
                <div class="w-10 h-10 bg-gradient-to-r from-indigo-600 to-purple-600 rounded flex items-center justify-center">
                    <i class="fas fa-running text-white"></i>
                </div>
                <span class="text-xl font-bold bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent">ADDsports</span>
            </div>
            <a href="{{ route('pembeli.dashboard') }}" class="text-gray-600 hover:text-indigo-600 flex items-center space-x-2">
    <i class="fas fa-home"></i><span>Beranda</span>
</a>

        </div>
    </nav>

    <div class="flex flex-col items-center justify-center min-h-[80vh] px-6 text-center">
        <div class="bg-white rounded-2xl shadow p-10 max-w-lg w-full">
            <div class="text-green-500 text-4xl mb-4"><i class="fas fa-check-circle"></i></div>
            <h1 class="text-2xl font-bold text-gray-800 mb-2">Pesanan Berhasil!</h1>
            <p class="text-gray-600 mb-6">Terima kasih sudah berbelanja di <strong>ADDsports</strong>.<br>
            Pesananmu sedang kami proses dan akan segera dikirimkan ke alamatmu.</p>
            <a href="{{ route('pembeli.dashboard') }}" class="btn-primary text-white px-6 py-3 rounded-xl inline-block">
                <i class="fas fa-store mr-2"></i> Kembali ke Beranda
            </a>
        </div>
    </div>

</body>
</html>

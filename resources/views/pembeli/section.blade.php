<!-- filepath: resources/views/pembeli/checkout.blade.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Checkout | ADDsports</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        html { font-family: 'Inter', sans-serif; }
        .step-active { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); }
        .step-completed { background: linear-gradient(135deg, #10b981 0%, #059669 100%); }
        .payment-option { border: 2px solid transparent; transition: .3s; }
        .payment-option.active { border-color: #667eea; background: #f3f4f6; }
        .form-input:focus { border-color: #667eea; box-shadow: 0 0 0 2px #667eea33; }
        .checkout-button {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            transition: all 0.3s ease;
        }
        .checkout-button:hover {
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
            <a href="{{  route('pembeli.dashboard') }}" class="text-gray-600 hover:text-indigo-600 flex items-center space-x-2">
                <i class="fas fa-arrow-left"></i><span>Kembali</span>
            </a>
        </div>
    </nav>

    <div class="max-w-4xl mx-auto px-6 py-8">
        <!-- Step indicator -->
        <div class="flex items-center justify-center mb-8 space-x-6">
            <div class="w-8 h-8 step-completed text-white rounded-full flex items-center justify-center"><i class="fas fa-check"></i></div>
            <div class="w-8 h-1 bg-green-500"></div>
            <div class="w-8 h-8 step-active text-white rounded-full flex items-center justify-center">2</div>
            <div class="w-8 h-1 bg-gray-300"></div>
            <div class="w-8 h-8 bg-gray-300 text-gray-600 rounded-full flex items-center justify-center">3</div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Left Section -->
            <div class="lg:col-span-2 space-y-6">
                <div class="bg-white rounded-2xl shadow p-6">
                    <h2 class="text-xl font-bold mb-4">Alamat Pengiriman</h2>
                    <input type="text" class="form-input w-full mb-3 px-4 py-2 border rounded" placeholder="Nama Lengkap">
                    <input type="tel" class="form-input w-full mb-3 px-4 py-2 border rounded" placeholder="No. Telepon">
                    <textarea class="form-input w-full mb-3 px-4 py-2 border rounded" placeholder="Alamat Lengkap"></textarea>
                    <div class="grid grid-cols-3 gap-2 mb-3">
                        <input type="text" class="form-input px-2 py-2 border rounded" placeholder="Provinsi">
                        <input type="text" class="form-input px-2 py-2 border rounded" placeholder="Kota">
                        <input type="text" class="form-input px-2 py-2 border rounded" placeholder="Kode Pos">
                    </div>
                </div>

                <div class="bg-white rounded-2xl shadow p-6">
                    <h3 class="font-bold mb-4">Metode Pengiriman</h3>
                    <div class="space-y-2">
                        <div class="payment-option p-3 rounded cursor-pointer" onclick="selectShipping(this,0)">
                            <input type="radio" name="shipping" class="mr-2">Reguler (Gratis)
                        </div>
                        <div class="payment-option p-3 rounded cursor-pointer" onclick="selectShipping(this,25000)">
                            <input type="radio" name="shipping" class="mr-2">Express (Rp 25.000)
                        </div>
                        <div class="payment-option p-3 rounded cursor-pointer" onclick="selectShipping(this,50000)">
                            <input type="radio" name="shipping" class="mr-2">Same Day (Rp 50.000)
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-2xl shadow p-6">
                    <h3 class="font-bold mb-4">Metode Pembayaran</h3>
                    <div class="space-y-2">
                        <div class="payment-option p-3 rounded cursor-pointer" onclick="selectPayment(this)">
                            <input type="radio" name="payment" class="mr-2">Transfer Bank
                        </div>
                        <div class="payment-option p-3 rounded cursor-pointer" onclick="selectPayment(this)">
                            <input type="radio" name="payment" class="mr-2">E-Wallet
                        </div>
                        <div class="payment-option p-3 rounded cursor-pointer" onclick="selectPayment(this)">
                            <input type="radio" name="payment" class="mr-2">COD
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Section: Order Summary -->
            <div>
                <div class="bg-white rounded-2xl shadow p-6 sticky top-24">
                    <h3 class="font-bold mb-4">Ringkasan Pesanan</h3>
                    <div class="mb-4 space-y-2">
                        <div class="flex justify-between"><span>Sepatu Nike</span><span>Rp 1.299.000</span></div>
                        <div class="flex justify-between"><span>Jersey Home</span><span>Rp 299.000</span></div>
                    </div>
                    <div class="flex justify-between"><span>Subtotal</span><span>Rp 1.598.000</span></div>
                    <div class="flex justify-between"><span>Ongkir</span><span id="ongkir">Gratis</span></div>
                    <div class="flex justify-between font-bold border-t mt-2 pt-2"><span>Total</span><span id="total">Rp 1.598.000</span></div>

                    <a href="{{ route('pembeli.checkout') }}"
                       class="w-full mt-6 checkout-button text-white py-3 rounded-xl font-semibold text-center inline-block">
                        <i class="fas fa-credit-card mr-2"></i>Buat Pesanan
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script>
        let subtotal = 1598000, ongkir = 0;
        function selectShipping(el, cost) {
            document.querySelectorAll('[onclick^="selectShipping"]').forEach(e => e.classList.remove('active'));
            el.classList.add('active');
            ongkir = cost;
            document.getElementById('ongkir').textContent = cost ? 'Rp ' + cost.toLocaleString('id-ID') : 'Gratis';
            document.getElementById('total').textContent = 'Rp ' + (subtotal + cost).toLocaleString('id-ID');
        }

        function selectPayment(el) {
            document.querySelectorAll('[onclick^="selectPayment"]').forEach(e => e.classList.remove('active'));
            el.classList.add('active');
        }
    </script>

</body>
</html>

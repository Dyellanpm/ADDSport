<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Pesanan;
use App\Models\User;
use App\Models\PesananItem;   // jangan lupa import model ini
use Illuminate\Support\Facades\DB;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $totalProduk = Product::count();
        $totalPesanan = Pesanan::count();
        $totalPengguna = User::count();

        // Query penjualan bulanan berdasarkan qty di pesanan_items, tahun ini
        $monthlySalesRaw = PesananItem::select(
                DB::raw('MONTH(created_at) as month'),
                DB::raw('SUM(qty) as total_qty')
            )
            ->whereYear('created_at', date('Y'))
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        // Map hasil query ke array bulan => qty, supaya semua bulan tampil
        $months = [
            1 => 'Januari',
            2 => 'Februari',
            3 => 'Maret',
            4 => 'April',
            5 => 'Mei',
            6 => 'Juni',
            7 => 'Juli',
            8 => 'Agustus',
            9 => 'September',
            10 => 'Oktober',
            11 => 'November',
            12 => 'Desember',
        ];

        $monthlySales = [];
        foreach ($months as $num => $name) {
            $data = $monthlySalesRaw->firstWhere('month', $num);
            $monthlySales[strtolower($name)] = $data ? (int) $data->total_qty : 0;
        }

       return view('admin.dashboard', [
        'totalProduk' => $totalProduk,
        'totalPesanan' => $totalPesanan,
        'totalPengguna' => $totalPengguna,
        'salesByMonth' => $monthlySales,
    ]);

    }
}

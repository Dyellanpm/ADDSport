@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('content')
  <!-- SECTION: Cards -->
  <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10 mt-10">
    <div class="rounded-2xl shadow-lg p-6 text-white bg-gradient-to-br from-indigo-500 to-indigo-700">
      <h2 class="text-lg font-semibold">Total Produk</h2>
      <p class="text-3xl font-bold mt-2">120</p>
    </div>
    <div class="rounded-2xl shadow-lg p-6 text-white bg-gradient-to-br from-emerald-500 to-emerald-700">
      <h2 class="text-lg font-semibold">Total Pesanan</h2>
      <p class="text-3xl font-bold mt-2">87</p>
    </div>
    <div class="rounded-2xl shadow-lg p-6 text-white bg-gradient-to-br from-rose-500 to-rose-700">
      <h2 class="text-lg font-semibold">Total Pengguna</h2>
      <p class="text-3xl font-bold mt-2">52</p>
    </div>
  </div>

  <!-- SECTION: Chart -->
  <div class="bg-white rounded-2xl shadow-md p-6 border border-gray-200">
    <h3 class="text-xl font-semibold text-indigo-700 mb-4">Statistik Penjualan Bulanan</h3>
    <canvas id="salesChart" height="120"></canvas>
  </div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  const ctx = document.getElementById('salesChart').getContext('2d');
  const salesChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep'],
      datasets: [{
        label: 'Penjualan',
        data: [12, 19, 14, 23, 18, 25, 21, 29, 32],
        borderColor: '#6366F1',
        backgroundColor: 'rgba(99, 102, 241, 0.2)',
        borderWidth: 2,
        tension: 0.4,
        fill: true,
        pointRadius: 5,
        pointHoverRadius: 7
      }]
    },
    options: {
      responsive: true,
      scales: {
        y: {
          beginAtZero: true,
          ticks: {
            color: '#6B7280'
          }
        },
        x: {
          ticks: {
            color: '#6B7280'
          }
        }
      },
      plugins: {
        legend: {
          labels: {
            color: '#374151'
          }
        }
      }
    }
  });
</script>
@endpush

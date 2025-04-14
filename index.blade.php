@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Dashboard Analitik</h2>
    <canvas id="chartBarang"></canvas>

    <h4>Barang dengan Stok Minimum</h4>
    <ul>
        @foreach($stokMinimum as $barang)
            <li>{{ $barang->nama }} - Stok: {{ $barang->stok }}</li>
        @endforeach
    </ul>

    <h4>Kategori Barang Terlaris</h4>
    <ul>
        @foreach($kategoriTerlaris as $kategori)
            <li>{{ $kategori->kategori->nama }} - Terjual: {{ $kategori->total }}</li>
        @endforeach
    </ul>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var ctx = document.getElementById('chartBarang').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: @json(array_keys($barangMasuk->toArray())),
            datasets: [{
                label: 'Barang Masuk',
                data: @json(array_values($barangMasuk->toArray())),
                borderColor: 'green',
                fill: false
            }, {
                label: 'Barang Keluar',
                data: @json(array_values($barangKeluar->toArray())),
                borderColor: 'red',
                fill: false
            }]
        }
    });
</script>
@endsection

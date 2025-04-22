<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Barang Keluar</title>
    <style>
        body {
            font-family: sans-serif;
            font-size: 12px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        table th, table td {
            border: 1px solid #000;
            padding: 6px;
            text-align: left;
        }

        table th {
            background-color: #eee;
        }

        .info {
            margin-bottom: 15px;
        }

        .info p {
            margin: 0;
        }
    </style>
</head>
<body>
    <h2>Laporan Barang Keluar</h2>

    <div class="info">
        @if(request('tanggal_mulai') && request('tanggal_selesai'))
            <p><strong>Periode:</strong> {{ request('tanggal_mulai') }} s/d {{ request('tanggal_selesai') }}</p>
        @endif
        <p><strong>Dicetak pada:</strong> {{ \Carbon\Carbon::now()->format('d-m-Y H:i') }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Kategori</th>
                <th>Kode</th>
                <th>Nama</th>
                <th>Tanggal Keluar</th>
                <th>Jumlah</th>
                <th>Alasan Pengeluaran</th>
                <th>Tujuan Pemakaian</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($barangKeluar as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->kategori->nama }}</td>
                <td>{{ $item->kode_barang }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->tanggal_keluar }}</td>
                <td>{{ $item->jumlah }}</td>
                <td>{{ $item->alasan_pengeluaran }}</td>
                <td>{{ $item->tujuan_pemakaian }}</td>
                <td>{{ ucfirst($item->status) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>

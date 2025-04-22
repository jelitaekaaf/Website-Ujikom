<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Barang Masuk</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f9f4; /* Warna hijau kalem */
            color: #2c6b2f; /* Warna teks hijau */
            padding: 20px;
        }
        h1 {
            color: #4caf50; /* Warna hijau kalem untuk heading */
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #4caf50; /* Border hijau kalem */
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #d9f7d9; /* Background hijau muda untuk header */
        }
        .footer {
            margin-top: 30px;
            text-align: center;
            font-size: 12px;
            color: #4caf50;
        }
    </style>
</head>
<body>

    <h1>Laporan Barang Masuk</h1>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Kode Barang</th>
                <th>Kategori</th>
                <th>Pemasok</th>
                <th>Jumlah</th>
                <th>Harga Beli</th>
                <th>Tanggal Masuk</th>
            </tr>
        </thead>
        <tbody>
            @foreach($barangMasuk as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->kode_barang }}</td>
                    <td>{{ $item->kategori->nama }}</td>
                    <td>{{ $item->pemasok }}</td>
                    <td>{{ $item->jumlah }}</td>
                    <td>{{ $item->harga_beli }}</td>
                    <td>{{ $item->tanggal_masuk }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="footer">
        <p>Generated on {{ now()->format('d M Y') }}</p>
    </div>

</body>
</html>

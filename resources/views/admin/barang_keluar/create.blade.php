@extends('layouts.backend')

@section('content')
    <div class="content-page">
        <div class="content">
            <h4 class="fw-bold py-3 mb-4">
                <span class="text-muted fw-light">Tabel /</span> Manajemen Stok
            </h4>
            <div class="row">
                <div class="col-13">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Barang Keluar</h5>
                        </div><!-- end card header -->
                        <div class="card-body">
                            <form action="{{ route('barang_keluar.store') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="kategori" class="form-label">Nama Kategori</label>
                                    <select id="kategori" name="id_kategori" class="form-control">
                                        <option value="">Pilih Kategori</option>
                                        @foreach($kategori as $k)
                                            <option value="{{ $k->id }}">{{ $k->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="kode_barang" class="form-label">Kode Barang</label>
                                    <input type="text" id="kode_barang" class="form-control" placeholder="Kode Barang" name="kode_barang" readonly>
                                </div>

                                <div class="mb-3">
                                    <label>Nama Barang</label>
                                    <input type="text" name="nama" class="form-control" required>
                                </div>

                                <div class="mb-3">
                                    <label>Jumlah</label>
                                    <input type="number" name="jumlah" class="form-control" required>
                                </div>

                                <!-- Dropdown Alasan Pengeluaran -->
                                <div class="mb-3">
                                    <label for="alasan_pengeluaran">Alasan Pengeluaran</label>
                                    <select class="form-control" name="alasan_pengeluaran" id="alasan_pengeluaran" required>
                                        <option selected disabled>Pilih Alasan</option>
                                        <option value="Kebutuhan Sendiri">Kebutuhan Sendiri</option>
                                        <option value="Barang Rusak">Barang Rusak</option>
                                        <option value="Barang di Ganti">Barang di Ganti</option>
                                    </select>
                                </div>

                                <!-- Dropdown Tujuan Pemakaian -->
                                <div class="mb-3">
                                    <label for="tujuan_pemakaian">Tujuan Pemakaian</label>
                                    <select class="form-control" name="tujuan_pemakaian" id="tujuan_pemakaian" required>
                                        <option selected disabled>Pilih Tujuan</option>
                                        <option value="Untuk Karyawan">Untuk Karyawan</option>
                                        <option value="Untuk Teman">Untuk Teman</option>
                                        <option value="Untuk Keperluan Lain">Untuk Keperluan Lain</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="status" class="form-label">Status</label>
                                    <select class="form-select" name="status" id="status">
                                        <option selected disabled>Pilih Status</option>
                                        <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="disetujui" {{ old('status') == 'disetujui' ? 'selected' : '' }}>Disetujui</option>
                                        <option value="ditolak" {{ old('status') == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                                    </select>
                                </div>


                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="{{ route('barang_keluar.index') }}" class="btn btn-secondary">Batal</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Mengisi kode barang otomatis berdasarkan kategori
            $('#kategori').change(function() {
                let kategoriId = $(this).val();
                if (kategoriId) {
                    $.ajax({
                        url: '/generate-kode/' + kategoriId,
                        type: 'GET',
                        success: function(response) {
                            $('#kode_barang').val(response.kode_barang);
                        }
                    });
                } else {
                    $('#kode_barang').val('');
                }
            });
        });
    </script>
@endsection

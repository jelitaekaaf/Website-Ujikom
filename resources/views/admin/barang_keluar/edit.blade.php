@extends('layouts.backend')
@section('content')
    <div class="content-page">
        <div class="content">
            <h4 class="fw-bold py-3 mb-4">
                <span class="text-muted fw-light">Tabel /</span> Edit Manajemen Stok
            </h4>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Barang Keluar</h5>
                        </div><!-- end card header -->
                        <div class="card-body">
                            <form action="{{ route('barang_keluar.update', $barangKeluar->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="mb-3">
                                    <label for="kategori" class="form-label">Nama Kategori</label>
                                    <select id="kategori" name="id_kategori" class="form-control">
                                        <option value="">Pilih Kategori</option>
                                        @foreach($kategori as $k)
                                            <option value="{{ $k->id }}" data-kode="{{ $k->kode }}"
                                                {{ old('id_kategori', $barangKeluar->id_kategori) == $k->id ? 'selected' : '' }}>
                                                {{ $k->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                {{-- Kode Barang (Otomatis) --}}
                                <div class="mb-3">
                                    <label for="kode_barang" class="form-label">Kode Barang</label>
                                    <input type="text" id="kode_barang" class="form-control"
                                        placeholder="Kode Barang" name="kode_barang"
                                        value="{{ old('kode_barang', $barangKeluar->kode_barang) }}" readonly>
                                </div>

                                <div class="mb-3">
                                    <label>Nama Barang</label>
                                    <input type="text" name="nama" class="form-control" value="{{ old('nama', $barangKeluar->nama) }}" required>
                                </div>

                                <div class="mb-3">
                                    <label>Jumlah</label>
                                    <input type="number" name="jumlah" class="form-control" value="{{ old('nama', $barangKeluar->jumlah) }}" required>
                                </div>

                                <!-- Dropdown Alasan Pengeluaran -->
                                <div class="mb-3">
                                    <label for="alasan_pengeluaran">Alasan Pengeluaran</label>
                                    <select class="form-control" name="alasan_pengeluaran" id="alasan_pengeluaran" required>
                                            <option selected disabled>Pilih Alasan</option>
                                            <option value="Kebutuhan Sendiri" {{ old('alasan_pengeluaran', $barangKeluar->alasan_pengeluaran) == 'Kebutuhan Sendiri' ? 'selected' : '' }}>Kebutuhan Sendiri</option>
                                            <option value="Barang Rusak" {{ old('alasan_pengeluaran', $barangKeluar->alasan_pengeluaran) == 'Barang Rusak' ? 'selected' : '' }}>Barang Rusak</option>
                                            <option value="Barang di Ganti" {{ old('alasan_pengeluaran', $barangKeluar->alasan_pengeluaran) == 'Barang di Ganti' ? 'selected' : '' }}>Barang di Ganti</option>
                                        </select>

                                    </select>
                                </div>

                                <!-- Dropdown Tujuan Pemakaian -->
                                <div class="mb-3">
                                    <label for="tujuan_pemakaian">Tujuan Pemakaian</label>
                                        <select class="form-control" name="tujuan_pemakaian" id="tujuan_pemakaian" required>
                                            <option selected disabled>Pilih Tujuan</option>
                                            <option value="Untuk Karyawan" {{ old('tujuan_pemakaian', $barangKeluar->tujuan_pemakaian) == 'Untuk Karyawan' ? 'selected' : '' }}>Untuk Karyawan</option>
                                            <option value="Untuk Teman" {{ old('tujuan_pemakaian', $barangKeluar->tujuan_pemakaian) == 'Untuk Teman' ? 'selected' : '' }}>Untuk Teman</option>
                                            <option value="Untuk Keperluan Lain" {{ old('tujuan_pemakaian', $barangKeluar->tujuan_pemakaian) == 'Untuk Keperluan Lain' ? 'selected' : '' }}>Untuk Keperluan Lain</option>
                                        </select>

                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="status" class="form-label">Status</label>
                                    <select class="form-select" name="status">
                                        <option value="pending" {{ old('status', $barangKeluar->status) == 'pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="disetujui" {{ old('status', $barangKeluar->status) == 'disetujui' ? 'selected' : '' }}>Disetujui</option>
                                        <option value="ditolak" {{ old('status', $barangKeluar->status) == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
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

        <script>    // Mengatur kode barang berdasarkan kategori yang dipilih
    document.getElementById('kategori').addEventListener('change', function() {
        let selectedOption = this.options[this.selectedIndex];
        document.getElementById('kode_barang').value = selectedOption.getAttribute('data-kode');
    });
</script>

@endsection

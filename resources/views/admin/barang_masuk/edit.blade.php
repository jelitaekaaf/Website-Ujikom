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
                            <h5 class="card-title mb-0">Barang Masuk</h5>
                        </div><!-- end card header -->
                        <div class="card-body">
                            <form action="{{ route('barang_masuk.update', $barangMasuk->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                {{-- Nama Kategori --}}
                                <div class="mb-3">
                                    <label for="kategori" class="form-label">Nama Kategori</label>
                                    <select id="kategori" name="id_kategori" class="form-control">
                                        <option value="">Pilih Kategori</option>
                                        @foreach($kategori as $k)
                                            <option value="{{ $k->id }}" data-kode="{{ $k->kode }}"
                                                {{ old('id_kategori', $barangMasuk->id_kategori) == $k->id ? 'selected' : '' }}>
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
                                        value="{{ old('kode_barang', $barangMasuk->kode_barang) }}" readonly>
                                </div>

                                {{-- Nama --}}
                                <div class="mb-3">
                                    <label>Nama</label>
                                    <input type="text" name="nama" class="form-control" value="{{ old('nama', $barangMasuk->nama) }}" required>
                                </div>

                                {{-- Pemasok --}}
                                <div class="mb-3">
                                    <label>Pemasok</label>
                                    <input type="text" name="pemasok" class="form-control" value="{{ old('pemasok', $barangMasuk->pemasok) }}" required>
                                </div>

                                {{-- Jumlah --}}
                                <div class="mb-3">
                                    <label>Jumlah</label>
                                    <input type="number" name="jumlah" class="form-control" value="{{ old('jumlah', $barangMasuk->jumlah) }}" required>
                                </div>

                                {{-- Harga Beli --}}
                                <div class="mb-3">
                                    <label>Harga Beli</label>
                                    <input type="number" name="harga_beli" class="form-control" value="{{ old('harga_beli', $barangMasuk->harga_beli) }}" required>
                                </div>

                                {{-- Tanggal Masuk --}}
                                <div class="mb-3">
                                    <label>Tanggal Masuk</label>
                                    <input type="date" name="tanggal_masuk" class="form-control" value="{{ old('tanggal_masuk', $barangMasuk->tanggal_masuk) }}" required>
                                </div>

                                {{-- Faktur (Upload File) --}}
                                <div class="mb-3">
                                    <label for="faktur">Faktur</label>
                                    <input type="file" name="faktur" class="form-control @error('faktur') is-invalid @enderror">
                                    @error('faktur')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    @if($barangMasuk->faktur)
                                        <p>Faktur Saat Ini: <a href="{{ asset($barangMasuk->faktur) }}" target="_blank">Lihat Faktur</a></p>
                                    @endif
                                </div>

                                {{-- Status --}}
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Status</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="status">
                                            <option disabled>Pilih Status</option>
                                            <option value="pending" {{ old('status', $barangMasuk->status) == 'pending' ? 'selected' : '' }}>Pending</option>
                                            <option value="disetujui" {{ old('status', $barangMasuk->status) == 'disetujui' ? 'selected' : '' }}>Disetujui</option>
                                            <option value="ditolak" {{ old('status', $barangMasuk->status) == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                                        </select>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                <a href="{{ route('barang_masuk.index') }}" class="btn btn-secondary">Batal</a>
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

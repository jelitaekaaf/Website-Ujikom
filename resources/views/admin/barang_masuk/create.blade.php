

@extends('layouts.backend')

@section('content')
    <div class="d-flex justify-content-center align-items-center" style="min-height: 110vh;">
        <div class="card shadow-lg" style="width: 1010px;" >
            <div class="card-header text-center">
                <h4 class="card-title mb-0">Form Barang Masuk</h4>
            </div>
            <div class="card-body p-4">
                <form action="{{ route('barang_masuk.store') }}" method="POST" enctype="multipart/form-data">
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
                        <input type="text" id="kode_barang" name="kode_barang" class="form-control" readonly>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label>Nama</label>
                            <input type="text" name="nama" class="form-control" required>
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <label>Pemasok</label>
                            <input type="text" name="pemasok" class="form-control" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label>Jumlah</label>
                            <input type="number" name="jumlah" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Tanggal Masuk</label>
                            <input type="date" name="tanggal_masuk" class="form-control" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label>Harga Beli</label>
                        <input type="number" name="harga_beli" class="form-control" required>
                    </div>
                    {{-- <div class="mb-3">
                        <label>Faktur</label>
                        <input type="file" name="faktur" class="form-control @error('faktur') is-invalid @enderror">
                        @error('faktur')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div> --}}
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-select" name="status">
                            <option selected disabled>Pilih Status</option>
                            <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="disetujui" {{ old('status') == 'disetujui' ? 'selected' : '' }}>Disetujui</option>
                            <option value="ditolak" {{ old('status') == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                        </select>
                    </div>
                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('barang_masuk.index') }}" class="btn btn-secondary">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
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

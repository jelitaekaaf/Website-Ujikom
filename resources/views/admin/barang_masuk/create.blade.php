
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
                            <h5 class="card-title mb-0">Barang Masuk</h5>
                        </div><!-- end card header -->
                        <div class="card-body">
                            <form action="{{ route('barang_masuk.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="simpleinput" class="form-label">Nama Kategori</label>
                                    <select id="kategori" name="id_kategori" class="form-control">
                                        <option value="">Pilih Kategori</option>
                                        @foreach($kategori as $k)
                                            <option value="{{ $k->id }}">{{ $k->nama }}</option>
                                        @endforeach
                                    </select>

                                    {{-- <input type="text" id="kode_barang" name="kode_barang" class="form-control" readonly> --}}

                                </div>

                                <div class="mb-3">
                                    <label for="kode_barang" class="form-label">Kode Barang</label>
                                    <input type="text" id="kode_barang" class="form-control"
                                        placeholder="Kode Barang" name="kode_barang" readonly>
                                </div>
                                <div class="mb-3">
                                    <label>Nama</label>
                                    <input type="text" name="nama" class="form-control"  required>
                                </div>
                                <div class="mb-3">
                                    <label>Pemasok</label>
                                    <input type="text" name="pemasok" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label>Jumlah</label>
                                    <input type="number" name="jumlah" class="form-control"  required>
                                </div>
                                <div class="mb-3">
                                    <label>Harga Beli</label>
                                    <input type="number" name="harga_beli" class="form-control"  required>
                                </div>
                                <div class="mb-3">
                                    <label>Tanggal Masuk</label>
                                    <input type="date" name="tanggal_masuk" class="form-control" required>
                                </div>
                                {{-- <div class="mb-3">
                                    <label>Faktur</label>
                                    <input type="file" name="faktur" class="form-control" required>
                                </div> --}}

                                <div class="mb-3">
                                    <label for="">Faktur</label>
                                    <input type="file" name="faktur" class="form-control @error('faktur') is-invalid @enderror">
                                    @error('faktur')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-default-fullname">Status</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="status">
                                            <option selected disabled>Pilih Status</option>
                                            <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                                            <option value="disetujui" {{ old('status') == 'disetujui' ? 'selected' : '' }}>Disetujui</option>
                                            <option value="ditolak" {{ old('status') == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                                        </select>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="{{ route('barang_masuk.index') }}" class="btn btn-secondary">Batal</a>
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



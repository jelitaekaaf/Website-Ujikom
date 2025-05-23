@extends('layouts.backend')
@section('content')
    <div class="content-page">
        <div class="content">
            <h4 class="fw-bold py-3 mb-4">
                <span class="text-muted fw-light">Tabel /</span> Edit Pembelian
            </h4>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Pembelian</h5>
                        </div><!-- end card header -->
                        <div class="card-body">
                            <form action="{{ route('pembelian.update', $pembelian->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="example-palaceholder" class="form-label">Nama Perusahaan</label>
                                    <input type="text" id="example-palaceholder" class="form-control"
                                        placeholder="Nama Perusahaan" name="nama_perusahaan">
                                </div>
                                <div class="mb-3">
                                    <label for="example-palaceholder" class="form-label">Nama Barang</label>
                                    <input type="text" id="example-palaceholder" class="form-control"
                                        placeholder="Nama Barang" name="nama">
                                </div>
                                <div class="mb-3">
                                    <label for="example-palaceholder" class="form-label">Jumlah</label>
                                    <input type="text" id="example-palaceholder" class="form-control"
                                        placeholder="Jumlah" name="jumlah">
                                </div>
                                <div class="mb-3">
                                    <label for="example-palaceholder" class="form-label">Tanggal Beli</label>
                                    <input type="date" id="example-palaceholder" class="form-control"
                                        placeholder="Tanggal" name="tanggal">
                                </div>
                                <div class="mb-3">
                                    <label for="example-palaceholder" class="form-label">Alamat</label>
                                    <input type="text" id="example-palaceholder" class="form-control"
                                        placeholder="Alamat" name="alamat">
                                </div>
                                <div class="row-content-end">
                                    <div class="col-sm-10">
                                        <a href="{{ route('kategori.index') }} " class="btn btn-primary">Cancel</a>
                                        <button type="submit" class="btn btn-primary">Edit</button>
                                    </div>
                                </div>
                            </form>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


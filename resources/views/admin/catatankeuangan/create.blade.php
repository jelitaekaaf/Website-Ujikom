@extends('layouts.backend')
@section('content')
    <div class="content-page">
        <div class="content">
            <h4 class="fw-bold py-3 mb-4">
                <span class="text-muted fw-light">Tabel /</span> Tambah Catatan Keuangan
            </h4>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Catatan Keuangan</h5>
                        </div><!-- end card header -->
                        <div class="card-body">
                            <form action="{{ route('catatankeuangan.store') }}" method="POST">
                                @csrf
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-default-fullname">Jenis</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="jenis">
                                                <option selected disabled >Pilih...</option>
                                                <option value="Barang Masuk">Per Minggu</option>
                                                <option value="Barang Keluar">Per Bulan</option>
                                                <option value="Barang Keluar">Per Tahun</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="example-palaceholder" class="form-label">Jumlah</label>
                                    <input type="text" id="example-palaceholder" class="form-control"
                                        placeholder="Jumlah" name="jumlah">
                                </div>
                                <div class="mb-3">
                                    <label for="example-palaceholder" class="form-label">Keterangan</label>
                                    <input type="text" id="example-palaceholder" class="form-control"
                                        placeholder="Keterangan" name="keterangan">
                                </div>
                                <div class="mb-3">
                                    <label for="example-palaceholder" class="form-label">Tanggal </label>
                                    <input type="date" id="example-palaceholder" class="form-control"
                                        placeholder="Tanggal" name="tanggal">
                                </div>
                                <div class="row-content-end">
                                    <div class="col-sm-10">
                                        <a href="{{ route('catatankeuangan.index') }} " class="btn btn-primary">Cancel</a>
                                        <button type="submit" class="btn btn-primary">Save</button>
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

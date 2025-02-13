@extends('layouts.backend')
@section('content')
    <div class="content-page">
        <div class="content">
            <h4 class="fw-bold py-3 mb-4">
                <span class="text-muted fw-light">Tabel /</span> Tambah Transaksi
            </h4>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Transaksi</h5>
                        </div><!-- end card header -->
                        <div class="card-body">
                            <form action="{{ route('transaksi.store') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="example-palaceholder" class="form-label">Tanggal Transaksi</label>
                                    <input type="date" id="example-palaceholder" class="form-control"
                                        placeholder="Masukan Tanggal Transaksi" name="tanggal">
                                </div>
                                <div class="mb-3">
                                    <label for="example-palaceholder" class="form-label">Jenis Transaksi</label>
                                    <input type="text" id="example-palaceholder" class="form-control"
                                        placeholder="Masukan Jenis Transaksi" name="jenis">
                                </div>
                                <div class="mb-3">
                                    <label for="example-palaceholder" class="form-label">Total</label>
                                    <input type="text" id="example-palaceholder" class="form-control"
                                        placeholder="Total" name="total">
                                </div>
                                <div class="row-content-end">
                                    <div class="col-sm-10">
                                        <a href="{{ route('transaksi.index') }} " class="btn btn-primary">Cancel</a>
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

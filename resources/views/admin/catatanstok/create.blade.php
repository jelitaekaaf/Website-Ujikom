@extends('layouts.backend')

@section('content')


    <div class="content-page">
        <div class="content">
            <h4 class="fw-bold py-3 mb-4">
                <span class="text-muted fw-light">Tabel /</span> Tambah Catatan Stok
            </h4>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Catatan Stok</h5>
                        </div><!-- end card header -->
                                <div class="card-body">
                                    <form action="{{ route('catatanstok.store') }}" method="POST">
                                        @csrf
                                        <div class="row mb-3">
                                            <label class="col-sm-2 col-form-label" for="basic-default-fullname">Nama Barang</label>
                                            <div class="col-sm-10">
                                                {{-- <input type="text" class="form-control" id="basic-default-name" placeholder="Nama Barang"
                                                    name="nama_barang" /> --}}
                                                <select name="id_barang" class="form-control">
                                                    <option selected disabled>Pilih Barang</option>
                                                    @foreach ($barang as $item)
                                                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                                    @endforeach
                                                </select>

                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label class="col-sm-2 col-form-label" for="basic-default-fullname">Jumlah</label>
                                            <div class="col-sm-10">
                                                <input type="number" class="form-control" id="basic-default-name" placeholder="Jumlah"
                                                    name="jumlah" />
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label class="col-sm-2 col-form-label" for="basic-default-fullname">Tanggal</label>
                                            <div class="col-sm-10">
                                                <input type="date" class="form-control" id="basic-default-name" placeholder="Tanggal"
                                                    name="tanggal" />
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label class="col-sm-2 col-form-label" for="basic-default-fullname">Keterangan</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="basic-default-name" placeholder="Keterangan"
                                                    name="keterangan" />
                                            </div>
                                        </div>
                                        <div class="row-content-end">
                                            <div class="col-sm-10">
                                                <a href="{{ route('catatanstok.index') }} " class="btn btn-danger">Cancel</a>
                                                <button type="submit" class="btn btn-primary">Submit</button>
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

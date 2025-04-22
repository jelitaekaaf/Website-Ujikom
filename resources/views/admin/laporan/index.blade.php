@extends('layouts.backend')

@section('styles')
    <link href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <link rel="shortcut icon" href="assets/images/favicon.ico">
    <link href="assets/libs/simple-datatables/style.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-style" />
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')
{{-- laporan barang MASUK --}}
<div class="content-page">
    <div class="content">
        <div class="container-fluid">
            <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                <div class="flex-grow-1">
                    <h4 class="fs-18 fw-semibold m-0">Laporan Barang Masuk</h4>
                </div>
                {{-- <div class="text-end">
                    <ol class="breadcrumb m-0 py-0">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Tabel</a></li>
                        <li class="breadcrumb-item active">Barang Masuk</li>
                    </ol>
                </div> --}}
            </div>

            <div class="py-3">
                {{-- FILTER TANGGAL --}}
                <form action="{{ route('laporan.index') }}" method="GET" class="row g-3 align-items-end mb-4">
                    <div class="col-md-3">
                        <label for="tanggal_mulai" class="form-label">Tanggal Mulai</label>
                        <input type="date" name="tanggal_mulai" id="tanggal_mulai" class="form-control"
                            value="{{ request('tanggal_mulai') }}">
                    </div>
                    <div class="col-md-3">
                        <label for="tanggal_selesai" class="form-label">Tanggal Selesai</label>
                        <input type="date" name="tanggal_selesai" id="tanggal_selesai" class="form-control"
                            value="{{ request('tanggal_selesai') }}">
                    </div>
                    <div class="col-md-3 d-flex align-items-end">
                        <button type="submit" class="btn btn-primary me-2 w-100">Filter</button>
                    </div>
                    <div class="col-md-3 d-flex align-items-end">
                        <a href="{{ route('laporan.index') }}" class="btn btn-secondary w-100">Reset</a>
                    </div>
                </form>

                {{-- TABEL --}}
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">Data Barang Masuk</h5>
                        <a href="{{ route('laporan.export.pdf', ['tanggal_mulai' => request('tanggal_mulai'), 'tanggal_selesai' => request('tanggal_selesai')]) }}"
                            class="btn btn-danger mt-3">
                             {{-- <i class="bi bi-printer"></i> Export Laporan (PDF) --}}
                             <span class="mdi mdi-printer">Export Laporan (PDF)</span>
                             
                         </a>



                    </div>
                    <div class="card-body mt-0">
                        <div class="table-responsive table-card mt-0">
                            <table class="table table-striped table-bordered dt-responsive nowrap" id="example">
                                <thead class="text-muted table-primary">
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>


@endpush
@push('scripts')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>

    {{-- Bootstrap JS dan Popper --}}
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>

@endpush


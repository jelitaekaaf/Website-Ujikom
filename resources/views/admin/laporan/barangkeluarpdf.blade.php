@extends('layouts.backend')

@section('content')
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Data Barang Keluar</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc."/>
        <meta name="author" content="Zoyothemes"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <link href="assets/libs/simple-datatables/style.css" rel="stylesheet" type="text/css" />

        <!-- App css -->
        <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-style" />

        <!-- Icons -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">


        <meta name="csrf-token" content="{{ csrf_token() }}">
        <style>
            /* CSS agar hanya tabel yang dicetak */
            @media print {
                body * {
                    /* visibility: hidden; */
                }
                #print-area, #print-area * {
                    visibility: visible;
                }
                #print-area {
                    position: absolute;
                    left: 0;
                    top: 0;
                    width: 100%;
                }
            }
        </style>
    </head>

    <body data-menu-color="light" data-sidebar="default">

        <!-- Begin page -->
        <div id="app-layout">
            <div class="content-page">
                <div class="content">
                    <div class="container-fluid">
                        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                            <div class="flex-grow-1">
                                <h4 class="fs-18 fw-semibold m-0">Laporan </h4>
                            </div>
                            <div class="text-end">
                                <ol class="breadcrumb m-0 py-0">
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Laporan</a></li>
                                    <li class="breadcrumb-item active"> Barang Keluar</li>
                                </ol>
                            </div>
                        </div>
                        <div class="py-3">
                            <div class="d-flex justify-content-between flex-wrap align-items-end">
                                <div></div>
                                <div class="dropdown mt-sm-0">
                                    <button class="btn btn-outline-primary dropdown-toggle" type="button" onclick="toggleExportDropdown()">
                                        Export Laporan Catatan Stok
                                    </button>
                                    <div id="exportDropdown" class="dropdown-menu show-on-click"
                                        style="display: none; position: absolute; z-index: 10;">
                                        {{-- <a class="dropdown-item" href="{{ route('lapcatatanstok.pdf', request()->only('tanggal_mulai', 'tanggal_selesai')) }}">Export ke PDF</a> --}}
                                        <a class="dropdown-item" href="#">Export ke Excel</a>
                                    </div>
                                </div>
                            </div>

                            <form action="{{ route('catatanstok.index') }}" method="GET" class="row g-3 align-items-end mb-4">
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
                                    <a href="{{ route('catatanstok.index') }}" class="btn btn-secondary w-100">Reset</a>
                                </div>
                            </form>

                            {{-- Data Table --}}
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card overflow-hidden mb-0">
                                    <div class="card-header">
                                        <div class="d-flex align-items-center">
                                            <h5 class="card-title mb-0">Barang Masuk</h5>
                                            <a href="{{ route('catatanstok.create') }}" class="btn btn-outline-primary ms-auto">+ Tambah Data</a>
                                        </div>
                                        <div class="card-body mt-0">
                                            <div class="table-responsive table-card mt-0">
                                            {{-- <table class="table table-borderless table-centered align-middle table-nowrap mb-0"> --}}
                                               <table class="table table-striped table-bordered dt-responsive nowrap">
                                                <thead class="text-muted table-primary">
                                                    <tr>

                                                        <th scope="col" class="cursor-pointer">No</th>
                                                        <th scope="col" class="cursor-pointer">Kode</th>
                                                        <th scope="col" class="cursor-pointer">Nama</th>
                                                        <th scope="col" class="cursor-pointer">Tanggal Keluar</th>
                                                        <th scope="col" class="cursor-pointer">Jumlah</th>
                                                        <th scope="col" class="cursor-pointer">Alasan Pengeluaran</th>
                                                        <th scope="col" class="cursor-pointer">Tujuan Pemakaian</th>
                                                        {{-- <th scope="col" class="cursor-pointer">Aksi</th>
                                                        <th scope="col" class="cursor-pointer">Status</th> --}}
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($barangKeluar as $item)
                                                    <tr>
                                                        <td><span class="d-inline-block align-middle mb-0 text-body">{{ $loop->index + 1 }}</td>
                                                        <td><span class="d-inline-block align-middle mb-0 text-body">{{ $item->kode_barang }}</td>
                                                        <td><span class="d-inline-block align-middle mb-0 text-body">{{ $item->nama }}</td>
                                                        <td><span class="d-inline-block align-middle mb-0 text-body">{{ $item->tanggal_keluar }}</td>
                                                        <td><span class="d-inline-block align-middle mb-0 text-body">{{ $item->jumlah }}</td>
                                                        <td><span class="d-inline-block align-middle mb-0 text-body">{{ $item->alasan_pengeluaran }}</td>
                                                        <td><span class="d-inline-block align-middle mb-0 text-body">{{ $item->tujuan_pemakaian }}</td>



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
                @include('layouts.backend.footer')
            </div>
        </div>

        <!-- JS untuk Print -->
        <script>
            function printTable() {
                window.print();
            }
        </script>

        <!-- Vendor -->
        <script src="assets/libs/jquery/jquery.min.js"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>
        <script src="assets/libs/waypoints/lib/jquery.waypoints.min.js"></script>
        <script src="assets/libs/jquery.counterup/jquery.counterup.min.js"></script>
        <script src="assets/libs/feather-icons/feather.min.js"></script>

        <!-- Simple Datatables JS -->
        <script src="assets/libs/simple-datatables/umd/simple-datatables.js"></script>

        <!-- Simple Datatables Init JS -->
        <script src="assets/js/pages/simple-datatables.init.js"></script>

        <!-- App js-->
        <script src="assets/js/app.js"></script>

        {{-- Sweet Alert --}}
        <script>
            @if(session('success'))
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: "{{ session('success') }}",
                    showConfirmButton: false,
                    timer: 2000
                });
            @endif

            @if(session('error'))
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal!',
                    text: "{{ session('error') }}",
                    showConfirmButton: false,
                    timer: 2000
                });
            @endif
        </script>

        {{-- Konfirmasi/Validasi SweetAlert Hapus --}}
        <script>
            function hapusData(id, event) {
                event.preventDefault(); // Mencegah submit form langsung

                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: "Data yang dihapus tidak bisa dikembalikan!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById(`form-hapus-${id}`).submit();
                    }
                });
            }
        </script>

        {{-- Konfirmasi/Validasi SweetAlert Tolak --}}
        <script>
          function ubahStatus(id, status, event) {
                    event.preventDefault(); // Pastikan form tidak terkirim otomatis

                    if (status === "Ditolak") {
                        Swal.fire({
                            title: 'Apakah Anda yakin ingin menolak barang ini?',
                            text: "Barang yang ditolak tidak dapat diproses!",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#d33',
                            cancelButtonColor: '#3085d6',
                            confirmButtonText: 'Ya, Tolak!',
                            cancelButtonText: 'Batal'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                kirimStatus(id, status);
                            }
                        });
                    } else {
                        kirimStatus(id, status);
                    }
                }

            function kirimStatus(id, status) {
                $.ajax({
                    url: `/barang_keluar/${id}/status`,
                    type: 'PUT',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: { status: status },
                    success: function(response) {
                        Swal.fire('Berhasil!', response.message, 'success');
                        setTimeout(() => location.reload(), 1500);
                    },
                    error: function(xhr) {
                        console.error(xhr.responseText);
                        Swal.fire('Gagal!', 'Terjadi kesalahan, coba lagi.', 'error');
                    }
                });
            }
            </script>
    </body>
</html>
@endsection

@extends('layouts.backend')

@section('content')
<!DOCTYPE html>
<html lang="en">
    <head>

        <meta charset="utf-8" />
        <title>Data</title>
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

    <!-- body start -->
    <body data-menu-color="light" data-sidebar="default"

        <!-- Begin page -->
        <div id="app-layout">
            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">
                        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Manajemen Stok /</span> Barang Masuk</h4>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card overflow-hidden mb-0">
                                    <div class="card-header">
                                        <div class="d-flex align-items-center">
                                            <h5 class="card-title text-black mb-0">Barang Masuk</h5>
                                            <a href="{{route('barang_masuk.create')}}" class="btn btn-primary ms-auto me-2">+ Tambah Data</a>
                                            <button onclick="printTable()" class="btn btn-secondary me-2">🖨 Print</button>
                                        </div>
                                    </div>
                                        {{-- @if(session('success'))
                                            <div class="alert alert-success">{{ session('success') }}</div>
                                        @endif --}}
                                        <div class="card-body mt-0">
                                            <div class="table-responsive table-card mt-0">
                                            <table class="table table-borderless table-centered align-middle table-nowrap mb-0">
                                                <thead class="text-muted table-primary">
                                                    <tr>
                                                    <th scope="col" class="cursor-pointer">No</th>
                                                    <th scope="col" class="cursor-pointer">Nama</th>
                                                    <th scope="col" class="cursor-pointer">Kode Barang</th>
                                                    <th scope="col" class="cursor-pointer">Kategori</th>
                                                    {{-- <th scope="col" class="cursor-pointer">Status</th> --}}
                                                    <th scope="col" class="cursor-pointer">Pemasok</th>
                                                    <th scope="col" class="cursor-pointer">Jumlah</th>
                                                    <th scope="col" class="cursor-pointer">Harga Beli</th>
                                                    <th scope="col" class="cursor-pointer">Tanggal Masuk</th>
                                                    <th scope="col" class="cursor-pointer">Faktur</th>
                                                    <th scope="col" class="cursor-pointer">Aksi</th>
                                                    <th scope="col" class="cursor-pointer">Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($barangMasuk as $item)
                                                <tr>
                                                    <td><span class="d-inline-block align-middle mb-0 text-body">{{ $loop->index + 1 }}</td>
                                                    <td><span class="d-inline-block align-middle mb-0 text-body">{{ $item->nama }}</td>
                                                    <td><span class="d-inline-block align-middle mb-0 text-body">{{ $item->kode_barang }}</td>
                                                    <td><span class="d-inline-block align-middle mb-0 text-body">{{ $item->kategori->nama }}</td>
                                                    {{-- <td><span class="badge bg-info-subtle text-info fw-semibold">{{ $item->status }}</td> --}}
                                                        {{-- <td>
                                                            <span class="badge
                                                                @if($item->status == 'pending') bg-warning-subtle text-warning fw-semibold
                                                                @elseif($item->status == 'disetujui') bg-success-subtle text-success fw-semibold
                                                                @elseif($item->status == 'ditolak') bg-danger-subtle text-danger fw-semibold
                                                                @endif">
                                                                {{ ucfirst($item->status) }}
                                                            </span>
                                                        </td> --}}

                                                    <td><span class="d-inline-block align-middle mb-0 text-body">{{ $item->pemasok }}</td>
                                                    <td><span class="d-inline-block align-middle mb-0 text-body">{{ $item->jumlah }}</td>
                                                    <td><span class="d-inline-block align-middle mb-0 text-body">{{ $item->harga_beli }}</td>
                                                    <td><span class="d-inline-block align-middle mb-0 text-body">{{ $item->tanggal_masuk }}</td>
                                                    {{-- <td><span class="d-inline-block align-middle mb-0 text-body">{{ $item->faktur }}</td> --}}
                                                        {{-- <td>
                                                            <img src="{{ asset('/images/faktur/' . $item->faktur) }}" width="100">
                                                          </td> --}}

                                                          <td>
                                                            @if($item->faktur)
                                                                <img src="{{ asset(str_replace('storage/', 'storage/', $item->faktur)) }}" width="100">
                                                            @else
                                                                Tidak ada faktur
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <a href="{{ route('barang_masuk.edit', $item->id) }}" aria-label="anchor" class="btn btn-sm bg-primary-subtle me-1" data-bs-toggle="tooltip" data-bs-original-title="Edit">
                                                             <i class="mdi mdi-pencil-outline fs-14 text-primary"></i>
                                                            </a>
                                                            <form id="form-hapus-{{ $item->id }}" action="{{ route('barang_masuk.destroy', $item->id) }}" method="POST" style="display:inline;">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button onclick="hapusData({{ $item->id }}, event)" type="button" class="btn btn-sm bg-danger-subtle me-1" data-bs-toggle="tooltip" data-bs-original-title="Hapus">
                                                                    <i class="mdi mdi-delete fs-14 text-danger"></i>
                                                                </button>
                                                            </form>
                                                        </td>
                                                        <td>
                                                            @if ($item->status == 'pending')
                                                            <form action="{{ route('barang_masuk.approve', $item->id) }}" method="POST" style="display:inline">
                                                                @csrf
                                                                @method('PUT')
                                                                {{-- <button type="submit" class="btn btn-success btn-sm fw-bold">✔ Setuju</button> --}}
                                                                <button onclick="ubahStatus({{ $item->id }}, 'Disetujui')" type="submit"  aria-label="anchor" class="btn btn-sm bg-success-subtle" data-bs-toggle="tooltip" data-bs-original-title="✔ Setuju">
                                                                    <i class="mdi mdi-check-decagram fs-14 text-success"></i></button>
                                                            </form>
                                                            <form action="{{ route('barang_masuk.reject', $item->id) }}" method="POST" style="display:inline">
                                                                @csrf
                                                                @method('PUT')
                                                                <button onclick="ubahStatus({{ $item->id }}, 'Ditolak', event)" type="button" class="btn btn-sm bg-danger-subtle" data-bs-toggle="tooltip" data-bs-original-title="✖ Tolak">
                                                                    <i class="mdi mdi-close-box-multiple fs-14 text-danger"></i>
                                                                </button>
                                                            </form>

                                                            <form action="{{ route('barang_masuk.pending', $item->id) }}" method="POST" style="display:inline">
                                                                @csrf
                                                                @method('PUT')
                                                                {{-- <button type="submit" class="btn btn-danger btn-sm fw-bold">✖ Tolak</button> --}}
                                                                <button type="submit"  aria-label="anchor" class="btn btn-sm bg-warning-subtle" data-bs-toggle="tooltip" data-bs-original-title="✖ Pending">
                                                                    <i class="mdi mdi-folder-refresh fs-14 text-warning"></i></button>
                                                            </form>
                                                            @else
                                                            <span class="badge
                                                            @if($item->status == 'pending') bg-warning-subtle text-warning fw-semibold
                                                            @elseif($item->status == 'disetujui') bg-success-subtle text-success fw-semibold
                                                            @elseif($item->status == 'ditolak') bg-danger-subtle text-danger fw-semibold
                                                            @endif">
                                                            {{ ucfirst($item->status) }}
                                                        </span>
                                                        @endif
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                 </script>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
                @include('layouts.backend.footer')
            </div>
        </div>
        <!-- END wrapper -->

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
                    url: `/barang_masuk/${id}/status`,
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

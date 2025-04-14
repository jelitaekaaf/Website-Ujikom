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
                        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Data Table /</span> Kategori</h4>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card overflow-hidden mb-0">
                                <div class="card-header">
                                    <div class="d-flex align-items-center">
                                        <h5 class="card-title text-black mb-0">Kategori</h5>
                                        <a href="{{route('kategori.create')}}" class="btn btn-primary ms-auto">+ Tambah Data</a>
                                    </div>
                                </div>
                                  <div class="card-body mt-0">
                                        <div class="table-responsive table-card mt-0">
                                        {{-- <table class="table table-borderless table-centered align-middle table-nowrap mb-0"> --}}
                                           <table class="table table-striped table-bordered dt-responsive nowrap">
                                            <thead class="text-muted table-primary">
                                                <tr>
                                                    <th scope="col" class="cursor-pointer">No</th>
                                                    <th scope="col" class="cursor-pointer">Nama</th>
                                                    <th scope="col" class="cursor-pointer">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                             @foreach ($kategori as $data)
                                            <tr>
                                                 <td><span class="d-inline-block align-middle mb-0 text-body">{{ $loop->index + 1 }}</span></td>
                                                 <td><span class="d-inline-block align-middle mb-0 text-body">{{ $data->nama }}</span></td>
                                                 <td>
                                                    <a href="{{ route('kategori.edit', $data->id) }}" aria-label="anchor" class="btn btn-sm bg-primary-subtle me-1" data-bs-toggle="tooltip" data-bs-original-title="Edit">
                                                     <i class="mdi mdi-pencil-outline fs-14 text-primary"></i>
                                                    </a>
                                                    <form action="{{ route('kategori.destroy', $data->id) }}" method="POST"
                                                        style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"  aria-label="anchor" class="btn btn-sm bg-danger-subtle" data-bs-toggle="tooltip" data-bs-original-title="Delete">
                                                            <i class="mdi mdi-delete fs-14 text-danger"></i></button>
                                                    </form>
                                                </td>
                                        </tr>
                                        @endforeach
                                        </table>
                                    </div>
                                </div>
                                <div class="card-footer py-0 border-top">
                                    <div class="row align-items-center">
                                        <div class="col-sm">
                                            <div class="text-block text-center text-sm-start">
                                                <span class="fw-medium">1 of 3</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-auto mt-3 mt-sm-0">
                                            <div class="pagination gap-2 justify-content-center py-3 ps-0 pe-3">
                                                <ul class="pagination mb-0">
                                                    <li class="page-item disabled">
                                                        <a class="page-link me-2 rounded-2" href="javascript:void(0);"> Prev </a>
                                                    </li>
                                                    <li class="page-item active">
                                                        <a class="page-link rounded-2 me-2" href="#">1</a>
                                                    </li>
                                                    <li class="page-item">
                                                        <a class="page-link me-2 rounded-2" href="#">2</a>
                                                    </li>
                                                    <li class="page-item">
                                                        <a class="page-link text-primary rounded-2" href="javascript:void(0);"> Next
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
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
        <!-- END wrapper -->

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

    </body>
</html>
@endsection

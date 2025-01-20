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

                        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                            <div class="flex-grow-1">
                                <h4 class="fs-18 fw-semibold m-0">Data Kategori</h4>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="card overflow-hidden mb-0">
                                <div class="card-header">
                                    <div class="d-flex align-items-center">
                                        <h5 class="card-title text-black mb-0">Kategori</h5>
                                    </div>
                                </div>
                                <div class="card-body p-0">
                                    <a href="{{route('kategori.create')}}" class="btn btn-primary">Add Data</a>
                                    <div class="table-responsive">
                                        <table class="table table-traffic mb-0">
                                            <thead>
                                                <tr>
                                                    <th>Id</th>
                                                    <th> Nama</th>
                                                    <th> Status</th>
                                                    <th> Action</th>
                                                </tr>
                                            </thead>
                                             @php    $id = 1; @endphp
                                             @foreach ($kategori as $data)
                                            <tr>
                                                  <th scope="row">{{$id++}}</th>
                                                  <td>{{$data->nama}}</td>
                                                <td class="d-flex align-items-center">
                                                   <div>
                                                        <p class="mb-0 fw-medium fs-14">Richard Dom</p>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="badge bg-primary-subtle text-primary fw-semibold">Delivered</span>
                                                </td>
                                                <form action="{{route('brand.destroy', $data->id)}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                <td>
                                                    <a href="{{route('kategori.edit', $data->id)}}" class="btn btn-sm bg-primary-subtle me-1" data-bs-toggle="tooltip" data-bs-original-title="Edit">
                                                        <i class="mdi mdi-pencil-outline fs-14 text-primary"></i>
                                                    </a>
                                                </td>
                                            </form>
                                        </tr>
                                        @endforeach
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

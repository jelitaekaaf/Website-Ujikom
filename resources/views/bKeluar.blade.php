<!DOCTYPE html>
<html lang="en">
    <head>

        <meta charset="utf-8" />
        <title>Calendar </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc."/>
        <meta name="author" content="Zoyothemes"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- App css -->
        <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-style" />

        <!-- Icons -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />


    </head>

    <!-- body start -->
    <body data-menu-color="light" data-sidebar="default"

        <!-- Begin page -->
        <div id="app-layout">

            @include('layouts.backend.nav')
            @include('layouts.backend.side')
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">

                        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                                <div class="flex-grow-1">
                                    <h4 class="fs-18 fw-semibold m-0">Barang Keluar</h4>
                                </div>
                            </div>
                            @foreach($barangKeluars as $barang)
                            <div class="col-md-4">
                                <div class="card mb-4">
                                    <div class="card-body text-center">
                                        <span class="badge bg-soft-success text-success mb-2">Data Barang</span>
                                        <h5 class="card-title">{{ $barang->barang->nama_barang }}</h5>
                                        <p class="card-text">Jumlah: {{ $barang->jumlah }}</p>
                                        <p class="card-text">Tanggal: {{ $barang->tanggal }}</p>
                                        <a href="#" class="btn btn-danger btn-sm">Hapus</a>
                                        <a href="#" class="btn btn-primary btn-sm">Detail</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                            </div>
                        </div>


                    </div> <!-- container-fluid -->

                </div> <!-- content -->

             @include('layouts.backend.footer')

            </div>
            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


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

        <script src="assets/libs/fullcalendar/index.global.min.js"></script>

        <!-- Main Calendar Js -->
        <script src="assets/js/pages/demo.calendar.js"></script>

        <!-- App js-->
        <script src="assets/js/app.js"></script>

    </body>
</html>

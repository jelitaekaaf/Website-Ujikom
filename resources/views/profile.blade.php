<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc." />
    <meta name="author" content="Zoyothemes" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="shortcut icon" href="assets/images/favicon.ico">
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-style" />
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <style>
        body {
            background-color: #e0f7f1; /* Hijau pastel soft */
        }
        .text-green {
            color: #34a853 !important;
        }
        .btn-green {
            background-color: #81c784;
            color: white;
        }
        .btn-green:hover {
            background-color: #66bb6a;
        }
        .card {
            border-radius: 16px;
        }
        .nav-link.active {
            color: #34a853 !important;
            border-bottom: 2px solid #34a853 !important;
        }
    </style>
</head>
<body data-menu-color="light" data-sidebar="default">
    <div id="app-layout">
        @include('layouts.backend.nav')
        @include('layouts.backend.side')

        <div class="content-page">
            <div class="content">
                <div class="container-fluid">
                    <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                        <div class="flex-grow-1">
                            <h4 class="fs-18 fw-semibold m-0 text-green">Profile</h4>
                        </div>
                    </div>
                    <!-- Profile Card -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card shadow">
                                <div class="card-body d-flex align-items-center">
                                    <img src="assets/images/user.jpg" class="rounded-2 avatar-xxl" alt="image profile">
                                    <div class="overflow-hidden ms-4">
                                        <h4 class="m-0 text-green fs-20">{{Auth::user()->name}}</h4>
                                        <p class="my-1 text-muted fs-16">Software Engineering</p>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button type="submit" class="btn btn-green btn-sm mt-2">Logout</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- About Me + Contact -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card shadow">
                                <div class="card-body">
                                    <ul class="nav nav-underline border-bottom" id="pills-tab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link active" id="profile_about_tab" data-bs-toggle="tab" href="#profile_about" role="tab">
                                                <span class="d-none d-sm-block">About</span>
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="tab-content text-muted bg-white">
                                        <div class="tab-pane active show pt-4" id="profile_about" role="tabpanel">
                                            <div class="row">
                                                <div class="col-md-6 mb-4">
                                                    <h5 class="fs-16 text-green fw-semibold mb-3 text-capitalize">About me</h5>
                                                    <p style="text-align: justify;">
                                                        Halo! Perkenalkan, saya <strong>Jelita Eka Fadila</strong>, seorang pelajar berusia 18 tahun yang saat ini sedang menempuh pendidikan di <strong>SMK Assalam</strong> jurusan <strong>Rekayasa Perangkat Lunak (RPL)</strong>. Saya memiliki minat yang besar terhadap dunia teknologi, khususnya dalam bidang pengembangan perangkat lunak.
                                                        Saya percaya bahwa teknologi adalah jembatan menuju masa depan yang lebih baik, dan saya ingin menjadi bagian dari generasi yang membawa perubahan positif melalui inovasi teknologi.
                                                    </p>
                                                </div>
                                                <div class="col-md-6 mb-4">
                                                    <h5 class="fs-16 text-green fw-semibold mb-3 text-capitalize">Contact Details</h5>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <h6 class="text-uppercase fs-13">Email</h6>
                                                            <a href="mailto:{{Auth::user()->email}}" class="text-green fs-14 text-decoration-underline">{{Auth::user()->email}}</a>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <h6 class="text-uppercase fs-13">Social Media</h6>
                                                            <ul class="social-list list-inline mb-0">
                                                                <li class="list-inline-item"><i class="mdi mdi-instagram text-danger fs-16"></i></li>
                                                                <li class="list-inline-item"><i class="mdi mdi-twitter text-info fs-16"></i></li>
                                                                <li class="list-inline-item"><i class="mdi mdi-github text-dark fs-16"></i></li>
                                                            </ul>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <h6 class="text-uppercase fs-13">Location</h6>
                                                            <p class="fs-14">School</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                       </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer Start -->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col fs-13 text-muted text-center">
                            &copy; <script>document.write(new Date().getFullYear())</script> - Made with 💜 by Smartventera
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <!-- Scripts -->

    <script src="assets/libs/jquery/jquery.min.js"></script>
    <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/libs/simplebar/simplebar.min.js"></script>
    <script src="assets/libs/node-waves/waves.min.js"></script>
    <script src="assets/libs/waypoints/lib/jquery.waypoints.min.js"></script>
    <script src="assets/libs/jquery.counterup/jquery.counterup.min.js"></script>
    <script src="assets/libs/feather-icons/feather.min.js"></script>
    <script src="assets/libs/fullcalendar/index.global.min.js"></script>
    <script src="assets/js/pages/demo.calendar.js"></script>
    <script src="assets/js/app.js"></script>
</body>
</html>

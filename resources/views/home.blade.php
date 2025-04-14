<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title> Beranda </title>
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

        <!-- Chart.js -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    </head>

    <!-- body start -->
    <body data-menu-color="light" data-sidebar="default">

        <!-- Begin page -->
        <div id="app-layout">

            <!-- Topbar Start -->
            @include('layouts.backend.nav')
            <!-- end Topbar -->

            <!-- Left Sidebar Start -->
            @include('layouts.backend.side')
            <!-- Left Sidebar End -->

            <div class="content-page">
                <div class="content">
                    <div class="container-fluid">
                        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                            <div class="flex-grow-1">
                                <h4 class="fs-18 fw-semibold m-0">Beranda</h4>
                            </div>
                        </div>
                        <div class="col mb-4" >
                            <div class="card shadow">
                            <div class="card-body "  style="background-color: #e8f5e9;">
                                <div class="d-flex align-items-center">
                                    <div class="flex-grow-1">
                                        <h5 class="card-title">Selamat Datang di Dashboard Anda!</h5>
                                        <p class="card-text">Ini adalah ringkasan dari semua data penting Anda.</p>
                                    </div>
                                    <div>
                                        <a href="#" class="btn btn-primary">Lihat Profile</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                                <!-- Start Row -->
                                <div class="row">
                                    <div class="col-md-6 col-xl-3">
                                        <div class="card shadow">
                                            <div class="card-body">
                                                <div class="widget-first">
                                                    <div class="d-flex justify-content-between align-items-end">
                                                        <div>
                                                            <div class="d-flex align-items-center mb-3">
                                                                <a href="barang_masuk">
                                                                <div class="bg-primary-subtle rounded-2 p-1 me-2 border border-dashed border-primary">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 14 14"><path fill="#287F71" fill-rule="evenodd" d="M13.463 9.692C13.463 12.664 10.77 14 7 14S.537 12.664.537 9.713c0-3.231 1.616-4.868 4.847-6.505L4.24 1.077A.7.7 0 0 1 4.843 0H9.41a.7.7 0 0 1 .603 1.023L8.616 3.208c3.23 1.615 4.847 3.252 4.847 6.484M7.625 4.887a.625.625 0 1 0-1.25 0v.627a1.74 1.74 0 0 0-.298 3.44l1.473.322a.625.625 0 0 1-.133 1.236h-.834a.625.625 0 0 1-.59-.416a.625.625 0 1 0-1.178.416a1.877 1.877 0 0 0 1.56 1.239v.636a.625.625 0 1 0 1.25 0v-.636a1.876 1.876 0 0 0 .192-3.696l-1.473-.322a.49.49 0 0 1 .105-.97h.968a.622.622 0 0 1 .59.416a.625.625 0 0 0 1.178-.417a1.874 1.874 0 0 0-1.56-1.238z" clip-rule="evenodd"/></svg>
                                                                </a>
                                                                </div>
                                                                <p class="mb-0 text-dark fs-15" >Barang Masuk</p>
                                                            </div>
                                                            <h3 class="mb-0 fs-24 text-black me-2">{{ $jumlahBarangMasuk }} Items</h3>
                                                        </div>

                                                        <div>
                                                            <div id="new-orders" class="apex-charts"></div>
                                                        </div>
                                                    </div>

                                                    <div>
                                                        <p class="text-muted mb-0 fs-13">
                                                            <span class="text-primary fs-14 me-2"><i class="mdi mdi-trending-up fs-18"></i></span>
                                                            <small class="text-dark fs-14"><a href="barang_masuk"> Barang Masuk Hari Ini</a> </small>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-xl-3">
                                        <div class="card shadow">
                                            <div class="card-body">
                                                <div class="widget-first">
                                                    <div class="d-flex justify-content-between align-items-end">
                                                        <div>
                                                            <div class="d-flex align-items-center mb-3">

                                                                <div class="bg-secondary-subtle rounded-2 p-1 me-2 border border-dashed border-secondary">
                                                                    <a href="barang_keluar">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 640 512"><path fill="#963b68" d="M96 224c35.3 0 64-28.7 64-64s-28.7-64-64-64s-64 28.7-64 64s28.7 64 64 64m448 0c35.3 0 64-28.7 64-64s-28.7-64-64-64s-64 28.7-64 64s28.7 64 64 64m32 32h-64c-17.6 0-33.5 7.1-45.1 18.6c40.3 22.1 68.9 62 75.1 109.4h66c17.7 0 32-14.3 32-32v-32c0-35.3-28.7-64-64-64m-256 0c61.9 0 112-50.1 112-112S381.9 32 320 32S208 82.1 208 144s50.1 112 112 112m76.8 32h-8.3c-20.8 10-43.9 16-68.5 16s-47.6-6-68.5-16h-8.3C179.6 288 128 339.6 128 403.2V432c0 26.5 21.5 48 48 48h288c26.5 0 48-21.5 48-48v-28.8c0-63.6-51.6-115.2-115.2-115.2m-223.7-13.4C161.5 263.1 145.6 256 128 256H64c-35.3 0-64 28.7-64 64v32c0 17.7 14.3 32 32 32h65.9c6.3-47.4 34.9-87.3 75.2-109.4"/></svg>
                                                                    </a>
                                                                </div>
                                                                <p class="mb-0 text-dark-bold fs-15">Barang Keluar</p>
                                                            </div>
                                                            <h3 class="mb-0 fs-24 text-black me-2">{{ $jumlahBarangKeluar }} Items</h3>
                                                        </div>

                                                        <div>
                                                            <div id="monthly-revenue " class="apex-charts"></div>
                                                        </div>
                                                    </div>

                                                    <div>
                                                        <p class="text-muted mb-0 fs-13">
                                                            <span class="text-danger fs-14 me-2"><i class="mdi mdi-trending-down fs-18"></i></span>
                                                            <small class="text-dark fs-14"><a href="barang_keluar"> Barang Keluar Hari Ini </a></small>
                                                        </p>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-xl-3">
                                        <div class="card shadow">
                                            <div class="card-body">
                                                <div class="widget-first">
                                                    <div class="d-flex justify-content-between align-items-end">
                                                        <div>
                                                            <div class="d-flex align-items-center mb-3">
                                                                <div class="bg-info-subtle rounded-2 p-1 me-2 border border-dashed border-info">
                                                                    <a href="kategori">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="#73bbe2" d="M7 20V8.975q0-.825.6-1.4T9.025 7H20q.825 0 1.413.587T22 9v8l-5 5H9q-.825 0-1.412-.587T7 20M2.025 6.25q-.15-.825.325-1.487t1.3-.813L14.5 2.025q.825-.15 1.488.325t.812 1.3L17.05 5H9Q7.35 5 6.175 6.175T5 9v9.55q-.4-.225-.687-.6t-.363-.85zM20 16h-4v4z"/></svg>
                                                                    </a>
                                                                </div>
                                                                <p class="mb-0 text-dark fs-15">Kategori</p>
                                                            </div>
                                                            <h3 class="mb-0 fs-24 text-black me-2">{{ $jumlahKategori }} Items</h3>
                                                        </div>

                                                        <div>
                                                            <div id="monthly-orders" class="apex-charts"></div>
                                                        </div>
                                                    </div>

                                                    <div>
                                                        <p class="text-muted mb-0 fs-13">
                                                            <span class="text-primary fs-14 me-2"><i class="mdi mdi-trending-up fs-18"></i> </span>
                                                            <small class="text-dark fs-14"><a href="kategori"> Kategori Hari Ini </a></small>
                                                        </p>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-xl-3">
                                        <div class="card shadow">
                                            <div class="card-body">
                                                <div class="widget-first">
                                                    <div class="d-flex justify-content-between align-items-end">
                                                        <div>
                                                            <div class="d-flex align-items-center mb-3">
                                                                <a href="catatanstok">
                                                                <div class="bg-warning-subtle rounded-2 p-1 me-2 border border-dashed border-warning">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="#f59440" d="M5.574 4.691c-.833.692-1.052 1.862-1.491 4.203l-.75 4c-.617 3.292-.926 4.938-.026 6.022C4.207 20 5.88 20 9.23 20h5.54c3.35 0 5.025 0 5.924-1.084c.9-1.084.591-2.73-.026-6.022l-.75-4c-.439-2.34-.658-3.511-1.491-4.203C17.593 4 16.403 4 14.02 4H9.98c-2.382 0-3.572 0-4.406.691" opacity="0.5"/><path fill="#988D4D" d="M12 9.25a2.251 2.251 0 0 1-2.122-1.5a.75.75 0 1 0-1.414.5a3.751 3.751 0 0 0 7.073 0a.75.75 0 1 0-1.414-.5A2.251 2.251 0 0 1 12 9.25"/></svg>
                                                                </a>
                                                                </div>
                                                                <p class="mb-0 text-dark fs-15">Laporan </p>
                                                            </div>
                                                            <h3 class="mb-0 fs-24 text-black me-2">2 Items</h3>
                                                        </div>

                                                        <div>
                                                            <div id="items-stock" class="apex-charts"></div>
                                                        </div>
                                                    </div>

                                                    <div>
                                                        <p class="text-muted mb-0 fs-13">
                                                            <span class="text-primary fs-14 me-2"><i class="mdi mdi-trending-up fs-18"></i> </span>
                                                            <small class="text-dark fs-14">Laporan  </small>
                                                        </p>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                        <!-- Start Chart Row -->
                        <div class="row mt-4">
                            <div class="col-lg-6">
                                <div class="card shadow">
                                    <div class="card-body">
                                        <h5 class="card-title">Barang Masuk dan Barang Keluar per Bulan</h5>
                                        <canvas id="barangMasukChart" height="137"></canvas>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-6">
                                <div class="card shadow">
                                    <div class="card-header align-items-center d-flex">
                                        <h4 class="card-title mb-0 flex-grow-1"> Stok Barang</h4>
                                    </div>

                                    <div class="card-body mt-0">
                                        <div class="table-responsive table-card">
                                            <table class="table table-borderless table-centered align-middle table-nowrap mb-0">
                                                <thead class="text-muted table-info">
                                                    <tr>
                                                        <th scope="col" class="cursor-pointer">Nama Barang</th>
                                                        <th scope="col" class="cursor-pointer">Stok</th>
                                                        <th scope="col" class="cursor-pointer">Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse($stokTipis as $barang)
                                                        <tr>
                                                            <td>{{ $barang->nama_barang }}</td>
                                                            <td>{{ $barang->stok }} pcs</td>
                                                            <td>
                                                                @if ($barang->stok <= 5)
                                                                <button aria-label="status" class="btn btn-sm bg-danger-subtle text-danger" data-bs-toggle="tooltip" data-bs-original-title="Stok menipis">
                                                                    Hampir Habis
                                                                </button>

                                                                @else
                                                                    <button aria-label="status" class="btn btn-sm bg-primary-subtle text-primary" data-bs-toggle="tooltip" data-bs-original-title="Stok aman">
                                                                        Aman
                                                                    </button>
                                                                @endif
                                                            </td>

                                                        </tr>
                                                    @empty
                                                        <tr>
                                                            <td colspan="3" class="text-center text-muted">Semua stok aman ✅</td>
                                                        </tr>
                                                    @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Perbandingan Kategori Barang</h5>
                                        <canvas id="kategoriChart" height="50"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Chart Row -->

                    </div>
                </div>
            </div>

            <!-- Vendor -->
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

            <!-- Chart.js Scripts -->
            <script>
                const barangMasukCtx = document.getElementById('barangMasukChart');
                new Chart(barangMasukCtx, {
                    type: 'bar',
                    data: {
                        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun'],
                        datasets: [{
                            label: 'Barang Masuk',
                            data: [10, 20, 15, 25, 18, 12],
                            backgroundColor: 'rgba(54, 162, 235, 0.6)',
                            borderRadius: 4
                        }]
                    },
                    options: {
                        responsive: true,
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });

                const kategoriCtx = document.getElementById('kategoriChart');
                new Chart(kategoriCtx, {
                    type: 'pie',
                    data: {
                        labels: ['Elektronik', 'ATK', 'Pakaian', 'Lainnya'],
                        datasets: [{
                            data: [30, 20, 25, 25],
                            backgroundColor: ['#4bc0c0', '#ff9f40', '#ff6384', '#36a2eb'],
                        }]
                    },
                    options: {
                        responsive: true
                    }
                });
            </script>

            @if(count($stokTipis) > 0)
            <script>
                alert("⚠️ Beberapa barang memiliki stok menipis!");
            </script>
            @endif

        </div>
    </body>
</html>

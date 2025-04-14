<div class="app-sidebar-menu">
    <div class="h-100" data-simplebar>

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <div class="logo-box">
                {{-- <a href="index.html" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{ asset('assets/images/logo-sm.png" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('assets/images/logo-light.png" alt="" height="24">
                    </span>
                </a> --}}
                <a href="index.html" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{ asset('assets/images/s.png') }}" alt="" height="105">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('assets/images/s.png') }}" alt="" height="105">
                    </span>
                </a>
            </div>
            <br>

            <ul id="side-menu">

                <li class="menu-title">Menu</li>

                <li>
                    <a href="/home" class="tp-link">
                        <i data-feather="home"></i>
                        <span> Dashboard </span>
                    </a>
                </li>
                <li>
                    <a href="#sidebarTables" data-bs-toggle="collapse" class="collapsed">
                        <i data-feather="package"></i>
                        <span> Master </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarTables">
                        <ul class="nav-second-level">
                            <li><a href="barang" class="tp-link">Barang</a></li>
                            <li><a href="kategori" class="tp-link">Kategori</a></li>
                            <li><a href="catatanstok" class="tp-link">Catatan Stok</a></li>
                            <li><a href="catatankeuangan" class="tp-link">Catatan Keuangan</a></li>
                        </ul>
                    </div>
                </li>

                {{-- <li>
                    <a href="calendar" class="tp-link">
                        <i data-feather="calendar"></i>
                        <span> Calendar </span>
                    </a>
                </li> --}}

                 <li class="menu-title mt-2">Manajemen Stok</li>
                 {{-- <li>
                    <a href="pembelian" class="tp-link">
                        <i data-feather="slack"></i>
                        <span> Pembelian </span>
                    </a>
                </li>
                <li>
                    <a href="transaksi" class="tp-link">
                        <i data-feather="file-minus"></i>
                        <span> Transaksi </span>
                    </a>
                </li>
                <li>
                    <a href="dettransaksi" class="tp-link">
                        <i data-feather="file-text"></i>
                        <span> Detail Transaksi </span>
                    </a>
                </li> --}}
                <li>
                    <a href="barang_masuk" class="tp-link">
                        <i data-feather="log-in"></i>
                        <span> Barang Masuk 📥</span>
                    </a>
                </li>
                <li>
                    <a href="barang_keluar" class="tp-link">
                        <i data-feather="log-out"></i>
                        <span> Barang Keluar 📤</span>
                    </a>
                </li>

                <li class="menu-title mt-2">Laporan</li>
                <li>
                   <a href="laporan/barang-masuk" class="tp-link">
                       <i data-feather="clipboard"></i>
                       <span> Laporan Barang Masuk </span>
                   </a>
                   <a href="laporan/barang-keluar" class="tp-link">
                       <i data-feather="clipboard"></i>
                       <span> Laporan Barang Keluar </span>
                   </a>
               </li>
            </ul>
        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
</div>


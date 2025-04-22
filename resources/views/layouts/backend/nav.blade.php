
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

<div class="topbar-custom">
    <div class="container-fluid">
        <div class="d-flex justify-content-between">
            <ul class="list-unstyled topnav-menu mb-0 d-flex align-items-center">
                <li>
                    <button class="button-toggle-menu nav-link">
                        <i data-feather="menu" class="noti-icon"></i>
                    </button>
                </li>
                <li class="d-none d-lg-block">
                    {{-- <h5 class="mb-0">Good Morning,  {{Auth::user()->name}}</h5> --}}
                </li>
            </ul>

            <ul class="list-unstyled topnav-menu mb-0 d-flex align-items-center">
                <li class="d-none d-sm-flex">
                    <button type="button" class="btn nav-link" data-toggle="fullscreen">
                        <i data-feather="maximize" class="align-middle fullscreen noti-icon"></i>
                    </button>
                </li>

                <li class="dropdown notification-list topbar-dropdown">
                    <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button">
                        <i data-feather="bell" class="noti-icon"></i>
                        {{-- @if(count($stokTipis) > 0)
                            <span class="badge bg-danger rounded-pill">{{ count($stokTipis) }}</span>
                        @endif --}}
                    </a>
                    <div class="dropdown-menu dropdown-menu-end dropdown-lg">

                        <!-- item-->
                        <div class="dropdown-item noti-title">
                            <h5 class="m-0">
                                <span class="float-end">
                                    <a href="" class="text-dark">
                                        <small>Clear All</small>
                                    </a>
                                </span>Notification
                            </h5>
                        </div>

                        {{-- <div class="noti-scroll" data-simplebar> --}}
                            {{-- Notifikasi Stok Tipis --}}
                            {{-- @foreach ($stokTipis as $barang)
                            <a href="{{ route('barang.index', $barang->id) }}" class="dropdown-item notify-item">
                                <div class="notify-icon bg-danger text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                    <i class="bi bi-exclamation-triangle-fill fs-5"></i>
                                </div>
                                <div class="notify-details ms-2">
                                    <strong>{{ $barang->nama }}</strong> stok menipis ({{ $barang->stok }} pcs)
                                    <p class="text-muted mb-0"><small>Kategori: {{ $barang->kategori->nama }}</small></p>
                                </div>
                            </a>
                        @endforeach

                            @if ($stokTipis->isEmpty())
                                <div class="dropdown-item text-muted text-center">
                                    Tidak ada notifikasi
                                </div>
                            @endif
                        </div> --}}

                        <!-- All-->
                        <a href="{{ route('barang.index') }}" class="dropdown-item text-center text-primary notify-item notify-all">
                            Lihat Semua Barang
                            <i class="fe-arrow-right"></i>
                        </a>

                        <!-- All-->
                        <a href="javascript:void(0);" class="dropdown-item text-center text-primary notify-item notify-all">
                            View all
                            <i class="fe-arrow-right"></i>
                        </a>

                    </div>
                </li>

                <li class="dropdown notification-list topbar-dropdown">
                    <a class="nav-link dropdown-toggle nav-user me-0" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <img src="{{ asset('assets/images/user.jpg') }}" alt="user-image" class="rounded-circle">
                        <span class="pro-user-name ms-1">
                            {{Auth::user()->name}}
                            <i class="mdi mdi-chevron-down"></i>
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end profile-dropdown ">
                        <!-- item-->
                        <div class="dropdown-header noti-title">
                            <h6 class="text-overflow m-0">Welcome !</h6>
                        </div>

                        <!-- item-->
                        <a href="profile" class="dropdown-item notify-item">
                            <i class="mdi mdi-account-circle-outline fs-16 align-middle"></i>
                            <span>My Account</span>
                        </a>
                        <div class="dropdown-divider"></div>

                        <!-- item-->
                  <!-- Logout -->
                <a href="#" class="dropdown-item notify-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="mdi mdi-location-exit fs-16 align-middle"></i>
                    <span>Logout</span>
                </a>

                <!-- Tambahkan form logout -->
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>


                    </div>
                </li>

            </ul>
        </div>

    </div>

</div>

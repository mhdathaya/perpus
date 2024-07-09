<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="{{asset('assets/assets/')}}" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Account settings - Account | DATA MAHASISWA KM - Bootstrap 5 HTML Admin Template - Pro</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{asset('assets/assets/img/favicon/favicon.ico')}}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{asset('assets/assets/vendor/fonts/boxicons.css')}}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{asset('assets/assets/vendor/css/core.css')}}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{asset('assets/assets/vendor/css/theme-default.css')}}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{asset('assets/assets/css/demo.css')}}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{asset('assets/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="{{asset('assets/assets/vendor/js/helpers.js')}}"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{asset('assets/assets/js/config.js')}}"></script>
</head>

<body>
    @if (request()->is('dosen/formIndex') == true )



    @elseif (request()->is('mahasiswa/formIndex') == true )

    @else
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->

            <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
                <div class="app-brand demo">

                    <img height="50px" width="200px" src="{{asset('images/Perpustakaan_Nasional_Republik_Indonesia-removebg-preview.png')}}" alt="">



                    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                        <i class="bx bx-chevron-left bx-sm align-middle"></i>
                    </a>
                </div>

                <div class="menu-inner-shadow"></div>

                <ul class="menu-inner py-1">
                    <!-- Dashboard -->
                    <li class="menu-item {{(request()->is('home-view'))?'active':''}}">
                        <a href="/home-view" class="menu-link">
                            <i class="menu-icon fas fa-home"></i>
                            <div data-i18n="Analytics">Dashboard</div>
                        </a>
                    </li>

                    <div class="ms-4 mt-2 mb-2">PAGES</div>
                    @if (session()->get("role") == "admin")
                    <li class="menu-item {{(request()->is('category/*'))?'active':''}}">
                        <a href="/category/view" class="menu-link">
                            <img class="menu-icon" src="{{asset('icons/portofolio-icon.png')}}" alt="">
                            <div data-i18n="Analytics">Kategori Buku</div>
                        </a>
                    </li>
                    @endif
                    <li class="menu-item {{(request()->is('book/*'))?'active':''}}">
                        <a href="/book/view" class="menu-link">
                            <img class="menu-icon" src="{{asset('icons/portofolio-icon.png')}}" alt="">
                            <div data-i18n="Analytics">Buku</div>
                        </a>
                    </li>
                    @if (session()->get("role") == "peminjam")
                    <li class="menu-item {{(request()->is('pinjam/*'))?'active':''}}">
                        <a href="/pinjam/view" class="menu-link">
                            <img class="menu-icon" src="{{asset('icons/portofolio-icon.png')}}" alt="">
                            <div data-i18n="Analytics">Pinjam Buku</div>
                        </a>
                    </li>
                    @endif

                    <li class="menu-item {{(request()->is('history/*'))?'active':''}}">
                        <a href="/history/view" class="menu-link">
                            <img class="menu-icon" src="{{asset('icons/portofolio-icon.png')}}" alt="">
                            <div data-i18n="Analytics">History</div>
                        </a>
                    </li>




                </ul>
            </aside>
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->

                <nav class=" layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
                    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                            <i class="bx bx-menu bx-sm"></i>
                        </a>
                    </div>

                    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                        <!-- Search -->
                        <div class="navbar-nav align-items-center">
                            <div class="nav-item d-flex align-items-center">


                            </div>
                        </div>
                        <!-- /Search -->

                        <ul class="navbar-nav flex-row align-items-center ms-auto">
                            <!-- Place this tag where you want the button to render. -->


                            <!-- User -->
                            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                                <a href="/logout" class="btn btn-danger">Logout</a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar avatar-online">
                                                        @if (session()->get('photo_profil') == null)
                                                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/2c/Default_pfp.svg/1200px-Default_pfp.svg.png" alt class="w-px-40 h-auto rounded-circle" />
                                                        @else
                                                        <img src="{{(session()->get('photo_profil'))}}" alt class="rounded-circle" />
                                                        @endif

                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <span class="fw-semibold d-block">{{(session()->get('name'))}}</span>
                                                    <small class="text-muted">{{(session()->get('role'))}}</small>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                    </li>
                                    @if (session()->get("role") == "dosen")
                                    <li>
                                        <a class="dropdown-item" href="/dosen/profileIndex">
                                            <i class="bx bx-user me-2"></i>
                                            <span class="align-middle">My Profile</span>
                                        </a>
                                    </li>
                                    @elseif (session()->get("role") == "mahasiswa")
                                    <li>
                                        <a class="dropdown-item" href="/mahasiswa/profileIndex">
                                            <i class="bx bx-user me-2"></i>
                                            <span class="align-middle">My Profile</span>
                                        </a>
                                    </li>
                                    @endif


                                    <li>
                                        <div class="dropdown-divider"></div>
                                    </li>
                                    <li>
                                        @if (session()->get('role') == "mahasiswa")


                                        <a class="dropdown-item" href="/logout">
                                            <i class="bx bx-power-off me-2"></i>
                                            <span class="align-middle">Log Out</span>
                                        </a>
                                        @elseif (session()->get('role') == "dosen")

                                        <a class="dropdown-item" href="/logoutDosen">
                                            <i class="bx bx-power-off me-2"></i>
                                            <span class="align-middle">Log Out</span>
                                        </a>
                                        @elseif (session()->get('role') == "admin")

                                        <a class="dropdown-item" href="/logoutAdmin">
                                            <i class="bx bx-power-off me-2"></i>
                                            <span class="align-middle">Log Out</span>
                                        </a>
                                        @endif
                                    </li>
                                </ul>
                            </li>
                            <!--/ User -->
                        </ul>
                    </div>
                </nav>

                @endif
                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->
                    <div class="container-xxl flex-grow-1 container-p-y">

                        @yield('content')
                        <!-- / Content -->
                    </div>
                    <!-- Footer -->

                    <!-- / Footer -->

                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->



    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{asset('assets/assets/vendor/libs/jquery/jquery.js')}}"></script>
    <script src="{{asset('assets/assets/vendor/libs/popper/popper.js')}}"></script>
    <script src="{{asset('assets/assets/vendor/js/bootstrap.js')}}"></script>
    <script src="{{asset('assets/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>

    <script src="{{asset('assets/assets/vendor/js/menu.js')}}"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="https://mozilla.github.io/pdf.js/build/pdf.js"></script>

    <!-- Main JS -->
    <script src="{{asset('assets/assets/js/main.js')}}"></script>

    <!-- Page JS -->
    <script src="{{asset('assets/assets/js/pages-account-settings-account.js')}}"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>
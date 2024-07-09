<html lang="en" class="light-style customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="assets/assets/" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Register</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{asset('assets/assets/img/favicon/favicon.ico')}}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{asset('assets/assets/vendor/fonts/boxicons.css')}}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{asset('assets/assets/vendor/css/core.css')}}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{asset('assets/assets/vendor/css/theme-default.css')}}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{asset('assets/assets/css/demo.css')}}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{asset('assets/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}" />

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="{{asset('assets/assets/vendor/css/pages/page-auth.css')}}" />
    <!-- Helpers -->
    <script src="{{asset('assets/assets/vendor/js/helpers.js')}}"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{asset('assets/assets/js/config.js')}}"></script>
</head>

<body>
    <!-- Content -->
    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                <!-- Register -->
                <div class="card">
                    <div class="card-body">
                        <!-- Logo -->
                        <div class="app-brand justify-content-center">

                            <span class="app-brand-logo demo">
                                <img src="{{asset('images/Perpustakaan_Nasional_Republik_Indonesia-removebg-preview.png')}}" width="300px" alt="">
                            </span>

                            </a>
                        </div>
                        <!-- /Logo -->

                        <p class="mb-4 text-dark fw-bold">Selamat Datang DI sistem Informasi Pengelolaan portofolio Dosen di Telkom University</p>

                        @if ($message = Session::get('success'))
                        <div class="alert alert-primary alert-dismissible" role="alert">
                            {{$message}}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif
                        @if ($message = Session::get('failed'))
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            {{$message}}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif
                        <form id="formAuthentication" class="mb-3" action="/peminjam/register" method="POST">
                            @csrf
                            <div class="mb-3 form-name-toggle">
                                <div class="d-flex justify-content-between">
                                    <label class="form-label" for="name">Name</label>
                                </div>
                                <div class="input-group input-group-merge">
                                    <input type="text" id="name" class="form-control" name="name" placeholder="name" aria-describedby="password" />

                                </div>
                            </div>
                            <div class="mb-3 form-name-toggle">
                                <div class="d-flex justify-content-between">
                                    <label class="form-label" for="name">No Telepon</label>
                                </div>
                                <div class="input-group input-group-merge">
                                    <input type="text" id="no_telepon" class="form-control" name="no_telepon" placeholder="no telepon" aria-describedby="no_telepon" />

                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email " autofocus />
                            </div>

                            <div class="mb-3 form-password-toggle">
                                <div class="d-flex justify-content-between">
                                    <label class="form-label" for="password">Password</label>
                                </div>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="remember-me" />
                                    <label class="form-check-label" for="remember-me"> Remember Me </label>
                                </div>
                            </div>
                            <input type="hidden" name="role" value="admin">

                            <div class="mb-3">
                                <button class="btn btn-primary d-grid w-100" type="submit">Sign Up</button>
                            </div>
                            <p id="errorMessage" style="color: red;"></p>
                        </form>

                        <p class="text-center">
                            <span>Already account?</span>
                            <a href="/login-view">
                                <span>Sign an account</span>
                            </a>
                        </p>
                    </div>
                </div>
                <!-- /Register -->
            </div>
        </div>
    </div>
    <script>
        document.getElementById('formAuthentication').addEventListener('submit', function(event) {
            var password = document.getElementById('password').value;
            var errorMessage = document.getElementById('errorMessage');

            // Reset pesan error
            errorMessage.textContent = '';

            // Validasi panjang password
            if (password.length <= 6) {
                errorMessage.textContent = 'Password harus lebih dari 6 karakter.';
                event.preventDefault(); // Mencegah form submit
                return;
            }

            // Validasi keberadaan huruf besar
            var hasUpperCase = /[A-Z]/;
            if (!hasUpperCase.test(password)) {
                errorMessage.textContent = 'Password harus mengandung setidaknya satu huruf besar.';
                event.preventDefault(); // Mencegah form submit
                return;
            }

            // Validasi keberadaan angka dalam password
            var hasNumber = /\d/;
            if (!hasNumber.test(password)) {
                errorMessage.textContent = 'Password harus mengandung setidaknya satu angka.';
                event.preventDefault(); // Mencegah form submit
                return;
            }

            // Validasi keberadaan karakter khusus
            var hasSpecialChar = /[!@#$%^&*(),.?":{}|<>]/;
            if (!hasSpecialChar.test(password)) {
                errorMessage.textContent = 'Password harus mengandung setidaknya satu karakter khusus.';
                event.preventDefault(); // Mencegah form submit
                return;
            }

            // Jika validasi lolos, form dapat disubmit
        });
    </script>
    <!-- / Content -->


    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{asset('assets/assets/vendor/libs/jquery/jquery.js')}}"></script>
    <script src="{{asset('assets/assets/vendor/libs/popper/popper.js')}}"></script>
    <script src="{{asset('assets/assets/vendor/js/bootstrap.js')}}"></script>
    <script src="{{asset('assets/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>

    <script src="{{asset('assets/assets/vendor/js/menu.js')}}"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="{{asset('assets/assets/js/main.js')}}"></script>

    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Trang Đăng Nhập</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="/template/assets/images/favicon.ico" />
    <link rel="stylesheet" href="/template/assets/css/backend-plugin.min.css">
    <link rel="stylesheet" href="/template/assets/css/backend.css%3Fv=1.0.0.css">
    <link rel="stylesheet" href="/template/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="/template/assets/vendor/line-awesome/dist/line-awesome/css/line-awesome.min.css">
    <link rel="stylesheet" href="/template/assets/vendor/remixicon/fonts/remixicon.css">
</head>

<body class=" ">
    <!-- loader Start -->
    <div id="loading">
        <div id="loading-center">
        </div>
    </div>
    <!-- loader END -->

    <div class="wrapper">
        <section class="login-content">
            <div class="container">
                <div class="row align-items-center justify-content-center height-self-center">
                    <div class="col-lg-8">
                        <div class="card auth-card">
                            <div class="card-body p-0">
                                <div class="d-flex align-items-center auth-content">
                                    <div class="col-lg-7 align-self-center">
                                        <div class="p-3">
                                            <h2 class="mb-2">Đăng Nhập</h2>
                                            <form method="POST" action="{{ route('login') }}">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="floating-label form-group">
                                                            @csrf
                                                            <input
                                                                class="floating-input form-control @error('email') is-invalid @enderror"
                                                                name="email" value="{{ old('email') }}" required
                                                                autocomplete="email" autofocus type="email"
                                                                placeholder=" ">
                                                            <label style="padding:0px 8px"> Địa Chỉ Email</label>
                                                            @error('email')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-12">
                                                        <div class="floating-label form-group">
                                                            <input type="password"
                                                                class="floating-input form-control @error('password') is-invalid @enderror"
                                                                name="password" required
                                                                autocomplete="current-password">

                                                            <label style="padding:0px 8px">Mật Khẩu </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="custom-control custom-checkbox mb-3">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="customCheck1">
                                                            <label class="custom-control-label control-label-1"
                                                                for="customCheck1">Remember Me</label>
                                                        </div>
                                                    </div>
                                                    {{-- <div class="col-lg-6">
                                                        <a href="auth-recoverpw.html"
                                                            class="text-primary float-right">Quên mật khẩu?</a>
                                                    </div> --}}
                                                </div>
                                                <button type="submit" class="btn btn-primary">Đăng Nhập</button>
                                                {{-- <p class="mt-3">
                                                    Tạo tài khoản? <a href="auth-sign-up.html"
                                                        class="text-primary">Đăng Ký</a>
                                                </p> --}}
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-lg-5 content-right">
                                        <img src="/template/assets/images/login/01.png" class="img-fluid image-right"
                                            alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Backend Bundle JavaScript -->
    <script src="/template/assets/js/backend-bundle.min.js"></script>

    <!-- Table Treeview JavaScript -->
    <script src="/template/assets/js/table-treeview.js"></script>

    <!-- Chart Custom JavaScript -->
    <script src="/template/assets/js/customizer.js"></script>

    <!-- Chart Custom JavaScript -->
    <script async src="/template/assets/js/chart-custom.js"></script>

    <!-- app JavaScript -->
    <script src="/template/assets/js/app.js"></script>
</body>

</html>

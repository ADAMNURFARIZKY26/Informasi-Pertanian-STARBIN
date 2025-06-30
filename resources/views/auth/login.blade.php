<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet" />

    <!-- icon page-->
    <link href="{{ asset('halaman-depan/assets/img/Logo/Logo .png') }}" rel="icon">

    <link rel="stylesheet" href="{{asset('authentikasi/sign-in/fonts/icomoon/style.css')}}" />

    <link rel="stylesheet" href="{{asset('authentikasi/sign-in/css/owl.carousel.min.css')}}" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('authentikasi/sign-in/css/bootstrap.min.css')}}" />

    <!-- Style -->
    <link rel="stylesheet" href="{{asset('authentikasi/sign-in/css/style.css')}}" />
    <link rel="stylesheet" href="{{asset('authentikasi/sign-in/css/flashmassage.css')}}" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <title>Login</title>

    <style>
        .login-container {
            display: flex;
            flex-wrap: wrap;
            min-height: 100vh;
            align-items: center;
            justify-content: center;
        }

        .form-box {
            flex: 1 1 400px;
            padding: 30px;
            max-width: 500px;
        }

        .image-box {
            flex: 1 1 400px;
            max-width: 500px;
            aspect-ratio: 1 / 1;
            border: 5px solid #06926f;
            border-radius: 20px;
            overflow: hidden;
        }

        .image-box img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        @media (max-width: 768px) {
            .login-container {
                flex-direction: column;
            }

            .image-box,
            .form-box {
                max-width: 90%;
            }

            .image-box {
                margin-top: 20px;
                aspect-ratio: 1 / 1;
            }
        }
    </style>
</head>

<body>
    @if (session('success'))
    <div class="custom-alert alert-success" id="flash-success">
        <strong>Sukses!</strong> {{ session('success') }}
    </div>
    @endif

    @if (session('error'))
    <div class="custom-alert alert-danger" id="flash-error">
        <strong>Error!</strong> {{ session('error') }}
    </div>
    @endif

    <div class="mb-3">
        <a href="{{route('welcome')}}" class="btn btn-sm back-btn">
            <i class="bi bi-arrow-left me-1"></i>
        </a>
    </div>
    <div class="content">
        <div class="container login-container">
            <!-- Gambar kiri -->
            <div class="image-box">
                <img src="{{asset('authentikasi/sign-in/images/smart-farming-iot-agriculture.webp')}}" alt="Ilustrasi Pertanian" />
            </div>
            <!-- Form kanan -->
            <div class="form-box">
                <div class="mb-4">
                    <h3>Masuk ke Sistem <strong>ATPH</strong></h3>
                    <p class="mb-4 text-muted">
                        Silakan login untuk mengakses layanan pertanian terpadu kami.
                    </p>
                </div>
                <form action="{{ route('login') }}" method="POST">
                    @csrf

                    <div class="form-group first">
                        <label for="email">Alamat Email</label>
                        <input type="text" class="form-control @error('email') is-invalid @enderror"
                            name="email" id="email" value="{{ old('email') }}" required autofocus />
                    </div>

                    <div class="form-group last mb-4">
                        <label for="password">Kata Sandi</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                            name="password" id="password" required />
                    </div>

                    <input type="submit" value="Masuk" class="btn text-black btn-block btn-success" style="background-color: #06926f" />

                    <div class="d-flex mb-5 align-items-center mt-3 justify-content-between">
                        <a href="{{ route('register') }}" class="forgot-pass">Belum Punya Akun?</a>
                        <a href="{{ route('password.request') }}" class="forgot-pass">Lupa Kata Sandi?</a>
                    </div>
                </form>
            </div>

        </div>
    </div>

    <script src="{{asset('authentikasi/sign-in/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('authentikasi/sign-in/js/popper.min.js')}}"></script>
    <script src="{{asset('authentikasi/sign-in/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('authentikasi/sign-in/js/main.js')}}"></script>
    <script src="{{asset('authentikasi/sign-in/js/flashmassage.js')}}"></script>

</body>

</html>
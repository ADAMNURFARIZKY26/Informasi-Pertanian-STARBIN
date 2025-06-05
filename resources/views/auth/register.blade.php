<!doctype html>
<html lang="id">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('authentikasi/sign-up/fonts/icomoon/style.css')}}">
    <link rel="stylesheet" href="{{asset('authentikasi/sign-up/css/owl.carousel.min.css')}}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('authentikasi/sign-up/css/bootstrap.min.css')}}">

    <!-- Style -->
    <link rel="stylesheet" href="{{asset('authentikasi/sign-up/css/style.css')}}">

    <title>Daftar Akun</title>

    <!-- icon page -->
    <link href="{{ asset('halaman-depan/assets/img/Logo/Logo .png') }}" rel="icon">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css')}}" rel="stylesheet">

    <!-- style pop-up -->
    <style>
        @keyframes slideUp {
            from {
                transform: translate(-50%, 100%);
            }

            to {
                transform: translate(-50%, 0);
            }
        }

        input[type="submit"] {
            background-color: #06926f;
            /* Warna dasar */
            color: white;
            border: none;
            padding: 10px 20px;
            font-weight: bold;
            border-radius: 8px;
            transition: background-color 0.3s ease, transform 0.2s ease;
            cursor: pointer;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        input[type="submit"]:hover {
            background-color: #047f5e;
            /* Warna saat hover */
            transform: scale(1.01);
            /* Efek sedikit naik */
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
            /* Bayangan lebih tebal */
        }
    </style>
</head>

<body>

    <div class="content">
        <div class="container">
            <div class="row">
                <!-- Gambar -->
                <div class="col-md-5 d-none d-md-flex align-items-center justify-content-center">
                    <div style="width: 100%; height: 400px; border: 5px solid #06926f; border-radius: 20px; overflow: hidden;">
                        <img src="{{asset('authentikasi/sign-up/images/smart-farming-iot-agriculture.webp')}}" alt="Ilustrasi"
                            style="width: 100%; height: 100%; object-fit: cover;">
                    </div>
                </div>

                <!-- Form -->
                <div class="col-md-7 contents">
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <div class="mb-4">
                                <h3 style="font-weight: bold; color: #06926f;">Daftar Akun</h3>
                                <p class="mb-4">Silakan isi formulir di bawah ini untuk membuat akun baru.</p>
                            </div>

                            <form action="{{ route('noverify') }}" method="post" class="custom-form" onsubmit="return validateForm()">
                                @csrf

                                <!-- Baris 1: Nama & Email -->
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="fullname" placeholder="Nama Lengkap" value="{{ old('name') }}" required>
                                        <small class="form-text text-muted">Masukkan nama lengkap Anda.</small>
                                        <small class="text-danger" id="errorNama"></small>
                                        @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="Alamat Email" value="{{ old('email') }}" required>
                                        <small class="form-text text-muted">Gunakan alamat email aktif Anda.</small>
                                        <small class="text-danger" id="errorEmail"></small>
                                        @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                                    </div>
                                </div>

                                <!-- Baris 2: Password & Telepon -->
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="Kata Sandi" required>
                                        <small class="form-text text-muted">Masukan kata sandi Anda.</small>
                                        <small class="text-danger" id="errorPassword"></small>
                                        @error('password') <small class="text-danger">{{ $message }}</small> @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">+62</span>
                                            </div>
                                            <input type="text" class="form-control @error('telepon') is-invalid @enderror" name="telepon" id="telepon" placeholder="Nomor Telepon" value="{{ old('telepon') }}" required>
                                        </div>
                                        <small class="text-muted">Masukan nomor telepon Anda.</small>
                                        <small class="text-danger" id="errorTelepon"></small>
                                        @error('telepon') <small class="text-danger">{{ $message }}</small> @enderror
                                    </div>
                                </div>

                                <!-- Baris 3: Tanggal Lahir & Jenis Kelamin -->
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" name="tanggal_lahir" id="tanggal_lahir" value="{{ old('tanggal_lahir') }}" required>
                                        <small class="form-text text-muted">Pilih tanggal lahir Anda.</small>
                                        <small class="text-danger" id="errorTanggalLahir"></small>
                                        @error('tanggal_lahir') <small class="text-danger">{{ $message }}</small> @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="d-block mb-2">Jenis Kelamin</label>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input @error('jenis_kelamin') is-invalid @enderror" type="radio" name="jenis_kelamin" id="laki" value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'checked' : '' }} required>
                                            <label class="form-check-label" for="laki">Laki-laki</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input @error('jenis_kelamin') is-invalid @enderror" type="radio" name="jenis_kelamin" id="perempuan" value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="perempuan">Perempuan</label>
                                        </div>
                                        <small class="form-text text-muted">Pilih jenis kelamin Anda.</small>
                                        <small class="text-danger" id="errorGender"></small>
                                        @error('jenis_kelamin') <br><small class="text-danger">{{ $message }}</small> @enderror
                                    </div>
                                </div>

                                <!-- Tombol Submit -->
                                <input type="submit" value="Konfirmasi" class="btn btn-success btn-block" style="background-color: #06926f;">

                                <!-- Link ke login -->
                                <p class="text-center mt-3" style="color: black;">
                                    Sudah punya akun? <a href="{{ route('login') }}" style="color: #06926f; text-decoration: underline;">Login di sini</a>
                                </p>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script src="{{asset('authentikasi/sign-up/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('authentikasi/sign-up/js/popper.min.js')}}"></script>
    <script src="{{asset('authentikasi/sign-up/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('authentikasi/sign-up/js/main.js')}}"></script>
    <script>
        function validateForm() {
            let isValid = true;

            // Ambil semua nilai input
            const nama = document.getElementById('fullname').value.trim();
            const email = document.getElementById('email').value.trim();
            const password = document.getElementById('password').value.trim();
            const telepon = document.getElementById('telepon').value.trim();
            const tanggalLahir = document.getElementById('tanggal_lahir').value;
            const gender = document.querySelector('input[name="jenis_kelamin"]:checked');

            // Reset error
            document.getElementById('errorNama').innerText = '';
            document.getElementById('errorEmail').innerText = '';
            document.getElementById('errorPassword').innerText = '';
            document.getElementById('errorTelepon').innerText = '';
            document.getElementById('errorTanggalLahir').innerText = '';
            document.getElementById('errorGender').innerText = '';

            // Validasi Nama
            if (nama.length < 5) {
                document.getElementById('errorNama').innerText = 'Nama minimal 5 karakter.';
                isValid = false;
            }

            // Validasi Email
            if (!email.includes('@')) {
                document.getElementById('errorEmail').innerText = 'Alamat email tidak valid.';
                isValid = false;
            }

            // Validasi Password
            if (password.length < 8) {
                document.getElementById('errorPassword').innerText = 'Kata sandi minimal 8 karakter.';
                isValid = false;
            }

            // Validasi Telepon
            const teleponRegex = /^[0-9]{11,12}$/;
            if (!teleponRegex.test(telepon)) {
                document.getElementById('errorTelepon').innerText = 'Nomor telepon harus 11–12 digit angka.';
                isValid = false;
            }

            // Validasi Umur
            if (!tanggalLahir) {
                document.getElementById('errorTanggalLahir').innerText = 'Tanggal lahir harus diisi.';
                isValid = false;
            } else {
                const lahir = new Date(tanggalLahir);
                const hariIni = new Date();
                let umur = hariIni.getFullYear() - lahir.getFullYear();
                const bulan = hariIni.getMonth() - lahir.getMonth();
                if (bulan < 0 || (bulan === 0 && hariIni.getDate() < lahir.getDate())) umur--;

                if (umur < 10) {
                    document.getElementById('errorTanggalLahir').innerText = 'Umur minimal harus 10 tahun.';
                    isValid = false;
                }
            }

            // Validasi Gender
            if (!gender) {
                document.getElementById('errorGender').innerText = 'Pilih salah satu jenis kelamin.';
                isValid = false;
            }

            // Hanya mengembalikan hasil validasi
            return isValid;
        }
    </script>
</body>

</html>
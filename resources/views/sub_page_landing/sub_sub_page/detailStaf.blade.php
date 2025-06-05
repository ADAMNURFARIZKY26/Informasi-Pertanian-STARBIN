<style>
  .main {
    margin-top: 100px;
  }

  .shadow-lg {
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.15) !important;
  }

  .main-title {
    position: relative;
    display: inline-block;
    animation: fadeInDown 1s ease forwards;
    margin-bottom: 3rem !important;
    letter-spacing: 1.2px;
  }

  .main-title::after {
    content: '';
    display: block;
    width: 100%;
    max-width: 100%;
    height: 4px;
    background-color: #008467;
    margin-top: 6px;
    border-radius: 2px;
  }

  /* Animasi fade in */
  @keyframes fadeInDown {
    0% {
      opacity: 0;
      transform: translateY(-20px);
    }

    100% {
      opacity: 1;
      transform: translateY(0);
    }
  }

  /* Artikel sayuran */
  .vegetable-item {
    background-color: #fff;
    /* hapus shadow */
  }

  /* border bottom sebagai pemisah */
  .vegetable-item.border-bottom {
    border-bottom: 2px solid #008467;
  }

  .veg-img {
    width: 250px;
    height: auto;
    border-radius: 0.75rem;
    object-fit: cover;
  }

  .veg-title {
    color: #008467;
    font-weight: 700;
    font-size: 1.6rem;
    line-height: 1.2;
  }

  .veg-desc {
    font-size: 1.05rem;
    line-height: 1.6;
    color: #444;
    max-width: 720px;
  }

  .badge {
    font-size: 0.85rem;
    padding: 0.45em 0.9em;
  }

  /* Responsive for mobile */
  @media (max-width: 576px) {
    .veg-img {
      width: 100%;
      max-width: 100%;
      margin-bottom: 1rem !important;
    }
  }

  .back-button .btn {
    transition: all 0.3s ease;
  }

  .back-button .btn:hover {
    background-color: #047256;
    /* warna lebih gelap saat hover */
    transform: scale(1.05);
    /* sedikit membesar */
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
    /* bayangan lebih kuat saat hover */
  }
</style>
@extends('layouts.landing.main')
@section('title', 'Staf Kami')
@section('content')
<div class="container py-4">
  <h2 class="main-title text-center">Detail Staf</h2>
  <div class="row justify-content-center">
    <div class="col-12">
      <div class="card shadow-lg border-0" style="border-radius: 20px;">
        <div class="row g-0">

          <!-- Foto Staf sebagai cover -->
          <div class="col-md-4 d-flex align-items-center justify-content-center p-3" style="background-color: #06926f; border-radius: 20px;">
            <img src="{{asset('halaman-depan/assets/img/testimonials/testimonials-2.jpg')}}" alt="Staf" class="img-fluid rounded-circle shadow" style="width: 200px; height: 200px; object-fit: cover; border: 5px solid white;">
          </div>

          <!-- Informasi pribadi -->
          <div class="col-md-8">
            <div class="card-body">
              <h3 class="card-title mb-2 fw-bold text-success">Andini Rahmawati</h3>
              <p class="text-muted mb-4">Manajer Operasional</p>

              <div class="row mb-2">
                <div class="col-sm-5 fw-semibold">Tanggal Lahir</div>
                <div class="col-sm-7">12 Maret 1990</div>
              </div>
              <div class="row mb-2">
                <div class="col-sm-5 fw-semibold">Tanggal Bergabung</div>
                <div class="col-sm-7">5 Januari 2022</div>
              </div>
              <div class="row mb-2">
                <div class="col-sm-5 fw-semibold">Nomor Telepon</div>
                <div class="col-sm-7">+62 812-3456-7890</div>
              </div>
              <div class="row mb-2">
                <div class="col-sm-5 fw-semibold">Email</div>
                <div class="col-sm-7">andini@organik.com</div>
              </div>
              <div class="row mb-2">
                <div class="col-sm-5 fw-semibold">Alamat</div>
                <div class="col-sm-7">Jl. Melati No. 10, Bandung</div>
              </div>

              <br>
              <hr>

              <h5 class="fw-semibold mt-3 text-success">Tentang Staf</h5>
              <p class="veg-desc">
                Andini adalah individu yang berdedikasi tinggi dalam mengelola operasional harian kami. Dengan pengalaman lebih dari 5 tahun di bidang agribisnis, ia memastikan setiap proses berjalan efisien dan ramah lingkungan. Ketertarikannya pada pertanian organik menjadikannya bagian penting dalam tim kami.
              </p>
            </div>
          </div>

        </div> <!-- end row -->
      </div>
    </div>
  </div>
</div>
</main>

<!-- Tombol Kembali -->
<div class="text-center my-4 back-button">
  <button onclick="window.history.back()" class="btn btn-success shadow px-4 py-2" style="border-radius: 5px; font-weight: 600; font-size: 1rem; background-color:#06926f;">
    <i class="bi bi-arrow-left-circle me-2"></i> Kembali
  </button>
</div>

<br><br>
@endsection
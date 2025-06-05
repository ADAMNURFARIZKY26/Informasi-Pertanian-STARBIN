<style>
  .heading {
    background-size: cover;
    background-position: center;
    height: 300px;
    /* sesuaikan sesuai kebutuhan */
    position: relative;
  }

  .bg-overlay {
    background-color: rgba(0, 0, 0, 0.4);
    /* efek gelap */
    z-index: 1;
  }

  /* Pastikan konten di atas overlay */
  .heading .container {
    z-index: 2;
    position: relative;
  }

  .text-theme-green {
    color: #06926f;
  }

  .bg-theme-light {
    background-color: #f5fefb;
  }

  .border-theme {
    border: 1px solid #06926f;
  }

  .card-hover:hover {
    transform: translateY(-5px);
    transition: all 0.3s ease;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
  }
</style>
@extends('layouts.landing.main')
@section('title', 'Tentang Kami')
@section('content')
<div class="page-title position-relative">
  <div class="heading d-flex align-items-center justify-content-center text-center position-relative text-white" style="background-image: url('{{ asset('halaman-depan/assets/img/tentang-kami/pertanian-3.jpg') }}');">
    <div class="bg-overlay position-absolute top-0 start-0 w-100 h-100"></div>

    <div class="container position-relative z-2" style="margin-top: -100px;">
      <div class="col-lg-8 mx-auto">
        <h1>Tentang Kami</h1>
      </div>
    </div>
  </div>

  <nav class="breadcrumbs">
    <div class="container">
      <ol>
        <li><a href="{{ route('welcome') }}">Beranda</a></li>
        <li class="current">Tentang Kami</li>
      </ol>
    </div>
  </nav>
</div>

<!-- Tentang Kami Section -->
<section class="py-5" id="tentang-kami">
  <div class="container">

    <!-- Section 1: Deskripsi Awal -->
    <div class="text-center mb-4">
      <h2 class="fw-bold text-theme-green">Tentang Kami</h2>
    </div>
    <div class="row align-items-center mb-5 bg-theme-light p-4 rounded shadow" data-aos="fade-up">
      <div class="col-md-6 mb-3 mb-md-0">
        <img src="{{ asset('halaman-depan/assets/img/tentang-kami/pertanian-2.jpeg') }}" alt="Tentang Kami" class="img-fluid rounded shadow">
      </div>
      <div class="col-md-6">
        <p class="mb-0">
          Lorem ipsum dolor sit amet, consectetur adipiscing elit...
        </p>
      </div>
    </div>

    <!-- Section 2: Visi & Misi -->
    <div class="text-center mb-4" id="visi-misi">
      <h2 class="fw-bold text-theme-green">Visi & Misi</h2>
    </div>
    <div class="row align-items-center mb-5 flex-lg-row-reverse" data-aos="fade-up">
      <div class="col-lg-5 mb-4 mb-lg-0">
        <img src="{{ asset('halaman-depan/assets/img/tentang-kami/pertanian-1.jpeg') }}" alt="Visi Misi" class="img-fluid rounded shadow">
      </div>
      <div class="col-lg-7">
        <div class="p-4 rounded shadow border-theme bg-white">
          <h3 class="mb-3 text-theme-green">Visi</h3>
          <p>
            Lorem ipsum dolor sit amet...
          </p>
          <h3 class="mt-4 mb-3 text-theme-green">Misi</h3>
          <ul class="mb-0">
            <li>Lorem ipsum dolor sit amet...</li>
            <li>Integer at diam nec nulla sagittis dignissim.</li>
            <li>Fusce in risus ac sapien volutpat sodales a in enim.</li>
            <li>Aliquam erat volutpat, sed feugiat velit lacinia id.</li>
            <li>Curabitur fringilla elit in nunc fermentum...</li>
          </ul>
        </div>
      </div>
    </div>

    <!-- Section 3: Staf Kami -->
    <div class="text-center mb-4" id="staf-kami" data-aos="fade-up">
      <h2 class="fw-bold text-theme-green">Staf Kami</h2>
    </div>
    <div class="row g-4" data-aos="fade-up">
      <!-- Cards -->
      <div class="col-md-4 col-sm-6">
        <a href="{{route('detaiStaf')}}" class="card card-hover text-center border-0 shadow h-100 text-decoration-none text-dark">
          <div class="card-body">
            <img src="{{ asset('halaman-depan/assets/img/testimonials/testimonials-2.jpg') }}" alt="Staf" class="rounded-circle mb-3" width="120" height="120">
            <h5 class="card-title">Siti Rahmawati</h5>
          </div>
        </a>
      </div>

    </div>
  </div>
</section>
@endsection
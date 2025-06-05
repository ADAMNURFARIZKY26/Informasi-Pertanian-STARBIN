<style>
  .shadow-lg {
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.15) !important;
  }

  .main-title {
    position: relative;
    display: inline-block;
    animation: fadeInDown 1s ease forwards;
    margin-bottom: 3rem !important;
    font-weight: 900;
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
@section('title', 'Sayuran Daun')
@section('content')
<section class="py-5">
  <div class="container">
    <br><br><br>
    <h1 class="text-center mb-5 fw-bold main-title" style="color: #008467; font-size: 2rem;">
      Detail Sayuran Daun
    </h1>

    <article class="vegetable-item d-flex flex-column flex-md-row align-items-start mb-5 py-4 px-3 border-bottom">
      <img src="{{asset('hidrophonik-page/assets/img/hidrophnik-photos/photo-1.jpeg')}}" alt="Basil Organik" class="veg-img me-md-4 mb-3 mb-md-0">
      <div>
        <h4 class="veg-title mb-3"><i class="bi bi-emoji-nature me-2 text-success"></i>Sawi hijau</h4>
        <p class="veg-desc mb-3">
          Sawi hijau kaya vitamin A, C, dan K. Mudah tumbuh dalam sistem hidroponik dan cocok untuk konsumsi harian karena rendah kalori dan tinggi serat.
        </p>
      </div>
    </article>

    <article class="vegetable-item d-flex flex-column flex-md-row align-items-start mb-5 py-4 px-3 border-bottom">
      <img src="{{asset('hidrophonik-page/assets/img/hidrophnik-photos/photo-1.jpeg')}}" alt="Mint Organik" class="veg-img me-md-4 mb-3 mb-md-0">
      <div>
        <h4 class="veg-title mb-3"><i class="bi bi-emoji-nature me-2 text-success"></i>Selada</h4>
        <p class="veg-desc mb-3">
          Selada mengandung banyak udara dan serat, serta cocok sebagai bahan salad segar. Tumbuh cepat dengan perawatan sederhana di sistem NFT atau rakit apung.
        </p>
      </div>
    </article>

    <article class="vegetable-item d-flex flex-column flex-md-row align-items-start mb-5 py-4 px-3 border-bottom">
      <img src="{{asset('hidrophonik-page/assets/img/hidrophnik-photos/photo-1.jpeg')}}" alt="Jahe Organik" class="veg-img me-md-4 mb-3 mb-md-0">
      <div>
        <h4 class="veg-title mb-3"><i class="bi bi-emoji-nature me-2 text-success"></i>Bayam</h4>
        <p class="veg-desc mb-3">
          Bayam mengandung zat besi, magnesium, dan vitamin K. Dapat dipanen dalam waktu singkat dan aman dikonsumsi tanpa kontaminasi tanah atau pestisida.
        </p>
      </div>
    </article>

    <article class="vegetable-item d-flex flex-column flex-md-row align-items-start mb-5 py-4 px-3 border-bottom">
      <img src="{{asset('hidrophonik-page/assets/img/hidrophnik-photos/photo-1.jpeg')}}" alt="Kunyit Organik" class="veg-img me-md-4 mb-3 mb-md-0">
      <div>
        <h4 class="veg-title mb-3"><i class="bi bi-emoji-nature me-2 text-success"></i>Kangkung</h4>
        <p class="veg-desc mb-3">
          Kangkung sangat adaptif dalam sistem hidroponik. Kaya vitamin A dan C, serta membantu sistem pencernaan dan detoksifikasi tubuh.
        </p>
      </div>
    </article>
  </div>
</section>

<!-- Tombol Kembali -->
<div class="text-center my-4 back-button">
  <button onclick="window.history.back()" class="btn btn-success shadow px-4 py-2" style="border-radius: 5px; font-weight: 600; font-size: 1rem; background-color:#06926f;">
    <i class="bi bi-arrow-left-circle me-2"></i> Kembali
  </button>
</div>

<br><br>
@endsection
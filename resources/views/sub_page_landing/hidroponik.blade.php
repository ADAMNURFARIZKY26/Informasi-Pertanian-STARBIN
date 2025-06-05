<link href="{{asset('hidrophonik-page/assets/css/my.css')}}" rel="stylesheet">
<style>
    .heading {
    background-size: cover;
    background-position: center;
    height: 500px;
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

</style>
@extends('layouts.landing.main')
@section('title', 'Hidroponik')
@section('content')
<div class="page-title position-relative">
  <div class="heading d-flex align-items-center justify-content-center text-center position-relative text-white" style="background-image: url('{{ asset('hidrophonik-page/assets/img/sayuranDaun.jpg') }}');">
    <div class="bg-overlay position-absolute top-0 start-0 w-100 h-100"></div>

    <div class="container position-relative z-2" style="margin-top: -100px;">
      <div class="col-lg-8 mx-auto">
        <h1>Hidroponik</h1>
      </div>
    </div>
  </div>

  <nav class="breadcrumbs">
    <div class="container">
      <ol>
        <li><a href="{{ route('welcome') }}">Beranda</a></li>
        <li class="current">Hidroponik</li>
      </ol>
    </div>
  </nav>
</div>

<section class="py-5" style="background-color: #f9f9f9;">

  <div class="container">
    <!-- Judul Utama -->
    <div class="section-header mb-4 pb-2">
      <h1 class="fw-bold text-success text-center">
        HIDROPONIK
      </h1>
    </div>

    <!-- Deskripsi Pendahuluan -->
    <div class="mb-5">
      <p class="fs-5 text-dark">
        Hidroponik adalah metode budidaya tanaman tanpa menggunakan tanah. Sebagai gantinya, tanaman ditumbuhkan dengan larutan air yang telah diperkaya nutrisi penting, seperti nitrogen, fosfor, kalium, dan unsur mikro lainnya.
        <br><br>
        Sistem hidroponik sangat cocok diterapkan di area dengan lahan terbatas, seperti lingkungan perkotaan, karena lebih efisien dalam penggunaan air, bersih, dan dapat dikontrol dengan lebih baik.
        <br><br>
        Terdapat berbagai jenis tanaman yang dapat dibudidayakan secara hidroponik, mulai dari sayuran daun, sayuran buah, hingga tanaman herbal dan buah-buahan kecil. Berikut adalah kategori tanaman hidroponik yang umum dijumpai dan relatif mudah untuk dibudidayakan.
      </p>
    </div>

    <!-- Jenis-Jenis Tanaman -->
    <div class="section-header mb-4 pb-2">
      <h1 class="fw-bold text-success">
        Jenis-Jenis Tanaman Hidroponik
      </h1>
    </div>

    <div class="row g-4">
      <!-- Card 1 -->
      <div class="col-lg-3 col-md-4 col-sm-6">
        <div class="custom-card p-2 position-relative">
          <a href="{{route('sayuranDaunHidrophonik')}}" class="stretched-link text-decoration-none">
            <img src="{{asset('hidrophonik-page/assets/img/sayuranDaun.jpg')}}" class="img-fluid rounded mb-2" alt="Sayuran Daun Organik">
            <h2>Sayuran Daun </h2>
            <div class="overlay-hover">
              <div class="overlay-text"><i class="bi bi-box-arrow-up-right"></i> Selengkapnya</div>
            </div>
          </a>
        </div>
      </div>

      <!-- Card 2 -->
      <div class="col-lg-3 col-md-4 col-sm-6">
        <div class="custom-card p-2 position-relative">
          <a href="{{route('sayuranBuahHidrophonik')}}" class="stretched-link text-decoration-none">
            <img src="{{asset('hidrophonik-page/assets/img/sayuranBuah.jpeg')}}" class="img-fluid rounded mb-2" alt="Sayuran Buah Organik">
            <h2>Sayuran Buah</h2>
            <div class="overlay-hover">
              <div class="overlay-text"><i class="bi bi-box-arrow-up-right"></i> Selengkapnya</div>
            </div>
          </a>
        </div>
      </div>

      <!-- Card 4 -->
      <div class="col-lg-3 col-md-4 col-sm-6">
        <div class="custom-card p-2 position-relative">
          <a href="{{route('herbalHidroponik')}}" class="stretched-link text-decoration-none">
            <img src="{{asset('hidrophonik-page/assets/img/herval.jpg')}}" class="img-fluid rounded mb-2" alt="tanaman herbal Organik">
            <h2>Tanaman Herbal</h2>
            <div class="overlay-hover">
              <div class="overlay-text"><i class="bi bi-box-arrow-up-right"></i> Selengkapnya</div>
            </div>
          </a>
        </div>
      </div>
    </div>

    <!-- Deskripsi Sebelum Langkah-Langkah -->
    <div class="mt-5 mb-4">
      <p class="fs-5 text-dark">
        Setelah mengenal jenis-jenis tanaman yang dapat dibudidayakan dengan sistem hidroponik, penting untuk memahami tahapan praktis penanamannya. Mulai dari persiapan alat dan bahan, penyemaian benih, pemindahan tanaman ke sistem utama, hingga proses pemeliharaan dan panen, semua langkah berikut dirancang agar mudah dipahami dan diikuti, bahkan bagi pemula.
      </p>
    </div>

    <br>

    <!-- Langkah-langkah -->
    <div class="section-header mb-4 pb-2">
      <h1 class="fw-bold text-success">
        Langkah-Langkah Bertani Hidroponik
      </h1>
    </div>

    <div class="row g-4">
      <!-- Card 1 -->
      <div class="col-lg-3 col-md-4 col-sm-6">
        <div class="custom-card p-2 position-relative">
          <a href="{{route('persiapanHidrophonik')}}" class="stretched-link text-decoration-none">
            <img src="{{asset('hidrophonik-page/assets/img/persiapan.jpeg')}}" class="img-fluid rounded mb-2" alt="Persiapan Lahan">
            <h2>Persiapan Media Tanam </h2>
            <div class="overlay-hover">
              <div class="overlay-text"><i class="bi bi-box-arrow-up-right"></i> Selengkapnya</div>
            </div>
          </a>
        </div>
      </div>

      <!-- Card 2 -->
      <div class="col-lg-3 col-md-4 col-sm-6">
        <div class="custom-card p-2 position-relative">
          <a href="{{route('penyemaianHidrophonik')}}" class="stretched-link text-decoration-none">
            <img src="{{asset('hidrophonik-page/assets/img/penyemaian.jpg')}}" class="img-fluid rounded mb-2" alt="Pemilihan Benih">
            <h2> Penyemaian Benih</h2>
            <div class="overlay-hover">
              <div class="overlay-text"> Selengkapnya</div>
            </div>
          </a>
        </div>
      </div>

      <!-- Card 3 -->
      <div class="col-lg-3 col-md-4 col-sm-6">
        <div class="custom-card p-2 position-relative">
          <a href="{{route('pemeliharaanHidrophonik')}}" class="stretched-link text-decoration-none">
            <img src="{{asset('hidrophonik-page/assets/img/pemiliharaan.jpg')}}" class="img-fluid rounded mb-2" alt="Pembuatan Kompos">
            <h2>Pemeliharaan Tanaman</h2>
            <div class="overlay-hover">
              <div class="overlay-text"><i class="bi bi-box-arrow-up-right"></i> Selengkapnya</div>
            </div>
          </a>
        </div>
      </div>

      <!-- Card 4 -->
      <div class="col-lg-3 col-md-4 col-sm-6">
        <div class="custom-card p-2 position-relative">
          <a href="{{route('pengendalianHidrophonik')}}" class="stretched-link text-decoration-none">
            <img src="{{asset('hidrophonik-page/assets/img/pengendalian.jpg')}}" class="img-fluid rounded mb-2" alt="Panen Organik">
            <h2>Pengendalian Hama</h2>
            <div class="overlay-hover">
              <div class="overlay-text"><i class="bi bi-box-arrow-up-right"></i> Selengkapnya</div>
            </div>
          </a>
        </div>
      </div>

      <!-- Card 5 -->
      <div class="col-lg-3 col-md-4 col-sm-6">
        <div class="custom-card p-2 position-relative">
          <a href="{{route('panenHidrophonik')}}" class="stretched-link text-decoration-none">
            <img src="{{asset('hidrophonik-page/assets/img/panen.jpeg')}}" class="img-fluid rounded mb-2" alt="Panen Organik">
            <h2>Pemanenan</h2>
            <div class="overlay-hover">
              <div class="overlay-text"><i class="bi bi-box-arrow-up-right"></i> Selengkapnya</div>
            </div>
          </a>
        </div>
      </div>

      <!-- Card 6 -->
      <div class="col-lg-3 col-md-4 col-sm-6">
        <div class="custom-card p-2 position-relative">
          <a href="{{route('PascaPanenHidrophonik')}}" class="stretched-link text-decoration-none">
            <img src="{{asset('hidrophonik-page/assets/img/pasca.jpg')}}" class="img-fluid rounded mb-2" alt="Panen Organik">
            <h2>Pasca Panen</h2>
            <div class="overlay-hover">
              <div class="overlay-text"><i class="bi bi-box-arrow-up-right"></i> Selengkapnya</div>
            </div>
          </a>
        </div>
      </div>
    </div>

    <!-- Penutup -->
    <div class="mt-5">
      <p class="fs-5 text-dark">
        Hidroponik bukan sekadar alternatif bercocok tanam, tetapi juga solusi inovatif untuk menjawab tantangan pertanian modern di tengah keterbatasan lahan dan air. Dengan teknik yang tepat, siapa pun dapat memulai budidaya hidroponik di rumah, baik sebagai hobi maupun peluang usaha.
        <br><br>
        Terus eksplorasi, praktikkan langkah-langkahnya, dan rasakan sendiri manfaat menanam secara hidroponik — lebih sehat, hemat, dan ramah lingkungan. Mari mulai bercocok tanam dari sekarang untuk masa depan yang lebih hijau!
      </p>
    </div>

  </div>

</section>
@endsection
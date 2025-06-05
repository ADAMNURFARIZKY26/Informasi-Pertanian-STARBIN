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

</style>
@extends('layouts.landing.main')
@section('title', 'Organik ')
@section('content')
<link href="{{ asset('organik-page/assets/css/my.css') }}" rel="stylesheet">

<div class="page-title position-relative">
  <div class="heading d-flex align-items-center justify-content-center text-center position-relative text-white" style="background-image: url('{{ asset('halaman-depan/assets/img/organik/organik-1.jpg') }}');">
    <div class="bg-overlay position-absolute top-0 start-0 w-100 h-100"></div>

    <div class="container position-relative z-2" style="margin-top: -100px;">
      <div class="col-lg-8 mx-auto">
        <h1>Organik</h1>
      </div>
    </div>
  </div>

  <nav class="breadcrumbs">
    <div class="container">
      <ol>
        <li><a href="{{ route('welcome') }}">Beranda</a></li>
        <li class="current">Organik</li>
      </ol>
    </div>
  </nav>
</div>

<section class="py-5" style="background-color: #f9f9f9;">

  <div class="container">
    <!-- Judul Utama -->
    <div class="section-header mb-4 pb-2">
      <h1 class="fw-bold text-center" style="color: #06926f;">
        <i class="bi bi-seedling me-2"></i>PERTANIAN ORGANIK
      </h1>
    </div>

    <!-- Deskripsi Pendahuluan -->
    <div class="mb-5">
      <p class="fs-5 text-dark">
        Pertanian organik adalah metode budidaya tanaman yang mengutamakan keseimbangan ekosistem alami tanpa menggunakan bahan kimia sintetis seperti pestisida dan pupuk buatan. Sistem ini fokus pada keberlanjutan lingkungan, kesehatan tanah, serta hasil panen yang lebih sehat bagi konsumen.
        <br><br>
        Berbeda dari pertanian konvensional, pertanian organik mengandalkan pupuk kompos, pengendalian hama alami, serta rotasi tanaman untuk menjaga kesuburan tanah. Metode ini dinilai lebih ramah lingkungan dan berkontribusi terhadap ketahanan pangan jangka panjang.
        <br><br>
        Berikut ini adalah beberapa jenis tanaman yang umum dibudidayakan secara organik dan sangat cocok ditanam baik di lahan luas maupun di pekarangan rumah.
      </p>
    </div>

    <!-- Jenis-Jenis Tanaman -->
    <div class="section-header mb-4 pb-2">
      <h1 class="fw-bold" style="color: #06926f;">
        Jenis Tanaman Organik Populer
      </h1>
    </div>

    <div class="row g-4">
      <!-- Card 1 -->
      <div class="col-lg-3 col-md-4 col-sm-6">
        <div class="custom-card p-2 position-relative">
          <a href="{{route('sayuranOrganik')}}" class="stretched-link text-decoration-none">
            <img src="{{ asset('halaman-depan/assets/img/organik/organik-2.jpg') }}" class="img-fluid rounded mb-2" alt="Sayuran Daun Organik">
            <h2>Sayuran Organik</h2>
            <div class="overlay-hover">
              <div class="overlay-text"><i class="bi bi-box-arrow-up-right"></i> Selengkapnya</div>
            </div>
          </a>
        </div>
      </div>

      <!-- Card 2 -->
      <div class="col-lg-3 col-md-4 col-sm-6">
        <div class="custom-card p-2 position-relative">
          <a href="{{route('buahOrganik')}}" class="stretched-link text-decoration-none">
            <img src="{{ asset('halaman-depan/assets/img/organik/organik-3.jpeg') }}" class="img-fluid rounded mb-2" alt="Buah-buahan Organik">
            <h2>Buah-buahan Organik</h2>
            <div class="overlay-hover">
              <div class="overlay-text"><i class="bi bi-box-arrow-up-right"></i> Selengkapnya</div>
            </div>
          </a>
        </div>
      </div>

      <!-- Card 3 -->
      <div class="col-lg-3 col-md-4 col-sm-6">
        <div class="custom-card p-2 position-relative">
          <a href="{{route('herbalOrganik')}}" class="stretched-link text-decoration-none">
            <img src="{{ asset('halaman-depan/assets/img/organik/organik-4.jpg') }}" class="img-fluid rounded mb-2" alt="Tanaman Rempah">
            <h2>Tanaman Herbal Organik</h2>
            <div class="overlay-hover">
              <div class="overlay-text"><i class="bi bi-box-arrow-up-right"></i> Selengkapnya</div>
            </div>
          </a>
        </div>
      </div>

      <!-- Card 4 -->
      <div class="col-lg-3 col-md-4 col-sm-6">
        <div class="custom-card p-2 position-relative">
          <a href="{{route('panganOrganik')}}" class="stretched-link text-decoration-none">
            <img src="{{ asset('halaman-depan/assets/img/organik/organik-5.jpg') }}" class="img-fluid rounded mb-2" alt="Buah Lokal Organik">
            <h2>Tanaman Pangan Organik</h2>
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
        Untuk memulai pertanian organik, terdapat beberapa tahapan penting yang harus dipahami. Proses ini dimulai dari pengolahan lahan secara alami, pemilihan bibit organik, pembuatan kompos, hingga manajemen hama secara ekologis. Langkah-langkah berikut dirancang untuk memberikan panduan praktis bagi siapa pun yang ingin memulai pertanian organik, baik di desa maupun di perkotaan.
      </p>
    </div>

    <br>

    <!-- Langkah-langkah -->
    <div class="section-header mb-4 pb-2">
      <h1 class="fw-bold text-success">
        Langkah-Langkah Bertani Organik
      </h1>
    </div>

    <div class="row g-4">
      <!-- Card 1 -->
      <div class="col-lg-3 col-md-4 col-sm-6">
        <div class="custom-card p-2 position-relative">
          <a href="{{route('persiapanOrganik')}}" class="stretched-link text-decoration-none">
            <img src="{{ asset('organik-page/assets/img/persiapanOrganik.jpg') }}" class="img-fluid rounded mb-2" alt="Persiapan Lahan">
            <h2>Persiapan Lahan</h2>
            <div class="overlay-hover">
              <div class="overlay-text"><i class="bi bi-box-arrow-up-right"></i> Selengkapnya</div>
            </div>
          </a>
        </div>
      </div>

      <!-- Card 2 -->
      <div class="col-lg-3 col-md-4 col-sm-6">
        <div class="custom-card p-2 position-relative">
          <a href="{{route('penyemaianOrganik')}}" class="stretched-link text-decoration-none">
            <img src="{{ asset('organik-page/assets/img/penyemaianOrganik.jpeg') }}" class="img-fluid rounded mb-2" alt="Pemilihan Benih">
            <h2>Pemilihan dan Penyemaian Benih</h2>
            <div class="overlay-hover">
              <div class="overlay-text"><i class="bi bi-box-arrow-up-right"></i> Selengkapnya</div>
            </div>
          </a>
        </div>
      </div>

      <!-- Card 3 -->
      <div class="col-lg-3 col-md-4 col-sm-6">
        <div class="custom-card p-2 position-relative">
          <a href="{{route('penanamanOrganik')}}" class="stretched-link text-decoration-none">
            <img src="{{ asset('organik-page/assets/img/penanamanOrganik.jpeg') }}" class="img-fluid rounded mb-2" alt="Pembuatan Kompos">
            <h2>Penanaman Bibit</h2>
            <div class="overlay-hover">
              <div class="overlay-text"><i class="bi bi-box-arrow-up-right"></i> Selengkapnya</div>
            </div>
          </a>
        </div>
      </div>

      <!-- Card 4 -->
      <div class="col-lg-3 col-md-4 col-sm-6">
        <div class="custom-card p-2 position-relative">
          <a href="{{route('perawatanOrganik')}}" class="stretched-link text-decoration-none">
            <img src="{{ asset('organik-page/assets/img/perawatanOrganik.jpg') }}" class="img-fluid rounded mb-2" alt="Panen Organik">
            <h2>Perawatan Tanaman</h2>
            <div class="overlay-hover">
              <div class="overlay-text"><i class="bi bi-box-arrow-up-right"></i> Selengkapnya</div>
            </div>
          </a>
        </div>
      </div>

      <!-- Card 5 -->
      <div class="col-lg-3 col-md-4 col-sm-6">
        <div class="custom-card p-2 position-relative">
          <a href="{{route('pengendalianOrganik')}}" class="stretched-link text-decoration-none">
            <img src="{{ asset('organik-page/assets/img/pengendalianOrganik.jpg') }}" class="img-fluid rounded mb-2" alt="Panen Organik">
            <h2>Pengendalian Hama</h2>
            <div class="overlay-hover">
              <div class="overlay-text"><i class="bi bi-box-arrow-up-right"></i> Selengkapnya</div>
            </div>
          </a>
        </div>
      </div>

      <!-- Card 6 -->
      <div class="col-lg-3 col-md-4 col-sm-6">
        <div class="custom-card p-2 position-relative">
          <a href="{{route('panenOrganik')}}" class="stretched-link text-decoration-none">
            <img src="{{ asset('organik-page/assets/img/panenOrganik.jpg') }}" class="img-fluid rounded mb-2" alt="Panen Organik">
            <h2>Panen</h2>
            <div class="overlay-hover">
              <div class="overlay-text"><i class="bi bi-box-arrow-up-right"></i> Selengkapnya</div>
            </div>
          </a>
        </div>
      </div>

      <!-- Card 7 -->
      <div class="col-lg-3 col-md-4 col-sm-6">
        <div class="custom-card p-2 position-relative">
          <a href="{{route('pengolahanOrganik')}}" class="stretched-link text-decoration-none">
            <img src="{{ asset('organik-page/assets/img/pascaOrganik.jpg') }}" class="img-fluid rounded mb-2" alt="Panen Organik">
            <h2>Pengolahan Pascapanen & Daur Ulang</h2>
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
        Pertanian organik membuka peluang besar bagi masyarakat untuk berkontribusi dalam menjaga lingkungan sekaligus menghasilkan pangan yang sehat dan aman. Dengan metode yang ramah alam dan hasil yang bernilai tinggi, pertanian organik menjadi pilihan cerdas di era modern.
        <br><br>
        Mari mulai langkah kecil dari halaman rumah kita. Menanam secara organik bukan hanya tentang hasil, tetapi juga tentang proses yang berkelanjutan dan penuh makna.
      </p>
    </div>

  </div>

</section>
@endsection
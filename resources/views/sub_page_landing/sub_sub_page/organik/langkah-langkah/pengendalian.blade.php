<style>
  body {
    background-color: #f9f9f9;
    margin: 0;
    padding: 0;
  }

  .wrapper {
    display: flex;
    width: 95%;
    margin: 100px auto 0 auto; /* Turunkan 100px dari atas */
    gap: 1.5rem;
    min-height: 80vh;
  }

  .gambar-container {
    width: 50%;
    height: 550px;
    position: sticky;
    top: 100px;
    overflow: hidden;
  }

  .gambar-container img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 10px;
  }

  .artikel-container {
    width: 50%;
    padding: 2rem;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
  }

  .artikel-container h1 {
    color: #008467;
    font-size: 2.4rem;
  }

  .artikel-container p {
    text-align: justify;
    margin-bottom: 1.5rem;
    font-size: 1.2rem;
  }
  @media (max-width: 991px) {
    .wrapper {
      flex-direction: column;
    }

    .gambar-container,
    .artikel-container {
      width: 100%;
      position: relative;
      top: 0;
      height: auto;
    }

    .artikel-container {
      padding: 1.5rem 1rem;
    }

    .artikel-container h1 {
      font-size: 1.8rem;
    }
  }

  .back-button .btn {
    transition: all 0.3s ease;
  }

  .back-button .btn:hover {
    background-color: #047256;
    transform: scale(1.05);
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
  }

  /* Opsional: Hilangkan garis bawah default <a> */
  .back-button .btn:link,
  .back-button .btn:visited {
    text-decoration: none;
    color: white;
  }
</style>
@extends('layouts.landing.main')
@section('title', 'Tahap Penyemaian')
@section('content')

<br><br>

<div class="wrapper">
  <!-- Gambar - Sticky -->
  <div class="gambar-container">
    <img src="{{asset('organik-page/assets/img/pengendalianOrganik.jpg')}}" alt="Sayuran Organik">
  </div>

  <div class="artikel-container">
    <!-- Judul -->
    <h1>5. Tahap Pengendalian Hama dan Penyakit</h1>
    <br>

    <!-- Pembukaan -->
    <p>Setelah tanaman memasuki masa pertumbuhan yang aktif, tahap berikutnya adalah menjaga mereka dari serangan hama dan penyakit secara alami dan aman.</p>

    <!-- Isi -->
    <p>Dalam sistem pertanian organik, pengendalian hama tidak dilakukan dengan pestisida kimia, melainkan menggunakan cara-cara alami seperti pestisida nabati atau pemanfaatan musuh alami. Pengendalian secara alami lebih ramah lingkungan, menjaga kesehatan tanah, dan tidak meninggalkan residu pada tanaman. Pestisida nabati bisa dibuat dari bahan dapur seperti bawang putih, cabai, dan daun pepaya. Sementara itu, strategi seperti penanaman tumpangsari dan tanaman pengusir hama juga membantu menciptakan ekosistem yang sehat.</p>

    <!-- List Manfaat -->
    <p><strong>Berikut adalah langkah-langkah untuk Pengandalian Hama :</strong></p>
    <ul>
      <li style="font-size: 1.2rem;">Semprot tanaman secara berkala dengan larutan pestisida nabati.</li>
      <li style="font-size: 1.2rem;">Gunakan tanaman pengusir hama seperti kenikir, serai, atau marigold.</li>
      <li style="font-size: 1.2rem;">Singkirkan bagian tanaman yang terkena penyakit.</li>
      <li style="font-size: 1.2rem;">Pasang perangkap alami seperti perangkap kuning untuk serangga.</li>
    </ul>

    <!-- Penutupan -->
    <p>Dengan pengendalian yang ramah lingkungan, tanaman tetap sehat tanpa mengorbankan kualitas organiknya.</p>

    <!-- Peling bawah + tombol -->
    <div class="mt-5">
      <a href="{{route('panenOrganik')}}" class="btn btn-success mt-2" style="background-color: #06926f;">
        Selanjutnya <i class="bi bi-arrow-right-circle ms-1"></i>
      </a>
    </div>
  </div>
</div>

<br><br>

<!-- Tombol Kembali -->
<div class="text-center my-4 back-button">
  <a href="{{route('organik')}}" class="btn btn-success shadow px-4 py-2" style="border-radius: 5px; font-weight: 600; font-size: 1rem; background-color:#06926f;">
    <i class="bi bi-arrow-left-circle me-2"></i> Kembali
  </a>
</div>

<br><br>
@endsection
<style>
  body {
    background-color: #f9f9f9;
    margin: 0;
    padding: 0;
  }

  .wrapper {
    display: flex;
    width: 95%;
    margin: 100px auto 0 auto;
    /* Turunkan 100px dari atas */
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
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
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
@section('title', 'Tahap Pengendalian')
@section('content')
<br>
<div class="wrapper">
  <!-- Gambar - Sticky -->
  <div class="gambar-container">
    <img src="{{asset('hidrophonik-page/assets/img/pengendalian.jpg')}}" alt="Pengendalian Hama dan Penyakit Hidroponik">
  </div>

  <div class="artikel-container">
    <!-- Judul -->
    <h1>4. Tahap Pengendalian Hama dan Penyakit</h1>
    <br>

    <!-- Pembukaan -->
    <p>Setelah tanaman dipelihara dengan rutin, penting untuk mengantisipasi serangan hama dan penyakit yang dapat mengganggu pertumbuhan dan kualitas tanaman hidroponik.</p>

    <!-- Isi -->
    <p>Meskipun sistem hidroponik tergolong lebih bersih dibanding pertanian konvensional, hama seperti kutu daun, ulat, dan jamur tetap bisa muncul, terutama jika lingkungan tidak terkontrol. Pengendalian dilakukan secara preventif dengan menjaga sanitasi dan menggunakan metode alami yang aman bagi tanaman dan manusia.</p>

    <!-- List Langkah -->
    <p><strong>Langkah-langkah pengendalian hama dan penyakit dalam sistem hidroponik:</strong></p>
    <ul>
      <li style="font-size: 1.2rem;">Jaga kebersihan area hidroponik, termasuk selang, pipa, dan wadah larutan nutrisi.</li>
      <li style="font-size: 1.2rem;">Gunakan kasa atau jaring pelindung untuk mencegah serangga masuk ke area tanam.</li>
      <li style="font-size: 1.2rem;">Amati daun dan batang secara berkala untuk mendeteksi gejala awal serangan hama atau penyakit.</li>
      <li style="font-size: 1.2rem;">Jika ditemukan hama ringan, bersihkan secara manual atau gunakan semprotan air sabun cair ringan.</li>
      <li style="font-size: 1.2rem;">Gunakan pestisida nabati seperti ekstrak bawang putih, serai, atau daun mimba sebagai alternatif alami.</li>
    </ul>

    <!-- Penutupan -->
    <p>Pengendalian yang cepat dan tepat akan mencegah kerusakan lebih luas pada tanaman. Sistem hidroponik yang bersih dan terpantau dapat meminimalkan penggunaan bahan kimia, sehingga hasil tetap sehat dan aman dikonsumsi.</p>

    <!-- Peling bawah + tombol -->
    <div class="mt-5">
      <a href="{{route('panenHidrophonik')}}" class="btn btn-success mt-2" style="background-color: #06926f;">
        Selanjutnya <i class="bi bi-arrow-right-circle ms-1"></i>
      </a>
    </div>
  </div>
</div>

<br><br>

<!-- Tombol Kembali -->
<div class="text-center my-4 back-button">
  <a href="{{route('hidroponik')}}" class="btn btn-success shadow px-4 py-2" style="border-radius: 5px; font-weight: 600; font-size: 1rem; background-color:#06926f;">
    <i class="bi bi-arrow-left-circle me-2"></i> Kembali
  </a>
</div>

<br><br>
@endsection
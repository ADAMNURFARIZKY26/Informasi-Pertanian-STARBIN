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
@section('title', 'Tahap Panen')
@section('content')

<br><br>

<div class="wrapper">
  <!-- Gambar - Sticky -->
  <div class="gambar-container">
    <img src="{{asset('organik-page/assets/img/persiapanOrganik.jpg')}}" alt="persiapan Organik">
  </div>

  <div class="artikel-container">
    <!-- Judul -->
    <h1>1. Tahap Persiapan Lahan atau Media Tanam</h1>
    <br>

    <!-- Pembukaan -->
    <p>Tahap pertama untuk memulai bertani organik adalah menyiapkan lahan atau media tanam agar siap digunakan untuk budidaya tanaman organik secara berkelanjutan.</p>

    <!-- Isi -->
    <p>Pada tahap ini, persiapan media tanam menjadi kunci utama keberhasilan pertanian organik. Tanaman akan tumbuh sehat jika media tanam memiliki struktur yang baik, kaya nutrisi, serta bebas dari zat kimia berbahaya. Dalam pertanian organik, penggunaan pupuk sintetis atau pestisida kimia sangat dilarang, sehingga media tanam harus mendukung pertumbuhan mikroorganisme alami yang bermanfaat bagi tanaman. Jika dilakukan di lahan, proses pengolahan tanah dilakukan dengan penggemburan dan pemberian bahan organik. Sementara jika dilakukan dalam pot atau polibag, media tanam bisa disiapkan dengan mencampurkan beberapa bahan alami agar mampu menyimpan udara dan menyediakan nutrisi secara alami.</p>

    <!-- List Manfaat -->
    <p><strong>Berikut adalah langkah-langkah untuk mempersiapkan lahan :</strong></p>
    <ul>
      <li style="font-size: 1.2rem;">Bersihkan lahan dari gulma, plastik, dan sisa tanaman sebelumnya.</li>
      <li style="font-size: 1.2rem;">Gemburkan tanah menggunakan cangkul atau alat pertanian.</li>
      <li style="font-size: 1.2rem;">Tambahkan pupuk organik seperti kompos, bokashi, atau pupuk kandang fermentasi.</li>
      <li style="font-size: 1.2rem;">Campur dan diamkan selama 3–7 hari agar nutrisi menyatu dan tanah menjadi lebih hidup.</li>
      <li style="font-size: 1.2rem;">Jika menanam dalam pot/polybag, siapkan campuran tanah, sekam bakar, dan kompos dengan perbandingan 1:1:1.</li>
    </ul>

    <!-- Penutupan -->
    <p>Tahap ini akan sangat menentukan keberlangsungan pertumbuhan tanaman karena kualitas media tanam akan mempengaruhi penyerapan nutrisi serta kemampuan tanaman menghadapi hama secara alami.</p>

    <!-- Peling bawah + tombol -->
    <div class="mt-5">
      <a href="{{route('penyemaianOrganik')}}" class="btn btn-success mt-2" style="background-color: #06926f;">
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
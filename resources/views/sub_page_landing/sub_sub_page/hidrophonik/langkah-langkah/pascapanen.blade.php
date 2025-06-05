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
    font-size: 2.2rem;
  }

  .artikel-container p {
    text-align: justify;
    margin-bottom: 1.5rem;
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
@section('title', 'Tahap Pasca Panen')
@section('content')
<br>
<div class="wrapper">
  <!-- Gambar - Sticky -->
  <div class="gambar-container">
    <img src="{{asset('hidrophonik-page/assets/img/pasca.jpg')}}" alt="pasca panen Hidroponik">
  </div>

  <div class="artikel-container">
    <!-- Judul -->
    <h1>6. Tahap Pascapanen dan Distribusi</h1>
    <br>

    <!-- Pembukaan -->
    <p>Setelah panen dilakukan, tahapan selanjutnya adalah memastikan hasil tanaman hidroponik tetap terjaga kualitasnya hingga sampai ke tangan konsumen.</p>

    <!-- Isi -->
    <p>Sayuran hasil hidroponik umumnya dijual dalam keadaan segar tanpa proses pengawetan, sehingga penanganan pascapanen yang tepat sangat penting untuk menjaga kebersihan, kesegaran, dan nilai jual produk. Penanganan ini mencakup pencucian, sortasi, pengemasan, hingga distribusi ke konsumen atau mitra penjualan.</p>

    <!-- List Langkah -->
    <p><strong>Langkah-langkah pascapanen dan distribusi:</strong></p>
    <ul>
      <li style="font-size: 1.2rem;">Cuci hasil panen menggunakan air bersih untuk menghilangkan sisa larutan atau kotoran yang menempel.</li>
      <li style="font-size: 1.2rem;">Sortir sayuran berdasarkan ukuran dan kualitas untuk meningkatkan daya jual dan keseragaman produk.</li>
      <li style="font-size: 1.2rem;">Keringkan sayuran secara alami atau menggunakan blower ringan agar tidak lembap saat dikemas.</li>
      <li style="font-size: 1.2rem;">Kemas menggunakan plastik berlubang, paper tray, atau kemasan ramah lingkungan lainnya.</li>
      <li style="font-size: 1.2rem;">Distribusikan segera ke konsumen, toko sayur, restoran, atau pasar lokal dengan kendaraan bersih dan sejuk.</li>
    </ul>

    <!-- Penutupan -->
    <p>Tahap ini sangat menentukan kepuasan konsumen. Jika penanganan pascapanen dilakukan dengan baik, maka peluang untuk menjangkau pasar lebih luas dan menjaga loyalitas pembeli pun semakin besar.</p>

    <!-- Peling bawah + tombol -->
    <div class="mt-5">
      <p class="text-muted text-center"><i>- selesai -</i></p>
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
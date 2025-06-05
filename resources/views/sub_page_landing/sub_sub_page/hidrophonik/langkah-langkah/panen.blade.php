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
<br>
<div class="wrapper">
  <!-- Gambar - Sticky -->
  <div class="gambar-container">
    <img src="{{asset('hidrophonik-page/assets/img/panen.jpeg')}}" alt="Panen Hidroponik">
  </div>

  <div class="artikel-container">
    <!-- Judul -->
    <h1>5. Tahap Panen</h1>
    <br>

    <!-- Pembukaan -->
    <p>Setelah tanaman tumbuh optimal dan bebas dari hama atau penyakit, tibalah saatnya memasuki tahap panen yang menjadi hasil dari seluruh rangkaian proses hidroponik sebelumnya.</p>

    <!-- Isi -->
    <p>Waktu panen pada sistem hidroponik tergantung dari jenis tanaman yang dibudidayakan. Misalnya, selada dapat dipanen dalam waktu 30–40 hari setelah tanam. Panen harus dilakukan secara hati-hati untuk menjaga kualitas dan kebersihan hasil produksi, terutama karena tanaman hidroponik biasanya dikonsumsi dalam keadaan segar.</p>

    <!-- List Langkah -->
    <p><strong>Langkah-langkah saat proses panen hidroponik:</strong></p>
    <ul>
      <li style="font-size: 1.2rem;">Pastikan tanaman sudah mencapai ukuran dan umur panen yang sesuai (contoh: selada berumur 35 hari dan daun sudah membulat).</li>
      <li style="font-size: 1.2rem;">Gunakan gunting atau pisau tajam yang bersih untuk memotong bagian tanaman, hindari merusak akar atau daun lainnya.</li>
      <li style="font-size: 1.2rem;">Bersihkan akar dari sisa larutan nutrisi jika dijual dalam bentuk utuh (misalnya selada hidroponik).</li>
      <li style="font-size: 1.2rem;">Simpan hasil panen dalam tempat bersih dan sejuk untuk mempertahankan kesegaran.</li>
      <li style="font-size: 1.2rem;">Lakukan pencatatan hasil panen untuk evaluasi produktivitas sistem hidroponik Anda.</li>
    </ul>

    <!-- Penutupan -->
    <p>Panen yang dilakukan dengan tepat tidak hanya menghasilkan sayuran segar dan sehat, tetapi juga menjaga kepercayaan konsumen terhadap kualitas hasil pertanian hidroponik Anda.</p>

    <!-- Peling bawah + tombol -->
    <div class="mt-5">
      <a href="{{route('PascaPanenHidrophonik')}}" class="btn btn-success mt-2" style="background-color: #06926f;">
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
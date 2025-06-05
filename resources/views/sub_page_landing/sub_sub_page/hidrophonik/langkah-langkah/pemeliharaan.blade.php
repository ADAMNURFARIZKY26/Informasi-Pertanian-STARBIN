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
@section('title', 'Tahap Pemeliharaan')
@section('content')
<br>
<div class="wrapper">
  <!-- Gambar - Sticky -->
  <div class="gambar-container">
    <img src="{{asset('hidrophonik-page/assets/img/pemiliharaan.jpg')}}" alt="Pemeliharaan Tanaman Hidroponik">
  </div>

  <div class="artikel-container">
    <!-- Judul -->
    <h1>3. Tahap Pemeliharaan Tanaman</h1>
    <br>

    <!-- Pembukaan -->
    <p>Setelah bibit memiliki 2–4 daun sejati hasil dari tahap penyemaian, tanaman dipindahkan ke sistem hidroponik utama seperti sistem NFT, DFT, atau rakit apung untuk memasuki tahap pemeliharaan.</p>

    <!-- Isi -->
    <p>Pemeliharaan tanaman hidroponik melibatkan pemantauan nutrisi, cahaya, dan lingkungan tumbuh. Tanaman hidroponik membutuhkan nutrisi yang terlarut dalam air, serta sinar matahari atau pencahayaan buatan minimal 4–6 jam per hari. Selain itu, pH dan suhu larutan nutrisi harus dikontrol secara rutin agar tanaman tumbuh optimal.</p>

    <!-- List Langkah -->
    <p><strong>Langkah-langkah dalam pemeliharaan tanaman hidroponik:</strong></p>
    <ul>
      <li style="font-size: 1.2rem;">Pindahkan bibit ke net pot dan letakkan ke sistem hidroponik utama dengan akar menyentuh larutan nutrisi.</li>
      <li style="font-size: 1.2rem;">Berikan larutan nutrisi sesuai kebutuhan tanaman, biasanya menggunakan campuran AB Mix.</li>
      <li style="font-size: 1.2rem;">Pantau pH larutan (ideal di kisaran 5.5–6.5) menggunakan pH meter dan sesuaikan jika perlu.</li>
      <li style="font-size: 1.2rem;">Pastikan sistem pengairan atau sirkulasi berjalan lancar agar larutan tidak menggenang atau tersumbat.</li>
      <li style="font-size: 1.2rem;">Lindungi tanaman dari hama dengan menjaga kebersihan lingkungan sekitar tanpa pestisida kimia.</li>
    </ul>

    <!-- Penutupan -->
    <p>Tahap pemeliharaan sangat penting dalam menentukan kualitas hasil panen. Perawatan yang konsisten dan pemantauan yang tepat akan membuat tanaman tumbuh cepat, sehat, dan siap panen dalam waktu yang optimal.</p>

    <!-- Peling bawah + tombol -->
    <div class="mt-5">
      <a href="{{route('pengendalianHidrophonik')}}" class="btn btn-success mt-2" style="background-color: #06926f;">
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
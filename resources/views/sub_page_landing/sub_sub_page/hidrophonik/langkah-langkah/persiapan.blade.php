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
@section('title', 'Tahap Persiapan')
@section('content')
<br>
<div class="wrapper">
  <!-- Gambar - Sticky -->
  <div class="gambar-container">
    <img src="{{asset('hidrophonik-page/assets/img/persiapan.jpeg')}}" alt="Media Tanam Hidroponik">
  </div>

  <div class="artikel-container">
    <!-- Judul -->
    <h1>1. Tahap Persiapan Media Tanam</h1>
    <br>

    <!-- Pembukaan -->
    <p>Dalam sistem hidroponik, media tanam digunakan untuk menopang akar dan membantu penyerapan nutrisi meskipun tanpa tanah.</p>

    <!-- Isi -->
    <p>Media tanam yang baik harus memiliki kemampuan menyimpan air dan nutrisi, sekaligus memberikan ruang untuk pertukaran udara. Beberapa media tanam yang umum digunakan antara lain rockwool, hydroton, cocopeat, dan arang sekam. Pemilihan media tanam akan memengaruhi pertumbuhan akar dan efisiensi penyerapan nutrisi.</p>

    <!-- List Langkah -->
    <p><strong>Langkah-langkah menyiapkan media tanam hidroponik:</strong></p>
    <ul>
      <li style="font-size: 1.2rem;">Pilih media tanam seperti rockwool, arang sekam, atau cocopeat sesuai jenis tanaman yang akan dibudidayakan.</li>
      <li style="font-size: 1.2rem;">Bilas media tanam dengan air bersih untuk menghilangkan kotoran atau debu.</li>
      <li style="font-size: 1.2rem;">Potong atau bentuk media sesuai ukuran net pot atau sistem yang digunakan.</li>
      <li style="font-size: 1.2rem;">Basahi media tanam secukupnya agar lembap dan siap untuk proses penyemaian.</li>
      <li style="font-size: 1.2rem;">Tempatkan media tanam di tray semai atau net pot sesuai rencana penanaman.</li>
    </ul>

    <!-- Penutupan -->
    <p>Tahap ini sangat penting untuk memastikan tanaman bisa tumbuh optimal sejak awal. Media tanam yang bersih dan sesuai akan mendukung perkembangan akar dan mencegah pertumbuhan jamur atau bakteri merugikan.</p>

    <!-- Peling bawah + tombol -->
    <div class="mt-5">
      <a href="{{route('penyemaianHidrophonik')}}" class="btn btn-success mt-2" style="background-color: #06926f;">
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
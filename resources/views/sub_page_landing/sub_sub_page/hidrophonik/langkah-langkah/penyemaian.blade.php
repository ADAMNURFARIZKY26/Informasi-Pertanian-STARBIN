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
@section('title', 'Tahap Penyemaian')
@section('content')
<br>
<div class="wrapper">
  <!-- Gambar - Sticky -->
  <div class="gambar-container">
    <img src="{{asset('hidrophonik-page/assets/img/penyemaian.jpg')}}" alt="Penyemaian Benih Hidroponik">
  </div>

  <div class="artikel-container">
    <!-- Judul -->
    <h1>2. Tahap Penyemaian Benih</h1>
    <br>

    <!-- Pembukaan -->
    <p>Setelah media tanam siap, yaitu telah dipotong, dibersihkan, dan dilembapkan sesuai ukuran sistem hidroponik, langkah selanjutnya adalah melakukan penyemaian benih agar tanaman bisa tumbuh dari awal dengan kondisi yang optimal.</p>

    <!-- Isi -->
    <p>Penyemaian benih bertujuan untuk menumbuhkan bibit hingga memiliki 2–4 daun sejati sebelum dipindahkan ke sistem hidroponik utama. Media yang digunakan biasanya rockwool karena mudah menyerap air dan mendukung pertumbuhan akar. Proses ini perlu dilakukan dengan hati-hati agar benih tidak rusak dan tumbuh seragam.</p>

    <!-- List Langkah -->
    <p><strong>Langkah-langkah melakukan penyemaian benih pada sistem hidroponik:</strong></p>
    <ul>
      <li style="font-size: 1.2rem;">Siapkan potongan rockwool lalu rendam dengan air bersih pH netral (sekitar pH 6).</li>
      <li style="font-size: 1.2rem;">Buat lubang tanam di tengah rockwool sedalam ±0.5 cm menggunakan tusuk gigi atau alat sejenis.</li>
      <li style="font-size: 1.2rem;">Masukkan satu benih ke setiap lubang, lalu tutup tipis bagian atasnya dengan sisa rockwool.</li>
      <li style="font-size: 1.2rem;">Letakkan tray semai di tempat teduh dan lembap, serta jaga kelembapan rockwool dengan menyemprot air secukupnya.</li>
      <li style="font-size: 1.2rem;">Setelah benih berkecambah dan muncul daun sejati, bibit siap dipindahkan ke sistem hidroponik utama.</li>
    </ul>

    <!-- Penutupan -->
    <p>Proses penyemaian yang baik akan menghasilkan bibit sehat dan kuat, sehingga memperbesar peluang keberhasilan panen dalam sistem hidroponik.</p>

    <!-- Peling bawah + tombol -->
    <div class="mt-5">
      <a href="{{route('pemeliharaanHidrophonik')}}" class="btn btn-success mt-2" style="background-color: #06926f;">
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
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
@section('title', 'Tahap pemanenan')
@section('content')
<br><br>
<div class="wrapper">
  <!-- Gambar - Sticky -->
  <div class="gambar-container">
    <img src="{{asset('organik-page/assets/img/penanamanOrganik.jpeg')}}" alt="pengendalian Organik">
  </div>

  <div class="artikel-container">
    <!-- Judul -->
    <h1>3. Tahap Penanaman Bibit</h1>
    <br>

    <!-- Pembukaan -->
    <p>Setelah bibit mencapai usia dan kekuatan tertentu, tahap berikutnya adalah pemindahan bibit ke lahan utama untuk tumbuh dan berkembang secara maksimal.</p>

    <!-- Isi -->
    <p>Pemindahan bibit atau transplantasi harus dilakukan dengan hati-hati agar sistem perakaran bibit tidak terganggu. Tanaman yang dipindahkan dalam kondisi baik akan memiliki tingkat adaptasi yang tinggi terhadap media tanam baru. Penanaman sebaiknya dilakukan pada pagi atau sore hari untuk menghindari stres akibat suhu tinggi. Jarak tanam juga harus diperhatikan agar tanaman tidak saling berebut nutrisi dan cahaya. Jika penanaman dilakukan terlalu rapat, sirkulasi udara akan buruk dan rentan terhadap penyakit. Proses ini menjadi titik awal bagi tanaman untuk berkembang secara penuh dan memulai fase vegetatifnya.</p>

    <!-- List Manfaat -->
    <p><strong>Berikut adalah langkah-langkah untuk Penanaman Bibit :</strong></p>
    <ul>
      <li style="font-size: 1.2rem;">Buat lubang tanam di media sesuai jarak tanam ideal tiap jenis tanaman.</li>
      <li style="font-size: 1.2rem;">Angkat bibit dari media semai beserta akarnya tanpa merusaknya.</li>
      <li style="font-size: 1.2rem;">Tanam bibit ke dalam lubang, pastikan posisi tegak dan stabil.</li>
      <li style="font-size: 1.2rem;">Tutup dengan tanah lalu padatkan perlahan di sekeliling akar.</li>
      <li style="font-size: 1.2rem;">Siram secukupnya untuk membantu proses adaptasi.</li>
    </ul>

    <!-- Penutupan -->
    <p>Penanaman bibit yang dilakukan dengan benar akan meminimalkan stres tanaman dan mempercepat proses pertumbuhan berikutnya.</p>

    <!-- Peling bawah + tombol -->
    <div class="mt-5">
      <a href="{{route('perawatanOrganik')}}" class="btn btn-success mt-2" style="background-color: #06926f;">
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
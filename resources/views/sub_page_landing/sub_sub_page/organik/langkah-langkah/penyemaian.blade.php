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

<br><br>

<div class="wrapper">
  <!-- Gambar - Sticky -->
  <div class="gambar-container">
    <img src="{{asset('organik-page/assets/img/penyemaianOrganik.jpeg')}}" alt="pemiliharaan dan penyemaian Organik">
  </div>

  <div class="artikel-container">
    <!-- Judul -->
    <h1>2. Tahap Pemilihan dan Penyemaian Benih</h1>
    <br>

    <!-- Pembukaan -->
    <p>Setelah media tanam siap, tahap berikutnya adalah pemilihan benih yang unggul dan penyemaian, sebagai langkah awal pertumbuhan tanaman secara terkontrol.</p>

    <!-- Isi -->
    <p>Pemilihan benih yang berkualitas adalah syarat mutlak dalam sistem pertanian organik. Benih yang digunakan harus berasal dari sumber organik, yaitu tidak diberi perlakuan kimia, bukan hasil rekayasa genetika (non-GMO), dan lebih baik jika sudah terbiasa tumbuh di lingkungan lokal. Penyemaian dilakukan untuk menyeleksi bibit terbaik yang nantinya akan ditanam secara permanen. Dalam proses ini, benih dirawat dalam media semai agar mendapat kelembaban, suhu, dan pencahayaan yang sesuai. Dengan demikian, akar dapat berkembang optimal sebelum dipindahkan. Selain itu, penyemaian juga mencegah pemborosan ruang tanam karena hanya bibit sehat yang akan ditanam.</p>

    <!-- List Manfaat -->
    <p><strong>Berikut adalah langkah-langkah untuk Pemilihan dan Penyemaian Benih :</strong></p>
    <ul>
      <li style="font-size: 1.2rem;">Pilih benih organik dari varietas unggul dan bebas penyakit.</li>
      <li style="font-size: 1.2rem;">Siapkan wadah semai seperti tray, baki, atau tanah datar.</li>
      <li style="font-size: 1.2rem;">Gunakan media semai halus seperti campuran tanah dan kompos.</li>
      <li style="font-size: 1.2rem;">Taburkan benih secara merata, lalu siram menggunakan semprotan air.</li>
      <li style="font-size: 1.2rem;">Simpan di tempat teduh dan lembap sampai benih berkecambah dan tumbuh.</li>
    </ul>

    <!-- Penutupan -->
    <p>Dengan penyemaian yang benar, pertumbuhan awal tanaman dapat dikontrol dengan lebih baik, dan hanya bibit unggul yang akan dibawa ke tahap berikutnya.</p>

    <!-- Peling bawah + tombol -->
    <div class="mt-5">
      <a href="{{route('penanamanOrganik')}}" class="btn btn-success mt-2" style="background-color: #06926f;">
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
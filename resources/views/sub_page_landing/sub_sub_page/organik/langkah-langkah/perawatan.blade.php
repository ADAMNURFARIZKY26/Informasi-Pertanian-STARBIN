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
@section('title', 'Tahap Perawatan')
@section('content')

<br><br>
<div class="wrapper">
  <!-- Gambar - Sticky -->
  <div class="gambar-container">
    <img src="{{asset('organik-page/assets/img/perawatanOrganik.jpg')}}" alt="perawatan Organik">
  </div>

  <div class="artikel-container">
    <!-- Judul -->
    <h1>4. Perawatan Tanaman</h1>
    <br>

    <!-- Pembukaan -->
    <p>Setelah penanaman selesai, tahap penting berikutnya adalah merawat dan memelihara tanaman hingga memasuki masa generatif.</p>

    <!-- Isi -->
    <p>Perawatan tanaman organik meliputi penyiraman, pemupukan lanjutan, pengendalian gulma, dan pengamatan rutin terhadap kondisi tanaman. Karena tidak menggunakan bahan kimia sintetis, petani organik harus peka terhadap gejala kekurangan nutrisi maupun serangan hama. Pemupukan dilakukan dengan bahan organik seperti pupuk cair kompos (POC), mol (mikroorganisme lokal), atau pupuk kandang fermentasi. Selain itu, gulma yang tumbuh harus dicabut secara manual agar tidak bersaing dalam menyerap nutrisi. Tanaman juga perlu dipangkas jika tumbuh terlalu lebat agar sirkulasi udara tetap baik.</p>

    <!-- List Manfaat -->
    <p><strong>Berikut adalah langkah-langkah untuk Perawatan Tanaman :</strong></p>
    <ul>
      <li style="font-size: 1.2rem;">Siram tanaman sesuai kebutuhan, pagi atau sore hari.</li>
      <li style="font-size: 1.2rem;">Berikan pupuk organik cair setiap 1–2 minggu sekali.</li>
      <li style="font-size: 1.2rem;">Cabut gulma yang tumbuh di sekitar tanaman secara manual.</li>
      <li style="font-size: 1.2rem;">Lakukan pengamatan rutin terhadap warna daun, batang, dan tanah.</li>
      <li style="font-size: 1.2rem;">Pangkas daun yang rusak, tua, atau terkena penyakit.</li>
    </ul>

    <!-- Penutupan -->
    <p>Perawatan yang dilakukan dengan konsisten akan menghasilkan tanaman yang sehat, tahan penyakit, dan mampu menghasilkan panen yang optimal.</p>

    <!-- Peling bawah + tombol -->
    <div class="mt-5">
      <a href="{{route('pengendalianOrganik')}}" class="btn btn-success mt-2" style="background-color: #06926f;">
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
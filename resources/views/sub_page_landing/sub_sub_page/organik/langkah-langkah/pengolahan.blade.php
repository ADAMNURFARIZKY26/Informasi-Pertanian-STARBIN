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
    <img src="{{asset('organik-page/assets/img/pascaOrganik.jpg')}}" alt="pasca Panen Organik">
  </div>

  <div class="artikel-container">
    <!-- Judul -->
    <h1>7. Tahap Pascapanen dan Daur Ulang Limbah</h1>
    <br>

    <!-- Pembukaan -->
    <p>Setelah panen selesai, tahap terakhir adalah pengelolaan limbah dan sisa tanam untuk menjaga sistem pencernaan organik.</p>

    <!-- Isi -->
    <p>Sisa tanaman seperti akar, daun, dan batang dapat didaur ulang menjadi kompos yang akan digunakan kembali pada musim tanam berikutnya. Hal ini tidak hanya mengurangi sampah organik, tetapi juga memperkaya media tanam dengan bahan alami. Dalam sistem pertanian organik, tidak ada bagian tanaman yang terbuang sia-sia. Semua limbah dapat dimanfaatkan menjadi energi baru untuk tanaman berikutnya. Proses ini juga membantu mengembalikan unsur hara yang telah diserap tanaman ke dalam tanah.</p>

    <!-- List Manfaat -->
    <p><strong>Berikut adalah langkah-langkah penanganan Pascapanen :</strong></p>
    <ul>
      <li style="font-size: 1.2rem;">Cacah sisa tanaman dan dikumpulkan dalam tong komposter.</li>
      <li style="font-size: 1.2rem;">Tambahkan bahan karbon seperti daun kering dan jerami.</li>
      <li style="font-size: 1.2rem;">Aduk dan biarkan selama beberapa minggu agar terurai sempurna.</li>
      <li style="font-size: 1.2rem;">Gunakan kompos hasil fermentasi sebagai pupuk untuk siklus tanam selanjutnya.</li>
    </ul>

    <!-- Penutupan -->
    <p>Panen yang dilakukan dengan tepat akan menghasilkan produk organik berkualitas tinggi yang sehat dan bernilai jual lebih baik di pasaran.</p>

    <!-- Peling bawah + tombol -->
    <div class="mt-5">
      <p class="text-muted text-center"><i>- selesai -</i></p>
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
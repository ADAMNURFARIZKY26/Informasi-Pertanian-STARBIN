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
    <img src="{{asset('organik-page/assets/img/panenOrganik.jpg')}}" alt="panen Organik">
  </div>

  <div class="artikel-container">
    <!-- Judul -->
    <h1>6. Tahap Panen</h1>
    <br>

    <!-- Pembukaan -->
    <p>Setelah masa tanam terpenuhi dan tanaman telah tumbuh secara maksimal, tahap berikutnya adalah proses panen yang dilakukan secara hati-hati dan higienis.</p>

    <!-- Isi -->
    <p>Panen merupakan momen penting dalam budidaya tanaman organik karena hasil akhirnya harus tetap terjaga kesegarannya dan bebas dari kontaminasi. Waktu panen harus disesuaikan dengan karakteristik tanaman. Sayuran daun sebaiknya dipanen saat pagi hari agar tidak layu, sedangkan buah-buahan dipanen saat sudah cukup umur dan warna kulitnya sesuai. Gunakan alat bersih dan tajam agar tidak merusak jaringan tanaman. Hasil panen juga tidak boleh bersentuhan dengan bahan kimia atau wadah kotor agar kualitas organiknya terjaga.</p>

    <!-- List Manfaat -->
    <p><strong>Berikut adalah langkah-langkah untuk pemanenan :</strong></p>
    <ul>
      <li style="font-size: 1.2rem;">Panen di pagi hari untuk menjaga kesegaran hasil.</li>
      <li style="font-size: 1.2rem;">Gunakan gunting tajam atau pisau steril.</li>
      <li style="font-size: 1.2rem;">Kumpulkan hasil panen di keranjang bersih.</li>
      <li style="font-size: 1.2rem;">Simpan hasil panen di tempat teduh sebelum distribusi.</li>
    </ul>

    <!-- Penutupan -->
    <p>Panen yang dilakukan dengan tepat akan menghasilkan produk organik berkualitas tinggi yang sehat dan bernilai jual lebih baik di pasaran.</p>

    <!-- Peling bawah + tombol -->
    <div class="mt-5" >
      <a href="{{route('pengolahanOrganik')}}" class="btn btn-success mt-2" style="background-color:#06926f;">
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
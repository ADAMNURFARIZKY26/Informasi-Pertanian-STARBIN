<style>
  .shadow-lg {
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.15) !important;
  }

  .main-title {
    position: relative;
    display: inline-block;
    animation: fadeInDown 1s ease forwards;
    margin-bottom: 3rem !important;
    font-weight: 900;
    letter-spacing: 1.2px;
  }
  .main-title::after {
    content: '';
    display: block;
    width: 100%;
    max-width: 100%;
    height: 4px;
    background-color: #008467;
    margin-top: 6px;
    border-radius: 2px;
  }

  /* Animasi fade in */
  @keyframes fadeInDown {
    0% {
      opacity: 0;
      transform: translateY(-20px);
    }
    100% {
      opacity: 1;
      transform: translateY(0);
    }
  }

  /* Artikel sayuran */
  .vegetable-item {
    background-color: #fff;
    /* hapus shadow */
  }

  /* border bottom sebagai pemisah */
  .vegetable-item.border-bottom {
    border-bottom: 2px solid #008467;
  }

  .veg-img {
    width: 250px;
    height: auto;
    border-radius: 0.75rem;
    object-fit: cover;
  }

  .veg-title {
    color: #008467;
    font-weight: 700;
    font-size: 1.6rem;
    line-height: 1.2;
  }

  .veg-desc {
    font-size: 1.05rem;
    line-height: 1.6;
    color: #444;
    max-width: 720px;
  }

  .badge {
    font-size: 0.85rem;
    padding: 0.45em 0.9em;
  }

  /* Responsive for mobile */
  @media (max-width: 576px) {
    .veg-img {
      width: 100%;
      max-width: 100%;
      margin-bottom: 1rem !important;
    }
  }
    .back-button .btn {
    transition: all 0.3s ease;
  }

  .back-button .btn:hover {
    background-color: #047256;
    /* warna lebih gelap saat hover */
    transform: scale(1.05);
    /* sedikit membesar */
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
    /* bayangan lebih kuat saat hover */
  }
</style>
@extends('layouts.landing.main')
@section('title', 'Buah Organik')
@section('content')
  <section class="py-5">
    <div class="container">
      <br><br><br>
      <h1 class="text-center mb-5 fw-bold main-title" style="color: #008467; font-size: 2rem;">
        Detail Buah-Buahan Organik
      </h1>

      <article class="fruit-item d-flex flex-column flex-md-row align-items-start mb-5 py-4 px-3 border-bottom">
        <img src="{{asset('organik-page/assets/img/buahOrganik/apelOrganik.jpg')}}" alt="Apel Organik" class="veg-img me-md-4 mb-3 mb-md-0">
        <div>
          <h4 class="veg-title mb-3"></i>Apel Organik</h4>
          <p class="veg-desc mb-3">
            Apel organik mengandung serat tinggi, vitamin C, dan antioksidan. Baik untuk kesehatan jantung dan membantu sistem kekebalan tubuh tanpa bahan kimia.
          </p>
          <span class="badge bg-success">Buah Segar</span>
        </div>
      </article>

      <article class="fruit-item d-flex flex-column flex-md-row align-items-start mb-5 py-4 px-3 border-bottom">
        <img src="{{asset('organik-page/assets/img/buahOrganik/pisangOrganik.jpg')}}" alt="Pisang Organik" class="veg-img me-md-4 mb-3 mb-md-0">
        <div>
          <h4 class="veg-title mb-3"></i>Pisang Organik</h4>
          <p class="veg-desc mb-3">
            Pisang organik kaya potasium dan vitamin B6. Memberi energi cepat, baik untuk pencernaan dan cocok sebagai camilan sehat tanpa residu pestisida.
          </p>
          <span class="badge bg-success">Buah Tropis</span>
        </div>
      </article>

      <article class="fruit-item d-flex flex-column flex-md-row align-items-start mb-5 py-4 px-3 border-bottom">
        <img src="{{asset('organik-page/assets/img/buahOrganik/strawberiOrganik.jpg')}}" alt="Strawberry Organik" class="veg-img me-md-4 mb-3 mb-md-0">
        <div>
          <h4 class="veg-title mb-3"></i>Strawberry Organik</h4>
          <p class="veg-desc mb-3">
            Strawberry organik mengandung vitamin C dan antioksidan tinggi. Membantu menjaga kesehatan kulit dan melawan radikal bebas, rasanya segar alami.
          </p>
          <span class="badge bg-success">Buah Berry</span>
        </div>
      </article>

      <article class="fruit-item d-flex flex-column flex-md-row align-items-start mb-5 py-4 px-3 border-bottom">
        <img src="{{asset('organik-page/assets/img/buahOrganik/jerukOrganik.jpg')}}" alt="Jeruk Organik" class="veg-img me-md-4 mb-3 mb-md-0">
        <div>
          <h4 class="veg-title mb-3"></i>Jeruk Organik</h4>
          <p class="veg-desc mb-3">
            Jeruk organik sangat kaya vitamin C dan serat. Baik untuk daya tahan tubuh dan menyegarkan, tanpa tambahan zat pengawet atau lilin buatan.
          </p>
          <span class="badge bg-success">Buah Citrus</span>
        </div>
      </article>

      <article class="fruit-item d-flex flex-column flex-md-row align-items-start mb-5 py-4 px-3 border-bottom">
        <img src="{{asset('organik-page/assets/img/buahOrganik/manggaOrganik.jpg')}}" alt="Mangga Organik" class="veg-img me-md-4 mb-3 mb-md-0">
        <div>
          <h4 class="veg-title mb-3"></i>Mangga Organik</h4>
          <p class="veg-desc mb-3">
            Mangga organik mengandung vitamin A dan C yang tinggi. Baik untuk kesehatan mata dan sistem imun, manis alami tanpa bahan pemanis tambahan.
          </p>
          <span class="badge bg-success">Buah Tropis</span>
        </div>
      </article>

      <article class="fruit-item d-flex flex-column flex-md-row align-items-start mb-5 py-4 px-3">
        <img src="{{asset('organik-page/assets/img/buahOrganik/pepayaOrganik.jpeg')}}" alt="Pepaya Organik" class="veg-img me-md-4 mb-3 mb-md-0">
        <div>
          <h4 class="veg-title mb-3"></i>Pepaya Organik</h4>
          <p class="veg-desc mb-3">
            Pepaya organik kaya akan enzim papain yang baik untuk pencernaan. Mengandung vitamin A dan C, serta membantu detoksifikasi tubuh secara alami.
          </p>
          <span class="badge bg-success">Buah Tropis</span>
        </div>
      </article>
    </div>
  </section>
</main>

<!-- Tombol Kembali -->
<div class="text-center my-4 back-button">
  <button onclick="window.history.back()" class="btn btn-success shadow px-4 py-2" style="border-radius: 5px; font-weight: 600; font-size: 1rem; background-color:#06926f;">
    <i class="bi bi-arrow-left-circle me-2"></i> Kembali
  </button>
</div>

<br><br>
@endsection
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Pertanian SMKN 1 BINONG</title>
  <meta name="description" content="">
  <meta name="keywords" content="">


  <link href="{{ asset('halaman-depan/assets/img/Logo/Logo .png') }}" rel="icon">
  <link href="{{ asset('halaman-depan/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">


  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">


  <link href="{{ asset('halaman-depan/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('halaman-depan/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('halaman-depan/assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('halaman-depan/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('halaman-depan/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">


  <link href="{{ asset('halaman-depan/assets/css/main.css') }}" rel="stylesheet">
  <link href="{{ asset('halaman-depan/assets/css/mycss/main-landing.css') }}" rel="stylesheet">

  <!-- ==================================================
  * Template Name: Impact
  * Template URL: https://bootstrapmade.com/impact-bootstrap-business-website-template/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">
  <header id="header" class="header fixed-top">
    <div class="topbar d-flex align-items-center" style="padding: 40px 0;">
      <div class="container position-relative d-flex align-items-center justify-content-between">
        <div class="logo d-flex align-items-center">
          <img src="{{ asset('halaman-depan/assets/img/Logo/Logo .png') }}" alt="Logo" style="padding-right:10px; width: 70px; height: auto; background-size: cover;">
          <h1 class="sitename mb-0 fs-4">Pertanian STARBIN</h1>
          <span style="font-size: 2rem;">.</span>
        </div>
        <div class="d-flex align-items-center gap-3">
          <nav id="navmenu" class="navmenu">
            <ul>
              <li><a href="#beranda" style="font-size: 1rem;">Beranda</a></li>
              <li><a href="#tentangkami" style="font-size: 1rem;">Tentang Kami</a></li>
              <li><a href="#produk" style="font-size: 1rem;">Produk</a></li>
              <li><a href="#edukasi" style="font-size: 1rem;">Edukasi</a></li>
              <li><a href="#blog" style="font-size: 1rem;">Blog</a></li>
              <li><a href="#kontak" style="font-size: 1rem;">Kontak</a></li>
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
          </nav>

          <a href="{{route('login')}}" class="btn btn-outline-light custom-pill-btn" style="font-size: 1rem; padding: 10px 15px ;">
            Login
          </a>
        </div>
      </div>
    </div>
  </header>

  <main class="main">

    <section id="beranda" class="hero section accent-background">

      <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">
        <div class="row gy-5 justify-content-between">
          <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
            <h2><span>Selamat Datang di </span><span class="accent">Pertanian SMKN 1 Binong</span></h2>

          </div>
          <div class="col-lg-5 order-1 order-lg-2">
            <img src="{{ asset('halaman-depan/assets/img/pertanian-landing (1).png') }}" class="img-fluid" alt="Petani membawa hasil panen organik di depan layar ponsel">
          </div>
        </div>
      </div>

      <div class="icon-boxes position-relative" data-aos="fade-up" data-aos-delay="200">
        <div class="container position-relative">
          <div class="row gy-4 mt-5">

            @foreach ($sosmeds as $sosmed)
            <div class="col-xl-3 col-md-6">
              <div class="icon-box text-center">
                <div class="icon">
                  <i class="{{ $sosmed->icon }}"></i>
                </div>
                <h4 class="title">
                  <a href="{{ $sosmed->url }}" target="_blank" class="stretched-link">
                    {{ $sosmed->judul }}
                  </a>
                </h4>
              </div>
            </div>
            @endforeach

            @if ($sosmeds->isEmpty())
            <div class="col-12 text-center">
              <div class="alert alert-warning">
                <i class="bi bi-exclamation-triangle"></i> Belum ada data sosial media ditambahkan.
              </div>
            </div>
            @endif

          </div>
        </div>
      </div>

    </section>

    <section id="tentangkami" class="about section py-5" style="background-color: #fff;">
      <div class="container">

        <div class="container section-title" data-aos="fade-up">
          <h2 class="fw-bold" style="color: #06926f;">Tentang Kami</h2>
          <p class="text-muted mt-3">
            Jurusan Agribisnis Tanaman Pangan dan Hortikultura (ATPH) SMKN 1 Binong berkomitmen mencetak lulusan yang terampil, mandiri, dan siap bersaing di dunia pertanian modern.
          </p>
        </div>


        <div class="row align-items-center gy-4">

          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
            <div class="shadow rounded-4 overflow-hidden">
              <img src="{{ asset('halaman-depan/assets/img/tentang-kami/pertanian-3.jpg') }}" class="img-fluid w-100" alt="Tentang Kami">
            </div>
          </div>


          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
            <div class="ps-0 ps-lg-4">
              <p class="text-dark mb-4" style="line-height: 1.8;">
                ATPH merupakan salah satu jurusan unggulan yang fokus pada pengelolaan tanaman pangan dan hortikultura secara profesional. Melalui pembelajaran teori dan praktik di lapangan, siswa dibekali keterampilan seperti budidaya tanaman, pengolahan hasil pertanian, serta kewirausahaan di bidang agribisnis.
              </p>
              <a href="{{ route('tentangKami')}}" class="btn btn-outline-success mt-3 px-4 py-2">Selengkapnya</a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="call-to-action" class="call-to-action section dark-background">

      <div class="container">
        <img src="{{ asset('halaman-depan/assets/img/Foto-lahan-cabai.jpg') }}" alt="Lahan pertanian">
        <div class="content row justify-content-center" data-aos="zoom-in" data-aos-delay="100">
          <div class="col-xl-10">
            <div class="text-center">
              <a href="https://www.youtube.com/watch?v=vBdm6TQddtI&embeds_referring_euri=https%3A%2F%2Fchatgpt.com%2F&source_ve_path=Mjg2NjY" class="glightbox play-btn"></a>
              <h3>Dokumentasi Kegiatan Kami</h3>
              <p>Ini adalah rekaman video dari salah satu kegiatan yang telah kami laksanakan sebagai bentuk transparansi dan dedikasi kami kepada anggota.</p>
              <a class="cta-btn" href="https://www.youtube.com/watch?v=vBdm6TQddtI&embeds_referring_euri=https%3A%2F%2Fchatgpt.com%2F&source_ve_path=Mjg2NjY" target="_blank">Kunjungi</a>
            </div>
          </div>
        </div>

      </div>

    </section>

    <section id="produk" class="portfolio section py-5" style="background-color: #fff;">
      <div class="container">

        <div class="container section-title" data-aos="fade-up">
          <h2 style="color: #06926f;">produk Kami</h2>
          <p class="text-muted">Berikut adalah beberapa produk yang kami miliki</p>
        </div>


        <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">
          <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">

            <div class="col-lg-3 col-md-4 col-sm-6 portfolio-item isotope-item filter-app">
              <a href="{{ route('detail-produk') }}" class="text-decoration-none text-dark">
                <div class="portfolio-content h-100 border rounded-4 shadow-sm overflow-hidden bg-white transition hover-shadow">
                  <img src="{{ asset('halaman-depan/assets/img/portfolio/foto-cabai.jpg') }}"
                    class="img-fluid w-100"
                    alt="Produk"
                    style="height: 200px; object-fit: cover; transition: transform 0.3s ease;">
                  <div class="p-3">
                    <h5 class="mb-1 fw-semibold text-dark">Cabai</h5>
                    <p class="mb-1 text-muted">Rp 25.000 / kg</p>
                    <span class="badge bg-success" style="padding: 5px;">Tersedia 1.121</span>
                  </div>
                </div>
              </a>
            </div>


            <div class="col-lg-3 col-md-4 col-sm-6 portfolio-item isotope-item filter-app">
              <a href="{{ route('detail-produk') }}" class="text-decoration-none text-dark">
                <div class="portfolio-content h-100 border rounded-4 shadow-sm overflow-hidden bg-white transition hover-shadow">
                  <img src="{{ asset('halaman-depan/assets/img/portfolio/foto-cabai.jpg') }}"
                    class="img-fluid w-100"
                    alt="Produk"
                    style="height: 200px; object-fit: cover; transition: transform 0.3s ease;">
                  <div class="p-3">
                    <h5 class="mb-1 fw-semibold text-dark">Cabai</h5>
                    <p class="mb-1 text-muted">Rp 25.000 / kg</p>
                    <span class="badge bg-success" style="padding: 5px;">Tersedia 1.121</span>
                  </div>
                </div>
              </a>
            </div>
          </div>
        </div>
        
        <div class="mt-5">
          <a href="{{route('list-produk')}}">
            <p class="text-center">Selengkapnya untuk produk >>></p>
          </a>
        </div>
      </div>
    </section>


    <section id="edukasi" class="services section bg-white py-5">

      <div class="container section-title text-center mb-5" data-aos="fade-up">
        <h2 class="fw-bold" style="color: #06926f;">Edukasi</h2>
        <p class="text-muted">Kami berbagi wawasan tentang praktik pertanian ramah lingkungan seperti organik dan hidroponik modern.</p>
      </div>

      <div class="container">
        <div class="row g-4 justify-content-center" data-aos="fade-up" data-aos-delay="200">


          <div class="col-md-6">
            <a href="{{ route('organik') }}" class="text-decoration-none edukasi-link">
              <div class="card border-0 shadow-lg rounded-4 overflow-hidden position-relative edukasi-card h-100">
                <div class="bg-image position-absolute top-0 start-0 w-100 h-100" style="background-image: url('{{ asset('halaman-depan/assets/img/organik/organik-1.jpg') }}'); background-size: cover; background-position: center; filter: brightness(0.6);"></div>
                <div class="card-body position-relative text-white p-4 edukasi-body">
                  <h2 class="fw-bold mb-2 d-flex align-items-center" style="color: #21e2ad;">
                    Organik
                  </h2>
                  <p class="mb-3 small">
                    Pertanian organik adalah metode budidaya tanaman yang mengutamakan keseimbangan ekosistem alami tanpa menggunakan bahan kimia sintetis seperti pestisida dan pupuk buatan. Sistem ini fokus pada keberlanjutan lingkungan, kesehatan tanah, serta hasil panen yang lebih sehat bagi konsumen.
                    <br>
                    Berbeda dari pertanian konvensional, pertanian organik mengandalkan pupuk kompos, pengendalian hama alami, serta rotasi tanaman untuk menjaga kesuburan tanah. Metode ini dinilai lebih ramah lingkungan dan berkontribusi terhadap ketahanan pangan jangka panjang.
                  </p>
                  <span class="selengkapnya fw-semibold">Selengkapnya &rarr;</span>
                </div>
              </div>
            </a>
          </div>


          <div class="col-md-6">
            <a href="{{ route('hidroponik') }}" class="text-decoration-none edukasi-link">
              <div class="card border-0 shadow-lg rounded-4 overflow-hidden position-relative edukasi-card h-100">
                <div class="bg-image position-absolute top-0 start-0 w-100 h-100" style="background-image: url('{{ asset('hidrophonik-page/assets/img/sayuranDaun.jpg') }}'); background-size: cover; background-position: center; filter: brightness(0.6);"></div>
                <div class="card-body position-relative text-white p-4 edukasi-body">
                  <h2 class="fw-bold mb-2 d-flex align-items-center" style="color: #21e2ad;">
                    Hidroponik
                  </h2>
                  <p class="mb-3 small">
                    Hidroponik adalah metode budidaya tanaman tanpa menggunakan tanah. Sebagai gantinya, tanaman ditumbuhkan dengan larutan air yang telah diperkaya nutrisi penting, seperti nitrogen, fosfor, kalium, dan unsur mikro lainnya.
                    <br>
                    Sistem hidroponik sangat cocok diterapkan di area dengan lahan terbatas, seperti lingkungan perkotaan, karena lebih efisien dalam penggunaan air, bersih, dan dapat dikontrol dengan lebih baik.
                  </p>
                  <span class="selengkapnya fw-semibold">Selengkapnya &rarr;</span>
                </div>
              </div>
            </a>
          </div>

        </div>
      </div>
    </section>



    <section id="blog" class="recent-posts section py-5">


      <div class="container section-title text-center mb-5" data-aos="fade-up">
        <h2 class="fw-bold text-success">Blog</h2>
        <p class="text-muted">Dapatkan informasi terbaru seputar pertanian, kegiatan jurusan, dan inovasi siswa ATPH SMKN 1 Binong.</p>
      </div>

      <div class="container">
        <div class="row gy-4">


          <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <a href="#" class="card-blog d-block text-decoration-none text-dark rounded-4 overflow-hidden shadow-sm position-relative border h-100">
              <div class="post-img overflow-hidden">
                <img src="{{ asset('halaman-depan/assets/img/blog/blog-1.jpg') }}" alt="Berita" class="img-fluid w-100 blog-img" style="height: 220px; object-fit: cover;">
              </div>
              <div class="p-3">
                <p class="post-category text-success fw-semibold mb-1">Berita Jurusan</p>
                <h2 class="title h5 mb-3">Siswa ATPH Panen Sayuran Organik Perdana</h2>
                <div class="d-flex align-items-center">
                  <img src="{{ asset('halaman-depan/assets/img/blog/blog-author.jpg') }}" alt="Penulis - Maria Doe" class="img-fluid post-author-img flex-shrink-0 rounded-circle me-2" style="width: 40px; height: 40px;">
                  <div class="post-meta">
                    <p class="post-author mb-0 fw-medium">Maria Doe</p>
                    <p class="post-date mb-0 text-muted" style="font-size: 0.85rem;">
                      <time datetime="2022-01-01">1 Januari 2022</time>
                    </p>
                  </div>
                </div>
              </div>
            </a>
          </div>
        </div>
        
        <div class="mt-5">
          <a href="{{route('list-produk')}}">
            <p class="text-center">Selengkapnya untuk produk >>></p>
          </a>
        </div>
      </div>
    </section>


    <section id="kontak" class="contact section">


      <div class="container section-title" data-aos="fade-up">
        <h2>Kontak</h2>
        <p>Jika Anda memiliki pertanyaan, ingin bekerja sama, atau membutuhkan informasi lebih lanjut seputar Jurusan ATPH SMKN 1 Binong, jangan ragu untuk menghubungi kami melalui kontak di bawah ini.</p>
      </div>

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gx-lg-0 gy-4">

          <div class="col-lg-4">
            <div class="info-container d-flex flex-column align-items-center justify-content-center" style="border-top-left-radius: 10px; border-bottom-left-radius: 10px;">
              <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="200" style="border-radius: 5px;">
                <i class="bi bi-geo-alt flex-shrink-0"></i>
                <div>
                  <h3>Address</h3>
                  <p>A108 Adam Street, New York, NY 535022</p>
                </div>
              </div>

              <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300" style="border-radius: 5px;">
                <i class="bi bi-telephone flex-shrink-0"></i>
                <div>
                  <h3>Call Us</h3>
                  <p>+1 5589 55488 55</p>
                </div>
              </div>

              <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400" style="border-radius: 5px;">
                <i class="bi bi-envelope flex-shrink-0"></i>
                <div>
                  <h3>Email Us</h3>
                  <p>info@example.com</p>
                </div>
              </div>

              <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="500" style="border-radius: 5px;">
                <i class="bi bi-clock flex-shrink-0"></i>
                <div>
                  <h3>Open Hours:</h3>
                  <p>Mon-Sat: 11AM - 23PM</p>
                </div>
              </div>

            </div>

          </div>

          <div class="col-lg-8">
            <form action="forms/contact.php" method="post" class="php-email-form" data-aos="fade" data-aos-delay="100" style="border-top-right-radius: 10px; border-bottom-right-radius: 10px;">
              <div class="row gy-4">

                <div class="col-md-6">
                  <input type="text" name="name" class="form-control" placeholder="Your Name" required="" style="border-radius: 5px;">
                </div>

                <div class="col-md-6 ">
                  <input type="email" class="form-control" name="email" placeholder="Your Email" required="" style="border-radius: 5px;">
                </div>

                <div class="col-md-12">
                  <input type="text" class="form-control" name="subject" placeholder="Subject" required="" style="border-radius: 5px;">
                </div>

                <div class="col-md-12">
                  <textarea class="form-control" name="message" rows="8" placeholder="Message" required=""></textarea style="border-radius: 5px;">
                </div>

                <div class="col-md-12 text-center" >
                  <div class="loading">Loading</div>
                  <div class="error-message"></div>
                  <div class="sent-message">Your message has been sent. Thank you!</div>
                  <button type="submit" style="border-radius: 5px;">Send Message</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
  </main>

  <footer id="footer" class="footer accent-background">

    <div class="container footer-top">
      <div class="row gy-4">
        
        <div class="col-lg-4 col-md-12 footer-about">
          <a href="index.html" class="logo d-flex align-items-center">
            <span class="sitename">Pertanian STARBIN</span>
          </a>
          <p>Pertanian STARBIN adalah website dari salah satu jurusan yang berada di SMK Negeri 1 Binong yaitu ATPH (Agribisnis Tanaman Pangan Holtikultura). Website ini bertujuan untuk memberikan informasi dan jual beli produk-produk kami di Pertanian SMK Negeri 1 Binong.</p>
          <div class="social-links d-flex mt-4">
            @foreach ($sosmeds as $sosmed)
              <a href="{{ $sosmed->url }}" target="_blank" title="{{ $sosmed->judul }}">
                <i class="{{ $sosmed->icon }}"></i>
              </a>
            @endforeach

            @if ($sosmeds->isEmpty())
              <span class="text-muted">Tidak ada sosial media.</span>
            @endif
          </div>
        </div>

        
        <div class="col-lg-4 col-6 footer-links" style="padding-left: 100px;">
          <h4>Navigasi</h4>
          <ul>
            <li><a href="#beranda">Beranda</a></li>
            <li><a href="#tentangkami">Tentang Kami</a></li>
            <li><a href="#produk">Produk Kami</a></li>
            <li><a href="#edukasi">Edukasi</a></li>
            <li><a href="#blog">Blog</a></li>
            <li><a href="#kontak">Kontak</a></li>
          </ul>
        </div>

        
        <div class="col-lg-4 col-md-12 footer-contact text-center text-md-start">
          <h4>Kontak Kami</h4>
          <p>Kab.Subang Kec.Binong</p>
          <p>Belakang Polsek Binong</p>
          <p>Kode pos 41253</p>
          <p class="mt-4"><strong>Phone:</strong> <span>+1 5589 55488 55</span></p>
          <p><strong>Email:</strong> <span>info@example.com</span></p>
        </div>
      </div>
    </div>

    <div class="container copyright text-center mt-4">
      <p class="mb-0">
        © 2025
        <a href="https://smkn1binong.sch.id/" target="_blank">
          SMK Negeri 1 Binong
        </a>
      </p>
      <div class="credits">
        Made by <strong>11 PPLG angkatan 2023-2026</strong>
      </div>
    </div>

  </footer>


  
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  
  
  <script src="{{ asset('halaman-depan/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('halaman-depan/assets/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ asset('halaman-depan/assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('halaman-depan/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('halaman-depan/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('halaman-depan/assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
  <script src="{{ asset('halaman-depan/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
  <script src="{{ asset('halaman-depan/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>

  
  <script src="{{ asset('halaman-depan/assets/js/main.js') }}"></script>

  
  <script src="{{ asset('halaman-depan/assets/js/myjs/landingpage.js') }}"></script>

</body>

</html>
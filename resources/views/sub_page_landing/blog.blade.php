@extends('layouts.landing.main')
@section('title', 'Blog')
@section('content')
<!-- Page Title -->
<div class="page-title">
  <div class="heading position-relative">
    <div class="overlay"></div>
    <div class="container position-relative">
      <div class="row d-flex justify-content-center text-center">
        <div class="col-lg-8">
          <h1 class="text-white text-shadow">Berita</h1>
          <p class="mb-0 text-white text-shadow">
            Jurusan Pertanian SMK memainkan peran penting dalam mencetak tenaga terampil di bidang agrikultur. Berita ini mengulas berbagai inovasi, pelatihan, dan capaian siswa yang mendukung kemajuan pertanian nasional.
          </p>
        </div>
      </div>
    </div>
  </div>
</div><!-- End Page Title -->

<!-- Blog Posts Section -->
<section id="blog-posts" class="blog-posts section">
  <!-- Breadcrumbs -->
  <nav class="blog-breadcrumbs py-2 px-3 small" aria-label="breadcrumb">
    <div class="container">
      <ol class="breadcrumb mb-0">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Blog</li>
      </ol>
    </div>
  </nav>

  <div class="container">
    <div class="row gy-4">
      <div class="col-lg-4">
        <article>
          <div class="post-img">
            <a href="{{route('detailBlog')}}">
              <img src="{{asset('halaman-depan/assets/img/blog/blog-1.jpg')}}" alt="" class="img-fluid">
            </a>
          </div>
          <p class="post-category">Politics</p>

          <h2 class="title">
            <a href="{{route('detailBlog')}}">Dolorum optio tempore voluptas dignissimos</a>
          </h2>

          <div class="d-flex align-items-center">
            <img src="{{asset('halaman-depan/assets/img/blog/blog-author.jpg')}}" alt="" class="img-fluid post-author-img flex-shrink-0">
            <div class="post-meta">
              <p class="post-author">Maria Doe</p>
              <p class="post-date">
                <time datetime="2022-01-01">Jan 1, 2022</time>
              </p>
            </div>
          </div>
        </article>
      </div><!-- End post list item -->
      <div class="col-lg-4">
        <article>
          <div class="post-img">
            <a href="{{route('detailBlog')}}">
              <img src="{{asset('halaman-depan/assets/img/blog/blog-1.jpg')}}" alt="" class="img-fluid">
            </a>
          </div>
          <p class="post-category">Politics</p>

          <h2 class="title">
            <a href="{{route('detailBlog')}}">Dolorum optio tempore voluptas dignissimos</a>
          </h2>

          <div class="d-flex align-items-center">
            <img src="{{asset('halaman-depan/assets/img/blog/blog-author.jpg')}}" alt="" class="img-fluid post-author-img flex-shrink-0">
            <div class="post-meta">
              <p class="post-author">Maria Doe</p>
              <p class="post-date">
                <time datetime="2022-01-01">Jan 1, 2022</time>
              </p>
            </div>
          </div>
        </article>
      </div><!-- End post list item -->
      <div class="col-lg-4">
        <article>
          <div class="post-img">
            <a href="{{route('detailBlog')}}">
              <img src="{{asset('halaman-depan/assets/img/blog/blog-1.jpg')}}" alt="" class="img-fluid">
            </a>
          </div>
          <p class="post-category">Politics</p>

          <h2 class="title">
            <a href="{{route('detailBlog')}}">Dolorum optio tempore voluptas dignissimos</a>
          </h2>

          <div class="d-flex align-items-center">
            <img src="{{asset('halaman-depan/assets/img/blog/blog-author.jpg')}}" alt="" class="img-fluid post-author-img flex-shrink-0">
            <div class="post-meta">
              <p class="post-author">Maria Doe</p>
              <p class="post-date">
                <time datetime="2022-01-01">Jan 1, 2022</time>
              </p>
            </div>
          </div>
        </article>
      </div><!-- End post list item -->
      <div class="col-lg-4">
        <article>
          <div class="post-img">
            <a href="{{route('detailBlog')}}">
              <img src="{{asset('halaman-depan/assets/img/blog/blog-1.jpg')}}" alt="" class="img-fluid">
            </a>
          </div>
          <p class="post-category">Politics</p>

          <h2 class="title">
            <a href="{{route('detailBlog')}}">Dolorum optio tempore voluptas dignissimos</a>
          </h2>

          <div class="d-flex align-items-center">
            <img src="{{asset('halaman-depan/assets/img/blog/blog-author.jpg')}}" alt="" class="img-fluid post-author-img flex-shrink-0">
            <div class="post-meta">
              <p class="post-author">Maria Doe</p>
              <p class="post-date">
                <time datetime="2022-01-01">Jan 1, 2022</time>
              </p>
            </div>
          </div>
        </article>
      </div><!-- End post list item -->
      <div class="col-lg-4">
        <article>
          <div class="post-img">
            <a href="{{route('detailBlog')}}">
              <img src="{{asset('halaman-depan/assets/img/blog/blog-1.jpg')}}" alt="" class="img-fluid">
            </a>
          </div>
          <p class="post-category">Politics</p>

          <h2 class="title">
            <a href="{{route('detailBlog')}}">Dolorum optio tempore voluptas dignissimos</a>
          </h2>

          <div class="d-flex align-items-center">
            <img src="{{asset('halaman-depan/assets/img/blog/blog-author.jpg')}}" alt="" class="img-fluid post-author-img flex-shrink-0">
            <div class="post-meta">
              <p class="post-author">Maria Doe</p>
              <p class="post-date">
                <time datetime="2022-01-01">Jan 1, 2022</time>
              </p>
            </div>
          </div>
        </article>
      </div><!-- End post list item -->
      <div class="col-lg-4">
        <article>
          <div class="post-img">
            <a href="{{route('detailBlog')}}">
              <img src="{{asset('halaman-depan/assets/img/blog/blog-1.jpg')}}" alt="" class="img-fluid">
            </a>
          </div>
          <p class="post-category">Politics</p>

          <h2 class="title">
            <a href="{{route('detailBlog')}}">Dolorum optio tempore voluptas dignissimos</a>
          </h2>

          <div class="d-flex align-items-center">
            <img src="{{asset('halaman-depan/assets/img/blog/blog-author.jpg')}}" alt="" class="img-fluid post-author-img flex-shrink-0">
            <div class="post-meta">
              <p class="post-author">Maria Doe</p>
              <p class="post-date">
                <time datetime="2022-01-01">Jan 1, 2022</time>
              </p>
            </div>
          </div>
        </article>
      </div><!-- End post list item -->
    </div>
  </div>

</section><!-- /Blog Posts Section -->

<!-- Blog Pagination Section -->
<section id="blog-pagination" class="blog-pagination section">
  <div class="container">
    <div class="d-flex justify-content-center">
      <ul>
        <li><a href="#"><i class="bi bi-chevron-left"></i></a></li>
        <li><a href="#">1</a></li>
        <li><a href="#" class="active">2</a></li>
        <li><a href="#">3</a></li>
        <li><a href="#">4</a></li>
        <li>...</li>
        <li><a href="#">10</a></li>
        <li><a href="#"><i class="bi bi-chevron-right"></i></a></li>
      </ul>
    </div>
  </div>
</section><!-- /Blog Pagination Section -->
@endsection
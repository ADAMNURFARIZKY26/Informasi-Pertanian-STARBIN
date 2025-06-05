@extends('layouts.landing.main')
@section('title', 'Detail Blog')
@section('content')
<div class="container">
    <!-- Breadcrumbs -->
    <nav class="blog-breadcrumbs bg-light py-2 px-3 small" aria-label="breadcrumb">
        <div class="container">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{route('welcome')}}">Beranda</a></li>
                <li class="breadcrumb-item"><a href="{{route('blog')}}">Blog</a></li>
                <li class="breadcrumb-item active" aria-current="page">Detail Blog</li>
            </ol>
        </div>
    </nav>

    <!-- Page Title -->
    <div class="blog-detail-header">
        <div class="blog-detail-heading position-relative overflow-hidden">

            <!-- Gambar thumbnail dinamis -->
            <img src="{{asset('halaman-depan/assets/img/konten/bg-pertanian.jpg')}}" alt="Thumbnail Berita" class="img-fluid position-absolute w-100 h-100 object-fit-cover z-0" style="top: 0; left: 0;">

            <!-- Overlay gelap (opsional) -->
            <div class="position-absolute top-0 start-0 w-100 h-100 bg-dark opacity-50 z-1"></div>

            <!-- Konten -->
            <div class="container position-relative z-2 py-5">
                <div class="row d-flex justify-content-center text-center">
                    <div class="col-lg-8 text-white text-shadow">
                        <h1 class="text-white text-shadow">Judul Berita</h1>
                        <p class="mb-0 text-white text-shadow">
                            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sunt, placeat alias. Voluptatibus magnam possimus similique consequuntur, facere dolorum quia saepe ipsam vel perspiciatis rem quidem voluptatum reiciendis in neque molestias?
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8">
            <!-- Blog Details Section -->
            <section id="blog-details" class="blog-details section">
                <div class="container">
                    <article class="article">
                        <h2 class="title">Judul Berita</h2>

                        <div class="post-img" style="margin-top: 30px;">
                            <img src="{{asset('halaman-depan/assets/img/blog/blog-1.jpg')}}" alt="Dokumentasi berita 1" class="img-fluid">
                        </div>

                        <div class="meta-top">
                            <ul>
                                <li class="d-flex align-items-center"><i class="bi bi-clock"></i><time datetime="2020-01-01">Jan 1, 2022</time></a></li> <!-- Tanggal upload -->
                                <li class="d-flex align-items-center"><i class="bi bi-tags"></i>Hidroponik</a></li> <!-- Tag -->
                            </ul>
                        </div><!-- End meta top -->

                        <div class="content">
                            <!-- Deskripsi Berita -->
                            <p>
                                Similique neque nam consequuntur ad non maxime aliquam quas. Quibusdam animi praesentium. Aliquam et laboriosam eius aut nostrum quidem aliquid dicta.
                                Et eveniet enim. Qui velit est ea dolorem doloremque deleniti aperiam unde soluta. Est cum et quod quos aut ut et sit sunt. Voluptate porro consequatur assumenda perferendis dolore.
                            </p>

                            <p>
                                Sit repellat hic cupiditate hic ut nemo. Quis nihil sunt non reiciendis. Sequi in accusamus harum vel aspernatur. Excepturi numquam nihil cumque odio. Et voluptate cupiditate.
                            </p>
                            <!-- End deskripsi berita -->

                            <!-- Mungkin bila diperlukan -->
                            <blockquote>
                                <p>
                                    Et vero doloremque tempore voluptatem ratione vel aut. Deleniti sunt animi aut. Aut eos aliquam doloribus minus autem quos.
                                </p>
                            </blockquote>

                            <!-- Deskripsi -->
                            <p>
                                Sed quo laboriosam qui architecto. Occaecati repellendus omnis dicta inventore tempore provident voluptas mollitia aliquid. Id repellendus quia. Asperiores nihil magni dicta est suscipit perspiciatis. Voluptate ex rerum assumenda dolores nihil quaerat.
                                Dolor porro tempora et quibusdam voluptas. Beatae aut at ad qui tempore corrupti velit quisquam rerum. Omnis dolorum exercitationem harum qui qui blanditiis neque.
                                Iusto autem itaque. Repudiandae hic quae aspernatur ea neque qui. Architecto voluptatem magni. Vel magnam quod et tempora deleniti error rerum nihil tempora.
                            </p>

                            <h3>Subjudul</h3>
                            <p>
                                Officiis animi maxime nulla quo et harum eum quis a. Sit hic in qui quos fugit ut rerum atque. Optio provident dolores atque voluptatem rem excepturi molestiae qui. Voluptatem laborum omnis ullam quibusdam perspiciatis nulla nostrum. Voluptatum est libero eum nesciunt aliquid qui.
                                Quia et suscipit non sequi. Maxime sed odit. Beatae nesciunt nesciunt accusamus quia aut ratione aspernatur dolor. Sint harum eveniet dicta exercitationem minima. Exercitationem omnis asperiores natus aperiam dolor consequatur id ex sed. Quibusdam rerum dolores sint consequatur quidem ea.
                                Beatae minima sunt libero soluta sapiente in rem assumenda. Et qui odit voluptatem. Cum quibusdam voluptatem voluptatem accusamus mollitia aut atque aut.
                            </p>
                            <img src="{{asset('halaman-depan/assets/img/blog/blog-inside-post')}}.jpg" class="img-fluid" alt="Dokumentasi berita 2">

                            <h3>Subjudul</h3>
                            <p>
                                Rerum ea est assumenda pariatur quasi et quam. Facilis nam porro amet nostrum. In assumenda quia quae a id praesentium. Quos deleniti libero sed occaecati aut porro autem. Consectetur sed excepturi sint non placeat quia repellat incidunt labore. Autem facilis hic dolorum dolores vel.
                                Consectetur quasi id et optio praesentium aut asperiores eaque aut. Explicabo omnis quibusdam esse. Ex libero illum iusto totam et ut aut blanditiis. Veritatis numquam ut illum ut a quam vitae.
                            </p>
                            <p>
                                Alias quia non aliquid. Eos et ea velit. Voluptatem maxime enim omnis ipsa voluptas incidunt. Nulla sit eaque mollitia nisi asperiores est veniam.
                            </p> <!-- End Deskripsi -->
                        </div> <!-- End post content -->

                        <div class="meta-bottom">
                            <i class="bi bi-tags"></i>
                            <ul class="tags">
                                <li>Creative</li>
                                <li>Tips</li>
                                <li>Marketing</li>
                            </ul>
                        </div><!-- End meta bottom -->
                    </article>
                </div>
            </section><!-- /Blog Details Section -->
        </div>

        <div class="col-lg-4 sidebar">
            <div class="widgets-container">
                <!-- Search Widget -->
                <div class="search-widget widget-item">
                    <h3 class="widget-title">Search</h3>
                    <form action="">
                        <input type="text" placeholder="Cari Berita">
                        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
                    </form>
                </div><!--/Search Widget -->

                <!-- Categories Widget -->
                <div class="categories-widget widget-item">
                    <h3 class="widget-title">Kategori</h3>
                    <ul class="mt-3">
                        <li><a href="#">Filter<span>(25)</span></a></li>
                        <li><a href="#">Filter<span>(12)</span></a></li>
                        <li><a href="#">Filter<span>(5)</span></a></li>
                        <li><a href="#">Filter<span>(22)</span></a></li>
                        <li><a href="#">Filter<span>(8)</span></a></li>
                        <li><a href="#">Filter<span>(14)</span></a></li>
                    </ul>

                </div><!--/Categories Widget -->

                <!-- Recent Posts Widget -->
                <div class="recent-posts-widget widget-item">
                    <h3 class="widget-title">Berita Terbaru</h3>

                    <div class="post-item">
                        <a href="#">
                            <img src="{{asset('halaman-depan/assets/img/blog/blog-recent-1')}}.jpg" alt="" class="flex-shrink-0">
                        </a>

                        <div>
                            <h4><a href="blog-details.html">Nihil blanditiis at in nihil autem</a></h4>
                            <time datetime="2020-01-01">Jan 1, 2020</time>
                        </div>
                    </div><!-- End recent post item-->

                    <div class="post-item">
                        <a href="#">
                            <img src="{{asset('halaman-depan/assets/img/blog/blog-recent-1')}}.jpg" alt="" class="flex-shrink-0">
                        </a>
                        <div>
                            <h4><a href="blog-details.html">Quidem autem et impedit</a></h4>
                            <time datetime="2020-01-01">Jan 1, 2020</time>
                        </div>
                    </div><!-- End recent post item-->

                    <div class="post-item">
                        <a href="#">
                            <img src="{{asset('halaman-depan/assets/img/blog/blog-recent-1')}}.jpg" alt="" class="flex-shrink-0">
                        </a>
                        <div>
                            <h4><a href="blog-details.html">Id quia et et ut maxime similique occaecati ut</a></h4>
                            <time datetime="2020-01-01">Jan 1, 2020</time>
                        </div>
                    </div><!-- End recent post item-->

                    <div class="post-item">
                        <a href="#">
                            <img src="{{asset('halaman-depan/assets/img/blog/blog-recent-1')}}.jpg" alt="" class="flex-shrink-0">
                        </a>
                        <div>
                            <h4><a href="blog-details.html">Laborum corporis quo dara net para</a></h4>
                            <time datetime="2020-01-01">Jan 1, 2020</time>
                        </div>
                    </div><!-- End recent post item-->

                    <div class="post-item">
                        <a href="#">
                            <img src="{{asset('halaman-depan/assets/img/blog/blog-recent-1')}}.jpg" alt="" class="flex-shrink-0">
                        </a>
                        <div>
                            <h4><a href="blog-details.html">Et dolores corrupti quae illo quod dolor</a></h4>
                            <time datetime="2020-01-01">Jan 1, 2020</time>
                        </div>
                    </div><!-- End recent post item-->
                </div><!--/Recent Posts Widget -->

                <!-- Tags Widget -->
                <div class="tags-widget widget-item">
                    <h3 class="widget-title">Tags</h3>
                    <ul>
                        <li><a href="#">App</a></li>
                        <li><a href="#">IT</a></li>
                        <li><a href="#">Business</a></li>
                        <li><a href="#">Mac</a></li>
                        <li><a href="#">Design</a></li>
                        <li><a href="#">Office</a></li>
                        <li><a href="#">Creative</a></li>
                        <li><a href="#">Studio</a></li>
                        <li><a href="#">Smart</a></li>
                        <li><a href="#">Tips</a></li>
                        <li><a href="#">Marketing</a></li>
                    </ul>
                </div><!--/Tags Widget -->
            </div>
        </div>
    </div>
</div>
@endsection
<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="utf-8" />
        <meta content="width=device-width, initial-scale=1.0" name="viewport" />
        <title>Daftar Produk - Pertanian SMKN 1 BINONG</title>
        <!-- Favicons -->
        <link href="{{ asset('halaman-depan/assets/img/Logo/Logo.png') }}" rel="icon" />
        <link href="{{ asset('halaman-depan/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon" />

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com" rel="preconnect" />
        <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet"/>

        <!-- Vendor CSS Files -->
        <link rel="stylesheet" href="{{ asset('halaman-depan/assets/vendor/bootstrap/css/bootstrap.css') }}" />
        <link rel="stylesheet" href="{{ asset('halaman-depan/assets/vendor/bootstrap/css/bootstrap.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('halaman-depan/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" />
        <link rel="stylesheet" href="{{ asset('halaman-depan/assets/vendor/aos/aos.css') }}" />
        <link rel="stylesheet" href="{{ asset('halaman-depan/assets/vendor/glightbox/css/glightbox.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('halaman-depan/assets/vendor/swiper/swiper-bundle.min.css') }}" />

        <!-- Main CSS File -->
        <link rel="stylesheet" href="{{ asset('halaman-depan/assets/css/main.css') }}"/>

        <!-- mycss -->
        <link rel="stylesheet" href="{{ asset('halaman-depan/assets/css/mycss/list-product.css') }}"/>
        <link rel="stylesheet" href="{{ asset('halaman-depan/assets/css/mycss/landingpage.css') }}"/>
    </head>

    <body class="produk-page">
        @include('layouts.landing.partials.header')

        <main class="main">
            <div class="container">
                <!-- Slideshow -->
                <section class="product-slideshow position-relative">
                    <!-- Breadcrumbs -->
                    <nav aria-label="breadcrumb" class="breadcrumbs py-2 md">
                        <div class="container">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="{{route('welcome')}}">Beranda</a></li>
                                <li class="breadcrumb-item text-dark" aria-current="page">Daftar Produk</li>
                            </ol>
                        </div>
                    </nav>

                    <div class="swiper productSwiper">
                        <div class="swiper-wrapper">
                            <!-- Slide pertama menggunakan src langsung + data-src sebagai fallback -->
                            <div class="swiper-slide swiper-lazy">
                                <div class="overlay"></div>
                                <img src="{{ asset('halaman-depan/assets/img/konten/IMG_20250508_085646.jpg') }}" data-src="{{ asset('halaman-depan/assets/img/konten/IMG_20250508_085646.jpg') }}" alt="Produk 1" class="img-fluid rounded shadow"/>

                                <!-- Overlay Nama produk -->
                                <div class="overlay-caption position-absolute bottom-0 start-0 w-100 bg-dark bg-opacity-50 text-white text-center py-4 px-3">
                                    <p class="nama-produk mb-0 fs-5 fw-semibold">Produk 1</p>
                                </div>
                                <div class="swiper-lazy-preloader"></div>
                            </div>

                            <div class="swiper-slide swiper-lazy">
                                <div class="overlay"></div>
                                <img data-src="{{ asset('halaman-depan/assets/img/konten/IMG_20250508_085646.jpg') }}" alt="Produk 2" class="img-fluid rounded shadow"/>

                                <!-- Overlay Nama produk -->
                                <div class="overlay-caption position-absolute bottom-0 start-0 w-100 bg-dark bg-opacity-50 text-white text-center py-4 px-3">
                                    <p class="nama-produk mb-0 fs-5 fw-semibold">Produk 2</p>
                                </div>
                                <div class="swiper-lazy-preloader"></div>
                            </div>

                            <div class="swiper-slide swiper-lazy">
                                <div class="overlay"></div>
                                <img data-src="{{ asset('halaman-depan/assets/img/konten/IMG_20250508_085646.jpg') }}" alt="Produk 3" class="img-fluid rounded shadow"/>

                                <!-- Overlay Nama produk -->
                                <div class="overlay-caption position-absolute bottom-0 start-0 w-100 bg-dark bg-opacity-50 text-white text-center py-4 px-3">
                                    <p class="nama-produk mb-0 fs-5 fw-semibold">Produk 3</p>
                                </div>
                                <div class="swiper-lazy-preloader"></div>
                            </div>

                            <div class="swiper-slide swiper-lazy">
                                <div class="overlay"></div>
                                <img data-src="{{ asset('halaman-depan/assets/img/konten/IMG_20250508_085646.jpg') }}" alt="Produk 4" class="img-fluid rounded shadow"/>

                                <!-- Overlay Nama produk -->
                                <div class="overlay-caption position-absolute bottom-0 start-0 w-100 bg-dark bg-opacity-50 text-white text-center py-4 px-3">
                                    <p class="nama-produk mb-0 fs-5 fw-semibold">Produk 4</p>
                                </div>
                                <div class="swiper-lazy-preloader"></div>
                            </div>
                        </div>
                        <div
                            class="button-prev custom-swiper-btn"
                            tabindex="0"
                            aria-label="Slide sebelumnya"
                        >
                            <span>&lt;</span>
                        </div>
                        <div
                            class="button-next custom-swiper-btn"
                            tabindex="0"
                            aria-label="Slide berikutnya"
                        >
                            <span>&gt;</span>
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </section>
                <!-- End Slideshow ATPH Produk -->

                <!-- card produk unggulan -->
                <div class="container-fluid">
                    <div class="mx-auto">
                        <div class="good-product-container bg-white rounded-4 p-4 w-100">
                            <h2 class="fs-4 fw-semibold pb-2">Produk Unggulan</h2>

                            <div class="d-flex gap-3 overflow-auto py-2">
                                <!-- Produk 1 -->
                                <a href="{{route('detail-produk')}}" class="text-decoration-none">
                                    <div class="card-product-unggulan text-center flex-shrink-0 mb-4 rounded-3">
                                        <div class="rounded-3 mx-auto mb-3 img-product-unggulan border" >
                                            <img src="{{ asset('halaman-depan/') }}" data-src="{{ asset('halaman-depan/') }}" alt="Produk unggulan 1" class="w-100 h-100 object-fit-cover rounded-3">
                                        </div>
                                        <div class="fw-semibold text-dark mb-1" style="font-size: 0.875rem; line-height: 1.2;">Brokoli</div>
                                        <div class="text-muted" style="font-size: 0.75rem;">Sayuran</div>
                                    </div>
                                </a>
                                
                                <!-- Produk 2 -->
                                <a href="{{route('detail-produk')}}" class="text-decoration-none">
                                    <div class="card-product-unggulan text-center flex-shrink-0 mb-4 rounded-3">
                                        <div class="rounded-3 mx-auto mb-3 img-product-unggulan border" >
                                            <img src="{{ asset('halaman-depan/') }}" data-src="{{ asset('halaman-depan/') }}" alt="Produk unggulan 2" class="w-100 h-100 object-fit-cover rounded-3">
                                        </div>
                                        <div class="fw-semibold text-dark mb-1" style="font-size: 0.875rem; line-height: 1.2;">Cabai</div>
                                        <div class="text-muted" style="font-size: 0.75rem;">Sayuran</div>
                                    </div>
                                </a>
                                
                                <!-- Produk 3 -->
                                <a href="{{route('detail-produk')}}" class="text-decoration-none">
                                    <div class="card-product-unggulan text-center flex-shrink-0 mb-4 rounded-3">
                                        <div class="rounded-3 mx-auto mb-3 img-product-unggulan border" >
                                            <img src="{{ asset('halaman-depan/') }}" data-src="{{ asset('halaman-depan/') }}" alt="Produk unggulan 3" class="w-100 h-100 object-fit-cover rounded-3">
                                        </div>
                                        <div class="fw-semibold text-dark mb-1" style="font-size: 0.875rem; line-height: 1.2;">Tomat</div>
                                        <div class="text-muted" style="font-size: 0.75rem;">Sayuran</div>
                                    </div>
                                </a>
                                
                                <!-- Produk 4 -->
                                <a href="{{route('detail-produk')}}" class="text-decoration-none">
                                    <div class="card-product-unggulan text-center flex-shrink-0 mb-4 rounded-3">
                                        <div class="rounded-3 mx-auto mb-3 img-product-unggulan border" >
                                            <img src="{{ asset('halaman-depan/') }}" data-src="{{ asset('halaman-depan/') }}" alt="Produk unggulan 4" class="w-100 h-100 object-fit-cover rounded-3">
                                        </div>
                                        <div class="fw-semibold text-dark mb-1" style="font-size: 0.875rem; line-height: 1.2;">Melon</div>
                                        <div class="text-muted" style="font-size: 0.75rem;">Sayuran</div>
                                    </div>
                                </a>
                                
                                <!-- Produk 5 -->
                                <a href="{{route('detail-produk')}}" class="text-decoration-none">
                                    <div class="card-product-unggulan text-center flex-shrink-0 mb-4 rounded-3">
                                        <div class="rounded-3 mx-auto mb-3 img-product-unggulan border" >
                                            <img src="{{ asset('halaman-depan/') }}" data-src="{{ asset('halaman-depan/') }}" alt="Produk unggulan 5" class="w-100 h-100 object-fit-cover rounded-3">
                                        </div>
                                        <div class="fw-semibold text-dark mb-1" style="font-size: 0.875rem; line-height: 1.2;">Jagung</div>
                                        <div class="text-muted" style="font-size: 0.75rem;">Buah</div>
                                    </div>
                                </a>
                                
                                <!-- Produk 6 -->
                                <a href="{{route('detail-produk')}}" class="text-decoration-none">
                                    <div class="card-product-unggulan text-center flex-shrink-0 mb-4 rounded-3">
                                        <div class="rounded-3 mx-auto mb-3 img-product-unggulan border" >
                                            <img src="{{ asset('halaman-depan/') }}" data-src="{{ asset('halaman-depan/') }}" alt="Produk unggulan 6" class="w-100 h-100 object-fit-cover rounded-3">
                                        </div>
                                        <div class="fw-semibold text-dark mb-1" style="font-size: 0.875rem; line-height: 1.2;">Padi</div>
                                        <div class="text-muted" style="font-size: 0.75rem;">Buah</div>
                                    </div>
                                </a>
                                
                                <!-- Produk 7 -->
                                <a href="{{route('detail-produk')}}" class="text-decoration-none">
                                    <div class="card-product-unggulan text-center flex-shrink-0 mb-4 rounded-3">
                                        <div class="rounded-3 mx-auto mb-3 img-product-unggulan border" >
                                            <img src="{{ asset('halaman-depan/') }}" data-src="{{ asset('halaman-depan/') }}" alt="Produk unggulan 7" class="w-100 h-100 object-fit-cover rounded-3">
                                        </div>
                                        <div class="fw-semibold text-dark mb-1" style="font-size: 0.875rem; line-height: 1.2;">Apel</div>
                                        <div class="text-muted" style="font-size: 0.75rem;">Buah</div>
                                    </div>
                                </a>
                                
                                <!-- Produk 8 -->
                                <a href="{{route('detail-produk')}}" class="text-decoration-none">
                                    <div class="card-product-unggulan text-center flex-shrink-0 mb-4 rounded-3">
                                        <div class="rounded-3 mx-auto mb-3 img-product-unggulan border" >
                                            <img src="{{ asset('halaman-depan/') }}" data-src="{{ asset('halaman-depan/') }}" alt="Produk unggulan 8" class="w-100 h-100 object-fit-cover rounded-3">
                                        </div>
                                        <div class="fw-semibold text-dark mb-1" style="font-size: 0.875rem; line-height: 1.2;">Semangka</div>
                                        <div class="text-muted" style="font-size: 0.75rem;">Buah</div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end card produk unggulan -->
                
                <!-- Daftar produk -->
                <div class="container-fluid px-3" style="margin-top: 70px;">
                    <div class="mt-4 mb-3">
                        <div class="mb-3 d-flex justify-content-between align-items-center">
                            <h2 class="fs-4 fw-semibold mb-0">Daftar Produk</h2>
                            <span class="ms-3 fw-medium fs-5" style="color: #00AA5B; cursor: pointer;">Lihat semua produk</span>
                        </div>
                    </div>

                    <div class="products-grid mb-4">
                        <!-- Product 1 -->
                        <div class="product-item">
                            <a href="{{route('detail-produk')}}" class="text-decoration-none">
                                <div class="card product-card border border-light-subtle h-100 shadow-sm">
                                    <div class="product-image-container position-relative rounded-top overflow-hidden">
                                        <img src="{{ asset('halaman-depan/') }}" data-src="{{ asset('halaman-depan/') }}" alt="Produk 1" class="product-image w-100">
                                        <span class="discount-badge position-absolute bg-danger text-white px-2 py-1 rounded small">45%</span>
                                    </div>
                                    <div class="card-body p-3 position-relative">
                                        <div class="product-name text-dark">tatakan amplas sanding block</div>
                                        <div class="product-price fw-bold text-dark mb-2">Rp250.000</div>
                                        <div class="product-meta d-flex align-items-center text-muted mb-2">
                                            <i class="bi bi-star-fill rating-star me-1"></i>
                                            <span class="me-1">5.0</span>
                                            <span>• 15 terjual</span>
                                        </div>
                                        <button class="cart-button btn btn-success position-absolute rounded d-flex align-items-center justify-content-center p-0">
                                            <i class="bi bi-cart text-white"></i>
                                        </button>
                                    </div>
                                </div>
                            </a>
                        </div>
                        
                        <!-- Product 2 -->
                        <div class="product-item">
                            <a href="{{route('detail-produk')}}" class="text-decoration-none">
                                <div class="card product-card border border-light-subtle h-100 shadow-sm">
                                    <div class="product-image-container position-relative rounded-top overflow-hidden">
                                        <img data-src="{{ asset('halaman-depan/') }}" alt="Produk 2" class="product-image w-100">
                                        <span class="discount-badge position-absolute bg-danger text-white px-2 py-1 rounded small">45%</span>
                                    </div>
                                    <div class="card-body p-3 position-relative">
                                        <div class="product-name text-dark">Karbol Sereh 5 liter Sabun Pel...</div>
                                        <div class="product-price fw-bold text-dark mb-2">Rp47.000</div>
                                        <div class="product-meta d-flex align-items-center text-muted mb-2">
                                            <i class="bi bi-star-fill rating-star me-1"></i>
                                            <span class="me-1">5.0</span>
                                            <span>• 100+ terjual</span>
                                        </div>
                                        <button class="cart-button btn btn-success position-absolute rounded d-flex align-items-center justify-content-center p-0">
                                            <i class="bi bi-cart text-white"></i>
                                        </button>
                                    </div>
                                </div>
                            </a>
                        </div>
                        
                        <!-- Product 3 -->
                        <div class="product-item">
                            <a href="{{route('detail-produk')}}" class="text-decoration-none">
                                <div class="card product-card border border-light-subtle h-100 shadow-sm">
                                    <div class="product-image-container position-relative rounded-top overflow-hidden">
                                        <img data-src="{{ asset('halaman-depan/') }}" alt="Produk 3" class="product-image w-100">
                                        <span class="discount-badge position-absolute bg-danger text-white px-2 py-1 rounded small">53%</span>
                                    </div>
                                    <div class="card-body p-3 position-relative">
                                        <div class="product-name text-dark">Helm Bogo Dewasa Thinos ...</div>
                                        <div class="product-price fw-bold text-dark mb-2">Rp98.700</div>
                                        <div class="product-meta d-flex align-items-center text-muted mb-2">
                                            <i class="bi bi-star-fill rating-star me-1"></i>
                                            <span class="me-1">4.8</span>
                                            <span>• 10rb+ terjual</span>
                                        </div>
                                        <button class="cart-button btn btn-success position-absolute rounded d-flex align-items-center justify-content-center p-0">
                                            <i class="bi bi-cart text-white"></i>
                                        </button>
                                    </div>
                                </div>
                            </a>
                        </div>
                        
                        <!-- Product 4 -->
                        <div class="product-item">
                            <a href="{{route('detail-produk')}}" class="text-decoration-none">
                                <div class="card product-card border border-light-subtle h-100 shadow-sm">
                                    <div class="product-image-container position-relative rounded-top overflow-hidden">
                                        <img data-src="{{ asset('halaman-depan/') }}" alt="Produk 4" class="product-image w-100">
                                    </div>
                                    <div class="card-body p-3 position-relative">
                                        <div class="product-name text-dark">Xiaomi Poco M7 Pro 5G Ring ...</div>
                                        <div class="product-price fw-bold text-dark mb-2">Rp50.000</div>
                                        <div class="product-meta d-flex align-items-center text-muted mb-2">
                                            <span>21 terjual</span>
                                        </div>
                                        <button class="cart-button btn btn-success position-absolute rounded d-flex align-items-center justify-content-center p-0">
                                            <i class="bi bi-cart text-white"></i>
                                        </button>
                                    </div>
                                </div>
                            </a>
                        </div>
                        
                        <!-- Product 5 -->
                        <div class="product-item">
                            <a href="{{route('detail-produk')}}" class="text-decoration-none">
                                <div class="card product-card border border-light-subtle h-100 shadow-sm">
                                    <div class="product-image-container position-relative rounded-top overflow-hidden">
                                        <img data-src="{{ asset('halaman-depan/') }}" alt="Produk 5" class="product-image w-100">
                                        <span class="discount-badge position-absolute bg-danger text-white px-2 py-1 rounded small">72g</span>
                                    </div>
                                    <div class="card-body p-3 position-relative">
                                        <div class="product-name text-dark">SABUN BATANG GIV 72GRAM...</div>
                                        <div class="product-price fw-bold text-dark mb-2">Rp3.149</div>
                                        <div class="product-meta d-flex align-items-center text-muted mb-2">
                                            <i class="bi bi-star-fill rating-star me-1"></i>
                                            <span class="me-1">4.3</span>
                                            <span>• 250+ terjual</span>
                                        </div>
                                        <button class="cart-button btn btn-success position-absolute rounded d-flex align-items-center justify-content-center p-0">
                                            <i class="bi bi-cart text-white"></i>
                                        </button>
                                    </div>
                                </div>
                            </a>
                        </div>
                        
                        <!-- Product 6 -->
                        <div class="product-item">
                            <a href="{{route('detail-produk')}}" class="text-decoration-none">
                                <div class="card product-card border border-light-subtle h-100 shadow-sm">
                                    <div class="product-image-container position-relative rounded-top overflow-hidden">
                                        <img data-src="{{ asset('halaman-depan/') }}" alt="Produk 6" class="product-image w-100">
                                    </div>
                                    <div class="card-body p-3 position-relative">
                                        <div class="product-name text-dark">Gantungan Kunci SMILE Bahan...</div>
                                        <div class="product-price fw-bold text-dark mb-2">Rp99.000</div>
                                        <div class="product-meta d-flex align-items-center text-muted mb-2">
                                            <i class="bi bi-star-fill rating-star me-1"></i>
                                            <span class="me-1">4.2</span>
                                            <span>• 250+ terjual</span>
                                        </div>
                                        <button class="cart-button btn btn-success position-absolute rounded d-flex align-items-center justify-content-center p-0">
                                            <i class="bi bi-cart text-white"></i>
                                        </button>
                                    </div>
                                </div>
                            </a>
                        </div>
                        
                        <!-- Product 7 -->
                        <div class="product-item">
                            <a href="{{route('detail-produk')}}" class="text-decoration-none">
                                <div class="card product-card border border-light-subtle h-100 shadow-sm">
                                    <div class="product-image-container position-relative rounded-top overflow-hidden">
                                        <img data-src="{{ asset('halaman-depan/') }}" alt="Produk 7" class="product-image w-100">
                                    </div>
                                    <div class="card-body p-3 position-relative">
                                        <div class="product-name text-dark">Plastic Polytainer Jerigen...</div>
                                        <div class="product-price fw-bold text-dark mb-2">Rp35.000</div>
                                        <div class="product-meta d-flex align-items-center text-muted mb-2">
                                            <i class="bi bi-star-fill rating-star me-1"></i>
                                            <span class="me-1">4.1</span>
                                            <span>• 50+ terjual</span>
                                        </div>
                                        <button class="cart-button btn btn-success position-absolute rounded d-flex align-items-center justify-content-center p-0">
                                            <i class="bi bi-cart text-white"></i>
                                        </button>
                                    </div>
                                </div>
                            </a>
                        </div>
                        
                        <!-- Product 8 -->
                        <div class="product-item">
                            <a href="{{route('detail-produk')}}" class="text-decoration-none">
                                <div class="card product-card border border-light-subtle h-100 shadow-sm">
                                    <div class="product-image-container position-relative rounded-top overflow-hidden">
                                        <img data-src="{{ asset('halaman-depan/') }}" alt="Produk 8" class="product-image w-100">
                                    </div>
                                    <div class="card-body p-3 position-relative">
                                        <div class="product-name text-dark">Holder HP Mobil Dashboard...</div>
                                        <div class="product-price fw-bold text-dark mb-2">Rp25.000</div>
                                        <div class="product-meta d-flex align-items-center text-muted mb-2">
                                            <i class="bi bi-star-fill rating-star me-1"></i>
                                            <span class="me-1">4.7</span>
                                            <span>• 300+ terjual</span>
                                        </div>
                                        <button class="cart-button btn btn-success position-absolute rounded d-flex align-items-center justify-content-center p-0">
                                            <i class="bi bi-cart text-white"></i>
                                        </button>
                                    </div>
                                </div>
                            </a>
                        </div>
                        
                        <!-- Product 9 -->
                        <div class="product-item">
                            <a href="{{route('detail-produk')}}" class="text-decoration-none">
                                <div class="card product-card border border-light-subtle h-100 shadow-sm">
                                    <div class="product-image-container position-relative rounded-top overflow-hidden">
                                        <img data-src="{{ asset('halaman-depan/') }}" alt="Produk 9" class="product-image w-100">
                                    </div>
                                    <div class="card-body p-3 position-relative">
                                        <div class="product-name text-dark">Tas Ransel Sekolah Anak...</div>
                                        <div class="product-price fw-bold text-dark mb-2">Rp85.000</div>
                                        <div class="product-meta d-flex align-items-center text-muted mb-2">
                                            <i class="bi bi-star-fill rating-star me-1"></i>
                                            <span class="me-1">4.6</span>
                                            <span>• 120+ terjual</span>
                                        </div>
                                        <button class="cart-button btn btn-success position-absolute rounded d-flex align-items-center justify-content-center p-0">
                                            <i class="bi bi-cart text-white"></i>
                                        </button>
                                    </div>
                                </div>
                            </a>
                        </div>
                        
                        <!-- Product 10 -->
                        <div class="product-item">
                            <a href="{{route('detail-produk')}}0" class="text-decoration-none">
                                <div class="card product-card border border-light-subtle h-100 shadow-sm">
                                    <div class="product-image-container position-relative rounded-top overflow-hidden">
                                        <img data-src="{{ asset('halaman-depan/') }}" alt="Produk 10" class="product-image w-100">
                                        <span class="discount-badge position-absolute bg-danger text-white px-2 py-1 rounded small">5%</span>
                                    </div>
                                    <div class="card-body p-3 position-relative">
                                        <div class="product-name text-dark">Sarung Tangan Karet Orange...</div>
                                        <div class="product-price fw-bold text-dark mb-2">Rp15.000</div>
                                        <div class="product-meta d-flex align-items-center text-muted mb-2">
                                            <i class="bi bi-star-fill rating-star me-1"></i>
                                            <span class="me-1">4.4</span>
                                            <span>• 200+ terjual</span>
                                        </div>
                                        <button class="cart-button btn btn-success position-absolute rounded d-flex align-items-center justify-content-center p-0">
                                            <i class="bi bi-cart text-white"></i>
                                        </button>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- Load more product -->
                <div class="d-flex justify-content-center">
                    <button class="btn-load-product bg-white rounded p-3 text-success fw-bold mb-4">Muat Lebih Banyak Produk</button>
                </div>
            </div>
        </main>

        <footer id="footer" class="footer accent-background">
            <div class="container footer-top">
                <div class="row gy-4">
                    <div class="col-lg-5 col-md-12 footer-about">
                        <a href="index.html" class="logo d-flex align-items-center">
                            <span class="sitename">Pertanian SMKN 1 Binong</span>
                        </a>
                        <p>
                            Menyediakan informasi dan produk pertanian
                            berkualitas dari SMKN 1 Binong. Dukung pertanian
                            lokal dan pendidikan vokasi!
                        </p>
                        <div class="social-links d-flex mt-4">
                            <a href="#"><i class="bi bi-twitter-x"></i></a>
                            <a href="#"><i class="bi bi-facebook"></i></a>
                            <a href="#"><i class="bi bi-instagram"></i></a>
                            <a href="#"><i class="bi bi-linkedin"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-2 col-6 footer-links">
                        <h4>Tautan Cepat</h4>
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li><a href="index.html#about">Tentang Kami</a></li>
                            <li><a href="produk.html">Produk</a></li>
                            <li><a href="index.html#services">Layanan</a></li>
                            <li><a href="#">Syarat & Ketentuan</a></li>
                            <li><a href="#">Kebijakan Privasi</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-2 col-6 footer-links">
                        <h4>Produk Unggulan</h4>
                        <ul>
                            <li><a href="#">Cabai</a></li>
                            <li><a href="#">Brokoli</a></li>
                            <li><a href="#">Tomat</a></li>
                            <li><a href="#">Sayuran Daun</a></li>
                            <li><a href="#">Buah Musiman</a></li>
                        </ul>
                    </div>

                    <div
                        class="col-lg-3 col-md-12 footer-contact text-center text-md-start"
                    >
                        <h4>Hubungi Kami</h4>
                        <p>SMKN 1 Binong</p>
                        <p>Jl. Raya Binong, Kec. Binong</p>
                        <p>Kab. Subang, Jawa Barat</p>
                        <p class="mt-4">
                            <strong>Telepon:</strong> <span>(0260) 123456</span>
                        </p>
                        <p>
                            <strong>Email:</strong>
                            <span>info.pertanian@smkn1binong.sch.id</span>
                        </p>
                    </div>
                </div>
            </div>

            <div class="container copyright text-center mt-4">
                <p>
                    © <span>Hak Cipta</span>
                    <strong class="px-1 sitename"
                        >Pertanian SMKN 1 Binong</strong
                    >
                    <span>Dilindungi Undang-Undang</span>
                </p>
            </div>
        </footer>

        <!-- Scroll Top -->
        <a
            href="#"
            id="scroll-top"
            class="scroll-top d-flex align-items-center justify-content-center"
            ><i class="bi bi-arrow-up-short"></i
        ></a>

        <!-- Vendor JS Files -->
        <script src="{{ asset('halaman-depan/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('halaman-depan/assets/vendor/php-email-form/validate.js') }}"></script>
        <script src="{{ asset('halaman-depan/assets/vendor/aos/aos.js') }}"></script>
        <script src="{{ asset('halaman-depan/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
        <script src="{{ asset('halaman-depan/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
        <script src="{{ asset('halaman-depan/assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
        <script src="{{ asset('halaman-depan/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
        <script src="{{ asset('halaman-depan/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>

        <!-- Main JS File -->
        <script src="{{ asset('halaman-depan/assets/js/main.js') }}"></script>
        <script src="{{ asset('halaman-depan/assets/js/myjs/landingpage.js') }}"></script>
        <script src="{{ asset('halaman-depan/assets/js/myjs/list-product.js') }}"></script>
    </body>
</html>


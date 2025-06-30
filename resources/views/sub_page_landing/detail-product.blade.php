<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Detail Produk</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicons -->
    <link href="{{ asset('halaman-depan/assets/img/Logo/Logo .png') }}" rel="icon">
    <link href="{{ asset('halaman-depan/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap">

    <!-- Vendor CSS Files -->
    <link rel="stylesheet" href="{{ asset('halaman-depan/assets/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('halaman-depan/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('halaman-depan/assets/vendor/aos/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('halaman-depan/assets/vendor/glightbox/css/glightbox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('halaman-depan/assets/vendor/swiper/swiper-bundle.min.css') }}">

    <!-- Main CSS File -->
    <link rel="stylesheet" href="{{ asset('halaman-depan/assets/css/main.css') }}">

    <!-- Mycss -->
    <link rel="stylesheet" href="{{ asset('halaman-depan/assets/css/mycss/landingpage.css') }}">
    <link rel="stylesheet" href="{{ asset('halaman-depan/assets/css/mycss/detail-product.css') }}">
</head>

<body class="portfolio-details-page modal-open-support">

    @include('layouts.landing.partials.header')
    <main class="main" style="padding-top: 90px; box-sizing: border-box;">
        <div class="container">
            <!-- Breadcrumb -->
            <div class="container-fluid" style="padding: 0;">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('welcome')}}" class="text-decoration-none">Beranda</a></li>
                        <li class="breadcrumb-item"><a href="{{route('list-produk')}}" class="text-decoration-none">Daftar Produk</a></li>
                        <li class="breadcrumb-item"><a href="#" class="text-decoration-none">Perlengkapan Rumah</a></li>
                        <li class="breadcrumb-item"><a href="#" class="text-decoration-none">Peralatan & Perbaikan</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Lem & Perekat</li>
                    </ol>
                </nav>
            </div>

            <div class="row">
                <!-- Product Images Section -->
                <div class="col-lg-5 col-md-6 ">
                    <div class="product-image-sticky-group position-sticky top-0">
                        <!-- Main product image -->
                        <div class="main-product-thumbnail mb-3" id="mainProductThumbnail">
                            <img class="main-product-image" id="mainImage" src="" alt="Nama Produk">
                            <div class="position-absolute top-0 end-0 m-2">
                                <span class="discount-badge bg-danger">25%</span>
                            </div>
                        </div>

                        <!-- Another product images -->
                        <div class="d-flex gap-2 flex-wrap">
                            <div class="product-thumbnail active" id="productThumbnail" onclick="changeImage()">
                                <img src="{{ asset('halaman-depan/') }}" alt="Thumbnail 1">
                            </div>
                            <div class="product-thumbnail" id="productThumbnail" onclick="changeImage()">
                                <img src="{{ asset('halaman-depan/') }}" alt="Thumbnail 2">
                            </div>
                            <div class="product-thumbnail" id="productThumbnail" onclick="changeImage()">
                                <img src="{{ asset('halaman-depan/') }}" alt="Thumbnail 3">
                            </div>
                            <div class="product-thumbnail" id="productThumbnail" onclick="changeImage()">
                                <img src="{{ asset('halaman-depan/') }}" alt="Thumbnail 4">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Product Info Section -->
                <div class="col-lg-4 col-md-6">
                    <h1 class="name-product h4 fw-bold mb-3 text-dark fw-semibold" id="name-product">Lem Pengganti Paku Sekrup Tembok Kayu Metal Keramik No More Nail 60 Gr</h1>

                    <!-- Rating -->
                    <div class="rating-container d-flex align-items-center mb-3" id="rating-container">
                        <span class="sold text-muted me-3">5rb+ terjual • </span>

                        <div class="rating-stars">
                            <i class="bi bi-star-fill"></i> <!-- Jumlah icon ratingnya adalah 5, nanti half atau fill nya dan ratingnya akan disesuaikan dengan data -->
                        </div>
                        <span class="rating text-muted">4.8 (2.1rb ulasan)</span>
                    </div>

                    <!-- Tags -->
                    <div class="product-tags">
                        <span class="product-tag">Kuat & Tahan Lama</span>
                        <span class="product-tag">Mudah Digunakan</span>
                        <span class="product-tag">Multi Surface</span>
                    </div>

                    <!-- Detail Price / Harga -->
                    <div class="price-section mb-3">
                        <div class="d-flex mb-1 flex-column">
                            <div class="d-flex align-items-center">
                                <div class="price-current me-2 text-dark fw-bold fs-4">Rp9.800</div>
                            </div>
                            <div class="d-flex flex-row gap-2 mt-1">
                                <span class="discount-badge bg-danger">2%</span>
                                <span class="price-original text-muted small text-decoration-line-through">Rp10.000</span>
                            </div>
                        </div>
                    </div>

                    <!-- Variant -->
                    <div class="mb-4">
                        <h6 class="fw-bold mb-2">Pilih Varian:</h6>
                        <div>
                            <div class="variant-option selected" onclick="selectVariant(this)">60 Gr</div>
                            <div class="variant-option" onclick="selectVariant(this)">100 Gr</div>
                            <div class="variant-option" onclick="selectVariant(this)">200 Gr</div>
                        </div>
                    </div>

                    <hr>
                    <!-- Condition & Min Order -->
                    <div class="mb-4">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="small text-muted">Kondisi:</span>
                            <span class="kondisi-produk small fw-bold">Baru</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="small text-muted">Min. Pemesanan:</span>
                            <span class="small fw-bold">1 Buah</span>
                        </div>
                    </div>
                    <hr>

                    <!-- Deskripsi Produk -->
                    <div class="product-description mb-4">
                        <div id="shortDescription" class="description-content text-dark">
                            <p class="mb-2">
                                New Product!^^^ NO MORE NAIL GLUE merupakan lem pengganti paku dan sekrup yang mempunyai daya rekat sangat kuat yang dapat di gunakan untuk pemasangan kayu panel, partisi lantai, peralatan kamar mandi, metal, bata, keramik, MDF, karpet, pajangan dan pernak-pernik gantungan pada tembok yang biasanya memerlukan paku atau sekrup.
                            </p>
                            <p class="mb-2">
                                Spesifikasi: 1. 100% baru &amp; kualitas tinggi 2. Dapat menopang berat hingga 23kg 3. Tanpa membuat lubang yang akan merusak dinding...
                            </p>
                        </div>

                        <div id="fullDescription" class="description-content" style="display: none;">
                            <p class="deskripsi-product mb-2">
                                New Product!^^^ NO MORE NAIL GLUE merupakan lem pengganti paku dan sekrup yang mempunyai daya rekat sangat kuat yang dapat di gunakan untuk pemasangan kayu panel, partisi lantai, peralatan kamar mandi, metal, bata, keramik, MDF, karpet, pajangan dan pernak-pernik gantungan pada tembok yang biasanya memerlukan paku atau sekrup.
                                <br>
                                Spesifikasi: 1. 100% baru &amp; kualitas tinggi 2. Dapat menopang berat hingga 23kg 3. Tanpa membuat lubang yang akan merusak dinding 4. Mudah digunakan. Tidak beracun, tidak ada bau yang menyengat 5. Waktu pengeringan cepat
                                <br>
                                Cara Penggunaan:
                                1. Bersihkan permukaan dari debu, minyak, dan kotoran lainnya
                                2. Potong ujung kemasan sesuai kebutuhan
                                3. Aplikasikan lem secara merata pada permukaan
                                4. Tekan dan tahan selama 30-60 detik
                                5. Biarkan mengering selama 24 jam untuk hasil maksimal
                                <br>
                                Keunggulan:
                                • Daya rekat super kuat hingga 23kg
                                • Cocok untuk berbagai material
                                • Tahan air dan cuaca ekstrem
                                • Tidak merusak permukaan dinding
                                • Mudah digunakan tanpa alat tambahan
                            </p>
                        </div>

                        <button class="btn btn-link p-0 text-tokopedia fw-bold small text-decoration-none" id="toggleDescription" onclick="toggleDescription()">
                            Lihat Selengkapnya
                        </button>
                    </div>
                    <hr>
                    <!-- Info Pengiriman -->
                    <div class="info-pengiriman mb-4 bg-transparent">
                        <div class="mb-3">
                            <h6 class="fw-bold mb-0">Pengiriman</h6>
                        </div>

                        <!-- Info lokasi -->
                        <div class="d-flex align-items-start mb-2">
                            <i class="bi bi-geo-alt text-muted me-2" style="font-size: 0.875rem;"></i>
                            <div class="flex-grow-1">
                                <div class="small text-dark">
                                    <span>Dikirim dari : </span>
                                    <strong>Jakarta Barat</strong>
                                </div>
                            </div>
                        </div>

                        <!-- Info Harga Pengiriman -->
                        <div class="d-flex align-items-start mb-2">
                            <i class="bi bi-truck text-muted me-2" style="font-size: 0.875rem;"></i>
                            <div class="flex-grow-1">
                                <div class="small">
                                    <div class="text-dark mb-1">
                                        <span class="fw-bold">Ongkir mulai : </span>
                                        <strong>Rp8.000</strong>
                                    </div>
                                    <div class="text-muted" style="font-size: 0.75rem;">
                                        Regular • Estimasi tiba besok - 28 May
                                        <a href="#" class="text-tokopedia text-decoration-none ms-2" style="font-size: 0.75rem;">
                                            Lihat Kurir Lainnya
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Purchase Panel (Sisi kanan) -->
                <div class="col-lg-3">
                    <!-- Quantity and Purchase Panel -->
                    <div class="purchase-panel p-3 border-light-subtle rounded-3 position-sticky" style="top: 0;">
                        <!-- Quantity / Jumlah Section -->
                        <div class="quantity">
                            <p class="text-dark fw-bold mb-0">Atur jumlah dan catatan</p>
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <div class="quantity-selector-modern border-light-subtle">
                                    <button class="quantity-min quantity-btn-modern" id="quantity-min" onclick="decreaseQuantity()">
                                        <i class="bi bi-dash text-tokopedia fs-5"></i>
                                    </button>
                                    <input type="text" class="quantity-input-modern" value="1" id="quantityInput">
                                    <button class="quantitiy-plus quantity-btn-modern" id="quantity-plus" onclick="increaseQuantity()">
                                        <i class="bi bi-plus text-tokopedia fs-5"></i>
                                    </button>
                                </div>
                                <div class="stok text-end mt-2">
                                    <div class="small text-muted">Stok Total: <p class="text-dark fw-bold small">1000</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Price / Harga -->
                            <div class="mb-3">
                                <div class="d-flex justify-content-end align-items-center">
                                    <span class="subtotal-original-price text-muted small text-decoration-line-through">Rp10.000</span>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="small text-muted">Subtotal</span>
                                    <span class="subtotal-price fw-bold h5 mb-0 text-dark" id="subtotalPrice">Rp9.800</span>
                                </div>
                            </div>
                        </div>

                        <!-- Buy buttons and cart buttons -->
                        <div class="d-grid gap-2">
                            <button class="cart-btn btn btn-outline-custom">+ Keranjang</button>
                            <button class="buy-btn btn btn-primary-custom">Beli</button>
                        </div>

                        <hr class="my-3">

                        <!-- Tombol icon aksi -->
                        <div class="d-flex flex-row justify-content-center align-items-center gap-0">
                            <button class="btn-icon-text d-flex align-items-center px-2 bg-transparent border-0">
                                <i class="bi bi-chat-dots me-2"></i>
                                <span class="small">Chat</span>
                            </button>
                            <span class="mx-1 text-muted">|</span>
                            <button class="btn-icon-text d-flex align-items-center px-2 bg-transparent border-0">
                                <i class="bi bi-bookmark me-2"></i>
                                <span class="small">Wishlist</span>
                            </button>
                            <span class="mx-1 text-muted">|</span>
                            <button class="btn-icon-text d-flex align-items-center px-2 bg-transparent border-0">
                                <i class="bi bi-share me-2"></i>
                                <span class="small">Share</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Rating -->
            <h4 class="h4 fs-4 text-dark fw-bold mt-5">Rating</h4> <!-- Title Rating -->

            <div class="rating-section rounded p-4 mx-auto mb-5 border-light-subtle">
                <div class="row align-items-center">
                    <!-- Rating utama -->
                    <div class="col-md-4">
                        <div class="d-flex align-items-center gap-2 mb-2">
                            <i class="bi bi-star-fill text-warning fs-4"></i>
                            <span class="fs-1 fw-bold text-dark lh-1">5.0</span>
                            <span class="fs-4 fw-medium rating-out-of lh-1">/ 5.0</span>
                        </div>

                        <!-- Jumlah rating -->
                        <div class="jumlah-rating">
                            <span class="small text-gray">10 rating • 7 ulasan</span>
                        </div>
                    </div>

                    <!-- Rating progress -->
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-6">
                                <div class="d-flex flex-column gap-2">
                                    <!-- 5 Bintang -->
                                    <div class="d-flex align-items-center gap-2 small">
                                        <span class="text-warning fw-semibold rating-number">
                                            <i class="bi bi-star-fill me-1"></i>5
                                        </span>
                                        <div class="rating-bar-container bg-light">
                                            <div class="rating-bar" style="width: 100%;"></div>
                                        </div>
                                        <span class="text-muted fw-medium text-end rating-count">(10)</span>
                                    </div>

                                    <!-- 4 Bintang -->
                                    <div class="d-flex align-items-center gap-2 small">
                                        <span class="text-warning fw-semibold rating-number">
                                            <i class="bi bi-star-fill me-1"></i>4
                                        </span>
                                        <div class="rating-bar-container bg-light">
                                            <div class="rating-bar" style="width: 0%;"></div>
                                        </div>
                                        <span class="text-muted fw-medium text-end rating-count">(0)</span>
                                    </div>

                                    <!-- 3 Bintang -->
                                    <div class="d-flex align-items-center gap-2 small">
                                        <span class="text-warning fw-semibold rating-number">
                                            <i class="bi bi-star-fill me-1"></i>3
                                        </span>
                                        <div class="rating-bar-container bg-light">
                                            <div class="rating-bar" style="width: 0%;"></div>
                                        </div>
                                        <span class="text-muted fw-medium text-end rating-count">(0)</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Rating sisi kanan -->
                            <div class="col-6">
                                <div class="d-flex flex-column gap-2">
                                    <!-- 2 Bintang -->
                                    <div class="d-flex align-items-center gap-2 small">
                                        <span class="text-warning fw-semibold rating-number">
                                            <i class="bi bi-star-fill me-1"></i>2
                                        </span>
                                        <div class="rating-bar-container bg-light">
                                            <div class="rating-bar" style="width: 0%;"></div>
                                        </div>
                                        <span class="text-muted fw-medium text-end rating-count">(0)</span>
                                    </div>

                                    <!-- 1 Star -->
                                    <div class="d-flex align-items-center gap-2 small">
                                        <span class="text-warning fw-semibold rating-number">
                                            <i class="bi bi-star-fill me-1"></i>1
                                        </span>
                                        <div class="rating-bar-container bg-light">
                                            <div class="rating-bar" style="width: 0%;"></div>
                                        </div>
                                        <span class="text-muted fw-medium text-end rating-count">(0)</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Komentar Section -->
            <div class="container-comment-section">
                <div class="review-layout">
                    <!-- Filter Sidebar -->
                    <div class="filter-comment-sidebar py-3 rounded-3 border-light-subtle">
                        <div class="filter-comment-header">
                            <h4 class="h4 fs-4 text-dark fw-semibold filter-title">Filter Ulasan</h3>
                        </div>

                        <!-- Media Filter -->
                        <div class="filter-comment-section">
                            <div class="filter-comment-section-title" onclick="toggleFilterSection(this)">
                                <span>Media</span>
                                <span class="chevron">▼</span>
                            </div>
                            <div class="filter-comment-options">
                                <div class="filter-comment-option" onclick="toggleCheckbox(this)">
                                    <div class="filter-comment-checkbox"></div>
                                    <span>Dengan Foto & Video</span>
                                </div>
                            </div>
                        </div>

                        <!-- Rating Filter -->
                        <div class="filter-comment-section">
                            <div class="filter-comment-section-title" onclick="toggleFilterSection(this)">
                                <span>Rating</span>
                                <span class="chevron">▼</span>
                            </div>
                            <div class="filter-comment-options">
                                <div class="filter-comment-option" onclick="toggleCheckbox(this)">
                                    <div class="filter-comment-checkbox"></div>
                                    <div class="star-filter">
                                        <div class="star-rating">
                                            <i class="bi bi-star-fill"></i>
                                        </div>
                                        <span>5</span>
                                    </div>
                                </div>
                                <div class="filter-comment-option" onclick="toggleCheckbox(this)">
                                    <div class="filter-comment-checkbox"></div>
                                    <div class="star-filter">
                                        <div class="star-rating">
                                            <i class="bi bi-star-fill"></i>
                                        </div>
                                        <span>4</span>
                                    </div>
                                </div>
                                <div class="filter-comment-option" onclick="toggleCheckbox(this)">
                                    <div class="filter-comment-checkbox"></div>
                                    <div class="star-filter">
                                        <div class="star-rating">
                                            <i class="bi bi-star-fill"></i>
                                        </div>
                                        <span>3</span>
                                    </div>
                                </div>
                                <div class="filter-comment-option" onclick="toggleCheckbox(this)">
                                    <div class="filter-comment-checkbox"></div>
                                    <div class="star-filter">
                                        <div class="star-rating">
                                            <i class="bi bi-star-fill"></i>
                                        </div>
                                        <span>2</span>
                                    </div>
                                </div>
                                <div class="filter-comment-option" onclick="toggleCheckbox(this)">
                                    <div class="filter-comment-checkbox"></div>
                                    <div class="star-filter">
                                        <div class="star-rating">
                                            <i class="bi bi-star-fill"></i>
                                        </div>
                                        <span>1</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Topic Filter -->
                        <div class="filter-comment-section">
                            <div class="filter-comment-section-title" onclick="toggleFilterSection(this)">
                                <span>Topik Ulasan</span>
                                <span class="chevron">▼</span>
                            </div>
                            <div class="filter-comment-options">
                                <div class="filter-comment-option" onclick="toggleCheckbox(this)">
                                    <div class="filter-comment-checkbox"></div>
                                    <span>Kualitas Barang</span>
                                </div>
                                <div class="filter-comment-option" onclick="toggleCheckbox(this)">
                                    <div class="filter-comment-checkbox"></div>
                                    <span>Pelayanan Penjual</span>
                                </div>
                                <div class="filter-comment-option" onclick="toggleCheckbox(this)">
                                    <div class="filter-comment-checkbox"></div>
                                    <span>Kemasan Barang</span>
                                </div>
                                <div class="filter-comment-option" onclick="toggleCheckbox(this)">
                                    <div class="filter-comment-checkbox"></div>
                                    <span>Harga Barang</span>
                                </div>
                                <div class="filter-comment-option" onclick="toggleCheckbox(this)">
                                    <div class="filter-comment-checkbox"></div>
                                    <span>Sesuai Deskripsi</span>
                                </div>
                                <div class="filter-comment-option" onclick="toggleCheckbox(this)">
                                    <div class="filter-comment-checkbox"></div>
                                    <span>Pengiriman</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Comment Section -->
                    <div class="comment-section">

                        <!-- FOTO & VIDEO PEMBELI -->
                        <div class="photo-gallery-wrapper mb-3">
                            <h6 class="fw-bold mb-3">FOTO & VIDEO PEMBELI</h6>

                            <div class="photo-product-gallery d-flex flex-wrap justify-content-center gap-2" id="photoGalleryContainer">
                                <!-- Gambar Thumbnail -->
                                <div class="commentar-media rounded overflow-hidden" data-image-index="0">
                                    <img src="{{ asset('halaman-depan/assets/img/konten/bg-pertanian.jpg')}}" id="commentarMedia" class="h-100 w-100 object-fit-contain rounded" alt="Foto pembeli 1">
                                </div>

                                <div class="commentar-media rounded overflow-hidden" data-image-index="1">
                                    <img src="{{ asset('halaman-depan/assets/img/konten/bg-pertanian.jpg') }}" id="commentarMedia" class="h-100 w-100 object-fit-contain rounded" alt="Foto pembeli 2">
                                </div>

                                <div class="commentar-media rounded overflow-hidden" data-image-index="2">
                                    <img src="{{ asset('halaman-depan/assets/img/konten/bg-pertanian.jpg') }}" id="commentarMedia" class="h-100 w-100 object-fit-contain rounded" alt="Foto pembeli 3">
                                </div>

                                <div class="commentar-media rounded overflow-hidden" data-image-index="3">
                                    <img src="{{ asset('halaman-depan/assets/img/konten/bg-pertanian.jpg') }}" id="commentarMedia" class="h-100 w-100 object-fit-contain rounded" alt="Foto pembeli 4">
                                </div>

                                <div class="commentar-media rounded overflow-hidden" data-image-index="4">
                                    <img src="{{ asset('halaman-depan/assets/img/konten/bg-pertanian.jpg') }}" id="commentarMedia" class="h-100 w-100 object-fit-contain rounded" alt="Foto pembeli 5">
                                </div>

                                <div class="commentar-media rounded overflow-hidden" data-image-index="5">
                                    <img src="{{ asset('halaman-depan/assets/img/konten/bg-pertanian.jpg') }}" id="commentarMedia" class="h-100 w-100 object-fit-contain rounded" alt="Foto pembeli 6">
                                </div>

                                <!-- Lihat seluruh media yg dikirimkan -->
                                <div class="more-commentar-media photo-counter" id="moreCommentarMedia" onclick="openGalleryComentarModal()">
                                    <img src="{{ asset('halaman-depan/') }}" class="img-fluid h-100 w-100 object-fit-contain opacity-25 rounded" alt="Foto pembeli lainnya">
                                    <span class="photo-counter-text fw-semibold text-center">Lihat Semua</span>
                                </div>
                            </div>
                        </div>


                        <!-- Komentar Terfilter -->
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div>
                                <h6 class="fw-bold mb-0">ULASAN PILIHAN</h6>
                                <small class="text-muted">Menampilkan 10 dari 317 ulasan</small>
                            </div>

                            <div class="dropdown position-relative">
                                <button class="filter-ulasan btn border-light-subtle dropdown-toggle rounded-2 text-dark" id="filterUlasan" type="button" id="dropdownSort" data-bs-toggle="dropdown" aria-expanded="false">
                                    Paling Membantu
                                </button>

                                <ul class="dropdown-menu pd-0 text-dark" aria-labelledby="dropdownSort">
                                    <li><span class="dropdown-item active-sort">Paling Membantu</li>
                                    <li><span class="dropdown-item">Terbaru</li>
                                    <li><span class="dropdown-item">Rating Tertinggi</li>
                                    <li><span class="dropdown-item">Rating Terendah</li>
                                </ul>
                            </div>
                        </div>
                        <hr>
                        <!-- Comment 1 with media -->
                        <div class="comment-item mb-3">
                            <div class="comment-header">
                                <div class="comment-avatar">C</div>
                                <div class="comment-info">
                                    <div class="comment-user">
                                        <span class="username">C***g</span>
                                    </div>
                                    <div class="comment-meta">
                                        <div class="star-rating rating-stars">
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star"></i>
                                        </div>
                                        <span class="comment-time">Lebih dari 1 tahun lalu</span>
                                    </div>
                                </div>
                                <button class="menu-button">⋮</button>
                            </div>

                            <div class="comment-content">
                                <div class="comment-text collapsed" id="comment-text">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed accusamus explicabo nulla, cupiditate quasi assumenda, porro earum doloremque alias cum fuga laboriosam dolorum iusto vitae voluptate eius nihil non ex tempore corrupti a! Est quam, a illum similique natus eaque ut. Ab, optio provident perspiciatis tempora delectus debitis aperiam blanditiis quasi accusantium velit amet at molestiae consequuntur voluptas! Voluptatibus quam itaque, magnam minus excepturi modi! Ducimus, accusantium incidunt. Voluptas provident vero recusandae quibusdam assumenda aliquid cum labore sit omnis soluta? Architecto quaerat minima maxime quibusdam reiciendis ullam suscipit similique aspernatur. Magni est ducimus at quia voluptatibus voluptate porro cum iure cupiditate consequuntur libero dolore doloribus, molestias reiciendis quod reprehenderit sit nulla totam, culpa quo ipsa eveniet. Exercitationem accusantium reiciendis cum in unde porro sunt beatae dolores recusandae est. At, quidem blanditiis ipsam laboriosam cum repellat incidunt, minus, voluptatibus impedit porro ullam eligendi earum soluta alias eveniet dolorum sapiente reiciendis totam ad? Maxime eveniet voluptates perferendis asperiores deserunt minus. Provident architecto, maiores maxime asperiores non soluta pariatur consectetur nobis quae veniam id excepturi tenetur deserunt est deleniti ut! Fugit nisi fuga unde veniam quo labore cum! Enim dolorum fugit deserunt necessitatibus vero, ullam similique libero, rerum atque, at optio maxime cumque.
                                </div>
                                <button class="toggle-button" onclick="toggleComment('comment-text', this)">Selengkapnya</button>
                            </div>

                            <!-- Media yang diupload -->
                            <div class="comment-media">
                                <!-- Video -->
                                <div class="media-item" data-media-index="0">
                                    <div class="uploaded-commentar-video media-video">
                                        <video muted poster="{{asset('halaman-depan/assets/video-posters/sample-poster-video.jpg')}}">
                                            <source src="{{asset('halaman-depan/assets/videos/sample-video.mp4')}}">
                                        </video>

                                        <div class="play-icon fw-semibold ">
                                            <i class="bi bi-play-circle-fill fs-5 text-white position-absolute top-50 start-50 translate-middle"></i>
                                        </div>
                                    </div>
                                </div>

                                <!-- Foto -->
                                <div class="media-item" data-media-index="1">
                                    <div class="uploaded-commentar-image media-image">
                                        <img src={{asset('halaman-depan/assets/img/konten/bg-pertanian.jpg')}} alt="Uploaded Media Comentar">
                                    </div>
                                </div>
                            </div>

                            <!-- Actions -->
                            <div class="comment-actions">
                                <div class="helpful-count">
                                    <svg class="helpful-icon" viewBox="0 0 16 16" fill="currentColor">
                                        <path d="M8.864 2.176C8.394 1.706 7.775 1.5 7.2 1.5c-.575 0-1.194.206-1.664.676L5 2.712 4.464 2.176C3.994 1.706 3.375 1.5 2.8 1.5c-.575 0-1.194.206-1.664.676-.94.94-.94 2.452 0 3.392L5 9.432l3.864-3.864c.94-.94.94-2.452 0-3.392z" />
                                    </svg>
                                    <span>3 orang terbantu</span>
                                </div>
                                <div class="reply-toggle" onclick="toggleReplies('replies1', this)">
                                    <span>Lihat Balasan</span>
                                    <span class="dropdown-icon">▼</span>
                                </div>
                            </div>

                            <!-- Balasan Komentar -->
                            <div class="comment-replies-section bg-light" id="replies1" style="display: none;">
                                <div class="reply-item">
                                    <div class="comment-header">
                                        <div class="comment-avatar">C</div>
                                        <div class="comment-info">
                                            <div class="comment-user">
                                                <span class="username">Cableman_NEW</span>
                                                <span class="seller-badge">Penjual</span>
                                            </div>
                                            <div class="comment-meta">
                                                <span class="comment-time">Lebih dari 1 tahun lalu</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="comment-content">
                                        <div class="comment-text">
                                            Terima kasih telah berbelanja di Cable_man. Bagikan link toko kami
                                            <span style="color: #00aa5b;">https://www.tokopedia.com/cableman2</span>
                                            kepada teman-teman Anda dan favoritkan Toko kami untuk terus update mengenai stok dan produk terbaru
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pagination Komentar -->
            <nav aria-label="Page navigation">
                <ul class="pagination justify-content-center gap-1 commentar-pagination">
                    <li class="page-item disabled">
                        <button class="page-link" tabindex="-1" aria-disabled="truebutton">
                            <i class="bi bi-chevron-left"></i>
                            </a>
                    </li>

                    <li class="page-item active">
                        <button class="page-link">1</button>
                    </li>

                    <li class="page-item">
                        <button class="page-link">2</button>
                    </li>

                    <li class="page-item">
                        <button class="page-link">3</button>
                    </li>

                    <li class="page-item">
                        <button class="page-link">4</button>
                    </li>

                    <li class="page-item">
                        <button class="page-link">5</button>
                    </li>

                    <li class="page-item">
                        <button class="page-link">6</button>
                    </li>

                    <li class="page-item">
                        <button class="page-link">7</button>
                    </li>

                    <li class="page-item disabled"><span class="page-link">...</span></li>

                    <li class="page-item">
                        <button class="page-link">32</button>
                    </li>

                    <li class="page-item">
                        <button class="page-link"><i class="bi bi-chevron-right"></i></button>
                    </li>
                </ul>
            </nav>
        </div>
    </main>

    <footer id="footer" class="footer accent-background">
        <div class="container footer-top">
            <div class="row gy-4">
                <div class="col-lg-5 col-md-12 footer-about">
                    <a href="index.html" class="logo d-flex align-items-center">
                        <span class="sitename">Impact</span>
                    </a>
                    <p>Cras fermentum odio eu feugiat lide par naso tierra. Justo eget nada terra videa magna derita valies darta donna mare fermentum iaculis eu non diam phasellus.</p>
                    <div class="social-links d-flex mt-4">
                        <a href=""><i class="bi bi-twitter-x"></i></a>
                        <a href=""><i class="bi bi-facebook"></i></a>
                        <a href=""><i class="bi bi-instagram"></i></a>
                        <a href=""><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>

                <div class="col-lg-2 col-6 footer-links">
                    <h4>Useful Links</h4>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">About us</a></li>
                        <li><a href="#">Services</a></li>
                        <li><a href="#">Terms of service</a></li>
                        <li><a href="#">Privacy policy</a></li>
                    </ul>
                </div>

                <div class="col-lg-2 col-6 footer-links">
                    <h4>Our Services</h4>
                    <ul>
                        <li><a href="#">Web Design</a></li>
                        <li><a href="#">Web Development</a></li>
                        <li><a href="#">Product Management</a></li>
                        <li><a href="#">Marketing</a></li>
                        <li><a href="#">Graphic Design</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
                    <h4>Contact Us</h4>
                    <p>A108 Adam Street</p>
                    <p>New York, NY 535022</p>
                    <p>United States</p>
                    <p class="mt-4"><strong>Phone:</strong> <span>+1 5589 55488 55</span></p>
                    <p><strong>Email:</strong> <span>info@example.com</span></p>
                </div>
            </div>
        </div>

        <div class="container copyright text-center mt-4">
            <p>© <span>Copyright</span> <strong class="px-1 sitename">Impact</strong> <span>All Rights Reserved</span></p>
            <div class="credits">
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>
        </div>
    </footer>

    <!-- Modals -->

    <!-- MODAL PREVIEW PRODUK -->
    <div class="modal fade" id="productPreviewModal" tabindex="-1" aria-labelledby="productPreviewModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content border-0 rounded-2 p-4">
                <div class="d-flex justify-content-between align-items-start mb-4">
                    <h5 class="modal-title fw-semibold" id="productPreviewModalLabel">
                        Lem Keramik, Kayu, Metal dan Batu Super Kuat No More Nail Dextone
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="row">
                    <!-- Gambar Utama -->
                    <div class="col-12 col-md-9 d-flex justify-content-center align-items-center mb-3 mb-md-0">
                        <img class="modal-main-image" id="modalMainImage" src="https://images.unsplash.com/photo-1581783898377-1c85bf937427" alt="Preview Produk">
                    </div>

                    <!-- Thumbnail Samping -->
                    <div class="other-product-preview col-12 col-md-3">
                        <p class="fw-semibold small text-muted mb-2">Gambar Barang</p>

                        <div class="row g-2" id="modalThumbnails">
                            <div class="col-3 col-md-6">
                                <div class="other-thumb">
                                    <img src="{{ asset('halaman-depan/') }}" onclick="changeImage(this)" class="img-thumbnail border-success cursor-pointer" alt="thumb 1">
                                </div>
                            </div>

                            <div class="col-3 col-md-6">
                                <div class="other-thumb">
                                    <img src="{{ asset('halaman-depan/') }}" onclick="changeImage(this)" class="img-thumbnail cursor-pointer" alt="thumb 2">
                                </div>
                            </div>

                            <div class="col-3 col-md-6">
                                <div class="other-thumb">
                                    <img src="{{ asset('halaman-depan/') }}" onclick="changeImage(this)" class="img-thumbnail cursor-pointer" alt="thumb 3">
                                </div>
                            </div>

                            <div class="col-3 col-md-6">
                                <div class="other-thumb">
                                    <img src="{{ asset('halaman-depan/') }}" onclick="changeImage(this)" class="img-thumbnail cursor-pointer" alt="thumb 4">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL COMMENTAR MEDIA -->
    <div class="modal fade modal-commentar-media" id="modalCommentarMedia" tabindex="-1" aria-labelledby="modalCommentarMedia" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <button type="button" class="btn-close modal-close-btn" data-bs-dismiss="modal" aria-label="Close">
                    <i class="bi bi-x-lg"></i>
                </button>

                <div class="modal-body p-0">
                    <div class="row g-0">
                        <div class="col-lg-9 modal-main-content">
                            <div class="main-image-container">
                                <img src="" class="displayed-image">
                                <video src="" class="displayed-video img-fluid" controls></video>

                                <button class="modal-close-btn">X</button>
                                <button class="btn nav-btn prev-image-btn" id="prevImageBtn"><i class="bi bi-chevron-left"></i></button>
                                <button class="btn nav-btn next-image-btn" id="nextImageBtn"><i class="bi bi-chevron-right"></i></button>
                            </div>

                            <div class="image-comment-section p-3">
                                <div class="comment-user-info d-flex align-items-center mb-2">
                                    <img src="{{ asset('halaman-depan/') }}" alt="User Avatar" class="comment-user-avatar rounded-circle me-2">
                                    <div>
                                        <div class="comment-user-name fw-bold">Nama Pengguna</div>
                                        <div class="comment-rating">
                                            <!-- Diisi dari Javascript -->
                                        </div>
                                    </div>
                                </div>
                                <div class="comment-date text-muted small mb-2">Tanggal Komentar</div>
                                <p class="comment-text-content mb-0 text-dark">Isi komentar akan muncul di sini.</p>
                            </div>
                        </div>

                        <div class="col-lg-3 modal-thumbnail-sidebar d-flex flex-column justify-content-center">
                            <div class="thumbnail-list flex-grow-1">
                                <div class="thumbnail-item">
                                    <!-- Diisi dari Javascript -->
                                </div>
                            </div>
                            <div class="border-top p-3">
                                <button class="btn btn-outline-success w-100 view-all-btn">Lihat Semua</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL GALLERY COMMENTAR -->
    <div class="modal fade modal-gallery-grid-view" id="modal-gallery-comentar" tabindex="-1" aria-labelledby="modalGalleryComentarLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalGalleryComentarLabel">Semua Foto & Video Pembeli (<span class="modal-title" id="galleryComentarTotalCount">0</span>) </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body gallery-grid-container">
                    <!-- Diisi dari javascript -->
                </div>

                <div class="modal-footer justify-content-center" style="display: none;">
                    <div class="spinner-border text-success" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Uploaded Commentar Media -->
    <div class="modal fade modal-uploaded-commentar-media" id="modalUploadedCommentarMedia" tabindex="-1" aria-labelledby="modalUploadedCommentarMedia" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content py-2">
                <button type="button" class="btn-close modal-close-btn" data-bs-dismiss="modal" aria-label="Close">
                    <i class="bi bi-x-lg"></i>
                </button>

                <div class="modal-body p-0">
                    <div class="row g-0">
                        <div class="col-lg-9 modal-main-content">
                            <!-- Uploaded Foto Komentar -->
                            <div class="main-image-container">
                                <img src="" alt="Media Komentar" class="displayed-image main-image-display">
                                <video src="" controls class="displayed-media main-video-display"></video>

                                <button class="btn nav-btn prev-image-btn" id="prevImageBtn"><i class="bi bi-chevron-left"></i></button>
                                <button class="btn nav-btn next-image-btn" id="nextImageBtn"><i class="bi bi-chevron-right"></i></button>
                            </div>

                            <!-- Info Komentar -->
                            <div class="image-comment-section p-3">
                                <div class="comment-user-info d-flex align-items-center mb-2">
                                    <img src="{{ asset('halaman-depan/') }}" alt="User Avatar" class="comment-user-avatar rounded-circle me-2">
                                    <div>
                                        <div class="comment-user-name fw-bold">Nama Pengguna</div>
                                        <div class="comment-rating">
                                            <!-- Diisi dari Javascript -->
                                        </div>
                                    </div>
                                </div>
                                <div class="comment-date text-muted small mb-2">Tanggal Komentar</div>
                                <p class="comment-text-content mb-0">Isi komentar akan muncul di sini.</p>
                            </div>
                        </div>

                        <!-- list media uploaded -->
                        <div class="col-lg-3 modal-thumbnail-sidebar d-flex flex-column justify-content-start">
                            <div class="thumbnail-list flex-grow-1">
                                <!-- Diisi Dari javascript -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="{{ asset('halaman-depan/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('halaman-depan/assets/vendor/php-email-form/validate.js')}}"></script>
    <script src="{{ asset('halaman-depan/assets/vendor/aos/aos.js')}}"></script>
    <script src="{{ asset('halaman-depan/assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
    <script src="{{ asset('halaman-depan/assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
    <script src="{{ asset('halaman-depan/assets/vendor/purecounter/purecounter_vanilla.js')}}"></script>
    <script src="{{ asset('halaman-depan/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js')}}"></script>
    <script src="{{ asset('halaman-depan/assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>

    <!-- Main JS File -->
    <script src="{{ asset('halaman-depan/assets/js/main.js') }}"></script>

    <!-- Myjs -->
    <script src="{{ asset('halaman-depan/assets/js/myjs/landingpage.js') }}"></script>
    <script src="{{ asset('halaman-depan/assets/js/myjs/detail-product.js') }}"></script>
    <script src="{{ asset('halaman-depan/assets/js/myjs/modals-detail-product.js') }}"></script>
</body>

</html>
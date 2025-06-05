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
                        <li><a href="{{ route('welcome') }}#beranda" style="font-size: 1rem;">Beranda</a></li>
                        <li> <a href="{{ route('welcome') }}#tentangkami" style="font-size: 1rem;">Tentang Kami</a></li>
                        <li> <a href="{{ route('welcome') }}#produk" style="font-size: 1rem;">Produk</a></li>
                        <li> <a href="{{ route('welcome') }}#edukasi" style="font-size: 1rem;">Edukasi</a></li>
                        <li> <a href="{{ route('welcome') }}#blog" style="font-size: 1rem;">Blog</a></li>
                        <li> <a href="{{ route('welcome') }}#kontak" style="font-size: 1rem;">Kontak</a></li>
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
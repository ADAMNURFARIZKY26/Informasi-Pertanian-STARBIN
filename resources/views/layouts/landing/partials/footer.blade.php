<footer id="footer" class="footer accent-background">

    <div class="container footer-top">
        <div class="row gy-4">
            <!-- Kiri: Deskripsi -->
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

            <!-- Tengah: Navigasi -->
            <div class="col-lg-4 col-6 footer-links" style="padding-left: 100px;">
                <h4>Navigasi</h4>
                <ul>
                    <li><a href="{{ route('welcome') }}#beranda">Beranda</a></li>
                    <li><a href="{{ route('welcome') }}#tentangkami">Tentang Kami</a></li>
                    <li><a href="{{ route('welcome') }}#produk">Produk</a></li>
                    <li><a href="{{ route('welcome') }}#pengetahuan">Pengetahuan</a></li>
                    <li><a href="{{ route('welcome') }}#blog">Blog</a></li>
                    <li><a href="{{ route('welcome') }}#kontak">Kontak</a></li>
                </ul>
            </div>

            <!-- Kanan: Kontak -->
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

<!-- Scroll Top -->
<a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Preloader -->
<div id="preloader"></div>
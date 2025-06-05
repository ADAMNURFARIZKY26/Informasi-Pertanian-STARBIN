// IIFE untuk mengisolasi kode dan mencegah variabel global
(function () {
  // Preload gambar pertama untuk mengatasi masalah loading pada slide pertama
  const preloadFirstImage = () => {
    const firstSlideImg = document.querySelector('.product-slideshow .swiper-slide:first-child img');
    if (firstSlideImg) {
      // Pastikan gambar pertama sudah memiliki src
      if (!firstSlideImg.src && firstSlideImg.dataset.src) {
        const img = new Image();
        img.onload = () => {
          firstSlideImg.src = firstSlideImg.dataset.src;
          firstSlideImg.closest('.swiper-lazy').classList.add('swiper-lazy-loaded');
        };
        img.src = firstSlideImg.dataset.src;
      }
    }
  };

  // Inisialisasi Swiper dengan lazy loading setelah DOMContentLoaded
  document.addEventListener('DOMContentLoaded', function () {
    // Sebelum loading gambar
    if ('caches' in window) {
      const lazyImgs = document.querySelectorAll('img[data-src]');

      lazyImgs.forEach(img => {
        const dataSrc = img.dataset.src;

        if (dataSrc) {
          caches.open('product-slideshow-cache').then(cache => {
            cache.match(dataSrc).then(response => {
              if (response) {
                response.blob().then(blob => {
                  img.src = URL.createObjectURL(blob);
                  img.classList.add('cached-loaded');
                });
              } else {
                img.src = dataSrc;
              }
            }).catch(err => console.warn('Match error', err));
          }).catch(err => console.warn('Cache open error', err));
        }
      });
    }

    // Pra-inisialisasi variabel untuk performa yang lebih baik
    const slideshow = document.querySelector('.product-slideshow');
    if (!slideshow) return;

    // Preload gambar pertama
    preloadFirstImage();

    let pauseTimeout;
    let userInteracting = false;
    let isInitialized = false;

    // Fungsi untuk lazy loading gambar
    const lazyLoadImages = () => {
      const lazyImages = slideshow.querySelectorAll('.swiper-slide:not(.swiper-slide-active) .swiper-lazy img[data-src]');

      if ('IntersectionObserver' in window) {
        const imageObserver = new IntersectionObserver((entries) => {
          entries.forEach(entry => {
            if (entry.isIntersecting) {
              const img = entry.target;
              // Cek apakah gambar sudah dimuat
              if (!img.src || img.src !== img.dataset.src) {
                img.src = img.dataset.src;
                img.onload = () => {
                  img.closest('.swiper-lazy').classList.add('swiper-lazy-loaded');
                };
              }
              imageObserver.unobserve(img);
            }
          });
        }, {
          rootMargin: '100px 0px', // Preload lebih awal
          threshold: 0.1
        });

        lazyImages.forEach(img => {
          // Hindari error jika gambar sudah dimuat
          if (!img.src || img.src !== img.dataset.src) {
            imageObserver.observe(img);
          }
        });
      } else {
        // Fallback untuk browser yang tidak mendukung Intersection Observer
        lazyImages.forEach(img => {
          if (!img.src || img.src !== img.dataset.src) {
            img.src = img.dataset.src;
            img.onload = () => {
              img.closest('.swiper-lazy').classList.add('swiper-lazy-loaded');
            };
          }
        });
      }
    };

    // Inisialisasi Swiper dengan opsi teroptimasi
    const swiper = new Swiper('.productSwiper', {
      loop: true,
      speed: 300,
      autoplay: {
        delay: 3500,
        disableOnInteraction: false,
      },
      lazy: {
        loadPrevNext: true,
        loadPrevNextAmount: 2, // Meningkatkan jumlah slide yang dimuat sebelumnya
        loadOnTransitionStart: true,
      },
      navigation: {
        nextEl: '.button-next',
        prevEl: '.button-prev',
      },
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
      effect: 'slide',
      grabCursor: false,
      keyboard: false,

      // Optimasi performa
      watchSlidesProgress: true,
      preloadImages: false,
      updateOnImagesReady: false,
      observer: true,
      observeParents: true,

      // Event handlers Swiper
      on: {
        init: function () {
          isInitialized = true;
          // Load gambar slide aktif dan tetangga
          const activeIndex = this.activeIndex;
          const slides = this.slides;

          // Prioritaskan loading slide aktif
          if (slides[activeIndex]) {
            const activeSlide = slides[activeIndex];
            activeSlide.classList.add('swiper-lazy-loaded');

            // Force load gambar pada slide aktif
            const activeImg = activeSlide.querySelector('img');
            if (activeImg && activeImg.dataset.src && (!activeImg.src || activeImg.src !== activeImg.dataset.src)) {
              activeImg.src = activeImg.dataset.src;
            }
          }

          // Set timer untuk lazy load gambar lainnya setelah slide aktif dimuat
          setTimeout(lazyLoadImages, 100);
        },

        slideChangeTransitionEnd: function () {
          // Force load gambar pada slide aktif setelah transisi
          const activeSlide = this.slides[this.activeIndex];
          if (activeSlide) {
            activeSlide.classList.add('swiper-lazy-loaded');
            const activeImg = activeSlide.querySelector('img');
            if (activeImg && activeImg.dataset.src && (!activeImg.src || activeImg.src !== activeImg.dataset.src)) {
              activeImg.src = activeImg.dataset.src;
            }
          }
        }
      }
    });

    // Event handlers untuk interaksi pengguna
    const setupEventHandlers = () => {
      // Mouse hover handling dengan debounce
      let hoverTimer;

      slideshow.addEventListener('mouseenter', () => {
        userInteracting = true;
        slideshow.classList.add('show-nav');
        clearTimeout(hoverTimer);
        swiper.autoplay.stop();
      }, { passive: true });

      slideshow.addEventListener('mouseleave', () => {
        userInteracting = false;
        clearTimeout(hoverTimer);

        // Blur tombol navigasi jika sedang focus
        const focusedBtn = slideshow.querySelector('.custom-swiper-btn:focus');
        if (focusedBtn) focusedBtn.blur();

        // Delay untuk menghindari flicker
        hoverTimer = setTimeout(() => {
          if (!slideshow.querySelector('.custom-swiper-btn:focus')) {
            slideshow.classList.remove('show-nav');
          }
          if (isInitialized) {
            swiper.autoplay.start();
          }
        }, 100);
      }, { passive: true });

      // Touch support dengan passive events untuk performa yang lebih baik
      slideshow.addEventListener('touchstart', () => {
        userInteracting = true;
        if (isInitialized) {
          swiper.autoplay.stop();
        }
        clearTimeout(pauseTimeout);
      }, { passive: true });

      slideshow.addEventListener('touchend', () => {
        userInteracting = false;
        clearTimeout(pauseTimeout);
        pauseTimeout = setTimeout(() => {
          if (!userInteracting && isInitialized) {
            swiper.autoplay.start();
          }
        }, 1500);
      }, { passive: true });

      // Event delegation untuk tombol navigasi
      const navBtns = slideshow.querySelectorAll('.custom-swiper-btn');
      navBtns.forEach(btn => {
        btn.addEventListener('focus', () => {
          slideshow.classList.add('show-nav');
        }, { passive: true });

        btn.addEventListener('blur', () => {
          setTimeout(() => {
            if (!slideshow.matches(':hover') && !slideshow.querySelector('.custom-swiper-btn:focus')) {
              slideshow.classList.remove('show-nav');
            }
          }, 100);
        }, { passive: true });

        // Tambahkan event dengan keyboard
        btn.addEventListener('keydown', (e) => {
          if (e.key === 'Enter' || e.key === ' ') {
            e.preventDefault();
            btn.click();
          }
        });
      });
    };

    // Event handler untuk manual navigation
    swiper.on('slideChangeTransitionStart', () => {
      if (isInitialized) {
        swiper.autoplay.stop();
      }
      clearTimeout(pauseTimeout);
      pauseTimeout = setTimeout(() => {
        if (!userInteracting && isInitialized) {
          swiper.autoplay.start();
        }
      }, 1000);
    });

    // Setup event handlers
    setupEventHandlers();

    // Expose Swiper instance untuk debugging jika diperlukan
    window.productSwiper = swiper;

    // Tambahkan penanganan resize untuk memastikan ukuran konten benar
    window.addEventListener('resize', () => {
      if (isInitialized) {
        swiper.update();
      }
    }, { passive: true });

    // Force update setelah semua gambar dimuat
    window.addEventListener('load', () => {
      if (isInitialized) {
        swiper.update();
      }
    });
  });
})();

// Setelah semua gambar pada halaman dimuat (termasuk lazy image) (masih error karena belum di jalankan disisi server)
window.addEventListener('load', () => {
  if ('caches' in window) {
    const allImages = Array.from(document.querySelectorAll('img[data-src]'));
    const urlsToCache = allImages.map(img => img.dataset.src);

    caches.open('product-slideshow-cache').then(cache => {
      cache.addAll(urlsToCache).catch(err => {
        console.warn('Gagal cache gambar:', err);
      });
    });
  }
});

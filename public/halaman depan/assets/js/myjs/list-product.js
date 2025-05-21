window.addEventListener('load', function () {
    const swiper = new Swiper('.productSwiper', {
        loop: true,
        speed: 350, // Lebih cepat, lebih ringan
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },
        navigation: {
            nextEl: '.button-next',
            prevEl: '.button-prev',
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        keyboard: false, // Matikan keyboard navigation jika tidak penting
        effect: 'slide',
        grabCursor: false, // Matikan grabCursor agar lebih ringan
    });

    // Pause autoplay on hover/focus, resume on leave/blur
    const slideshow = document.querySelector('.product-slideshow');
    let pauseTimeout;
    if (slideshow) {
        slideshow.addEventListener('mouseenter', () => {
            swiper.autoplay.stop();
        });
        slideshow.addEventListener('mouseleave', () => {
            swiper.autoplay.start();
        });
        // Touch support for mobile
        slideshow.addEventListener('touchstart', () => {
            swiper.autoplay.stop();
            clearTimeout(pauseTimeout);
        });
        slideshow.addEventListener('touchend', () => {
            clearTimeout(pauseTimeout);
            pauseTimeout = setTimeout(() => {
                swiper.autoplay.start();
            }, 1500);
        });

        // tombol nav muncul ketika mouse masuk
        slideshow.addEventListener('mouseenter', () => {
            slideshow.classList.add('show-nav');
        });
        slideshow.addEventListener('mouseleave', (e) => {
            // Blur tombol navigasi jika sedang focus
            const focusedBtn = slideshow.querySelector('.custom-swiper-btn:focus');
            if (focusedBtn) focusedBtn.blur();
            // Jika tidak ada tombol yang sedang focus, hilangkan tombol
            setTimeout(() => {
                if (!slideshow.querySelector('.custom-swiper-btn:focus')) {
                    slideshow.classList.remove('show-nav');
                }
            }, 10);
        });
        // Jika tombol next/prev focus (keyboard/tab), tetap tampilkan tombol
        const navBtns = slideshow.querySelectorAll('.custom-swiper-btn');
        navBtns.forEach(btn => {
            btn.addEventListener('focus', () => {
                slideshow.classList.add('show-nav');
            });
            btn.addEventListener('blur', () => {
                // Jika mouse tidak di atas slideshow, hilangkan tombol
                setTimeout(() => {
                    if (!slideshow.matches(':hover') && !slideshow.querySelector('.custom-swiper-btn:focus')) {
                        slideshow.classList.remove('show-nav');
                    }
                }, 10);
            });
        });
    }

    // Button active effect & tooltip
    const nextBtn = document.querySelector('.button-next');
    const prevBtn = document.querySelector('.button-prev');
    if (nextBtn && prevBtn) {
        nextBtn.setAttribute('title', 'Slide berikutnya');
        prevBtn.setAttribute('title', 'Slide sebelumnya');
        [nextBtn, prevBtn].forEach(btn => {
            btn.addEventListener('mousedown', () => btn.classList.add('active'));
            btn.addEventListener('touchstart', () => btn.classList.add('active'));
            btn.addEventListener('mouseup', () => btn.classList.remove('active'));
            btn.addEventListener('mouseleave', () => btn.classList.remove('active'));
            btn.addEventListener('touchend', () => btn.classList.remove('active'));
        });
    }

    // Pause autoplay for 1s after manual navigation
    swiper.on('slideChangeTransitionStart', () => {
        swiper.autoplay.stop();
        clearTimeout(pauseTimeout);
        pauseTimeout = setTimeout(() => {
            swiper.autoplay.start();
        }, 1000);
    });
});
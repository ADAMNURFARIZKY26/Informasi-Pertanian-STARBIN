const header = document.getElementById('header');
  let lastScrollTop = 0;

  window.addEventListener('scroll', function () {
    const currentScroll = window.pageYOffset || document.documentElement.scrollTop;

    if (currentScroll <= 0) {
      // Di bagian paling atas — tampilkan header
      header.classList.remove('hide-on-scroll');
    } else if (currentScroll > lastScrollTop) {
      // Scroll ke bawah — sembunyikan header
      header.classList.add('hide-on-scroll');
    } else {
      // Scroll ke atas — tampilkan header
      header.classList.remove('hide-on-scroll');
    }

    lastScrollTop = currentScroll <= 0 ? 0 : currentScroll;
  });
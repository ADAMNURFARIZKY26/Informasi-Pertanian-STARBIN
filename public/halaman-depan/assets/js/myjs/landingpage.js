const header = document.getElementById('header');
let lastScrollTop = window.pageYOffset || document.documentElement.scrollTop;
let scrollDownThreshold = 50;  // seberapa jauh scroll ke bawah untuk sembunyikan header
let scrollUpThreshold = 50;   // seberapa jauh scroll ke atas untuk tampilkan kembali header
let hide = false;

window.addEventListener('scroll', () => {
  const currentScroll = window.pageYOffset || document.documentElement.scrollTop;
  const scrollDelta = currentScroll - lastScrollTop;

  if (scrollDelta > scrollDownThreshold && !hide) {
    // Scroll ke bawah cukup jauh -> sembunyikan
    header.classList.add('hide-on-scroll');
    hide = true;
  } else if (scrollDelta < -scrollUpThreshold && hide) {
    // Scroll ke atas cukup jauh -> tampilkan kembali
    header.classList.remove('hide-on-scroll');
    hide = false;
  }

  lastScrollTop = currentScroll <= 0 ? 0 : currentScroll;
});

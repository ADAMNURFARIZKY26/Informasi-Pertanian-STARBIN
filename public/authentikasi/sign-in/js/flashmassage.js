window.addEventListener('DOMContentLoaded', () => {
    const success = document.getElementById('flash-success');
    const error = document.getElementById('flash-error');

    [success, error].forEach(alert => {
        if (alert) {
            // Tampilkan alert
            setTimeout(() => {
                alert.classList.add('show');
            }, 100); // Delay sedikit biar transisi smooth

            // Sembunyikan kembali setelah 4 detik
            setTimeout(() => {
                alert.classList.remove('show');
                alert.classList.add('hide');
            }, 4000); // setelah 4 detik mulai keluar ke kanan

            // Hapus dari DOM setelah 7 detik
            setTimeout(() => {
                alert.remove();
            }, 7000);
        }
    });
});
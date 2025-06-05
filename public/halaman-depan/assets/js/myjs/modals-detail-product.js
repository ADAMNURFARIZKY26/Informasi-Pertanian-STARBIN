// Modal Product Preview
document.getElementById('mainProductThumbnail').addEventListener('click', function () {
    const mainImageSrc = document.getElementById('mainImage').src;
    document.getElementById('modalMainImage').src = mainImageSrc;

    const modal = new bootstrap.Modal(document.getElementById('productPreviewModal'));
    modal.show();
});

// Ganti gambar utama di modal
function changeImage(el) {
    const mainImage = document.getElementById('modalMainImage');
    mainImage.src = el.src;

    // Tambahkan highlight border
    document.querySelectorAll('#modalThumbnails img').forEach(img => {
        img.classList.remove('border-success');
    });
    el.classList.add('border-success');
}

// Modal Comentar Media & Gallery Commentar
class GalleryModalManager {
    constructor() {
        this.galleryData = this.initializeGalleryData();
        this.state = {
            currentImageIndex: 0,
            galleryLoadedItems: 0,
            isLoadingItems: false,
            activeGridItemIndex: -1
        };
        this.config = {
            itemsPerLoad: 20,
            scrollThreshold: 150
        };
        this.modals = {};
        this.elements = {};

        this.init();
    }

    // ===== INITIALIZATION =====
    init() {
        this.bindElements();
        this.initializeModals();
        this.bindEvents();
    }

    bindElements() {
        // Modal elements
        this.elements.detailModal = document.getElementById('modalCommentarMedia');
        this.elements.galleryModal = document.getElementById('modal-gallery-comentar');

        if (!this.elements.detailModal || !this.elements.galleryModal) {
            console.error('Required modal elements not found');
            return;
        }

        // Detail modal elements
        this.elements.mainImageContainer = this.elements.detailModal.querySelector('.main-image-container');
        this.elements.mediaContainer = this.elements.detailModal.querySelector('.displayed-image')?.parentElement;
        this.elements.prevBtn = this.elements.detailModal.querySelector('#prevImageBtn');
        this.elements.nextBtn = this.elements.detailModal.querySelector('#nextImageBtn');
        this.elements.thumbnailList = this.elements.detailModal.querySelector('.thumbnail-list');
        this.elements.viewAllBtn = this.elements.detailModal.querySelector('.view-all-btn');

        // Comment elements
        this.elements.commentUser = this.elements.detailModal.querySelector('.comment-user-name');
        this.elements.commentAvatar = this.elements.detailModal.querySelector('.comment-user-avatar');
        this.elements.commentRating = this.elements.detailModal.querySelector('.comment-rating');
        this.elements.commentDate = this.elements.detailModal.querySelector('.comment-date');
        this.elements.commentText = this.elements.detailModal.querySelector('.comment-text-content');

        // Gallery modal elements
        this.elements.galleryGrid = this.elements.galleryModal.querySelector('.gallery-grid-container');
        this.elements.totalCount = this.elements.galleryModal.querySelector('#galleryComentarTotalCount');
        this.elements.loadingSpinner = this.elements.galleryModal.querySelector('.modal-footer');
        this.elements.galleryScrollContainer = this.elements.galleryModal.querySelector('.modal-body');
    }

    initializeModals() {
        if (this.elements.detailModal) {
            this.modals.detail = new bootstrap.Modal(this.elements.detailModal);
        }
        if (this.elements.galleryModal) {
            this.modals.gallery = new bootstrap.Modal(this.elements.galleryModal);
        }
    }

    bindEvents() {
        this.bindDetailModalEvents();
        this.bindGalleryModalEvents();
        this.bindTriggerEvents();
        this.bindResizeEvents();
    }

    // ===== DATA DUMMY =====
    initializeGalleryData() {
        const baseItems = [
            {
                id: 1,
                type: 'image',
                imageUrl: 'assets/img/konten/bg-pertanian.jpg',
                thumbnailUrl: 'assets/img/konten/bg-pertanian.jpg',
                userName: 'Pengguna A1',
                userAvatar: '',
                rating: 5,
                commentDate: '1 hari lalu',
                commentText: 'Ini adalah komentar untuk gambar ke-1. Kualitasnya sangat baik.'
            },
            {
                id: 2,
                type: 'video',
                videoUrl: 'assets/videos/slideshow-tokopedia.mp4',
                imageUrl: 'assets/videos/slideshow-tokopedia.mp4',
                thumbnailUrl: 'assets/videos/slideshow-tokopedia.mp4',
                userName: 'Videographer B2',
                userAvatar: '',
                rating: 4,
                commentDate: '2 minggu lalu',
                commentText: 'Video ini sangat informatif dan menarik! Editingnya juga bagus.'
            },
            {
                id: 3,
                type: 'image',
                imageUrl: 'assets/img/konten/bg-pertanian.jpg',
                thumbnailUrl: 'assets/img/konten/bg-pertanian.jpg',
                userName: 'Pengguna C3',
                userAvatar: '',
                rating: 3,
                commentDate: '3 bulan lalu',
                commentText: 'Gambar ke-3, lumayan lah.'
            },
            {
                id: 4,
                type: 'video',
                videoUrl: 'assets/videos/slideshow-tokopedia.mp4',
                imageUrl: 'assets/videos/slideshow-tokopedia.mp4',
                thumbnailUrl: 'assets/videos/slideshow-tokopedia.mp4',
                userName: 'Videographer D4',
                userAvatar: '',
                rating: 5,
                commentDate: '1 tahun lalu',
                commentText: 'Karya video yang luar biasa! Sinematografinya indah.'
            }
        ];

        // Generate additional items
        const additionalItems = Array.from({ length: 20 }, (_, i) => ({
            id: i + 5,
            type: 'image',
            imageUrl: 'assets/img/konten/bg-pertanian.jpg',
            thumbnailUrl: 'assets/img/konten/bg-pertanian.jpg',
            userName: `Pengguna ${String.fromCharCode(65 + ((i + 4) % 26))}${Math.floor((i + 4) / 26) || ''}${i + 5}`,
            userAvatar: ``,
            rating: ((i + 4) % 5) + 1,
            commentDate: `${((i + 4) % 4) + 1} ${['hari', 'minggu', 'bulan', 'tahun'][(i + 4) % 4]} lalu`,
            commentText: `Ini adalah komentar untuk gambar ke-${i + 5}. Kualitasnya ${((i + 4) % 3 === 0) ? 'sangat baik' : ((i + 4) % 3 === 1) ? 'cukup baik' : 'lumayan'}.`
        }));

        return [...baseItems, ...additionalItems];
    }

    // ===== UTILITY FUNCTIONS =====
    generateRatingStars(rating) {
        let starsHtml = '';
        for (let i = 1; i <= 5; i++) {
            starsHtml += `<i class="bi ${i <= rating ? 'bi-star-fill' : 'bi-star'}"></i>`;
        }
        return starsHtml;
    }

    isValidIndex(index) {
        return index >= 0 && index < this.galleryData.length;
    }

    isMobile() {
        return window.innerWidth < 992;
    }

    // ===== MEDIA ELEMENT CREATORS =====
    createImageElement(data) {
        const img = document.createElement('img');
        img.src = data.imageUrl;
        img.alt = `Image by ${data.userName}`;
        img.className = 'displayed-image w-100 h-auto';
        return img;
    }

    createVideoElement(data) {
        const video = document.createElement('video');
        video.src = data.videoUrl || data.imageUrl; // Sumber video utama
        // video.poster = data.mainVideoPosterUrl || ''; 
        video.className = 'displayed-image w-100 h-auto';
        video.controls = true;
        video.tabIndex = 0;
        // Background gelap jika tidak ada poster dan video belum dimuat
        video.style.backgroundColor = '#000';
        return video;
    }

    createThumbnailPlayIcon() {
        const icon = document.createElement('span');
        icon.className = 'thumb-play-icon position-absolute top-50 start-50 translate-middle';
        icon.innerHTML = '<i class="bi bi-play-circle-fill fs-5 text-white"></i>';
        icon.style.cssText = 'pointer-events: none; opacity: 0.85;';
        return icon;
    }

    // ===== DETAIL MODAL METHODS =====
    bindDetailModalEvents() {
        if (this.elements.prevBtn) {
            this.elements.prevBtn.addEventListener('click', () => this.navigateImage(-1));
        }

        if (this.elements.nextBtn) {
            this.elements.nextBtn.addEventListener('click', () => this.navigateImage(1));
        }

        if (this.elements.viewAllBtn) {
            this.elements.viewAllBtn.addEventListener('click', () => this.openGalleryModal());
        }
    }

    navigateImage(direction) {
        const newIndex = this.state.currentImageIndex + direction;
        if (this.isValidIndex(newIndex)) {
            this.displayImageInDetailModal(newIndex);
        }
    }

    displayImageInDetailModal(index) {
        if (!this.isValidIndex(index) || !this.elements.mediaContainer) return;

        this.state.currentImageIndex = index;
        const data = this.galleryData[index];

        this.renderMainMedia(data);
        this.updateCommentInfo(data);
        this.updateThumbnails();
        this.updateNavigationButtons();
    }

    renderMainMedia(data) {
        // Clear previous content (tetap)
        this.elements.mediaContainer.innerHTML = '';

        // Tambahkan kembali tombol navigasi
        const prevBtn = document.createElement('button');
        prevBtn.className = 'btn nav-btn prev-image-btn';
        prevBtn.id = 'prevImageBtn';
        prevBtn.innerHTML = '<i class="bi bi-chevron-left"></i>';

        const nextBtn = document.createElement('button');
        nextBtn.className = 'btn nav-btn next-image-btn';
        nextBtn.id = 'nextImageBtn';
        nextBtn.innerHTML = '<i class="bi bi-chevron-right"></i>';

        // Tambahkan ke container
        this.elements.mediaContainer.appendChild(prevBtn);
        this.elements.mediaContainer.appendChild(nextBtn);

        // Re-bind click events
        prevBtn.addEventListener('click', () => this.navigateImage(-1));
        nextBtn.addEventListener('click', () => this.navigateImage(1));

        // Tambahkan media (gambar/video)
        let mediaElement;
        if (data.type === 'video') {
            mediaElement = this.createVideoElement(data);

            this.elements.mediaContainer.appendChild(mediaElement);
        } else {
            mediaElement = this.createImageElement(data);
            this.elements.mediaContainer.appendChild(mediaElement);
        }

        // Update referensi tombol baru
        this.elements.prevBtn = prevBtn;
        this.elements.nextBtn = nextBtn;

        this.updateNavigationButtons(); // pastikan disable state disesuaikan
    }

    updateCommentInfo(data) {
        if (this.elements.commentUser) this.elements.commentUser.textContent = data.userName;
        if (this.elements.commentAvatar) {
            this.elements.commentAvatar.src = data.userAvatar || '';
        }
        if (this.elements.commentRating) {
            this.elements.commentRating.innerHTML = this.generateRatingStars(data.rating);
        }
        if (this.elements.commentDate) this.elements.commentDate.textContent = data.commentDate;
        if (this.elements.commentText) this.elements.commentText.textContent = data.commentText;
    }

    updateThumbnails() {
        if (!this.elements.thumbnailList) return;

        this.elements.thumbnailList.innerHTML = '';
        this.setupThumbnailContainer();

        this.galleryData.forEach((data, index) => {
            const thumbnailElement = this.createThumbnailElement(data, index);
            this.elements.thumbnailList.appendChild(thumbnailElement);
        });

        this.updateActiveThumbnail();
    }

    setupThumbnailContainer() {
        const classList = this.elements.thumbnailList.classList;
        classList.remove('flex-column', 'flex-row', 'align-items-center');
        classList.add('d-flex', 'align-items-center');

        if (this.isMobile()) {
            classList.add('flex-row');
        } else {
            classList.add('flex-column');
        }
    }

    createThumbnailElement(data, index) {
        const wrapper = document.createElement('div');
        wrapper.className = 'position-relative';
        let thumbnail;

        if (data.type === 'video') {
            thumbnail = document.createElement('video');
            // Sumber video untuk elemen thumbnail ini
            thumbnail.src = data.videoUrl || data.imageUrl;
            thumbnail.alt = `Thumbnail ${data.type} by ${data.userName}`;
            thumbnail.classList.add('thumbnail-item');
            thumbnail.muted = true;
            thumbnail.playsInline = true;
            // preload='metadata' agar event loadeddata bisa cepat terpicu
            thumbnail.preload = 'metadata';
            thumbnail.tabIndex = 0;
            // Beri background sementara agar tidak putih kosong
            thumbnail.style.backgroundColor = '#e0e0e0';

            thumbnail.addEventListener('loadeddata', function onLoadedData() {
                // Hapus listener agar tidak berjalan berkali-kali
                thumbnail.removeEventListener('loadeddata', onLoadedData);

                // Coba seek ke frame awal (misal 0.1 detik) untuk menghindari frame hitam
                thumbnail.currentTime = 0.1;

                thumbnail.addEventListener('seeked', function onSeeked() {
                    thumbnail.removeEventListener('seeked', onSeeked); // Hapus listener
                    try {
                        const canvas = document.createElement('canvas');
                        if (thumbnail.videoWidth > 0 && thumbnail.videoHeight > 0) {
                            canvas.width = thumbnail.videoWidth;
                            canvas.height = thumbnail.videoHeight;
                            const ctx = canvas.getContext('2d');
                            ctx.drawImage(thumbnail, 0, 0, canvas.width, canvas.height);
                            thumbnail.poster = canvas.toDataURL('image/jpeg'); // Buat poster dari canvas
                            thumbnail.style.backgroundColor = 'transparent'; // Hapus background sementara
                        } else {
                            console.warn('Dimensi video tidak tersedia untuk membuat poster:', thumbnail.src);
                        }
                    } catch (e) {
                        console.error("Gagal membuat poster thumbnail video:", e);
                    }
                });
            });
            thumbnail.addEventListener('error', function onErrorLoading() {
                console.error('Error memuat video untuk thumbnail:', thumbnail.src);
                thumbnail.style.backgroundColor = '#333'; // Warna error
            }, { once: true });
            // Tidak perlu controls pada thumbnail
        } else {
            thumbnail = document.createElement('img');
            thumbnail.src = data.thumbnailUrl || data.imageUrl;
            thumbnail.alt = `Thumbnail ${data.type} by ${data.userName}`;
            thumbnail.classList.add('thumbnail-item');
        }
        thumbnail.dataset.index = index;
        // Add active class if current
        if (index === this.state.currentImageIndex) {
            thumbnail.classList.add('active-thumbnail');
        }

        wrapper.appendChild(thumbnail);

        // Add play icon for videos
        if (data.type === 'video') {
            const playIcon = this.createThumbnailPlayIcon();
            wrapper.appendChild(playIcon);
        }

        // Click handler
        thumbnail.addEventListener('click', () => {
            this.displayImageInDetailModal(index);
        });

        return wrapper;
    }

    updateActiveThumbnail() {
        if (!this.elements.thumbnailList) return;

        this.elements.thumbnailList.querySelectorAll('.thumbnail-item').forEach((thumb, idx) => {
            if (idx === this.state.currentImageIndex) {
                thumb.classList.add('active-thumbnail');
                thumb.scrollIntoView({ behavior: 'smooth', block: 'nearest', inline: 'nearest' });
            } else {
                thumb.classList.remove('active-thumbnail');
            }
        });
    }

    updateNavigationButtons() {
        if (this.elements.prevBtn) {
            this.elements.prevBtn.disabled = this.state.currentImageIndex === 0;
        }
        if (this.elements.nextBtn) {
            this.elements.nextBtn.disabled = this.state.currentImageIndex === this.galleryData.length - 1;
        }
    }

    // ===== GALLERY MODAL METHODS =====
    bindGalleryModalEvents() {
        if (this.elements.galleryScrollContainer) {
            this.elements.galleryScrollContainer.addEventListener('scroll', () => {
                this.handleGalleryScroll();
            });
        }

        if (this.elements.galleryModal) {
            this.elements.galleryModal.addEventListener('hidden.bs.modal', () => {
                // Keep state when modal is hidden
            });

            this.elements.galleryModal.addEventListener('shown.bs.modal', () => {
                this.scrollToActiveGridItem();
            });
        }
    }

    handleGalleryScroll() {
        if (this.state.isLoadingItems || this.state.galleryLoadedItems >= this.galleryData.length) {
            return;
        }

        const container = this.elements.galleryScrollContainer;
        if (container.scrollTop + container.clientHeight >= container.scrollHeight - this.config.scrollThreshold) {
            this.loadMoreGalleryItems();
        }
    }

    // Modal Gallery Comentar
    openGalleryModal(targetIndex = -1) {
        if (!this.modals.gallery) return;

        this.state.activeGridItemIndex = targetIndex !== -1 ? targetIndex : this.state.currentImageIndex;

        if (this.elements.galleryGrid.innerHTML.trim() === '' || this.state.galleryLoadedItems === 0) {
            this.initializeGalleryGrid();
        } else {
            this.updateActiveGridItem();
        }

        if (this.elements.totalCount) {
            this.elements.totalCount.textContent = this.galleryData.length;
        }

        // Hide detail modal first
        if (this.modals.detail) {
            this.modals.detail.hide();
        }

        this.modals.gallery.show();
        this.updateLoadingSpinner();
    }

    initializeGalleryGrid() {
        this.state.galleryLoadedItems = 0;
        this.elements.galleryGrid.innerHTML = '';
        this.renderGalleryGridItems(0, this.config.itemsPerLoad);
    }

    renderGalleryGridItems(startIndex, count) {
        const endIndex = Math.min(startIndex + count, this.galleryData.length);

        for (let i = startIndex; i < endIndex; i++) {
            const gridItem = this.createGalleryGridItem(this.galleryData[i], i);
            this.elements.galleryGrid.appendChild(gridItem);
        }

        this.state.galleryLoadedItems = endIndex;
        this.updateLoadingSpinner();
    }

    createGalleryGridItem(data, index) {
        const gridItem = document.createElement('div');
        gridItem.classList.add('gallery-grid-item');
        gridItem.dataset.imageIndex = index;

        if (index === this.state.activeGridItemIndex) {
            gridItem.classList.add('active-item');
        }

        const thumbnailWrapper = document.createElement('div');
        thumbnailWrapper.classList.add('position-relative');

        const imgElement = document.createElement('img');
        imgElement.alt = `Media dari ${data.userName} ${index + 1}`;

        if (data.type === 'video') {
            imgElement.src = ''; // Default atau dikosongka
            imgElement.style.backgroundColor = '#e0e0e0';

            const tempVideo = document.createElement('video');
            tempVideo.crossOrigin = "anonymous";
            tempVideo.src = data.videoUrl || data.imageUrl;
            tempVideo.preload = 'metadata';
            tempVideo.muted = true;
            tempVideo.playsInline = true;

            tempVideo.addEventListener('loadeddata', function onLoadedData() {
                tempVideo.removeEventListener('loadeddata', onLoadedData); // Hapus listener
                tempVideo.currentTime = 0.1; // Seek ke detik 0.1

                tempVideo.addEventListener('seeked', function onSeeked() {
                    tempVideo.removeEventListener('seeked', onSeeked); // Hapus listener
                    try {
                        const canvas = document.createElement('canvas');
                        if (tempVideo.videoWidth > 0 && tempVideo.videoHeight > 0) {
                            canvas.width = tempVideo.videoWidth;
                            canvas.height = tempVideo.videoHeight;
                            const ctx = canvas.getContext('2d');
                            ctx.drawImage(tempVideo, 0, 0, canvas.width, canvas.height);
                            imgElement.src = canvas.toDataURL('image/jpeg'); // Set src gambar dari canvas
                            imgElement.style.backgroundColor = 'transparent'; // Hapus background placeholder
                        } else {
                            console.warn('Dimensi video tidak tersedia untuk membuat thumbnail (gallery grid):', tempVideo.src);
                            // imgElement.src = 'path/to/default-video-icon.png';
                        }
                    } catch (e) {
                        console.error("Gagal membuat thumbnail video dari canvas (gallery grid):", e);
                        // imgElement.src = 'path/to/error-video-icon.png';
                    }
                });
            });
            tempVideo.addEventListener('error', function onErrorLoading() {
                console.error('Error memuat video untuk thumbnail (gallery grid):', tempVideo.src);
                imgElement.style.backgroundColor = '#333'; // Warna error
                // imgElement.src = 'path/to/error-video-icon.png'; // Fallback
            }, { once: true });

            thumbnailWrapper.appendChild(imgElement);

            // Tambahkan ikon play untuk video
            const playIcon = document.createElement('span');
            playIcon.className = 'grid-play-icon position-absolute top-50 start-50 translate-middle';
            playIcon.innerHTML = '<i class="bi bi-play-circle-fill fs-4 text-white"></i>';
            thumbnailWrapper.appendChild(playIcon);
        } else { // Untuk tipe 'image'
            imgElement.src = data.thumbnailUrl || data.imageUrl;
            thumbnailWrapper.appendChild(imgElement);
        }

        gridItem.appendChild(thumbnailWrapper);

        const infoDiv = document.createElement('div');
        infoDiv.className = 'gallery-grid-item-info';
        const ratingDiv = document.createElement('div');
        ratingDiv.className = 'comment-rating';
        ratingDiv.innerHTML = this.generateRatingStars(data.rating);
        infoDiv.appendChild(ratingDiv);
        gridItem.appendChild(infoDiv);

        gridItem.addEventListener('click', () => this.handleGridItemClick(index));

        return gridItem;
    }

    handleGridItemClick(index) {
        this.state.activeGridItemIndex = index;
        this.clearActiveGridItems();

        const clickedItem = this.elements.galleryGrid.querySelector(`[data-image-index="${index}"]`);
        if (clickedItem) {
            clickedItem.classList.add('active-item');
        }

        // Close gallery modal and open detail modal
        if (this.modals.gallery) {
            this.modals.gallery.hide();
        }

        this.displayImageInDetailModal(index);

        if (this.modals.detail) {
            this.modals.detail.show();
        }
    }

    clearActiveGridItems() {
        this.elements.galleryGrid.querySelectorAll('.gallery-grid-item.active-item').forEach(item => {
            item.classList.remove('active-item');
        });
    }

    updateActiveGridItem() {
        this.clearActiveGridItems();
        if (this.state.activeGridItemIndex !== -1) {
            const activeItem = this.elements.galleryGrid.querySelector(`[data-image-index="${this.state.activeGridItemIndex}"]`);
            if (activeItem) {
                activeItem.classList.add('active-item');
            }
        }
    }

    scrollToActiveGridItem() {
        if (this.state.activeGridItemIndex !== -1) {
            const activeItem = this.elements.galleryGrid.querySelector(`[data-image-index="${this.state.activeGridItemIndex}"]`);
            if (activeItem) {
                setTimeout(() => {
                    activeItem.scrollIntoView({ behavior: 'auto', block: 'nearest' });
                }, 100);
            }
        }
    }

    loadMoreGalleryItems() {
        if (this.state.isLoadingItems || this.state.galleryLoadedItems >= this.galleryData.length) return;

        this.state.isLoadingItems = true;
        this.elements.loadingSpinner.style.display = 'flex';

        setTimeout(() => {
            this.renderGalleryGridItems(this.state.galleryLoadedItems, this.config.itemsPerLoad);
            this.state.isLoadingItems = false;
            this.updateLoadingSpinner();
        }, 300);
    }

    updateLoadingSpinner() {
        if (this.elements.loadingSpinner) {
            const shouldShow = this.state.isLoadingItems && this.state.galleryLoadedItems < this.galleryData.length;
            this.elements.loadingSpinner.style.display = shouldShow ? 'flex' : 'none';
        }
    }

    // ===== TRIGGER EVENTS =====
    bindTriggerEvents() {
        document.querySelectorAll('.commentar-media').forEach(trigger => {
            trigger.addEventListener('click', (event) => {
                const startIndex = parseInt(event.currentTarget.dataset.imageIndex, 10) || 0;
                this.displayImageInDetailModal(startIndex);
                if (this.modals.detail) {
                    this.modals.detail.show();
                }
            });
        });
    }

    bindResizeEvents() {
        window.addEventListener('resize', () => {
            this.updateThumbnails();
        });
    }

    // ===== PUBLIC API =====
    showDetailModal(index = 0) {
        this.displayImageInDetailModal(index);
        if (this.modals.detail) {
            this.modals.detail.show();
        }
    }

    showGalleryModal(targetIndex = -1) {
        this.openGalleryModal(targetIndex);
    }
}

// ===== INITIALIZATION =====
let galleryModalManager;

document.addEventListener('DOMContentLoaded', function () {
    galleryModalManager = new GalleryModalManager();

    // Expose functions to global scope for backward compatibility
    window.displayImageInDetailModal = (index) => galleryModalManager.showDetailModal(index);
    window.openGalleryComentarModal = (index) => galleryModalManager.showGalleryModal(index);
});


// <===== Modal Uploaded Comentar Media =====>
class UploadedCommentModalManager {
    constructor(modalElement) {
        this.modalElement = modalElement;
        this.modalInstance = new bootstrap.Modal(this.modalElement);

        this.elements = {};
        this.mediaData = [];
        this.currentIndex = 0;

        this._bindElements();
        this._bindEvents();
        this._bindResizeEvents(); // Tambahkan binding untuk event resize

    }

    _bindElements() {
        this.elements.mainImageContainer = this.modalElement.querySelector('.main-image-container');
        this.elements.displayedImage = this.elements.mainImageContainer.querySelector('.displayed-image.main-image-display');
        this.elements.displayedVideo = this.elements.mainImageContainer.querySelector('.main-video-display');

        this.elements.prevButton = this.modalElement.querySelector('#prevImageBtn');
        this.elements.nextButton = this.modalElement.querySelector('#nextImageBtn');
        this.elements.thumbnailList = this.modalElement.querySelector('.thumbnail-list');

        this.elements.userAvatar = this.modalElement.querySelector('.comment-user-avatar');
        this.elements.userName = this.modalElement.querySelector('.comment-user-name');
        this.elements.commentRating = this.modalElement.querySelector('.comment-rating');
    }

    _bindEvents() {
        if (this.elements.prevButton) {
            this.elements.prevButton.addEventListener('click', () => {
                if (this.currentIndex > 0) {
                    this.renderMedia(this.currentIndex - 1);
                }
            });
        }
        if (this.elements.nextButton) {
            this.elements.nextButton.addEventListener('click', () => {
                if (this.currentIndex < this.mediaData.length - 1) {
                    this.renderMedia(this.currentIndex + 1);
                }
            });
        }
    }

    _generateRatingStars(rating) {
        let starsHtml = '';
        const RATING_MAX = 5;
        for (let i = 1; i <= RATING_MAX; i++) {
            starsHtml += `<i class="bi ${i <= rating ? 'bi-star-fill' : 'bi-star'}"></i>`;
        }
        return starsHtml;
    }

    // Responsivitas when mobile size
    isMobile() {
        return window.innerWidth < 992;
    }

    setupThumbnailContainer() {
        if (!this.elements.thumbnailList) return;
        const classList = this.elements.thumbnailList.classList;
        classList.remove('flex-column', 'flex-row'); 
        classList.add('d-flex', 'align-items-center');

        // Tambahkan class spesifik berdasarkan orientasi
        classList.add(this.isMobile() ? 'flex-row' : 'flex-column');
    }

    _createUploadedImageThumbnail(data) {
        const img = document.createElement('img');
        img.src = data.imageUrl;
        img.alt = `Thumbnail review foto oleh ${data.userName}`;
        // Tambahkan class khusus untuk styling konten thumbnail
        img.className = 'review-product';
        img.style.width = '100%';
        img.style.height = '100%';
        img.style.objectFit = 'contain'; // Penting agar gambar terpotong rapi
        img.style.display = 'block';
        return img;
    }

    _createUploadedVideoThumbnail(data) {
        const video = document.createElement('video');
        video.src = data.videoUrl;
        video.alt = `Thumbnail review video oleh ${data.userName}`;
        // Tambahkan class khusus untuk styling konten thumbnail
        video.className = 'review-product';
        video.muted = true;
        video.playsInline = true;
        video.preload = 'metadata';
        // Pastikan ada style dasar agar video mengisi wrapper thumbnail-item
        video.style.width = '100%';
        video.style.height = '100%';
        video.style.objectFit = 'cover'; // Penting agar video terpotong rapi
        video.style.display = 'block';
        video.style.backgroundColor = '#e0e0e0'; // Placeholder saat poster dimuat

        this._ensureVideoPoster(data, video)
            .then(posterUrl => {
                if (posterUrl) video.style.backgroundColor = 'transparent';
            })
            .catch(error => {
                console.error(`Gagal membuat poster untuk thumbnail video unggahan ${data.videoUrl}:`, error);
                video.style.backgroundColor = '#333'; // Indikasi error
            });
        return video;
    }

    _bindResizeEvents() {
        // Update layout thumbnail saat ukuran window berubah
        window.addEventListener('resize', () => {
            if (this.elements.thumbnailList && this.mediaData.length > 0) {
                this.setupThumbnailContainer();
            }
        });
    }


    _createThumbnailPlayIcon() {
        const icon = document.createElement('span');
        icon.className = 'thumb-play-icon position-absolute top-50 start-50 translate-middle';
        icon.innerHTML = '<i class="bi bi-play-circle-fill fs-5 text-white"></i>';
        icon.style.cssText = 'pointer-events: none; opacity: 0.85;';
        return icon;
    }

    _ensureVideoPoster(dataItem, videoElementForPosterAttribute) {
        return new Promise((resolve, reject) => {
            if (dataItem.type !== 'video') {
                resolve(null); // Not a video, nothing to do for poster
                return;
            }

            if (dataItem.imageUrl && typeof dataItem.imageUrl === 'string' && dataItem.imageUrl.startsWith('data:image')) {
                // Assume imageUrl already holds a valid poster (e.g., from previous generation)
                if (videoElementForPosterAttribute) {
                    videoElementForPosterAttribute.poster = dataItem.imageUrl;
                }
                resolve(dataItem.imageUrl);
                return;
            }

            // If imageUrl is not a valid poster, generate one
            const tempVideo = document.createElement('video');
            tempVideo.src = dataItem.videoUrl;
            tempVideo.crossOrigin = 'anonymous';
            tempVideo.preload = 'metadata';
            tempVideo.muted = true;
            tempVideo.playsInline = true; // Important for iOS and inline playback

            const handleSeekError = (event) => {
                console.error('Error seeking video for poster generation:', dataItem.videoUrl, event);
                reject('Seek error');
            };

            const handleLoadError = (event) => {
                console.error('Error loading video metadata for poster generation:', dataItem.videoUrl, event);
                reject('Load error');
            };

            tempVideo.addEventListener('loadeddata', function onLoadedData() {
                tempVideo.removeEventListener('loadeddata', onLoadedData);
                tempVideo.removeEventListener('error', handleLoadError); // Remove load error listener if loadeddata fired

                tempVideo.currentTime = 0.1; // Seek to a very early frame

                tempVideo.addEventListener('seeked', function onSeeked() {
                    tempVideo.removeEventListener('seeked', onSeeked);
                    tempVideo.removeEventListener('error', handleSeekError); // Remove seek error listener

                    if (tempVideo.videoWidth > 0 && tempVideo.videoHeight > 0) {
                        const canvas = document.createElement('canvas');
                        canvas.width = tempVideo.videoWidth;
                        canvas.height = tempVideo.videoHeight;
                        const ctx = canvas.getContext('2d');
                        ctx.drawImage(tempVideo, 0, 0, canvas.width, canvas.height);
                        const posterUrl = canvas.toDataURL('image/jpeg');

                        dataItem.imageUrl = posterUrl; // Cache it on the data object for future use

                        if (videoElementForPosterAttribute) {
                            videoElementForPosterAttribute.poster = posterUrl;
                        }
                        resolve(posterUrl);
                    } else {
                        console.warn('Video dimensions not available for poster generation:', dataItem.videoUrl);
                        reject('No dimensions');
                    }
                });
                tempVideo.addEventListener('error', handleSeekError); // Add seek-specific error listener
            });
            tempVideo.addEventListener('error', handleLoadError); // Add load-specific error listener
        });
    }

    populateThumbnails() {
        if (!this.elements.thumbnailList) return;
        this.elements.thumbnailList.innerHTML = '';
        this.setupThumbnailContainer(); // Panggil setup layout thumbnail

        this.mediaData.forEach((data, index) => {
            const wrapper = document.createElement('div');
            wrapper.className = 'thumbnail-item'; // As per original structure
            wrapper.style.position = 'relative'; // For play icon positioning
            wrapper.style.cursor = 'pointer';

            let thumbContentElement;

            if (data.type === 'image') {
                thumbContentElement = this._createUploadedImageThumbnail(data);
            } else if (data.type === 'video') {
                thumbContentElement = this._createUploadedVideoThumbnail(data);
                wrapper.appendChild(this._createThumbnailPlayIcon());
            }

            if (thumbContentElement) {
                // Add any common styling or attributes to thumbContentElement if needed
                wrapper.appendChild(thumbContentElement);
            }

            wrapper.addEventListener('click', () => {
                this.renderMedia(index);
            });

            this.elements.thumbnailList.appendChild(wrapper);
        });
        this.updateActiveThumbnail();
    }

    renderMedia(index) {
        if (index < 0 || index >= this.mediaData.length || !this.mediaData[index]) {
            console.warn('UploadedCommentModalManager: Invalid index or no media data for index', index);
            return;
        }

        const data = this.mediaData[index];
        this.currentIndex = index;

        // Ensure elements exist before trying to manipulate them
        if (this.elements.displayedImage && this.elements.displayedVideo) {
            this.elements.displayedImage.style.display = 'none';
            this.elements.displayedVideo.style.display = 'none';
            if (!this.elements.displayedVideo.paused) {
                this.elements.displayedVideo.pause();
            }
            this.elements.displayedVideo.removeAttribute('poster'); // Clear old poster before setting new one
            this.elements.displayedVideo.src = ''; // Clear src to stop loading previous video

            if (data.type === 'image') {
                this.elements.displayedImage.src = data.imageUrl;
                this.elements.displayedImage.alt = `Media Komentar oleh ${data.userName}`;
                this.elements.displayedImage.style.display = '';
            } else if (data.type === 'video') {
                this.elements.displayedVideo.src = data.videoUrl;
                this.elements.displayedVideo.style.backgroundColor = '#000'; // Placeholder
                this._ensureVideoPoster(data, this.elements.displayedVideo)
                    .then(posterUrl => {
                        if (posterUrl) this.elements.displayedVideo.style.backgroundColor = 'transparent';
                    })
                    .catch(error => {
                        console.error(`Failed to generate poster for main video ${data.videoUrl}:`, error);
                    });
                this.elements.displayedVideo.style.display = '';
            }
        }

        if (this.elements.userAvatar) {
            this.elements.userAvatar.src = data.userAvatar || 'https://via.placeholder.com/40/cccccc/808080?Text=U';
        }
        if (this.elements.userName) {
            this.elements.userName.textContent = data.userName;
        }
        if (this.elements.commentRating) {
            this.elements.commentRating.innerHTML = this._generateRatingStars(data.rating);
        }

        this.updateNavButtons();
        this.updateActiveThumbnail();
    }

    updateNavButtons() {
        const hasMedia = this.mediaData.length > 0;
        if (this.elements.prevButton) {
            this.elements.prevButton.disabled = !hasMedia || this.currentIndex === 0;
        }
        if (this.elements.nextButton) {
            this.elements.nextButton.disabled = !hasMedia || this.currentIndex === this.mediaData.length - 1;
        }
    }

    updateActiveThumbnail() {
        if (!this.elements.thumbnailList) return;
        const thumbnails = this.elements.thumbnailList.querySelectorAll('.thumbnail-item');
        thumbnails.forEach((thumbWrapper, idx) => {
            if (idx === this.currentIndex) {
                thumbWrapper.classList.add('active-thumbnail');
            } else {
                thumbWrapper.classList.remove('active-thumbnail');
            }
        });
    }

    show(mediaItems, startIndex = 0) {
        this.mediaData = Array.isArray(mediaItems) ? mediaItems : [];

        if (this.mediaData.length === 0) {
            console.warn("UploadedCommentModalManager: No media items to display.");
            // Clear content if no media
            if (this.elements.thumbnailList) this.elements.thumbnailList.innerHTML = '';
            if (this.elements.displayedImage) this.elements.displayedImage.style.display = 'none';
            if (this.elements.displayedVideo) {
                this.elements.displayedVideo.style.display = 'none';
                this.elements.displayedVideo.src = '';
            }
            if (this.elements.userName) this.elements.userName.textContent = '';
            if (this.elements.userAvatar) this.elements.userAvatar.src = 'https://via.placeholder.com/40';
            if (this.elements.commentRating) this.elements.commentRating.innerHTML = '';
            this.currentIndex = 0; // Reset index
            this.updateNavButtons(); // Disable nav buttons
            this.modalInstance.show();
            return;
        }

        this.currentIndex = (startIndex >= 0 && startIndex < this.mediaData.length) ? startIndex : 0;

        this.populateThumbnails(); // This will also call updateActiveThumbnail
        this.renderMedia(this.currentIndex); // This will also call updateNavButtons and updateActiveThumbnail
        this.modalInstance.show();
    }
}

// ===== INITIALIZATION for Uploaded Comment Modal =====
document.addEventListener('DOMContentLoaded', function () {
    const modalUploadedElement = document.getElementById('modalUploadedCommentarMedia');
    let uploadedCommentModalManager;

    try {
        uploadedCommentModalManager = new UploadedCommentModalManager(modalUploadedElement);
    } catch (e) {
        console.error("Failed to initialize UploadedCommentModalManager:", e);
        return;
    }

    // Event listener Ketika media di komentar diklik
    document.querySelectorAll('.comment-media').forEach(commentMediaTrigger => {
        commentMediaTrigger.addEventListener('click', (event) => {
            const clickedElement = event.currentTarget;
            // --- DUMMY DATA ---
            const exampleMediaData = [
                {
                    type: 'image',
                    imageUrl: clickedElement.dataset.imgSrc || 'assets/img/konten/bg-pertanian.jpg',
                    videoUrl: null,
                    userName: clickedElement.dataset.userName || 'Pengguna Foto Uploader',
                    userAvatar: clickedElement.dataset.userAvatar || '',
                    rating: parseInt(clickedElement.dataset.rating, 10) || 5
                },
                {
                    type: 'video',
                    imageUrl: clickedElement.dataset.videoPoster || null, // Expects null if poster needs generation
                    videoUrl: clickedElement.dataset.videoSrc || 'assets/videos/slideshow-tokopedia.mp4',
                    userName: clickedElement.dataset.userName || 'Pengguna Video Uploader',
                    userAvatar: clickedElement.dataset.userAvatar || '',
                    rating: parseInt(clickedElement.dataset.rating, 10) || 4
                }
            ];
            // --- END DUMMY DATA ---

            // Filter out items that don't have a valid src for their type
            const validMediaData = exampleMediaData.filter(item => {
                if (item.type === 'image') return !!item.imageUrl;
                if (item.type === 'video') return !!item.videoUrl;
                return false;
            });

            const initialIndex = parseInt(clickedElement.dataset.initialMediaIndex, 10) || 0;
            if (uploadedCommentModalManager) {
                uploadedCommentModalManager.show(validMediaData, initialIndex);
            }
        });
    });
});

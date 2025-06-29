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
        this.isValidIndex()
        this.initializeOptimizations();
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

        // Detail modal elements
        this.elements.mainImageContainer = this.elements.detailModal.querySelector('.main-image-container');
        this.elements.mediaContainer = this.elements.detailModal.querySelector('.displayed-image')?.parentElement;
        this.elements.prevBtn = this.elements.detailModal.querySelector('#prevImageBtn');
        this.elements.nextBtn = this.elements.detailModal.querySelector('#nextImageBtn');
        this.elements.thumbnailList = this.elements.detailModal.querySelector('.thumbnail-list');
        this.elements.viewAllBtn = this.elements.detailModal.querySelector('.view-all-btn');
        this.videoThumbnailCache = new Map(); // Cache untuk thumbnail video

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
                imageUrl: '/halaman-depan/assets/img/konten/bg-pertanian.jpg',
                thumbnailUrl: '/halaman-depan/assets/img/konten/bg-pertanian.jpg',
                userName: 'Pengguna A1',
                userAvatar: '',
                rating: 5,
                commentDate: '1 hari lalu',
                commentText: 'Ini adalah komentar untuk gambar ke-1. Kualitasnya sangat baik.'
            },
            {
                id: 2,
                type: 'video',
                videoUrl: '/halaman-depan/assets/videos/sample-video.mp4',
                videoPosterUrl: '/halaman-depan/assets/video-posters/sample-poster-video.jpg', // Dari server
                imageUrl: null,
                thumbnailUrl: null,
                userName: 'Videographer B2',
                userAvatar: '',
                rating: 4,
                commentDate: '2 minggu lalu',
                commentText: 'Video ini sangat informatif dan menarik! Editingnya juga bagus.'
            },
            {
                id: 3,
                type: 'image',
                imageUrl: '/halaman-depan/assets/img/konten/bg-pertanian.jpg',
                thumbnailUrl: '/halaman-depan/assets/img/konten/bg-pertanian.jpg',
                userName: 'Pengguna C3',
                userAvatar: '',
                rating: 3,
                commentDate: '3 bulan lalu',
                commentText: 'Gambar ke-3, lumayan lah.'
            },
        ];

        // Generate additional items
        const additionalItems = Array.from({ length: 20 }, (_, i) => ({
            id: i + 4,
            type: 'image',
            imageUrl: '/halaman-depan/assets/img/konten/bg-pertanian.jpg',
            thumbnailUrl: '/halaman-depan/assets/img/konten/bg-pertanian.jpg', // Asumsikan thumbnail juga dari server
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


    // <======= Modal Commentar Media =======>
    // ===== HELPER =====

    // ===== GENNERATING ELEMENTS =====
    initializeOptimizations() {
        this.mediaCache = new Map();
        this.activeVideo = null;
        this.isNavigating = false;

        // Debounced navigation
        this.debouncedNavigate = this.debounce(this.navigateImage.bind(this), 150);
    }

    // Utility debounce function
    debounce(func, wait) {
        let timeout;
        return function executedFunction(...args) {
            const later = () => {
                clearTimeout(timeout);
                func(...args);
            };
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
        };
    }

    // Enhanced image creation
    createImageElement(data) {
        const img = document.createElement('img');
        img.src = data.imageUrl;
        img.alt = `Image by ${data.userName}`;
        img.className = 'displayed-image w-100 h-auto';
        img.loading = 'lazy';

        img.addEventListener('error', () => {
            console.error('Image failed to load:', data.imageUrl);
            img.src = '/assets/default-img/no-preview-image.jpg';
        });

        return img;
    }

    // createVideoElement, poster dari server
    createVideoElement(data) {
        const video = document.createElement('video');
        video.poster = data.videoPosterUrl || '/assets/default-img/no-preview-image.jpg';
        video.className = 'displayed-video w-100 h-auto';
        video.controls = true;
        video.tabIndex = 0;
        video.playsInline = true;
        video.preload = 'metadata';
        video.style.backgroundColor = data.videoPosterUrl ? 'transparent' : '#e0e0e0';

        // Buat tag source
        const source = document.createElement('source');
        source.src = data.videoUrl;
        source.type = this.getVideoMimeType(data.videoUrl);
        video.appendChild(source);
        video.appendChild(document.createTextNode('Browser Anda tidak mendukung format video ini.'));

        return video;
    }

    // Get proper MIME type
    getVideoMimeType(url) {
        const extension = url.split('.').pop().toLowerCase();
        switch (extension) {
            case 'mp4': return 'video/mp4';
            case 'webm': return 'video/webm';
            case 'ogg': return 'video/ogg';
            case 'mov': return 'video/quicktime';
            default: return 'video/mp4';
        }
    }

    // Active video management
    setActiveVideo(video) {
        if (this.activeVideo && this.activeVideo !== video) {
            this.activeVideo.pause();
        }
        this.activeVideo = video;
    }

    // Fallback dengan error handling
    createVideoElementFallback(data) {
        const video = document.createElement('video');
        video.poster = data.videoPosterUrl || '/assets/default-img/no-preview-image.jpg';
        video.className = 'displayed-image w-100 h-auto';
        video.controls = true;
        video.muted = true;
        video.tabIndex = 0;
        video.playsInline = true;
        video.preload = 'none';
        video.style.backgroundColor = '#e0e0e0';

        const source = document.createElement('source');
        source.src = data.videoUrl;
        source.type = this.getVideoMimeType(data.videoUrl);
        video.appendChild(source);
        video.appendChild(document.createTextNode('Browser Anda tidak mendukung format video ini.'));

        // Minimal event handling untuk fallback
        video.addEventListener('error', () => {
            console.error('Fallback video also failed:', data.videoUrl);
        });

        return video;
    }

    // Thumbnail play icon
    createThumbnailPlayIcon() {
        const icon = document.createElement('span');
        icon.className = 'thumb-play-icon position-absolute top-50 start-50 translate-middle';
        icon.innerHTML = '<i class="bi bi-play-circle-fill fs-5 text-white"></i>';
        icon.style.cssText = 'pointer-events: none; opacity: 0.85; z-index: 2;';
        return icon;
    }

    // Modal events dengan keyboard support
    bindDetailModalEvents() {
        if (this.elements.prevBtn) {
            this.elements.prevBtn.addEventListener('click', () => this.debouncedNavigate(-1));
        }

        if (this.elements.nextBtn) {
            this.elements.nextBtn.addEventListener('click', () => this.debouncedNavigate(1));
        }

        if (this.elements.viewAllBtn) {
            this.elements.viewAllBtn.addEventListener('click', () => this.openGalleryModal());
        }

        if (this.elements.detailModal) {
            this.elements.detailModal.addEventListener('hidden.bs.modal', () => {
                this.destroy();
            });

            // Cleanup saat modal mulai ditutup (supaya lebih responsif)
            this.elements.detailModal.addEventListener('hide.bs.modal', () => {
                this.cleanupCurrentMedia();
            });
        }
    }

    // Navigation dengan debounce dan state management
    navigateImage(direction) {
        if (this.isNavigating) return; // Menghindari spam navigation

        const newIndex = this.state.currentImageIndex + direction;
        if (this.isValidIndex(newIndex)) {
            this.displayImageInDetailModal(newIndex);
        }
    }

    // Main display method dengan proper cleanup
    displayImageInDetailModal(index) {
        if (!this.isValidIndex(index) || !this.elements.mediaContainer) return;

        this.isNavigating = true;

        try {
            // Cleanup current media sebelum switch
            this.cleanupCurrentMedia();

            this.state.currentImageIndex = index;
            const data = this.galleryData[index];

            this.renderMainMedia(data);
            this.updateCommentInfo(data);
            this.updateThumbnails();
            this.updateNavigationButtons();

        } catch (error) {
            console.error('Error displaying media:', error);
        } finally {
            this.isNavigating = false;
        }
    }

    // Main media rendering dengan caching dan better error handling
    renderMainMedia(data) {
        if (!this.elements.mediaContainer || !data) return;

        // Clear previous content
        this.cleanupCurrentMedia();
        this.elements.mediaContainer.innerHTML = '';

        // Recreate navigation buttons
        const prevBtn = document.createElement('button');
        prevBtn.className = 'btn nav-btn prev-image-btn';
        prevBtn.id = 'prevImageBtn';
        prevBtn.innerHTML = '<i class="bi bi-chevron-left"></i>';
        prevBtn.setAttribute('aria-label', 'Previous media');

        const nextBtn = document.createElement('button');
        nextBtn.className = 'btn nav-btn next-image-btn';
        nextBtn.id = 'nextImageBtn';
        nextBtn.innerHTML = '<i class="bi bi-chevron-right"></i>';
        nextBtn.setAttribute('aria-label', 'Next media');

        this.elements.mediaContainer.appendChild(prevBtn);
        this.elements.mediaContainer.appendChild(nextBtn);

        // Bind events with debounced navigation
        prevBtn.addEventListener('click', () => this.debouncedNavigate(-1));
        nextBtn.addEventListener('click', () => this.debouncedNavigate(1));

        try {
            let mediaElement;
            const cacheKey = `${data.type}_${data.videoUrl || data.imageUrl}`;

            if (data.type === 'video') {
                // Always create fresh video
                mediaElement = this.createVideoElement(data);

                // Paksa load setelah DOM ready
                setTimeout(() => {
                    mediaElement.load();
                }, 50);

                this.setActiveVideo(mediaElement);
            } else {
                // Cache images for performance
                if (this.mediaCache && this.mediaCache.has(cacheKey)) {
                    mediaElement = this.mediaCache.get(cacheKey).cloneNode(true);
                } else {
                    mediaElement = this.createImageElement(data);
                    if (this.mediaCache) {
                        this.mediaCache.set(cacheKey, mediaElement.cloneNode(true));
                    }
                }
            }

            this.elements.mediaContainer.appendChild(mediaElement);

        } catch (error) {
            console.error('Error rendering media:', error);

            // Fallback handling
            if (data.type === 'video') {
                try {
                    const fallbackVideo = this.createVideoElementFallback(data);
                    this.setActiveVideo(fallbackVideo);
                    this.elements.mediaContainer.appendChild(fallbackVideo);
                } catch (fallbackError) {
                    console.error('Fallback also failed:', fallbackError);
                }
            }
        }

        // Update button references
        this.elements.prevBtn = prevBtn;
        this.elements.nextBtn = nextBtn;
        this.updateNavigationButtons();
    }

    // Comment info update
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

    // Setup thumbnail container
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

    // Thumbnail creation dengan better performance
    createThumbnailElement(data, index) {
        const wrapper = document.createElement('div');
        wrapper.className = 'thumbnail-item';
        wrapper.dataset.index = index;

        let mediaEl;
        if (data.type === 'video') {
            mediaEl = document.createElement('video');
            mediaEl.poster = data.videoPosterUrl || '/assets/default-img/no-preview-image.jpg';
            mediaEl.alt = `Thumbnail video by ${data.userName}`;
            mediaEl.muted = true;
            mediaEl.playsInline = true;
            mediaEl.preload = 'none';
            mediaEl.tabIndex = 0;

            wrapper.appendChild(mediaEl);
            wrapper.appendChild(this.createThumbnailPlayIcon());
        } else {
            mediaEl = document.createElement('img');
            mediaEl.src = data.thumbnailUrl || data.imageUrl;
            mediaEl.alt = `Thumbnail image by ${data.userName}`;
            mediaEl.loading = 'lazy';
            mediaEl.addEventListener('error', () => {
                mediaEl.src = '/assets/default-img/no-preview-image.jpg';
            });

            wrapper.appendChild(mediaEl);
        }

        if (index === this.state.currentImageIndex) {
            wrapper.classList.add('active-thumbnail');
        }

        // Debounced click handler
        wrapper.addEventListener('click', this.debounce(() => {
            if (!this.isNavigating) {
                this.displayImageInDetailModal(index);
            }
        }, 200));

        return wrapper;
    }

    // Active thumbnail
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

    // Thumbnails dengan DocumentFragment untuk performance
    updateThumbnails() {
        if (!this.elements.thumbnailList) return;

        const fragment = document.createDocumentFragment();

        this.elements.thumbnailList.innerHTML = '';
        this.setupThumbnailContainer();

        this.galleryData.forEach((data, index) => {
            const thumbnailElement = this.createThumbnailElement(data, index);
            fragment.appendChild(thumbnailElement);
        });

        this.elements.thumbnailList.appendChild(fragment);
        this.updateActiveThumbnail();
    }

    // Navigation buttons dengan visual feedback
    updateNavigationButtons() {
        const isFirst = this.state.currentImageIndex === 0;
        const isLast = this.state.currentImageIndex === this.galleryData.length - 1;

        if (this.elements.prevBtn) {
            this.elements.prevBtn.disabled = isFirst;
        }
        if (this.elements.nextBtn) {
            this.elements.nextBtn.disabled = isLast;
        }
    }

    // ===== NEW UTILITY METHODS =====
    // Cleanup method untuk prevent video issues
    cleanupCurrentMedia() {
        if (this.activeVideo) {
            this.activeVideo.pause();
            this.activeVideo.removeAttribute('src');
            this.activeVideo.load(); // Reset state internal browser
            this.activeVideo = null;
        }
    }

    // Method untuk cleanup saat component destroyed
    destroy() {
        this.cleanupCurrentMedia();
        if (this.mediaCache) {
            this.mediaCache.clear();
        }
    }

    // ===== GALLERY MODAL =====
    bindGalleryModalEvents() {
        if (this.elements.galleryScrollContainer) {
            this.elements.galleryScrollContainer.addEventListener('scroll', () => {
                this.handleGalleryScroll();
            });
        }

        if (this.elements.galleryModal) {
            this.elements.galleryModal.addEventListener('hidden.bs.modal', () => {
                this.destroy();
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

    // Buka Modal Gallery Comentar
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
            this.destroy();
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
            imgElement.src = data.videoPosterUrl || '/assets/default-img/no-preview-image.jpg';
            imgElement.style.backgroundColor = (data.videoPosterUrl) ? 'transparent' : '#e0e0e0';
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
class UploadedCommentarMediaManager {
    constructor() {
        this.initOptimizations();
        this.mediaData = [];
        this.state = {
            currentMediaIndex: 0,
            isNavigating: false
        };
        this.modal = null;
        this.elements = {};

        this.initManager();
    }

    // ===== INITIALIZATION METHODS =====

    // Inisialisasi utama manager
    initManager() {
        this.bindAllElements();
        this.initBootstrapModal();
        this.bindAllEvents();
        this.bindTriggerEvents();
        this.extractMediaFromHTML();
    }

    // Bind semua elemen DOM yang dibutuhkan
    bindAllElements() {
        // Modal utama
        this.elements.uploadedModal = document.getElementById('modalUploadedCommentarMedia');

        // Container media utama
        this.elements.mainImageContainer = this.elements.uploadedModal.querySelector('.main-image-container');
        this.elements.displayedImage = this.elements.uploadedModal.querySelector('.displayed-image');
        this.elements.displayedVideo = this.elements.uploadedModal.querySelector('.displayed-media');

        // Tombol navigasi
        this.elements.prevBtn = this.elements.uploadedModal.querySelector('#prevImageBtn');
        this.elements.nextBtn = this.elements.uploadedModal.querySelector('#nextImageBtn');

        // Sidebar thumbnail
        this.elements.thumbnailList = this.elements.uploadedModal.querySelector('.thumbnail-list');

        // Info komentar
        this.elements.commentUserAvatar = this.elements.uploadedModal.querySelector('.comment-user-avatar');
        this.elements.commentUserName = this.elements.uploadedModal.querySelector('.comment-user-name');
        this.elements.commentRating = this.elements.uploadedModal.querySelector('.comment-rating');
        this.elements.commentDate = this.elements.uploadedModal.querySelector('.comment-date');
        this.elements.commentText = this.elements.uploadedModal.querySelector('.comment-text-content');
    }

    // Inisialisasi Bootstrap modal
    initBootstrapModal() {
        if (this.elements.uploadedModal) {
            this.modal = new bootstrap.Modal(this.elements.uploadedModal);
        }
    }

    // Bind semua event listeners
    bindAllEvents() {
        this.bindNavigationEvents();
        this.bindModalEvents();
        this.bindResizeEvents();
    }

    // ===== DATA EXTRACTION METHODS =====

    // Extract media data dari HTML yang ada
    extractMediaFromHTML() {
        this.mediaData = [];

        // Cari semua media items dari HTML
        const mediaItems = document.querySelectorAll('.comment-media .media-item');

        mediaItems.forEach((item, index) => {
            const mediaIndex = item.dataset.mediaIndex || index;
            const videoElement = item.querySelector('video'); // Ambil video element untuk poster
            const videoSource = item.querySelector('video source'); // Ambil source untuk URL video
            const imageElement = item.querySelector('img');

            let mediaObj = {
                id: index + 1,
                htmlElement: item,
                mediaIndex: parseInt(mediaIndex),
                userName: 'User Upload', // Default, bisa diambil dari parent comment
                userAvatar: '',
                rating: 5, // Default
                commentDate: '2 jam lalu', // Default
                commentText: 'Media upload dari komentar user.'
            };

            if (videoElement && videoSource) {
                mediaObj.type = 'video';
                mediaObj.videoUrl = videoSource.src; // URL video dari source
                mediaObj.videoPosterUrl = videoElement.poster || ''; // Poster dari video element
                mediaObj.thumbnailUrl = videoElement.poster || '/assets/default-img/no-preview-image.jpg';
            } else if (imageElement) {
                mediaObj.type = 'image';
                mediaObj.imageUrl = imageElement.src;
                mediaObj.thumbnailUrl = imageElement.src;
            }

            // Coba ambil data dari parent comment jika ada
            const parentComment = item.closest('.single-comentar');
            if (parentComment) {
                const userNameEl = parentComment.querySelector('.comment-user-name');
                const userAvatarEl = parentComment.querySelector('.comment-user-avatar');
                const ratingEl = parentComment.querySelector('.comment-rating');
                const dateEl = parentComment.querySelector('.comment-date');
                const textEl = parentComment.querySelector('.comment-text-content');

                if (userNameEl) mediaObj.userName = userNameEl.textContent.trim();
                if (userAvatarEl) mediaObj.userAvatar = userAvatarEl.src;
                if (ratingEl) {
                    const filledStars = ratingEl.querySelectorAll('.bi-star-fill').length;
                    mediaObj.rating = filledStars;
                }
                if (dateEl) mediaObj.commentDate = dateEl.textContent.trim();
                if (textEl) mediaObj.commentText = textEl.textContent.trim();
            }

            this.mediaData.push(mediaObj);
        });

        console.log('Extracted media data:', this.mediaData);
    }

    // ===== TRIGGER EVENTS =====

    // Bind trigger events untuk membuka modal
    bindTriggerEvents() {
        // Event delegation untuk semua media items
        document.addEventListener('click', (e) => {
            const mediaItem = e.target.closest('.media-item');
            if (mediaItem) {
                e.preventDefault();
                const clickedIndex = parseInt(mediaItem.dataset.mediaIndex) || 0;
                this.openModalAtIndex(clickedIndex);
            }
        });
    }

    // Buka modal pada index tertentu
    openModalAtIndex(targetIndex) {
        // Cari index yang sesuai dalam mediaData
        const dataIndex = this.mediaData.findIndex(item => item.mediaIndex === targetIndex);
        const actualIndex = dataIndex >= 0 ? dataIndex : 0;

        this.state.currentMediaIndex = actualIndex;

        if (this.mediaData.length > 0) {
            this.showMediaAtIndex(actualIndex);

            if (this.modal) {
                this.modal.show();
            }
        }
    }

    // ===== OPTIMIZATION METHODS =====

    // Inisialisasi optimisasi performance
    initOptimizations() {
        this.mediaCache = new Map();
        this.activeVideo = null;
        this.videoThumbnailCache = new Map();

        // Debounced navigation untuk prevent spam
        this.debouncedNavigate = this.createDebounce(this.navigateToMedia.bind(this), 150);
    }

    // Utility function untuk debounce
    createDebounce(func, wait) {
        let timeout;
        return function executedFunction(...args) {
            const later = () => {
                clearTimeout(timeout);
                func(...args);
            };
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
        };
    }

    // ===== UTILITY METHODS =====

    // Generate rating stars HTML
    generateStarsRating(rating) {
        let starsHtml = '';
        for (let i = 1; i <= 5; i++) {
            starsHtml += `<i class="bi ${i <= rating ? 'bi-star-fill' : 'bi-star'}"></i>`;
        }
        return starsHtml;
    }

    // Validasi index media
    isValidMediaIndex(index) {
        return index >= 0 && index < this.mediaData.length;
    }

    // Deteksi mobile device
    isMobileDevice() {
        return window.innerWidth < 992;
    }

    // Get MIME type untuk video
    getVideoMimeType(url) {
        const extension = url.split('.').pop().toLowerCase();
        switch (extension) {
            case 'mp4': return 'video/mp4';
            case 'webm': return 'video/webm';
            case 'ogg': return 'video/ogg';
            case 'mov': return 'video/quicktime';
            default: return 'video/mp4';
        }
    }

    // ===== MEDIA ELEMENT CREATION METHODS =====

    // Buat elemen gambar dengan error handling
    createImageElement(data) {
        const img = document.createElement('img');
        img.src = data.imageUrl;
        img.alt = `Upload by ${data.userName}`;
        img.className = 'displayed-image w-100 h-auto';
        img.loading = 'lazy';

        img.addEventListener('error', () => {
            console.error('Image failed to load:', data.imageUrl);
            img.src = '/assets/default-img/no-preview-image.jpg';
        });

        return img;
    }

    // Buat elemen video dengan poster
    createVideoElement(data) {
        const video = document.createElement('video');

        // Set poster
        if (data.videoPosterUrl && data.videoPosterUrl.trim() !== '') {
            video.poster = data.videoPosterUrl;
            video.style.backgroundColor = 'transparent';
        } else {
            video.poster = '/assets/default-img/no-preview-image.jpg';
            video.style.backgroundColor = '#e0e0e0';
        }

        video.className = 'displayed-media w-100 h-auto';
        video.controls = true;
        video.tabIndex = 0;
        video.playsInline = true;
        video.preload = 'metadata';

        // Buat source element
        const source = document.createElement('source');
        source.src = data.videoUrl;
        source.type = this.getVideoMimeType(data.videoUrl);
        video.appendChild(source);
        video.appendChild(document.createTextNode('Browser tidak mendukung format video ini.'));

        return video;
    }

    // Buat play icon untuk thumbnail video
    createPlayIconThumbnail() {
        const icon = document.createElement('span');
        icon.className = 'thumb-play-icon position-absolute top-50 start-50 translate-middle';
        icon.innerHTML = '<i class="bi bi-play-circle-fill fs-5 text-white"></i>';
        icon.style.cssText = 'pointer-events: none; opacity: 0.85; z-index: 2;';
        return icon;
    }

    // ===== EVENT BINDING METHODS =====

    // Bind navigation events
    bindNavigationEvents() {
        if (this.elements.prevBtn) {
            this.elements.prevBtn.addEventListener('click', () => this.debouncedNavigate(-1));
        }

        if (this.elements.nextBtn) {
            this.elements.nextBtn.addEventListener('click', () => this.debouncedNavigate(1));
        }
    }

    // Bind modal events
    bindModalEvents() {
        if (this.elements.uploadedModal) {
            this.elements.uploadedModal.addEventListener('hidden.bs.modal', () => {
                this.cleanupActiveVideo();
            });
        }
    }

    // Bind resize events untuk responsiveness
    bindResizeEvents() {
        window.addEventListener('resize', this.createDebounce(() => {
            this.updateThumbnailLayout();
        }, 250));
    }

    // ===== NAVIGATION METHODS =====

    // Navigasi ke media dengan direction
    navigateToMedia(direction) {
        if (this.state.isNavigating) return;

        const newIndex = this.state.currentMediaIndex + direction;
        if (this.isValidMediaIndex(newIndex)) {
            this.showMediaAtIndex(newIndex);
        }
    }

    // Tampilkan media pada index tertentu
    showMediaAtIndex(index) {
        if (!this.isValidMediaIndex(index) || !this.elements.mainImageContainer) return;

        this.state.isNavigating = true;

        try {
            this.cleanupActiveVideo();
            this.state.currentMediaIndex = index;
            const data = this.mediaData[index];

            this.renderMainMedia(data);
            this.updateCommentSection(data);
            this.updateThumbnailsDisplay();
            this.updateNavigationButtons();

        } catch (error) {
            console.error('Error menampilkan media:', error);
        } finally {
            this.state.isNavigating = false;
        }
    }

    // ===== MAIN MEDIA RENDERING METHODS =====

    // Render media utama
    renderMainMedia(data) {
        if (!this.elements.mainImageContainer || !data) return;

        // Cleanup dan hide semua media
        this.cleanupActiveVideo();
        this.hideAllMediaElements();

        try {
            if (data.type === 'video') {
                this.renderVideoMedia(data);
            } else {
                this.renderImageMedia(data);
            }
        } catch (error) {
            console.error('Error rendering media:', error);
        }

        this.updateNavigationButtons();
    }

    // Render video media
    renderVideoMedia(data) {
        let videoElement = this.createVideoElement(data);

        // Replace video element
        if (this.elements.displayedVideo && this.elements.displayedVideo.parentNode) {
            this.elements.displayedVideo.parentNode.replaceChild(videoElement, this.elements.displayedVideo);
            this.elements.displayedVideo = videoElement;
        }

        // Load video setelah DOM ready
        setTimeout(() => {
            videoElement.load();
        }, 50);

        this.setActiveVideo(videoElement);
        this.showVideoElement();
    }

    // Render image media
    renderImageMedia(data) {
        const cacheKey = `image_${data.imageUrl}`;
        let imageElement;

        // Gunakan cache untuk image
        if (this.mediaCache.has(cacheKey)) {
            imageElement = this.mediaCache.get(cacheKey).cloneNode(true);
        } else {
            imageElement = this.createImageElement(data);
            this.mediaCache.set(cacheKey, imageElement.cloneNode(true));
        }

        // Replace image element
        if (this.elements.displayedImage && this.elements.displayedImage.parentNode) {
            this.elements.displayedImage.parentNode.replaceChild(imageElement, this.elements.displayedImage);
            this.elements.displayedImage = imageElement;
        }

        this.showImageElement();
    }

    // ===== MEDIA VISIBILITY METHODS =====

    // Hide semua elemen media
    hideAllMediaElements() {
        if (this.elements.displayedImage) {
            this.elements.displayedImage.style.display = 'none';
        }
        if (this.elements.displayedVideo) {
            this.elements.displayedVideo.style.display = 'none';
        }
    }

    // Show image element
    showImageElement() {
        if (this.elements.displayedImage) {
            this.elements.displayedImage.style.display = 'block';
        }
        if (this.elements.displayedVideo) {
            this.elements.displayedVideo.style.display = 'none';
        }
    }

    // Show video element
    showVideoElement() {
        if (this.elements.displayedVideo) {
            this.elements.displayedVideo.style.display = 'block';
        }
        if (this.elements.displayedImage) {
            this.elements.displayedImage.style.display = 'none';
        }
    }

    // ===== VIDEO MANAGEMENT METHODS =====

    // Set active video dan pause yang lain
    setActiveVideo(video) {
        if (this.activeVideo && this.activeVideo !== video) {
            this.activeVideo.pause();
        }
        this.activeVideo = video;
    }

    // Cleanup active video
    cleanupActiveVideo() {
        if (this.activeVideo) {
            this.activeVideo.pause();
            this.activeVideo.removeAttribute('src');
            this.activeVideo.load();
            this.activeVideo = null;
        }
    }

    // ===== COMMENT SECTION METHODS =====

    // Update section komentar
    updateCommentSection(data) {
        if (this.elements.commentUserName) {
            this.elements.commentUserName.textContent = data.userName;
        }
        if (this.elements.commentUserAvatar && data.userAvatar) {
            this.elements.commentUserAvatar.src = data.userAvatar;
        }
        if (this.elements.commentRating) {
            this.elements.commentRating.innerHTML = this.generateStarsRating(data.rating);
        }
        if (this.elements.commentDate) {
            this.elements.commentDate.textContent = data.commentDate;
        }
        if (this.elements.commentText) {
            this.elements.commentText.textContent = data.commentText;
        }
    }

    // ===== THUMBNAIL METHODS =====

    // Setup layout thumbnail container
    setupThumbnailLayout() {
        if (!this.elements.thumbnailList) return;

        const classList = this.elements.thumbnailList.classList;
        classList.remove('flex-column', 'flex-row', 'align-items-center');
        classList.add('d-flex', 'align-items-center');

        if (this.isMobileDevice()) {
            classList.add('flex-row');
        } else {
            classList.add('flex-column');
        }
    }

    // Buat elemen thumbnail
    createThumbnailElement(data, index) {
        const wrapper = document.createElement('div');
        wrapper.className = 'thumbnail-item';
        wrapper.dataset.index = index;

        let mediaEl;
        if (data.type === 'video') {
            mediaEl = document.createElement('video');

            // Set video poster
            if (data.videoPosterUrl && data.videoPosterUrl.trim() !== '') {
                mediaEl.poster = data.videoPosterUrl;
            } else {
                mediaEl.poster = '/assets/default-img/no-preview-image.jpg';
            }

            mediaEl.alt = `Thumbnail video by ${data.userName}`;
            mediaEl.muted = true;
            mediaEl.playsInline = true;
            mediaEl.preload = 'none';

            wrapper.appendChild(mediaEl);
            wrapper.appendChild(this.createPlayIconThumbnail());
        } else {
            mediaEl = document.createElement('img');
            mediaEl.src = data.thumbnailUrl || data.imageUrl;
            mediaEl.alt = `Thumbnail image by ${data.userName}`;
            mediaEl.loading = 'lazy';

            mediaEl.addEventListener('error', () => {
                mediaEl.src = '/assets/default-img/no-preview-image.jpg';
            });

            wrapper.appendChild(mediaEl);
        }

        // Highlight active thumbnail
        if (index === this.state.currentMediaIndex) {
            wrapper.classList.add('active-thumbnail');
        }

        // Click handler dengan debounce
        wrapper.addEventListener('click', this.createDebounce(() => {
            if (!this.state.isNavigating) {
                this.showMediaAtIndex(index);
            }
        }, 200));

        return wrapper;
    }

    // Update tampilan thumbnails
    updateThumbnailsDisplay() {
        if (!this.elements.thumbnailList) return;

        const fragment = document.createDocumentFragment();

        this.elements.thumbnailList.innerHTML = '';
        this.setupThumbnailLayout();

        this.mediaData.forEach((data, index) => {
            const thumbnailElement = this.createThumbnailElement(data, index);
            fragment.appendChild(thumbnailElement);
        });

        this.elements.thumbnailList.appendChild(fragment);
        this.updateActiveThumbnail();
    }

    // Update thumbnail layout responsive
    updateThumbnailLayout() {
        if (!this.elements.thumbnailList) return;
        this.setupThumbnailLayout();
    }

    // Update active thumbnail highlight
    updateActiveThumbnail() {
        if (!this.elements.thumbnailList) return;

        this.elements.thumbnailList.querySelectorAll('.thumbnail-item').forEach((thumb, idx) => {
            if (idx === this.state.currentMediaIndex) {
                thumb.classList.add('active-thumbnail');
                thumb.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
            } else {
                thumb.classList.remove('active-thumbnail');
            }
        });
    }

    // ===== NAVIGATION BUTTON METHODS =====

    // Update status navigation buttons
    updateNavigationButtons() {
        const isFirst = this.state.currentMediaIndex === 0;
        const isLast = this.state.currentMediaIndex === this.mediaData.length - 1;

        if (this.elements.prevBtn) {
            this.elements.prevBtn.disabled = isFirst;
        }
        if (this.elements.nextBtn) {
            this.elements.nextBtn.disabled = isLast;
        }
    }

    // ===== PUBLIC API METHODS =====

    // Refresh data dari HTML (untuk update dinamis)
    refreshMediaData() {
        this.extractMediaFromHTML();
        if (this.state.currentMediaIndex >= this.mediaData.length) {
            this.state.currentMediaIndex = Math.max(0, this.mediaData.length - 1);
        }
    }

    // Buka modal dengan data tertentu (untuk compatibility)
    openModalWithData(commentData) {
        if (commentData && commentData.length > 0) {
            this.mediaData = commentData;
            this.state.currentMediaIndex = 0;

            this.showMediaAtIndex(0);

            if (this.modal) {
                this.modal.show();
            }
        }
    }

    // Tutup modal
    closeModal() {
        if (this.modal) {
            this.modal.hide();
        }
    }

    // ===== CLEANUP METHODS =====

    // Destroy manager dan cleanup resources
    destroyManager() {
        this.cleanupActiveVideo();
        if (this.mediaCache) {
            this.mediaCache.clear();
        }
        if (this.videoThumbnailCache) {
            this.videoThumbnailCache.clear();
        }
    }
}

// Inisialisasi manager ketika DOM ready
document.addEventListener('DOMContentLoaded', () => {
    window.uploadedCommentarMediaManager = new UploadedCommentarMediaManager();
});
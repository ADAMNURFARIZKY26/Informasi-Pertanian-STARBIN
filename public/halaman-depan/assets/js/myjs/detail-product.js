// !!LOGIKA FRONTEND NYA SAJA!! //                                 

// Image Gallery Functions
function changeImage(thumbnail, imageSrc) {
    // Remove active class from all thumbnails
    document.querySelectorAll('.product-thumbnail').forEach(thumb => {
        thumb.classList.remove('active');
    });

    // Add active class to clicked thumbnail
    thumbnail.classList.add('active');

    // Change main image
    document.getElementById('mainImage').src = imageSrc;
}

// Quantity Functions
function increaseQuantity() {
    const input = document.getElementById('quantityInput');
    let currentValue = parseInt(input.value);
    if (currentValue < 47) { // Max stock
        input.value = currentValue + 1;
    }
}

function decreaseQuantity() {
    const input = document.getElementById('quantityInput');
    let currentValue = parseInt(input.value);
    if (currentValue > 1) {
        input.value = currentValue - 1;
    }
}

// Variant Selection
function selectVariant(element) {
    // Remove selected class from all variants
    document.querySelectorAll('.variant-option').forEach(variant => {
        variant.classList.remove('selected');
    });

    // Add selected class to clicked variant
    element.classList.add('selected');

    // Update price based on variant (example logic)
    const priceElement = document.querySelector('.price-current');
    const originalPriceElement = document.querySelector('.price-original');

    if (element.textContent === '100 Gr') {
        priceElement.textContent = 'Rp72.750';
        originalPriceElement.textContent = 'Rp97.000';
    } else if (element.textContent === '200 Gr') {
        priceElement.textContent = 'Rp135.000';
        originalPriceElement.textContent = 'Rp180.000';
    } else {
        priceElement.textContent = 'Rp48.750';
        originalPriceElement.textContent = 'Rp65.000';
    }
}

// Add to cart animation (example)
// document.addEventListener('DOMContentLoaded', function () {
//     const addToCartBtn = document.querySelector('.btn-outline-custom');
//     const buyNowBtn = document.querySelector('.btn-primary-custom');

//     addToCartBtn.addEventListener('click', function () {
//         this.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Menambahkan...';
//         setTimeout(() => {
//             this.innerHTML = '<i class="fas fa-check me-2"></i>Ditambahkan';
//             setTimeout(() => {
//                 this.innerHTML = '+ Keranjang';
//             }, 1500);
//         }, 1000);
//     });

//     buyNowBtn.addEventListener('click', function () {
//         this.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Memproses...';
//         setTimeout(() => {
//             alert('Redirect ke halaman checkout...');
//             this.innerHTML = 'Beli Langsung';
//         }, 1500);
//     });
// });

// Quantity
let currentQuantity = 1;
const basePrice = 9800;

function updateQuantity(newQuantity) {
    if (newQuantity >= 1 && newQuantity <= 9223) {
        currentQuantity = newQuantity;
        const quantityInput = document.getElementById('quantityInput');
        const subtotalPrice = document.getElementById('subtotalPrice');

        // Update values
        quantityInput.value = currentQuantity;
        subtotalPrice.textContent = `Rp${(basePrice * currentQuantity).toLocaleString('id-ID')}`;
    }
}

function increaseQuantity() {
    updateQuantity(currentQuantity + 1);
}

function decreaseQuantity() {
    updateQuantity(currentQuantity - 1);
}

// Tambahkan event listener untuk input manual pada quantityInput
const quantityInput = document.getElementById('quantityInput');
if (quantityInput) {
    quantityInput.addEventListener('input', function () {
        let val = parseInt(this.value.replace(/[^0-9]/g, ''));
        if (isNaN(val) || val < 1) val = 1;
        if (val > 9223) val = 9223;
        updateQuantity(val);
    });
}

// Add keyboard support for quantity input
document.getElementById('quantityInput').addEventListener('keydown', function (e) {
    if (e.key === 'ArrowUp') {
        e.preventDefault();
        increaseQuantity();
    } else if (e.key === 'ArrowDown') {
        e.preventDefault();
        decreaseQuantity();
    }
});

// Add click handlers for better user experience
document.querySelectorAll('.btn-icon-text').forEach(button => {
    button.addEventListener('click', function () {
        const action = this.querySelector('span').textContent;
        console.log(`${action} button clicked`);
        // You can add specific functionality for each action here
    });
});

// Function untuk toggle komentar yang melebihi batas
function toggleComment(commentId, button) {
    const textElement = document.getElementById(commentId);
    const isCollapsed = textElement.classList.contains('collapsed');

    if (isCollapsed) {
        // Expand the text
        textElement.classList.remove('collapsed');
        button.textContent = 'Sembunyikan';
    } else {
        // Collapse the text
        textElement.classList.add('collapsed');
        button.textContent = 'Selengkapnya';
    }
}

// Function Untuk mentoggle balasan komentar
function toggleReplies(repliesId, button) {
    const repliesSection = document.getElementById(repliesId);
    const dropdownIcon = button.querySelector('.dropdown-icon');
    const toggleText = button.querySelector('span:first-child');

    if (repliesSection.style.display === 'none' || repliesSection.style.display === '') {
        // Show replies
        repliesSection.style.display = 'block';
        dropdownIcon.classList.add('rotated');
        toggleText.textContent = 'Tutup Balasan';
    } else {
        // Hide replies
        repliesSection.style.display = 'none';
        dropdownIcon.classList.remove('rotated');
        toggleText.textContent = 'Lihat Balasan';
    }
}

// Initialize collapsed state for long comments
document.addEventListener('DOMContentLoaded', function () {
    // Check each comment text to determine if it needs the "Selengkapnya" button
    document.querySelectorAll('.comment-text').forEach(function (textElement) {
        const button = textElement.parentElement.querySelector('.toggle-button');
        if (button) {
            // If text is short, hide the toggle button
            if (textElement.scrollHeight <= textElement.clientHeight * 3) {
                button.style.display = 'none';
                textElement.classList.remove('collapsed');
            }
        }
    });
});

// Function to toggle comment text expansion
function toggleComment(textId, button) {
    const textElement = document.getElementById(textId);
    const isCollapsed = textElement.classList.contains('collapsed');

    if (isCollapsed) {
        textElement.classList.remove('collapsed');
        button.textContent = 'Sembunyikan';
    } else {
        textElement.classList.add('collapsed');
        button.textContent = 'Selengkapnya';
    }
}

// Function to toggle replies section
function toggleReplies(repliesId, toggleElement) {
    const repliesSection = document.getElementById(repliesId);
    const isHidden = repliesSection.style.display === 'none';

    if (isHidden) {
        repliesSection.style.display = 'block';
        toggleElement.classList.add('expanded');
        toggleElement.querySelector('span:first-child').textContent = 'Sembunyikan Balasan';
    } else {
        repliesSection.style.display = 'none';
        toggleElement.classList.remove('expanded');
        toggleElement.querySelector('span:first-child').textContent = 'Lihat Balasan';
    }
}

// Function to toggle filter sections
function toggleFilterSection(titleElement) {
    const section = titleElement.parentElement;
    section.classList.toggle('collapsed');
}

// Function to toggle checkbox states
function toggleCheckbox(optionElement) {
    const checkbox = optionElement.querySelector('.filter-comment-checkbox');
    checkbox.classList.toggle('checked');
}

// Function to toggle product description
function toggleDescription() {
    const shortDesc = document.getElementById('shortDescription');
    const fullDesc = document.getElementById('fullDescription');
    const btn = document.getElementById('toggleDescription');
    if (fullDesc.style.display === 'none' || fullDesc.style.display === '') {
        shortDesc.style.display = 'none';
        fullDesc.style.display = 'block';
        btn.textContent = 'Tutup';
    } else {
        shortDesc.style.display = 'block';
        fullDesc.style.display = 'none';
        btn.textContent = 'Lihat Selengkapnya';
    }
}

// Logic Counter media pembeli pada komentar
// Dummy data gambar (nanti ganti pakai data asli dari backend)
//   const photoList = [
//     // 'https://source.unsplash.com/random/1',
//     // 'https://source.unsplash.com/random/2',
//     // 'https://source.unsplash.com/random/3',
//     // 'https://source.unsplash.com/random/4',
//     // 'https://source.unsplash.com/random/5',
//     // 'https://source.unsplash.com/random/6',
//     // 'https://source.unsplash.com/random/7',
//     // 'https://source.unsplash.com/random/8',
//     // 'https://source.unsplash.com/random/9'
//   ];

//   const galleryContainer = document.getElementById('photoGalleryContainer');
//   const maxVisible = 6;

//   // Hapus konten sebelumnya (kalau ada)
//   galleryContainer.innerHTML = '';

//   // Loop gambar dan sisipkan
//   photoList.forEach((src, index) => {
//     if (index < maxVisible) {
//       const wrapper = document.createElement('div');
//       wrapper.className = 'commentar-media rounded overflow-hidden';
//       wrapper.id = 'commentarMedia';

//       wrapper.innerHTML = `
//         <img src="${src}" class="img-fluid h-100 w-100 object-fit-contain rounded" alt="Foto pembeli ${index + 1}">
//       `;

//       galleryContainer.appendChild(wrapper);
//     }
//   });

//   // Tambahkan photo counter jika ada lebih
//   if (photoList.length > maxVisible) {
//     const remainingCount = photoList.length - maxVisible;

//     const counterWrapper = document.createElement('div');
//     counterWrapper.className = 'more-commentar-media photo-counter position-relative d-flex align-items-center justify-content-center';
//     counterWrapper.id = 'moreCommentarMedia';

//     counterWrapper.innerHTML = `
//       <img src="${photoList[maxVisible]}" class="img-fluid h-100 w-100 object-fit-contain opacity-25 rounded" alt="Foto pembeli lainnya">
//       <span class="photo-counter-text position-absolute fw-semibold">+${remainingCount}</span>
//     `;

//     galleryContainer.appendChild(counterWrapper);
//   }

@extends('layouts.admin.main')
@section('title', 'Dashboard')
@section('thisPage')
<li class="nav-item d-none d-sm-inline-block">
    <a href="{{route('admin.sosmedView')}}" class="nav-link">Sosial Media</a>
</li>
@endsection
@section('content')
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.1/font/bootstrap-icons.min.css" rel="stylesheet">
<link rel="stylesheet" href="{{asset('dashboard-admin/dist/css/mycss/sosmed.css')}}">
<meta name="csrf-token" content="{{ csrf_token() }}">


@if (session('success'))
<div class="custom-alert alert-success" id="flash-success">
    <strong>Sukses!</strong> {{ session('success') }}
</div>
@endif

@if (session('error'))
<div class="custom-alert alert-danger" id="flash-error">
    <strong>Gagal!</strong> {{ session('error') }}
</div>
@endif

<div class="main-container">
    <div class="container-fluid">

        <!-- Form Tambah/Edit Link -->
        <div class="modern-card">
            <div class="card-header-modern">
                <h5>
                    <i class="bi bi-pencil-square me-2"></i>
                    Tambah/Edit Link Sosial Media
                </h5>
            </div>
            <div class="card-body-modern">
                <form id="formSocialLink" method="POST" action="{{ route('sosmed.store') }}">
                    @csrf
                    <input type="hidden" id="socialLinkId" name="id">
                    <input type="hidden" id="icon" name="icon">

                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="platform" class="form-label fw-semibold text-muted mb-2">Platform</label>
                            <select id="platform" name="platform" class="form-select form-select-modern" required>
                                <option value="" disabled selected>Pilih platform</option>
                                <option value="tiktok" data-icon="bi bi-tiktok">TikTok</option>
                                <option value="instagram" data-icon="bi bi-instagram">Instagram</option>
                                <option value="facebook" data-icon="bi bi-facebook">Facebook</option>
                                <option value="youtube" data-icon="bi bi-youtube">YouTube</option>
                                <option value="whatsapp" data-icon="bi bi-whatsapp">WhatsApp</option>
                                <option value="maps" data-icon="bi bi-geo-alt-fill">Mpas</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="url" class="form-label fw-semibold text-muted mb-2">URL</label>
                            <input type="url" id="url" name="url" class="form-control form-control-modern" placeholder="https://example.com" required>
                        </div>
                    </div>

                    <div id="icon-preview" class="icon-preview"></div>

                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-modern btn-success-modern">
                            <i class="bi bi-check-circle me-2"></i>
                            Simpan
                        </button>
                        <button type="button" class="btn btn-modern btn-outline-danger-modern ms-2" onclick="resetForm()">
                            <i class="bi bi-x-circle me-2"></i>
                            Reset
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Daftar Link Sosial Media -->
        <div class="modern-card">
            <div class="card-header-modern">
                <h5>
                    <i class="bi bi-list me-2"></i>
                    Daftar Link Sosial Media
                </h5>
            </div>
            <div class="card-body-modern">
                <!-- Input Pencarian -->
                <div class="search-container">
                    <div class="input-group">
                        <input
                            type="text"
                            id="search-link"
                            class="form-control form-control-modern"
                            placeholder="Cari berdasarkan Platform atau URL..."
                            onkeyup="searchLink()">
                        <button
                            class="btn btn-outline-danger-modern"
                            onclick="resetSearchLink()">
                            <i class="bi bi-x-circle me-1"></i> Bersihkan
                        </button>
                    </div>
                </div>

                <div class="table-container">
                    <table class="table table-modern">
                        <thead>
                            <tr>
                                <th style="width: 60px;">No</th>
                                <th style="width: 80px;">Ikon</th>
                                <th>Platform</th>
                                <th>URL</th>
                                <th style="width: 150px;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="data-link">
                            @forelse ($sosmed as $index => $item)
                            <tr data-id="{{ $item->id }}">
                                <td>
                                    <div class="fw-bold text-primary">{{ $index + 1 }}</div>
                                </td>
                                <td>
                                    <div class="icon-display">
                                        <i class="{{ $item->icon }}"></i>
                                    </div>
                                </td>
                                <td>
                                    <div class="fw-semibold">{{ ucfirst($item->judul) }}</div>
                                </td>
                                <td>
                                    <a href="{{ $item->url }}" target="_blank" class="url-link">
                                        {{ $item->url }}
                                    </a>
                                </td>
                                <td>
                                    <div class="action-buttons">
                                        <button class="btn btn-modern btn-warning-modern btn-sm-modern"
                                            onclick="editLink({ id: {{ $item->id }}, platform: '{{ $item->judul }}', url: '{{ $item->url }}', icon: '{{ $item->icon }}' })" title="Edit">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>
                                        <button class="btn btn-modern btn-danger-modern btn-sm-modern"
                                            onclick="deleteLink({{ $item->id }})" title="Hapus">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5">
                                    <div class="text-center fw-bold text-muted py-3">
                                        <i class="bi bi-exclamation-circle"></i> Belum ada data sosial media.
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{asset('authentikasi/sign-in/js/flashmassage.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
<script>
    // Fungsi Preview Ikon saat Pilih Platform
    document.getElementById('platform').addEventListener('change', function() {
        const selectedOption = this.options[this.selectedIndex];
        const iconClass = selectedOption.getAttribute('data-icon');
        const platformName = selectedOption.text;
        const iconPreview = document.getElementById('icon-preview');

        if (iconClass) {
            iconPreview.innerHTML = `
                <i class="${iconClass}"></i>
                <div>
                    <div class="fw-semibold text-dark">${platformName}</div>
                    <div class="icon-preview-text">${iconClass}</div>
                </div>
            `;
            iconPreview.classList.add('show');

            // Set ikon ke input hidden
            document.getElementById('icon').value = iconClass;
        } else {
            iconPreview.classList.remove('show');
            iconPreview.innerHTML = '';
            document.getElementById('icon').value = '';
        }
    });

    // Fungsi Edit Link
    function editLink(link) {
        document.getElementById('socialLinkId').value = link.id;
        document.getElementById('platform').value = link.platform;
        document.getElementById('url').value = link.url;

        // Tampilkan ikon preview
        const selectedOption = document.querySelector(`#platform option[value="${link.platform}"]`);
        if (selectedOption) {
            const iconClass = selectedOption.getAttribute('data-icon');
            const platformName = selectedOption.text;
            const iconPreview = document.getElementById('icon-preview');

            iconPreview.innerHTML = `
                <i class="${iconClass}"></i>
                <div>
                    <div class="fw-semibold text-dark">${platformName}</div>
                    <div class="icon-preview-text">${iconClass}</div>
                </div>
            `;
            iconPreview.classList.add('show');
            document.getElementById('icon').value = iconClass;
        }

        // Scroll ke form
        document.getElementById('formSocialLink').scrollIntoView({
            behavior: 'smooth'
        });
    }

    // Fungsi reset form
    function resetForm() {
        document.getElementById('socialLinkId').value = '';
        document.getElementById('platform').value = '';
        document.getElementById('url').value = '';
        document.getElementById('icon').value = '';
        document.getElementById('icon-preview').classList.remove('show');
        document.getElementById('icon-preview').innerHTML = '';
    }

    // Fungsi pencarian
    function searchLink() {
        let input = document.getElementById("search-link").value.toLowerCase();
        let rows = document.querySelectorAll("#data-link tr");

        rows.forEach(row => {
            let rowText = row.innerText.toLowerCase();

            if (rowText.includes(input)) {
                row.style.display = "";
            } else {
                row.style.display = "none";
            }
        });
    }

    function resetSearchLink() {
        document.getElementById("search-link").value = "";
        searchLink();
    }
    
    function deleteLink(id) {
        Swal.fire({
            title: 'Apakah kamu yakin?',
            text: "Data akan dihapus secara permanen!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                fetch(`/sosmed/${id}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'Accept': 'application/json'
                    }
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Gagal menghapus data.');
                    }
                    return response.json();
                })
                .then(data => {
                    Swal.fire({
                        title: 'Berhasil!',
                        text: data.message || 'Data berhasil dihapus.',
                        icon: 'success',
                        timer: 1500,
                        showConfirmButton: false
                    });

                    // Hapus baris dari tabel
                    document.querySelector(`tr[data-id="${id}"]`).remove();
                })
                .catch(error => {
                    Swal.fire('Oops!', error.message, 'error');
                });
            }
        });
    }
</script>
@endsection
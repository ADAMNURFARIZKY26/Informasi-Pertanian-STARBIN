@extends('layouts.admin.main')
@section('title', 'KelolaStaf')
@section('thisPage')
<li class="nav-item d-none d-sm-inline-block">
    <a href="{{route('admin.stafView')}}" class="nav-link">Staf Kami</a>
</li>
@endsection
@section('content')

@if (session('success'))
<div class="custom-alert alert-success" id="flash-success">
    <strong>Sukses!</strong> {{ session('success') }}
</div>
@endif

@if($errors->any())
<div class="custom-alert alert-danger" id="flash-error">
    <strong>Error!</strong> {{ session('error') }}
</div>
@endif

<link rel="stylesheet" href="{{asset('dashboard-admin/dist/css/mycss/staf.css')}}">
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.1/font/bootstrap-icons.min.css" rel="stylesheet">
<meta name="csrf-token" content="{{ csrf_token() }}">


<div class="container">
    <div class="header">
        <h1>Staff Management System</h1>
        <p>Kelola data staff dengan mudah dan efisien</p>
    </div>

    <div class="content">
        <!-- Form Section -->
        <div class="form-section fade-in">
            <h2>Tambah/Edit Staff</h2>
            <form id="formStaff" method="POST" action="{{ route('staff.store') }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" id="staffId" name="id">

                <input type="hidden" id="icon" name="icon" value="">
                <div class="form-grid">
                    <div class="form-group">
                        <label for="nama">Nama Lengkap *</label>
                        <input type="text" id="nama" name="nama" required placeholder="Masukkan nama lengkap">
                    </div>
                    <div class="form-group">
                        <label for="tanggal_lahir">Tanggal Lahir *</label>
                        <input type="date" id="tanggal_lahir" name="tanggal_lahir" required>
                    </div>
                    <div class="form-group">
                        <label for="nomor">Nomor Telepon *</label>
                        <input type="tel" id="nomor" name="nomor" required placeholder="08xxxxxxxxx">
                    </div>
                    <div class="form-group">
                        <label for="email">Email *</label>
                        <input type="email" id="email" name="email" required placeholder="example@gmail.com">
                    </div>
                    <div class="form-group">
                        <label for="foto">Email *</label>
                        <input type="file" id="foto" name="foto" required placeholder="Masukan Foto" style="cursor: pointer;">
                    </div>
                </div>
                <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea id="deskripsi" name="deskripsi" placeholder="Deskripsi tentang staff..."></textarea>
                </div>

                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-modern btn-success">
                        <i class="bi bi-check-circle me-2"></i>
                        Simpan
                    </button>
                    <button type="button" class="btn btn-modern btn-danger ms-2" onclick="resetForm()">
                        <i class="bi bi-x-circle me-2"></i>
                        Reset
                    </button>
                </div>
            </form>
        </div>

        <div class="table-section fade-in">
            <div class="table-header">
                <h2>Daftar Staff</h2>
            </div>
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
                        class="btn btn-danger"
                        onclick="resetSearchLink()">
                        <i class="bi bi-x-circle me-1"></i> Bersihkan
                    </button>
                </div>
            </div>
            <div class="table-container">
                <table id="staffTable" class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Profil</th>
                            <th>Nama</th>
                            <th>Tanggal Lahir</th>
                            <th>Nomor</th>
                            <th>Email</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="data-staff">
                        @forelse ($staf as $index => $item)
                        <tr data-id="{{ $item->id }}">
                            <td>{{ $index + 1 }}</td>
                            <td>
                                <img src="{{ asset('pictures/staf/' . $item->foto) }}"
                                    alt="Foto {{ $item->nama }}"
                                    width="50" height="50"
                                    style="object-fit: cover; border-radius: 50%;">
                            </td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ \Carbon\Carbon::parse($item->tanggal_lahir)->format('d-m-Y') }}</td>
                            <td>{{ $item->nomor }}</td>
                            <td>{{ $item->email }}</td>
                            <td>
                                <div class="action-buttons">
                                    <button class="btn btn-modern btn-warning btn-sm"
                                        onclick="editStaff({{ json_encode($item) }})" title="Edit">
                                        <i class="bi bi-pencil-square"></i>
                                    </button>
                                    <button class="btn btn-modern btn-danger btn-sm"
                                        onclick="deleteStaff({{ $item->id }})" title="Hapus">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center py-4">
                                <strong>Belum ada data staff</strong><br>
                                Tambahkan staff pertama menggunakan form di atas.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{asset('authentikasi/sign-in/js/flashmassage.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>

<script>
    // Photo Preview Function
    document.getElementById('foto').addEventListener('change', function() {
        const file = this.files[0];
        const preview = document.getElementById('photo-preview');

        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.innerHTML = `
                    <div class="preview-container">
                        <img src="${e.target.result}" alt="Preview" class="preview-image">
                        <div class="preview-info">
                            <div class="fw-semibold text-dark">Preview Foto</div>
                            <div class="text-muted">${file.name}</div>
                        </div>
                    </div>
                `;
                preview.classList.add('show');
            };
            reader.readAsDataURL(file);
        } else {
            preview.classList.remove('show');
            preview.innerHTML = '';
        }
    });

    // Edit Staff Function
    function editStaff(staff) {
        document.getElementById('staffId').value = staff.id;
        document.getElementById('nama').value = staff.nama;
        document.getElementById('tanggal_lahir').value = staff.tanggal_lahir;
        document.getElementById('nomor').value = staff.nomor;
        document.getElementById('email').value = staff.email;
        document.getElementById('deskripsi').value = staff.deskripsi || '';

        // Show current photo
        const preview = document.getElementById('photo-preview');
        preview.innerHTML = `
            <div class="preview-container">
                <img src="/pictures/staf/${staff.foto}" alt="Current Photo" class="preview-image">
                <div class="preview-info">
                    <div class="fw-semibold text-dark">Foto Saat Ini</div>
                    <div class="text-muted">Pilih file baru untuk mengganti</div>
                </div>
            </div>
        `;
        preview.classList.add('show');

        // Make photo field optional for edit
        document.getElementById('foto').removeAttribute('required');

        // Scroll to form
        document.getElementById('formStaff').scrollIntoView({
            behavior: 'smooth'
        });
    }

    // Reset Form Function
    function resetForm() {
        document.getElementById('staffId').value = '';
        document.getElementById('nama').value = '';
        document.getElementById('tanggal_lahir').value = '';
        document.getElementById('nomor').value = '';
        document.getElementById('email').value = '';
        document.getElementById('deskripsi').value = '';
        document.getElementById('foto').value = '';

        // Reset photo preview
        document.getElementById('photo-preview').classList.remove('show');
        document.getElementById('photo-preview').innerHTML = '';

        // Make photo field required again
        document.getElementById('foto').setAttribute('required', 'required');
    }

    // Search Function
    function searchStaff() {
        let input = document.getElementById("search-staff").value.toLowerCase();
        let rows = document.querySelectorAll("#data-staff tr");

        rows.forEach(row => {
            let rowText = row.innerText.toLowerCase();

            if (rowText.includes(input)) {
                row.style.display = "";
            } else {
                row.style.display = "none";
            }
        });
    }

    function resetSearchStaff() {
        document.getElementById("search-staff").value = "";
        searchStaff();
    }

    // Delete Staff Function
    function deleteStaff(id) {
        Swal.fire({
            title: 'Apakah kamu yakin?',
            text: "Data staff akan dihapus secara permanen!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                fetch(`/staff/${id}`, {
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
                            text: data.message || 'Data staff berhasil dihapus.',
                            icon: 'success',
                            timer: 1500,
                            showConfirmButton: false
                        });

                        // Remove row from table
                        document.querySelector(`tr[data-id="${id}"]`).remove();

                        // Update row numbers
                        updateRowNumbers();
                    })
                    .catch(error => {
                        Swal.fire('Oops!', error.message, 'error');
                    });
            }
        });
    }

    // Update row numbers after deletion
    function updateRowNumbers() {
        const rows = document.querySelectorAll("#data-staff tr[data-id]");
        rows.forEach((row, index) => {
            const numberCell = row.querySelector('td:first-child .fw-bold');
            if (numberCell) {
                numberCell.textContent = index + 1;
            }
        });
    }
</script>
@endsection
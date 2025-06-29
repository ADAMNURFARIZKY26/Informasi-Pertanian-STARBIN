<?php

use App\Http\Controllers\Auth\OtpController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\DashboardAdminController;
use App\Http\Controllers\KontenLandingController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterNoverifyController;
use Illuminate\Support\Facades\Route;

// use Illuminate\Support\Facades\Mail;
// use App\Mail\OtpVerificationMail;
// Route::get('/tes-email', function () {
//     try {
//         Mail::to('fardu154@gmail.com')->send(new OtpVerificationMail(rand(100000, 999999)));
//         return '✅ Email OTP berhasil dikirim!';
//     } catch (\Exception $e) {
//         return '❌ Gagal mengirim email: ' . $e->getMessage();
//     }
// });
// Guest
// Tulis Midleware Guest
Route::middleware('guest')->group(function () {
    // Landing
    Route::get('/', [LandingController::class, 'welcome'])->name('welcome');
    Route::get('/tentangKami', [LandingController::class, 'tentangKami'])->name('tentangKami');
    Route::get('/tentangKami/detaiStaf', [LandingController::class, 'detaiStaf'])->name('detaiStaf');
    Route::get('/daftar-produk', [LandingController::class, 'listProduk'])->name('list-produk');
    Route::get('/daftar-produk/detail-produk', [LandingController::class, 'detailProduk'])->name('detail-produk');
    Route::get('/organik', [LandingController::class, 'organik'])->name('organik');
    Route::get('/organik/sayuran', [LandingController::class, 'sayuranOrganik'])->name('sayuranOrganik');
    Route::get('/organik/buah', [LandingController::class, 'buahOrganik'])->name('buahOrganik');
    Route::get('/organik/pangan', [LandingController::class, 'panganOrganik'])->name('panganOrganik');
    Route::get('/organik/herbal', [LandingController::class, 'herbalOrganik'])->name('herbalOrganik');
    Route::get('/organik/persiapan', [LandingController::class, 'persiapanOrganik'])->name('persiapanOrganik');
    Route::get('/organik/penyemaian', [LandingController::class, 'penyemaianOrganik'])->name('penyemaianOrganik');
    Route::get('/organik/penanaman', [LandingController::class, 'penanamanOrganik'])->name('penanamanOrganik');
    Route::get('/organik/perawatan', [LandingController::class, 'perawatanOrganik'])->name('perawatanOrganik');
    Route::get('/organik/pengendalian', [LandingController::class, 'pengendalianOrganik'])->name('pengendalianOrganik');
    Route::get('/organik/panen', [LandingController::class, 'panenOrganik'])->name('panenOrganik');
    Route::get('/organik//pengolahan', [LandingController::class, 'pengolahanOrganik'])->name('pengolahanOrganik');
    Route::get('/hidroponik', [LandingController::class, 'hidroponik'])->name('hidroponik');
    Route::get('/hidroponik/sayuranDaun', [LandingController::class, 'sayuranDaunHidrophonik'])->name('sayuranDaunHidrophonik');
    Route::get('/hidroponik/sayuranBuah', [LandingController::class, 'sayuranBuahHidrophonik'])->name('sayuranBuahHidrophonik');
    Route::get('/hidroponik/herbal', [LandingController::class, 'herbalHidroponik'])->name('herbalHidroponik');
    Route::get('/hidroponik/persiapan', [LandingController::class, 'persiapanHidrophonik'])->name('persiapanHidrophonik');
    Route::get('/hidroponik/penyemaian', [LandingController::class, 'penyemaianHidrophonik'])->name('penyemaianHidrophonik');
    Route::get('/hidroponik/pemeliharaan', [LandingController::class, 'pemeliharaanHidrophonik'])->name('pemeliharaanHidrophonik');
    Route::get('/hidroponik/pengendalian', [LandingController::class, 'pengendalianHidrophonik'])->name('pengendalianHidrophonik');
    Route::get('/hidroponik/panen', [LandingController::class, 'panenHidrophonik'])->name('panenHidrophonik');
    Route::get('/hidroponik/PascaPanen', [LandingController::class, 'PascaPanenHidrophonik'])->name('PascaPanenHidrophonik');
    Route::get('/blog', [LandingController::class, 'blog'])->name('blog');
    Route::get('/blog/detailBlog', [LandingController::class, 'detailBlog'])->name('detailBlog');
    Route::get('/kontak', [LandingController::class, 'kontak'])->name('kontak');

    // Auth
    Route::post('/register-noverify', [RegisterNoverifyController::class, 'create'])->name('noverify');
    require __DIR__ . '/auth.php';
    Route::get('/verify-opt-form', [OtpController::class, 'showOtpForm'])->name('verification.otp.form');
    Route::post('/verify-otp', [OtpController::class, 'verify'])->name('otp.verify');
    Route::post('/resend-otp', [OtpController::class, 'resend'])->name('otp.resend');
});
// Tulis tutup Midleware Guest
// End Guest

// Midleware Auth
Route::middleware(['auth'])->group(function () {

    // USER biasa
    Route::middleware(['role:User'])->group(function () {
        Route::get('/dashboard', function () {
            return view('user.dashboard');
        })->name('user.dashboard');
    });

    // ADMIN
    Route::middleware(['role:Admin'])->group(function () {
        Route::get('/admin/dashboard', [DashboardAdminController::class, 'index'])->name('admin.dashboard');
        Route::get('/admin/kelolaStaf', [KontenLandingController::class, 'stafView'])->name('admin.stafView');
        Route::get('/admin/kelolaProduk', [KontenLandingController::class, 'produckView'])->name('admin.produckView');
        Route::get('/admin/kelolaBlog', [KontenLandingController::class, 'blogView'])->name('admin.blogView');
        // sosmed
        Route::get('/admin/kelolaSosmed', [KontenLandingController::class, 'sosmedView'])->name('admin.sosmedView');
        Route::post('/sosmed/store', [KontenLandingController::class, 'store'])->name('sosmed.store');
        Route::delete('/sosmed/{id}', [KontenLandingController::class, 'destroy'])->name('sosmed.destroy');
    });

    // SUPER ADMIN
    Route::middleware(['role:Super Admin'])->group(function () {
        Route::get('/superadmin/dashboard', function () {
            return view('superadmin.dashboard');
        })->name('superadmin.dashboard');
    });

    // Logout
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});

// 404 route
Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});

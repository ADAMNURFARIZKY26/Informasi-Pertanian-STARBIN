<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\PendingRegistration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;

class OtpController extends Controller
{
    // 1. Tampilkan halaman verifikasi OTP
    public function showOtpForm()
    {
        $email = session('pending_registration_email');

        if (!$email) {
            return redirect()->route('register')->with('error', 'Data verifikasi tidak ditemukan.');
        }

        return view('auth.verify-email', ['email' => $email]);
    }

    // 2. Proses verifikasi OTP
    public function verifyOtp(Request $request)
    {
        $email = session('pending_registration_email');

        if (!$email) {
            return redirect()->route('register')->with('error', 'Email tidak ditemukan dalam sesi.');
        }

        $otp = implode('', [
            $request->digit1,
            $request->digit2,
            $request->digit3,
            $request->digit4,
            $request->digit5,
            $request->digit6,
        ]);

        // Cari data pending berdasarkan email
        $pending = PendingRegistration::where('email', $email)->first();

        if (!$pending || $pending->otp !== $otp) {
            return back()->with('error', 'Kode OTP salah atau tidak valid.');
        }

        // Pindahkan data ke tabel users
        $user = User::create([
            'name'              => $pending->name,
            'email'             => $pending->email,
            'password'          => $pending->password, // Sudah di-enkripsi saat pendaftaran
            'telepon'           => $pending->telepon,
            'tanggal_lahir'     => $pending->tanggal_lahir,
            'jenis_kelamin'     => $pending->jenis_kelamin,
            'email_verified_at' => now(),
        ]);

        // Hapus data sementara
        $pending->delete();

        // Hapus session
        session()->forget('pending_registration_email');

        // Arahkan ke login
        return redirect()->route('login')->with('success', 'Verifikasi berhasil! Silakan login.');
    }

    // 3. Kirim ulang OTP
    public function resendOtp(Request $request)
    {
        $email = session('pending_registration_email');

        if (!$email) {
            return redirect()->route('register')->with('error', 'Email tidak ditemukan.');
        }

        $pending = PendingRegistration::where('email', $email)->first();

        if (!$pending) {
            return redirect()->route('register')->with('error', 'Data pendaftaran tidak ditemukan.');
        }

        // Buat OTP baru
        $otp = rand(100000, 999999);

        // Update OTP di database
        $pending->update(['otp' => $otp]);

        // Kirim ulang OTP ke email
        Mail::to($email)->send(new \app\Mail\OtpVerificationMail($otp));

        return back()->with('success', 'Kode OTP baru telah dikirim ke email Anda.');
    }
}
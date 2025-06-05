<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\PendingRegistration;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Illuminate\Support\Facades\Validator;

class RegisteredUserController extends Controller
{
    /**
     * Show the registration form.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle registration logic.
     */
    public function store(Request $request): RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'name'           => ['required', 'string', 'max:255'],
            'email'          => ['required', 'string', 'email', 'max:255', 'unique:pending_registrations,email'],
            'password'       => ['required', 'string', 'min:8'],
            'telepon'        => ['required', 'string', 'max:20'],
            'tanggal_lahir'  => ['required', 'date'],
            'jenis_kelamin'  => ['required', 'in:Laki-laki,Perempuan'],
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Generate OTP 6 digit
        $otp = rand(100000, 999999);

        // Simpan data sementara
        $pending = PendingRegistration::create([
            'name'           => $request->name,
            'email'          => $request->email,
            'password'       => bcrypt($request->password),
            'telepon'        => $request->telepon,
            'tanggal_lahir'  => $request->tanggal_lahir,
            'jenis_kelamin'  => $request->jenis_kelamin,
            'otp'            => $otp,
        ]);

        // Kirim OTP ke email
        Mail::to($request->email)->send(new \App\Mail\OtpVerificationMail($otp));

        // Simpan session untuk identifikasi user yang sedang verifikasi
        session(['pending_registration_email' => $request->email]);

        // Redirect ke halaman verifikasi OTP
        return redirect()->route('verification.otp.form')->with('status', 'Kode OTP telah dikirim ke email Anda.');
    }
}

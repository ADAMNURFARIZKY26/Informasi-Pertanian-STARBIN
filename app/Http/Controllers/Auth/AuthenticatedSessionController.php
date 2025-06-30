<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\User;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $credentials = $request->only('email', 'password');

        // Cek apakah email terdaftar
        $user = User::where('email', $credentials['email'])->first();

        if (!$user) {
            return back()->with('error', 'Email belum terdaftar.')->withInput();
        }

        // Jika email terdaftar, cek password
        if (!Auth::attempt($credentials)) {
            return back()->with('error', 'Password salah.')->withInput();
        }

        // Autentikasi berhasil
        $request->session()->regenerate();
        $user = Auth::user();

        // Redirect berdasarkan role
        switch ($user->role) {
            case 'Super Admin':
                return redirect()->route('superadmin.dashboard');
            case 'Admin':
                return redirect()->route('admin.dashboard');
            case 'User':
                return redirect()->route('user.dashboard');
            default:
                Auth::logout();
                return redirect()->back()->with('error', 'Role tidak dikenali.');
        }
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Tambahkan ini untuk memastikan
        $request->session()->flush();

        return redirect()->route('welcome');
    }
}

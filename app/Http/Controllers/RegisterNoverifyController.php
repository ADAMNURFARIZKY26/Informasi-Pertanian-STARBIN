<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Carbon;
use Illuminate\Validation\Rule;

class RegisterNoverifyController extends Controller
{
    public function create(Request $request)
    {
        // Validasi input (opsional tapi disarankan)
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:5|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'telepon' => ['required', 'regex:/^[0-9]{11,12}$/'],
            'tanggal_lahir' => ['required', 'date', function ($attribute, $value, $fail) {
                $minAge = 10;
                if (Carbon::parse($value)->age < $minAge) {
                    $fail("Usia minimal adalah {$minAge} tahun.");
                }
            }],
            'jenis_kelamin' => ['required', Rule::in(['Laki-laki', 'Perempuan'])],
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Simpan data ke database
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'telepon' => $request->telepon,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'role' => 'User', // default
            'profil' => 'default.png', // default profil
        ]);

        // Redirect ke login dengan pesan sukses
        return redirect()->route('login')->with('success', 'Registrasi berhasil! Silakan login.');
    }
}

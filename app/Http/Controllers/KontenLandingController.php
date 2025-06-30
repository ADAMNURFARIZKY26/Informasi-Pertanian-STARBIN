<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sosmed;
use App\Models\Staf;
use Illuminate\Support\Facades\Validator;



class KontenLandingController extends Controller
{
    public function stafView()
    {
        $staf = Staf::latest()->get();
        return view('admin.stafKami', compact('staf'));
    }

    public function stafStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama'            => 'required|string|max:255',
            'tanggal_lahir'   => 'required|date',
            'nomor'           => 'required|string|max:20',
            'email'           => $request->filled('id') ? 'required|email|unique:staf,email,' . $request->id : 'required|email|unique:staf,email',
            'foto'            => $request->filled('id') ? 'nullable|image|mimes:jpg,jpeg,png|max:2048' : 'required|image|mimes:jpg,jpeg,png|max:2048',
            'deskripsi'       => 'nullable|min:20',
        ], [
            'nama.required'              => 'Nama wajib diisi.',
            'nama.string'                => 'Nama harus berupa teks.',
            'nama.max'                   => 'Nama tidak boleh lebih dari :max karakter.',

            'tanggal_lahir.required'     => 'Tanggal lahir wajib diisi.',
            'tanggal_lahir.date'         => 'Tanggal lahir harus format tanggal yang valid.',

            'nomor.required'             => 'Nomor telepon wajib diisi.',
            'nomor.string'               => 'Nomor telepon harus berupa angka (format teks).',
            'nomor.max'                  => 'Nomor telepon maksimal :max karakter.',

            'email.required'             => 'Email wajib diisi.',
            'email.email'                => 'Format email tidak valid.',
            'email.unique'               => 'Email sudah terdaftar.',

            'foto.required'              => 'Foto wajib diunggah.',
            'foto.image'                 => 'File harus berupa gambar.',
            'foto.mimes'                 => 'Format foto harus JPG, JPEG, atau PNG.',
            'foto.max'                   => 'Ukuran foto maksimal :max KB.',

            'deskripsi.min'              => 'Deskripsi minimal :min karakter.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Check if editing (has ID)
        if ($request->filled('id')) {
            // Update existing record
            $staff = Staf::findOrFail($request->id);

            $updateData = [
                'nama' => $request->nama,
                'tanggal_lahir' => $request->tanggal_lahir,
                'nomor' => $request->nomor,
                'email' => $request->email,
                'deskripsi' => $request->deskripsi,
            ];

            // Handle photo upload for update
            if ($request->hasFile('foto')) {
                // Delete old photo
                if ($staff->foto && file_exists(public_path('pictures/staf/' . $staff->foto))) {
                    unlink(public_path('pictures/staf/' . $staff->foto));
                }

                $file = $request->file('foto');
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('pictures/staf'), $filename);

                $updateData['foto'] = $filename;
            }

            $staff->update($updateData);
            $message = 'Data staff berhasil diperbarui.';
        } else {
            // Create new record
            $file = $request->file('foto');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('pictures/staf'), $filename);

            Staf::create([
                'nama' => $request->nama,
                'tanggal_lahir' => $request->tanggal_lahir,
                'nomor' => $request->nomor,
                'email' => $request->email,
                'deskripsi' => $request->deskripsi,
                'foto' => $filename
            ]);
            $message = 'Data staff berhasil ditambahkan.';
        }

        return redirect()->route('admin.stafView')->with('success', $message);
    }

    public function stafDestroy($id)
    {
        try {
            $staff = Staf::findOrFail($id);

            // Delete photo file
            if ($staff->foto && file_exists(public_path('pictures/staf/' . $staff->foto))) {
                unlink(public_path('pictures/staf/' . $staff->foto));
            }

            $staff->delete();

            return response()->json([
                'success' => true,
                'message' => 'Data staff berhasil dihapus'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menghapus data: ' . $e->getMessage()
            ], 500);
        }
    }

    public function produckView()
    {
        return view('admin.produck');
    }
    public function blogView()
    {
        return view('admin.blog');
    }

    // sosmed
    public function sosmedView()
    {
        return view('admin.sosmed');
    }

    public function store(Request $request)
    {
        $request->validate([
            'platform' => 'required',
            'url' => 'required|url',
            'icon' => 'required',
        ]);

        // Jika form menyertakan id, berarti edit
        if ($request->filled('id')) {
            $sosmed = Sosmed::findOrFail($request->id);
            $sosmed->update([
                'judul' => $request->platform,
                'url' => $request->url,
                'icon' => $request->icon,
            ]);
        } else {
            Sosmed::create([
                'judul' => $request->platform,
                'url' => $request->url,
                'icon' => $request->icon,
            ]);
        }

        return redirect()->route('admin.sosmedView')->with('success', 'Data berhasil disimpan.');
    }

    public function destroy($id)
    {
        $data = Sosmed::findOrFail($id);
        $data->delete();

        return response()->json(['message' => 'Data berhasil dihapus']);
    }
}

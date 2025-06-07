<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sosmed;

class KontenLandingController extends Controller
{
    public function stafView()
    {
        return view('admin.stafKami');
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
        $sosmed = Sosmed::all();
        return view('admin.sosmed', compact('sosmed'));
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

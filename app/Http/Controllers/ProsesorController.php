<?php

namespace App\Http\Controllers;

use App\Models\Prosesor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProsesorController extends Controller
{
    const IMAGE_PATH = 'assets/img/prosesor/';

    public function index()
    {
        return view('dashboard.prosesor.index', [
            'title' => 'Data Prosesor',
            'prosesors' => Prosesor::paginate(5),
        ]);
    }

    public function create()
    {
        // return view('dashboard.prosesor.create');
    }

    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'brand' => 'required|string|max:255',
            'jumlah_core' => 'required|integer|min:1',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048|dimensions:min_width=100,min_height=100',
        ]);

        // Proses unggah gambar jika ada
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . rand(1, 9) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path(self::IMAGE_PATH), $imageName);
            $validatedData['image'] = $imageName;
        }

        // Simpan data ke dalam database
        Prosesor::create($validatedData);

        // Redirect dengan pesan sukses
        return redirect('/prosesors')->with('success', 'Data Prosesor berhasil ditambahkan.');
    }


    public function edit(Prosesor $prosesor)
    {
        return view('dashboard.prosesor.edit', [
            'title' => 'Edit Data Prosesor',
            'prosesor' => $prosesor,
        ]);
    }

    public function update(Request $request, $id)
    {
        $prosesor = Prosesor::findOrFail($id);

        $request->validate([
            'brand' => 'required|string',
            'jumlah_core' => 'required|integer|min:1',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $prosesor->brand = $request->brand;
        $prosesor->jumlah_core = $request->jumlah_core;

        if ($request->hasFile('image')) {
            // Hapus file lama jika ada
            if ($prosesor->image && file_exists(public_path('assets/img/prosesor/' . $prosesor->image))) {
                unlink(public_path('assets/img/prosesor/' . $prosesor->image));
            }

            // Simpan file baru
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('assets/img/prosesor/'), $filename);

            // Update field image
            $prosesor->image = $filename;
        }

        $prosesor->save();

        return redirect()->route('prosesors.index')->with('success', 'Data prosesor berhasil diperbarui.');
    }
    public function destroy(Prosesor $prosesor)
    {
        if ($prosesor->image && Storage::exists('public/' . $prosesor->image)) {
            Storage::delete('public/' . $prosesor->image);
        }

        $prosesor->delete();

        return redirect()->route('prosesors.index')->with('success', 'Data Prosesor berhasil dihapus.');
    }
}

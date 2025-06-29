<?php

namespace App\Http\Controllers;

use App\Models\Prosesor;
use Illuminate\Http\Request;

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
        return view('dashboard.prosesor.create', [
            'title' => 'Tambah Data Prosesor',
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'brand' => 'required|string|max:255',
            'jumlah_core' => 'required|integer|min:1',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048|dimensions:min_width=100,min_height=100',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . rand(1, 9) . '.' . $image->getClientOriginalExtension();

            if (!file_exists(public_path(self::IMAGE_PATH))) {
                mkdir(public_path(self::IMAGE_PATH), 0755, true);
            }

            $image->move(public_path(self::IMAGE_PATH), $imageName);
            $validatedData['image'] = $imageName;
        }

        Prosesor::create($validatedData);

        return redirect()->route('prosesors.index')->with('success', 'Data Prosesor berhasil ditambahkan.');
    }

    public function edit(Prosesor $prosesor)
    {
        return view('dashboard.prosesor.edit', [
            'title' => 'Edit Data Prosesor',
            'prosesor' => $prosesor,
        ]);
    }

    public function update(Request $request, Prosesor $prosesor)
    {
        $validatedData = $request->validate([
            'brand' => 'required|string|max:255',
            'jumlah_core' => 'required|integer|min:1',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048|dimensions:min_width=100,min_height=100',
        ]);

        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($prosesor->image && file_exists(public_path(self::IMAGE_PATH . $prosesor->image))) {
                unlink(public_path(self::IMAGE_PATH . $prosesor->image));
            }

            $image = $request->file('image');
            $imageName = time() . rand(1, 9) . '.' . $image->getClientOriginalExtension();

            if (!file_exists(public_path(self::IMAGE_PATH))) {
                mkdir(public_path(self::IMAGE_PATH), 0755, true);
            }

            $image->move(public_path(self::IMAGE_PATH), $imageName);
            $validatedData['image'] = $imageName;
        }

        $prosesor->update($validatedData);

        return redirect()->route('prosesors.index')->with('success', 'Data Prosesor berhasil diperbarui.');
    }

    public function destroy(Prosesor $prosesor)
    {
        if ($prosesor->image && file_exists(public_path(self::IMAGE_PATH . $prosesor->image))) {
            unlink(public_path(self::IMAGE_PATH . $prosesor->image));
        }

        $prosesor->delete();

        return redirect()->route('prosesors.index')->with('success', 'Data Prosesor berhasil dihapus.');
    }
}

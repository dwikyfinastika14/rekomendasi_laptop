<?php

namespace App\Http\Controllers;

use App\Models\Laptop;
use App\Models\Prosesor;
use App\Models\Ram;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

class LaptopController extends Controller
{
    const IMAGE_PATH = 'assets/img/laptops/';

    public function index()
    {
        return view('dashboard.laptop.index', [
            'title' => 'Data Laptop',
            'prosesors' => Prosesor::all(),
            'rams' => Ram::all(),
            'laptops' => Laptop::with(['processor', 'ram'])->paginate(5),
        ]);
    }
    public function create()
    {
        return view('dashboard.laptop.create', [
            'title' => 'Tambah Data Laptop',
            'prosesors' => Prosesor::all(), // Mengambil semua data prosesor dari database
            'rams' => Ram::all(),           // Mengambil semua data RAM dari database
        ]);
    }



    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'brand' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'prosesors_id' => 'required|exists:prosesors,id',
            'rams_id' => 'required|exists:rams,id',
            'storage' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);


        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = time() . '_' . $file->getClientOriginalName();

            if (!File::exists(public_path(self::IMAGE_PATH))) {
                File::makeDirectory(public_path(self::IMAGE_PATH), 0755, true);
            }

            $file->move(public_path(self::IMAGE_PATH), $filename);
            $validatedData['image'] = $filename;
        }

        Laptop::create($validatedData);

        return redirect()->route('laptops.index')->with('success', 'Data Laptop Berhasil Ditambahkan.');
    }

    public function update(Request $request, Laptop $laptop)
    {
        $validatedData = $request->validate([
            'brand' => 'required|string|max:255',
            'prosesors_id' => 'required|exists:prosesors,id',
            'rams_id' => 'required|exists:rams,id',
            'harga' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // Handle Gambar
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($laptop->image && File::exists(public_path(self::IMAGE_PATH . $laptop->image))) {
                File::delete(public_path(self::IMAGE_PATH . $laptop->image));
            }

            // Simpan gambar baru
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path(self::IMAGE_PATH), $filename);
            $validatedData['image'] = $filename;
        }

        // Update data laptop
        $laptop->update($validatedData);

        return redirect()->route('laptops.index')->with('success', 'Data Laptop Berhasil Diperbarui.');
    }

    public function destroy(laptop $laptop)
    {
        if ($laptop->image && file_exists(public_path(self::IMAGE_PATH . $laptop->image))) {
            unlink(public_path(self::IMAGE_PATH . $laptop->image));
        }

        $laptop->delete();

        return redirect()->route('laptops.index')->with('success', 'Data Prosesor berhasil dihapus.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Ram;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class RamController extends Controller
{
    const RAM_IMAGE_PATH = 'assets/img/ram/';

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.ram.index', [
            'title' => 'Data Ram',
            'rams' => Ram::paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Bisa ditambahkan view form create disini jika perlu
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'capacity' => 'required|string|max:20|unique:rams,capacity',
            'type' => 'required|in:DDR3,DDR4,DDR5',
            'speed' => 'required|integer',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048|dimensions:min_width=100,min_height=100',
        ]);

        // Proses unggah gambar jika ada
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . rand(1, 9) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path(self::RAM_IMAGE_PATH), $imageName);
            $validatedData['image'] = $imageName;
        }

        // Simpan data ke dalam database
        Ram::create($validatedData);

        // Redirect dengan pesan sukses
        return redirect('/rams')->with('success', 'Data RAM Baru Berhasil Ditambahkan');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $ram = Ram::findOrFail($id);

        $rules = [
            'capacity' => 'required|string|max:20|unique:rams,capacity,' . $id,
            'type' => 'required|in:DDR3,DDR4,DDR5',
            'speed' => 'required|integer',
            'description' => 'required|string',
        ];

        if ($request->hasFile('image')) {
            $rules['image'] = 'image|mimes:jpg,jpeg,png,webp|max:2048|dimensions:min_width=100,min_height=100';
        }

        $validatedData = $request->validate($rules);

        if ($request->hasFile('image')) {
            if ($ram->image && File::exists(public_path(self::RAM_IMAGE_PATH . $ram->image))) {
                File::delete(public_path(self::RAM_IMAGE_PATH . $ram->image));
            }

            $image = $request->file('image');
            $imageName = time() . rand(1, 9) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path(self::RAM_IMAGE_PATH), $imageName);
            $validatedData['image'] = $imageName;
        }

        $ram->update($validatedData);

        return redirect('/rams')->with('success', 'Data RAM Berhasil Diupdate');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $ram = Ram::findOrFail($id);

        // Hapus gambar jika ada
        if ($ram->image && File::exists(public_path(self::RAM_IMAGE_PATH . $ram->image))) {
            File::delete(public_path(self::RAM_IMAGE_PATH . $ram->image));
        }

        // Hapus data dari database
        $ram->delete();

        // Redirect dengan pesan sukses
        return redirect('rams')->with('success', 'Data RAM Berhasil Dihapus');
    }
}

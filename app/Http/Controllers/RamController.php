<?php

namespace App\Http\Controllers;

use App\Models\Ram;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class RamController extends Controller
{
    const RAM_IMAGE_PATH = 'assets/img/ram/';

    public function index()
    {
        return view('dashboard.ram.index', [
            'title' => 'Data RAM',
            'rams' => Ram::paginate(5),
        ]);
    }

    public function create()
    {
        return view('dashboard.ram.create', [
            'title' => 'Tambah Data RAM',
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'capacity' => 'required|string|max:20|unique:rams,capacity',
            'type' => 'required|in:DDR3,DDR4,DDR5',
            'speed' => 'required|integer',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048|dimensions:min_width=100,min_height=100',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');

            if (!File::exists(public_path(self::RAM_IMAGE_PATH))) {
                File::makeDirectory(public_path(self::RAM_IMAGE_PATH), 0755, true);
            }

            $imageName = time() . rand(1, 9) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path(self::RAM_IMAGE_PATH), $imageName);
            $validatedData['image'] = $imageName;
        }

        Ram::create($validatedData);

        return redirect()->route('rams.index')->with('success', 'Data RAM Baru Berhasil Ditambahkan');
    }

    public function edit(Ram $ram)
    {
        return view('dashboard.ram.edit', [
            'title' => 'Edit Data RAM',
            'ram' => $ram,
        ]);
    }

    public function update(Request $request, Ram $ram)
    {
        $rules = [
            'capacity' => 'required|string|max:20|unique:rams,capacity,' . $ram->id,
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

            if (!File::exists(public_path(self::RAM_IMAGE_PATH))) {
                File::makeDirectory(public_path(self::RAM_IMAGE_PATH), 0755, true);
            }

            $image->move(public_path(self::RAM_IMAGE_PATH), $imageName);
            $validatedData['image'] = $imageName;
        }

        $ram->update($validatedData);

        return redirect()->route('rams.index')->with('success', 'Data RAM Berhasil Diupdate');
    }

    public function destroy(Ram $ram)
    {
        if ($ram->image && File::exists(public_path(self::RAM_IMAGE_PATH . $ram->image))) {
            File::delete(public_path(self::RAM_IMAGE_PATH . $ram->image));
        }

        $ram->delete();

        return redirect()->route('rams.index')->with('success', 'Data RAM Berhasil Dihapus');
    }
}

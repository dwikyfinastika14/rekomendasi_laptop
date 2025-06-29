<?php

namespace App\Http\Controllers;

use App\Models\Laptop;
use App\Models\Prosesor;
use App\Models\Ram;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $laptops = Laptop::query();

        // Filter berdasarkan brand
        if ($request->filled('laptopBrand')) {
            $laptops->where('brand', 'like', '%' . $request->laptopBrand . '%');
        }

        // Filter berdasarkan prosesor
        if ($request->filled('processor')) {
            $laptops->where('prosesors_id', $request->processor);
        }

        // Filter berdasarkan RAM
        if ($request->filled('ram')) {
            $laptops->where('rams_id', $request->ram);
        }

        // Filter berdasarkan harga maksimum
        if ($request->filled('maxPrice')) {
            $laptops->where('harga', '<=', $request->maxPrice);
        }

        return view('home.index', [
            'title' => 'Rekomendasi Laptop',
            'laptops' => $laptops->with(['processor', 'ram'])->get(),
            'brands' => Laptop::select('brand')->distinct()->pluck('brand'), // Ambil merk unik
            'processors' => Prosesor::all(), // Ambil semua prosesor
            'rams' => Ram::all(),           // Ambil semua RAM
        ]);
    }
}

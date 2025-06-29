<?php

namespace App\Http\Controllers;

use App\Models\Ram;
use App\Models\Prosesor;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index', [
            'title' => 'Dashboard Rekomendasi Laptop',
            'ram' => Ram::count(),
            'prosesor' => Prosesor::count(),
        ]);
    }
}

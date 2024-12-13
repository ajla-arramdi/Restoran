<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // Menampilkan halaman dashboard
    public function index()
    {
        // Mengambil semua data menu dengan relasi kategori
        $menus = Menu::with('category')->get();
        return view('dashboard', compact('menus'));
    }
}

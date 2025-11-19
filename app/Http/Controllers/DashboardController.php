<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
   public function index()
{
    $user = auth()->user();
    
    // Hitung statistik
    $totalBuku = \App\Models\Buku::count();
    $totalUsers = \App\Models\User::count();
    
    switch ($user->role) {
        case 'admin':
            return view('admin.dashboard', compact('totalBuku', 'totalUsers'));
        case 'petugas':
            return view('petugas.dashboard', compact('totalBuku', 'totalUsers'));
        case 'peminjam':
            return view('peminjam.dashboard', compact('totalBuku'));
        default:
            return redirect('/');
    }
}
}
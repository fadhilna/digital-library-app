<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Untuk sementara tampilkan halaman laporan sederhana
        return view('laporan.index');
    }

    /**
     * Generate and download report.
     */
    public function download()
    {
        // Untuk sementara redirect back dengan pesan
        return redirect()->back()->with('info', 'Fitur download laporan akan segera tersedia');
    }
}
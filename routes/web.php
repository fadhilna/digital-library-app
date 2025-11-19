<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\LaporanController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// === SIMPLE AUTH ROUTES ===
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', function (\Illuminate\Http\Request $request) {
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        return redirect()->intended('/dashboard');
    }

    return back()->withErrors(['email' => 'Email atau password salah.']);
});

// PASTIKAN INI MENGGUNAKAN POST
Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/login');
})->name('logout');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::post('/register', function (\Illuminate\Http\Request $request) {
    $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
        'username' => 'required|string|max:255|unique:users',
        'nama_lengkap' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'alamat' => 'required|string',
        'password' => 'required|string|min:8|confirmed',
    ]);

    if ($validator->fails()) {
        return back()->withErrors($validator)->withInput();
    }

    // Gunakan cara manual untuk create user
    $user = new \App\Models\User();
    $user->username = $request->username;
    $user->email = $request->email;
    $user->password = \Illuminate\Support\Facades\Hash::make($request->password);
    $user->nama_lengkap = $request->nama_lengkap;
    $user->alamat = $request->alamat;
    $user->role = 'peminjam';
    $user->save();

    return redirect('/login')->with('success', 'Registrasi berhasil! Silakan login.');
});

// === PUBLIC ROUTES ===
Route::get('/', function () {
    return redirect('/login');
});

// === PROTECTED ROUTES ===
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Admin & Petugas Routes
    Route::middleware(['role:admin,petugas'])->group(function () {
        Route::resource('buku', BukuController::class);
        Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
    });
    
    // Peminjam Routes
    Route::middleware(['role:peminjam'])->group(function () {
        Route::get('/peminjaman', [PeminjamanController::class, 'index'])->name('peminjaman.index');
    });
});
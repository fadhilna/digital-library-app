@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <h2>Laporan Perpustakaan</h2>
        
        @if(session('info'))
            <div class="alert alert-info">{{ session('info') }}</div>
        @endif

        <div class="row mt-4">
            <div class="col-md-4">
                <div class="card text-white bg-primary">
                    <div class="card-body">
                        <h5 class="card-title">Laporan Buku</h5>
                        <p class="card-text">Lihat laporan data buku</p>
                        <button class="btn btn-light" disabled>Generate PDF</button>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-white bg-success">
                    <div class="card-body">
                        <h5 class="card-title">Laporan Peminjaman</h5>
                        <p class="card-text">Lihat laporan peminjaman</p>
                        <button class="btn btn-light" disabled>Generate PDF</button>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-white bg-warning">
                    <div class="card-body">
                        <h5 class="card-title">Laporan User</h5>
                        <p class="card-text">Lihat laporan data user</p>
                        <button class="btn btn-light" disabled>Generate PDF</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mt-4">
            <div class="card-body">
                <h5 class="card-title">Statistik Sementara</h5>
                <p>Fitur laporan lengkap akan segera tersedia. Saat ini Anda dapat:</p>
                <ul>
                    <li>Melihat statistik buku</li>
                    <li>Melihat riwayat peminjaman</li>
                    <li>Generate laporan dalam format PDF/Excel</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <h2>Peminjaman Buku</h2>
        <p>Selamat datang di halaman peminjaman, {{ auth()->user()->nama_lengkap }}!</p>
        
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Judul Buku</th>
                <th>Penulis</th>
                <th>Penerbit</th>
                <th>Tahun</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($buku as $index => $b)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $b->judul }}</td>
                <td>{{ $b->penulis }}</td>
                <td>{{ $b->penerbit }}</td>
                <td>{{ $b->tahun_terbit }}</td>
                <td>
                    <form action="{{ route('peminjam.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="buku_id" value="{{ $b->BukuID }}">
                        <button type="submit" class="btn btn-primary btn-sm">Pinjam Buku</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Informasi Peminjaman</h5>
                    </div>
                    <div class="card-body">
                        <div class="alert alert-info">
                            <h6>Fitur Peminjaman</h6>
                            <p class="mb-2">Fitur peminjaman buku sedang dalam pengembangan.</p>
                            <p class="mb-0">Fitur yang akan datang:</p>
                            <ul class="mb-0">
                                <li>Pencarian buku</li>
                                <li>Peminjaman online</li>
                                <li>Riwayat peminjaman</li>
                                <li>Pengembalian buku</li>
                            </ul>
                        </div>

                        <div class="mt-3">
                            <h6>Buku yang sedang dipinjam:</h6>
                            <p class="text-muted">Belum ada buku yang dipinjam</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <h2>Dashboard Petugas</h2>
        <div class="row mt-4">
            <div class="col-md-4">
                <div class="card text-white bg-info">
                    <div class="card-body">
                        <h5 class="card-title">Manajemen Buku</h5>
                        <a href="{{ route('buku.index') }}" class="btn btn-light">Kelola Buku</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-white bg-warning">
                    <div class="card-body">
                        <h5 class="card-title">Laporan</h5>
                        <a href="{{ route('laporan.index') }}" class="btn btn-light">Lihat Laporan</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
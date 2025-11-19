@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <h2>Dashboard Peminjam</h2>
        <div class="row mt-4">
            <div class="col-md-4">
                <div class="card text-white bg-primary">
                    <div class="card-body">
                        <h5 class="card-title">Pinjam Buku</h5>
                        <a href="{{ route('peminjam.index') }}" class="btn btn-light">Lihat Katalog</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
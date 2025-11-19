@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Manajemen Buku</h2>
    <a href="{{ route('buku.create') }}" class="btn btn-primary">Tambah Buku</a>
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="card mb-4">
    <div class="card-body">
        <form action="{{ route('buku.index') }}" method="GET">
            <div class="row">
                <div class="col-md-8">
                    <input type="text" name="search" class="form-control" placeholder="Cari judul atau penulis..." value="{{ $search }}">
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary w-100">Cari</button>
                </div>
                <div class="col-md-2">
                    <a href="{{ route('buku.index') }}" class="btn btn-secondary w-100">Reset</a>
                </div>
            </div>
        </form>
    </div>
</div>
@if($buku->count() > 0)
    <div class="d-flex justify-content-between align-items-center mt-3">
        <div>
            Menampilkan {{ $buku->firstItem() }} - {{ $buku->lastItem() }} dari {{ $buku->total() }} buku
        </div>
        <div>
            {{ $buku->links() }}
        </div>
    </div>
@endif

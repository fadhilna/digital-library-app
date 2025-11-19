@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h4>Detail Buku</h4>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th width="30%">Judul</th>
                        <td>{{ $buku->judul }}</td>
                    </tr>
                    <tr>
                        <th>Penulis</th>
                        <td>{{ $buku->penulis }}</td>
                    </tr>
                    <tr>
                        <th>Penerbit</th>
                        <td>{{ $buku->penerbit }}</td>
                    </tr>
                    <tr>
                        <th>Tahun Terbit</th>
                        <td>{{ $buku->tahun_terbit }}</td>
                    </tr>
                    <tr>
                        <th>Ditambahkan</th>
                        <td>{{ $buku->created_at->format('d M Y H:i') }}</td>
                    </tr>
                </table>
                <div class="mt-3">
                    <a href="{{ route('buku.edit', $buku->BukuID) }}" class="btn btn-warning">Edit</a>
                    <a href="{{ route('buku.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    // Tentukan nama tabel
    protected $table = 'buku';
    
    // Tentukan primary key
    protected $primaryKey = 'BukuID';
    
    // Tentukan kolom yang bisa diisi
    protected $fillable = [
        'judul',
        'penulis', 
        'penerbit',
        'tahun_terbit',
    ];

    // Non-aktifkan auto increment untuk primary key jika perlu
    public $incrementing = true;
}
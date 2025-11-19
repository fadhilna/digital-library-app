<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('buku', function (Blueprint $table) {
            $table->id('BukuID');
            $table->string('judul');
            $table->string('penulis');
            $table->string('penerbit');
            $table->year('tahun_terbit');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('buku');
    }
};
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pengurus', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nim');
            $table->string('alamat');
            $table->string('email')->unique(); // Tambahkan batasan unik pada email
            $table->string('telp');
            $table->string('kelas');
            $table->string('foto');
            $table->string('angkatan');
            $table->unsignedBigInteger('divisi_id'); // Menggunakan unsignedBigInteger karena ini adalah kunci asing
            $table->unsignedBigInteger('jabatan_id'); // Menggunakan unsignedBigInteger karena ini adalah kunci asing
            $table->timestamps();

            // Menambahkan constraint foreign key
            $table->foreign('divisi_id')->references('id')->on('divisi')->onDelete('cascade');
            $table->foreign('jabatan_id')->references('id')->on('jabatan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengurus');
    }
};

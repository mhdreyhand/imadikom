<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Anggota extends Model
{
    use HasFactory;
    protected $table = 'anggota';
    protected $fillable = [
        'nama',
        'nim',
        'alamat',
        'email',
        'telp',
        'kelas',
        'foto',
        'angkatan'
    ];
}

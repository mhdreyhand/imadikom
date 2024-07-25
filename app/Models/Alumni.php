<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Alumni extends Model
{
    use HasFactory;
    protected $table = 'alumni';
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

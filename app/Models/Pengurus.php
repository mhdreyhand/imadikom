<?php

namespace App\Models;

use App\Models\Divisi;
use App\Models\Jabatan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pengurus extends Model
{
    use HasFactory;
    protected $table = 'pengurus';
    protected $fillable = [
        'nama',
        'divisi_id',
        'jabatan_id',
        'nim',
        'alamat',
        'email',
        'telp',
        'kelas',
        'foto',
        'angkatan'
    ];

    public function divisi()
    {
        return $this->belongsTo(Divisi::class, 'divisi_id');
    }

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class, 'jabatan_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Jadwal extends Model
{
    use HasFactory;
    protected $table = 'jadwal';
    protected $dates = ['mulai', 'selesai'];
    protected $fillable = [
        'nama_kegiatan',
        'mulai',
        'selesai',
        'tempat',
        'status',
    ];

    public function updateStatus()
    {
        $now = Carbon::now(); // Waktu saat ini
        $mulai = Carbon::parse($this->mulai); // Cast mulai to Carbon instance
        $selesai = Carbon::parse($this->selesai); // Cast selesai to Carbon instance

        // Periksa status berdasarkan waktu saat ini
        if ($now < $mulai) {
            // Sebelum jadwal dimulai
            $this->status = 'belum dilaksanakan';
        } elseif ($now >= $mulai && $now <= $selesai) {
            // Selama jadwal berlangsung
            $this->status = 'sedang berlangsung';
        } else {
            // Setelah jadwal selesai
            $this->status = 'selesai';
        }

        // Simpan perubahan status
        $this->save();
    }
}

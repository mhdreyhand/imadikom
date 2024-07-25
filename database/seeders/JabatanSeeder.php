<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Jabatan;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Jabatan::create([
            'nama_jabatan' => 'Ketua',
        ]);

        Jabatan::create([
            'nama_jabatan' => 'Wakil Ketua',
        ]);

        Jabatan::create([
            'nama_jabatan' => 'Sekertaris',
        ]);

        Jabatan::create([
            'nama_jabatan' => 'Bendahara',
        ]);

        Jabatan::create([
            'nama_jabatan' => 'Anggota',
        ]);
    }
}

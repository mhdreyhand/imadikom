<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Divisi;

class DivisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Divisi::create([
            'nama_divisi' => 'BPH',
        ]);

        Divisi::create([
            'nama_divisi' => 'PSDM',
        ]);

        Divisi::create([
            'nama_divisi' => 'Sosma',
        ]);

        Divisi::create([
            'nama_divisi' => 'KWU',
        ]);

        Divisi::create([
            'nama_divisi' => 'Humas',
        ]);

        Divisi::create([
            'nama_divisi' => 'Multimedia',
        ]);
    }
}

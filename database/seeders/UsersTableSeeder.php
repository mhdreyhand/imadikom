<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $p = Hash::make("admin123");
        User::create([
            'name' => 'IMADIKOM',
            'email' => 'imadikom@amikom.ac.id',
            'password' => $p,
        ]);
    }
}

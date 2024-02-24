<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\PKP;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::create([
            'name' => 'Shaffanisa Aulia',
            'email' => 'shaffa@gmail.com',
            'password' => bcrypt('shaffa'),
            'role' => 'superadmin'
        ]);

        \App\Models\User::create([
            'name' => 'Aulia',
            'email' => 'aulia@gmail.com',
            'password' => bcrypt('aulia'),
            'role' => 'accounting'
        ]);

        // PKP
        \App\Models\PKP::create([
            'min' => 0,
            'max' => 50000000,
            'persen' => 5
        ]);
        \App\Models\PKP::create([
            'min' => 50000000,
            'max' => 250000000,
            'persen' => 15
        ]);
        \App\Models\PKP::create([
            'min' => 250000000,
            'max' => 500000000,
            'persen' => 25
        ]);
        \App\Models\PKP::create([
            'min' => 500000000,
            'max' => 5000000000,
            'persen' => 30
        ]);
        \App\Models\PKP::create([
            'min' => 5000000000,
            'max' => null,
            'persen' => 35
        ]);

        // PTKP
        \App\Models\PTKP::create([
            'nama_ptkp' => 'TK/0',
            'jumlah' => 54000000,
        ]);
        \App\Models\PTKP::create([
            'nama_ptkp' => 'TK/1',
            'jumlah' => 58500000,
        ]);
        \App\Models\PTKP::create([
            'nama_ptkp' => 'TK/2',
            'jumlah' => 63000000,
        ]);
        \App\Models\PTKP::create([
            'nama_ptkp' => 'TK/3',
            'jumlah' => 67500000,
        ]);
        \App\Models\PTKP::create([
            'nama_ptkp' => 'K/0',
            'jumlah' => 58500000,
        ]);
        \App\Models\PTKP::create([
            'nama_ptkp' => 'K/1',
            'jumlah' => 63000000,
        ]);
        \App\Models\PTKP::create([
            'nama_ptkp' => 'K/2',
            'jumlah' => 67500000,
        ]);
        \App\Models\PTKP::create([
            'nama_ptkp' => 'K/3',
            'jumlah' => 72000000,
        ]);
        \App\Models\PTKP::create([
            'nama_ptkp' => 'K/I/0',
            'jumlah' => 112500000,
        ]);
        \App\Models\PTKP::create([
            'nama_ptkp' => 'K/I/1',
            'jumlah' => 117000000,
        ]);
        \App\Models\PTKP::create([
            'nama_ptkp' => 'K/I/2',
            'jumlah' => 121500000,
        ]);
        \App\Models\PTKP::create([
            'nama_ptkp' => 'K/I/3',
            'jumlah' => 126000000,
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\Peserta;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PesertaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Peserta::create([
            'nisn' => 1234,
            'name' => 'Admin',
            'password' => bcrypt('1234'),
            'kelas'=> 'XII',
            'jurusan' => 'PPL',
            'vote_status' => 'belum',
            'role' => 'admin',
        ]);
        Peserta::create([
            'nisn' => 123,
            'name' => 'peserta',
            'password' => bcrypt('123'),
            'kelas'=> 'XI',
            'jurusan' => 'PPL',
            'vote_status' => 'belum',
            'role' => 'peserta'
        ]);
    }
}

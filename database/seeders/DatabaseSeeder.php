<?php

namespace Database\Seeders;

use App\Models\Kandidat;
use App\Models\Misi;
use App\Models\Peserta;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Peserta::factory(10)->create();
        Misi::factory(18)->recycle(Kandidat::factory(3)->create())->create();
        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            PesertaSeeder::class,
            KandidatSeeder::class,
        ]);
    }
}

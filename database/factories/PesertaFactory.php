<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Peserta>
 */
class PesertaFactory extends Factory
{

    protected static ?string $password;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nisn' => fake()->unique()->randomNumber(4, true),
            'name' => fake()->name(),
            'password' => bcrypt(12345),
            'kelas' => fake()->randomElement(['X', 'XI', 'XII']),
            'jurusan' => fake()->randomElement(['RPL', 'DKV', 'TSM', 'MP', 'AK', 'BD', 'TKKR']),
            'vote_status' => fake()->randomElement(['belum', 'sudah'])
        ];
    }
}

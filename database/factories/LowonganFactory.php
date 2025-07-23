<?php

namespace Database\Factories;

use App\Models\Lowongan;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class LowonganFactory extends Factory
{
    protected $model = Lowongan::class;

    public function definition(): array
    {
        return [
            'user_id' => User::factory(), // atau ID admin tetap
            'nama_perusahaan' => $this->faker->company,
            'posisi' => $this->faker->jobTitle,
            'lokasi' => $this->faker->city,
            'deskripsi' => $this->faker->paragraph(3),
            'kualifikasi' => $this->faker->paragraph(2),
            'tanggal_kadaluarsa' => $this->faker->dateTimeBetween('now', '+2 months')->format('Y-m-d'),
            'kontak' => $this->faker->email,
        ];
    }
}

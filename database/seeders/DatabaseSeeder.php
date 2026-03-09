<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@adhyaksa.com'],
            [
                'name' => 'Admin Adhyaksa',
                'password' => 'admin123', // Will be auto-hashed by User model cast
            ]
        );
    }

    public function run(): void
    {
        // Panggil seeder yang baru saja kita buat
        $this->call([
            ProductSeeder::class,
            // UserSeeder::class, (kalau nanti ada seeder lain, tambahkan di sini)
        ]);
    }
}

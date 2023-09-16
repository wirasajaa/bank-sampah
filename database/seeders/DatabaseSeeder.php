<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create(
            [
                'name' => fake()->name(),
                'email' => "admin@gmail.com",
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10),
            ]
        );

        \App\Models\Category::insert([
            [
                'name' => 'Sampah Organik',
                'desc' => 'Sampah organik merupakan sampah yang sifatnya mudah terurai di alam (mudah busuk) seperti sisa makanan, daun-daunan, atau ranting pohon',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => "Sampah Anorganik",
                'desc' => "Sampah anorganik merupakan sampah yang sifatnya lebih sulit diurai seperti sampah plastik, kaleng, dan styrofoam.",
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => "Sampah Kertas",
                'desc' => "Karton, potongan kertas, pamflet, bungkus kemasan berbahan kertas, dan buku.",
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}

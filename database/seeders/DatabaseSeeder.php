<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

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

<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Curso;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $cursos = Curso::factory(5)->create();

        User::factory(15)->create([
            'curso_id' => function () use ($cursos) {
                return $cursos->random()->id;
            },
        ]);

        Product::factory(10)->create();
    }
}

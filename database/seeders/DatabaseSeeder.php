<?php

namespace Database\Seeders;

use App\Models\Curso;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RoleSeader::class);

        $cursos = Curso::factory(5)->create();

        // Crea los usuario y les asigna cursos de forma aleatoria
        $users = User::factory(10)->create([
            'curso_id' => function () use ($cursos) {
                return $cursos->random()->id;
            },
        ]);

        // Obtener el rol "Admin"
        $adminRole = Role::where('name', 'Admin')->first();
        $bloggerRole = Role::where('name', 'Blogger')->first();


        // Asignar el rol "Admin" a todos los usuarios
        // $users->each(function (User $user) use ($adminRole) {
        //     $user->assignRole($adminRole);
        // });

        $users->slice(0, 1)->each(function (User $user) use ($adminRole) {
            $user->assignRole($adminRole);
        });

        $users->slice(1, 9)->each(function (User $user) use ($bloggerRole) {
            $user->assignRole($bloggerRole);
        });

        Product::factory(10)->create();
    }
}

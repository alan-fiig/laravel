<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;



class RoleSeader extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Blogger']);

        Permission::create(['name' => 'cursos.home'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.cursos.index'])->assignRole($role1);
        Permission::create(['name' => 'admin.cursos.create'])->assignRole($role1);
        Permission::create(['name' => 'admin.cursos.edit'])->assignRole($role1);
        Permission::create(['name' => 'admin.cursos.destroy'])->assignRole($role1);
    }
}

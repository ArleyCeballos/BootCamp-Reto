<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Role::create(['name' => 'admin']);
        Role::create(['name' => 'visible']);
        $roleAdmin = Role::find(1);
        


        Permission::create(['name' => 'ver:role'])->assignRole($roleAdmin);
        Permission::create(['name' => 'crear:role'])->assignRole($roleAdmin);
        Permission::create(['name' => 'editar:role'])->assignRole($roleAdmin);
        Permission::create(['name' => 'elminar:role'])->assignRole($roleAdmin);
        Permission::create(['name' => 'ver:permisos'])->assignRole($roleAdmin);
        User::find(1)->assignRole($roleAdmin);

        
    }
}

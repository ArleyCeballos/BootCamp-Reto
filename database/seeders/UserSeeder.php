<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {       

        User::factory()->create([
        'name' => 'Admin',
        'email' => 'Admin@test.com',
        'password'=>bcrypt("Colombia.01"),

        ]);

       
    }
}

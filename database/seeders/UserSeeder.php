<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Gabriel Peñaranda',
            'email' => 'gabrielpg77@gmail.com',
            'password' => bcrypt('password'),
            'type' => 'Company',
        ])->assignRole('Administrator');

        User::create([
            'name' => 'Juancho Lazo',
            'email' => 'jlazo@mail.com',
            'password' => bcrypt('password'),
            'type' => 'Company',
        ])->assignRole('Associate');

        User::create([
            'name' => 'Tegoteo Blanco',
            'email' => 'tblanco@mail.com',
            'password' => bcrypt('password'),
            'type' => 'Company',
        ])->assignRole('Associate');
    }
}

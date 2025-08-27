<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Gabriel Peñaranda',
            'email' => 'gabrielpg77@gmail.com',
            'password' => bcrypt('minastirith')
        ])->assignRole('Admin');

        User::factory()->create([
            'name' => 'Juancho Lazo',
            'email' => 'jlazo@mail.com',
            'password' => bcrypt('password')
        ])->assignRole('Associate');

        User::factory()->create([
            'name' => 'Tegoteo Blanco',
            'email' => 'tblanco@mail.com',
            'password' => bcrypt('password')
        ])->assignRole('Associate');
    }
}

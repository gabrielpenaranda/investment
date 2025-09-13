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
            'type' => 'Admin',
            'state_id' => 1,
        ])->assignRole('Administrator');

        User::create([
            'name' => 'Juancho Lazo',
            'email' => 'jlazo@mail.com',
            'password' => bcrypt('password'),
            'type' => 'Person',
            'state_id' => 1,
        ])->assignRole('Associate');

        User::create([
            'name' => 'Tegoteo Blanco',
            'email' => 'tblanco@mail.com',
            'password' => bcrypt('password'),
            'type' => 'Person',
            'state_id' => 1,
        ])->assignRole('Associate');

        User::create([
            'name' => 'Crispin Gatieza',
            'email' => 'cgatieza@mail.com',
            'password' => bcrypt('password'),
            'type' => 'Person',
            'state_id' => 1,
        ])->assignRole('Associate');

        User::create([
            'name' => 'Debora Meltrozo',
            'email' => 'dmeltrozo@mail.com',
            'password' => bcrypt('password'),
            'type' => 'Person',
            'state_id' => 1,
        ])->assignRole('Associate');

        User::create([
            'name' => 'Alipio Lipa',
            'email' => 'alipa@mail.com',
            'password' => bcrypt('password'),
            'type' => 'Person',
            'state_id' => 1,
        ])->assignRole('Associate');

        User::create([
            'name' => 'Morrocoy Inc',
            'email' => 'morrocoy@mail.com',
            'password' => bcrypt('password'),
            'type' => 'Company',
            'state_id' => 1,
        ])->assignRole('Associate');

        User::create([
            'name' => 'Escarpandola',
            'email' => 'escarpandola@mail.com',
            'password' => bcrypt('password'),
            'type' => 'Company',
            'state_id' => 1,
        ])->assignRole('Associate');
    }
}

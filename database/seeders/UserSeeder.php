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
            'address' => 'Calle Falsa 123, Springfield',
            'phone' => '555-1234',
            'fin' => '95-7845948',
            'zip_code' => '12345',
        ])->assignRole('Administrator');

        User::create([
            'name' => 'Jane Martínez',
            'email' => 'jmartinez@mail.com',
            'password' => bcrypt('password'),
            'type' => 'Person',
            'state_id' => 1,
            'address' => 'Calle Falsa 123, Springfield',
            'phone' => '555-1234',
            'fin' => '95-7245968',
            'zip_code' => '12345',
        ])->assignRole('Associate');

        User::create([
            'name' => 'Tina Cortéz',
            'email' => 'tcortez@mail.com',
            'password' => bcrypt('password'),
            'type' => 'Person',
            'state_id' => 1,
            'address' => 'Calle Falsa 123, Springfield',
            'phone' => '555-1234',
            'fin' => '93-7845968',
            'zip_code' => '12345',
        ])->assignRole('Associate');

        User::create([
            'name' => 'Peter Hamilton',
            'email' => 'chamilton@mail.com',
            'password' => bcrypt('password'),
            'type' => 'Person',
            'state_id' => 1,
            'address' => 'Calle Falsa 123, Springfield',
            'phone' => '555-1234',
            'fin' => '95-7847968',
            'zip_code' => '12345',
        ])->assignRole('Associate');

        User::create([
            'name' => 'Debora Walters',
            'email' => 'dwalters@mail.com',
            'password' => bcrypt('password'),
            'type' => 'Person',
            'state_id' => 1,
            'address' => 'Calle Falsa 123, Springfield',
            'phone' => '555-1234',
            'fin' => '95-7945968',
            'zip_code' => '12345',
        ])->assignRole('Associate');

        User::create([
            'name' => 'Andres Rodríguez',
            'email' => 'arodriguez@mail.com',
            'password' => bcrypt('password'),
            'type' => 'Person',
            'state_id' => 1,
            'address' => 'Calle Falsa 123, Springfield',
            'phone' => '555-1234',
            'fin' => '95-7845168',
            'zip_code' => '12345',
        ])->assignRole('Associate');

        User::create([
            'name' => 'Morrocoy Inc',
            'email' => 'morrocoy@mail.com',
            'password' => bcrypt('password'),
            'type' => 'Company',
            'state_id' => 1,
            'address' => 'Calle Falsa 123, Springfield',
            'phone' => '555-1234',
            'fin' => '85-7845968',
            'zip_code' => '12345',
        ])->assignRole('Associate');

        User::create([
            'name' => 'Snow Mountain Co.',
            'email' => 'snowmountain@mail.com',
            'password' => bcrypt('password'),
            'type' => 'Company',
            'state_id' => 1,
            'address' => 'Calle Falsa 123, Springfield',
            'phone' => '555-1234',
            'fin' => '75-7845968',
            'zip_code' => '12345',
        ])->assignRole('Associate');
    }
}

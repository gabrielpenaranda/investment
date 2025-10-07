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
        /* User::create([
            'name' => 'Gabriel Peñaranda',
            'email' => 'gabrielpg77@gmail.com',
            'password' => bcrypt('password'),
            'type' => 'Admin',
            'state_id' => 1,
            'address' => 'Calle Falsa 123, Springfield',
            'phone' => '555-1234',
            'zip_code' => '12345',
        ])->assignRole('Administrator'); */
        
        User::create([
            'name' => 'Alvaron Bazan',
            'email' => 'al@assetperformancefund.com',
            'password' => bcrypt('password'),
            'type' => 'Admin',
            'state_id' => 1,
            'address' => '3134 E McKellips Rd #31, Mesa',
            'phone' => '(480) 334-2788',
            'zip_code' => '85213',
        ])->assignRole('Administrator');

        User::create([
            'name' => 'Miguel Flores',
            'email' => 'michelfloresl@hotmail.com',
            'password' => bcrypt('password'),
            'type' => 'Admin',
            'state_id' => 1,
            'address' => '8953 E Captain Dreyfus Ave, Scottsdale',
            'phone' => '(480) 747-0541',
            'zip_code' => '85260',
        ])->assignRole('Administrator');

        User::create([
            'name' => 'Luis Matos',
            'email' => 'matosluis2002@gmail.com',
            'password' => bcrypt('password'),
            'type' => 'Person',
            'social_security' => '726-88-7046',
            'state_id' => 1,
            'address' => '8953 E Captain Dreyfus Ave, Scottsdale',
            'phone' => '(480) 729-2732',
            'zip_code' => '85260',
        ])->assignRole('Associate');

        User::create([
            'name' => 'Edgleen Alejandro Perez Irigoyen',
            'email' => 'edgleenp25@gmail.com',
            'password' => bcrypt('password'),
            'type' => 'Person',
            'social_security' => '104-95-7376',
            'state_id' => 1,
            'address' => '8953 E Captain Dreyfus Ave, Scottsdale',
            'phone' => '(656) 239-6133',
            'zip_code' => '85260',
        ])->assignRole('Associate');

        User::create([
            'name' => 'Yainer Diaz',
            'email' => 'yainerdiazlopez@hotmail.com',
            'password' => bcrypt('password'),
            'type' => 'Person',
            'social_security' => '056-61-1142',
            'state_id' => 1,
            'address' => '8953 E Captain Dreyfus Ave, Scottsdale',
            'phone' => '(786) 328-3512',
            'zip_code' => '85260',
        ])->assignRole('Associate');
           





        /* User::create([
            'name' => 'Jane Martínez',
            'email' => 'jmartinez@mail.com',
            'password' => bcrypt('password'),
            'type' => 'Person',
            'state_id' => 1,
            'address' => 'Calle Falsa 123, Springfield',
            'phone' => '555-1234',
            'social_security' => '999-45-6789',
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
            'social_security' => '999-55-6789',
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
            'social_security' => '999-65-6789',
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
            'social_security' => '999-75-6789',
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
            'social_security' => '999-85-6789',
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
        ])->assignRole('Associate');*/
    } 
}
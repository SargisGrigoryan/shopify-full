<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Register a default user for testing
        DB::table('users')->insert([
            'first_name' => 'Sargis',
            'last_name' => 'Grigoryan',
            'email' => 'sargis.web@gmail.com',
            'password' => Hash::make('333')
        ]);
    }
}

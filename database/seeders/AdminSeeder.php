<?php

namespace Database\Seeders;

// Use default
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Register a new admin
        DB::table('admins')->insert([
            'first_name' => 'Sargis',
            'last_name' => 'Grigoryan',
            'email' => 'sargis.web@gmail.com',
            'password' => Hash::make('333')
        ]);
    }
}

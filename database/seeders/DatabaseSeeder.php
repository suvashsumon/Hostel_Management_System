<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::create([
            'name' => 'Super Admin',
            'phone_no' => '01717601509',
            'email' => 'admin@admin.com',
            'password' => Hash::make('123456789')
        ]);

        \App\Models\User::create([
            'name' => 'Mess Owner',
            'phone_no' => '01741543475',
            'email' => 'owner@owner.com',
            'password' => Hash::make('123456789')
        ]);

        \App\Models\User::create([
            'name' => 'Boarder',
            'phone_no' => '01307032324',
            'email' => 'boarder@boarder.com',
            'password' => Hash::make('123456789')
        ]);
    }
}

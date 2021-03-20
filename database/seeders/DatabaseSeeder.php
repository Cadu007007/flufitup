<?php

namespace Database\Seeders;

use App\Models\User;
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
        // User::factory(10)->create();
        User::create([
            'first_name' => 'first',
            'last_name' => 'last',
            'password' => Hash::make('password'),
            'phone' => '+2010000000000',
            'email' => 'user@flufit-up.com',
            'isVerified' => 1,
        ]);

    }
}

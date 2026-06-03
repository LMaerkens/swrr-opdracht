<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::updateOrCreate(
            ['email' => 'admin@srww.nl'],
            [
                'name' => 'Admin User',
                'password' => \Illuminate\Support\Facades\Hash::make('admin123'),
                'rol' => 'admin',
            ]
        );

        \App\Models\User::updateOrCreate(
            ['email' => 'user@srww.nl'],
            [
                'name' => 'PV Lid',
                'password' => \Illuminate\Support\Facades\Hash::make('user123'),
                'rol' => 'user',
            ]
        );
    }
}

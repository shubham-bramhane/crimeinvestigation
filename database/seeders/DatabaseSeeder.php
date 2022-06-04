<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        User::factory()->create([
            'name' => 'admin',
            'is_admin' => true,
            'email' => 'admin@admin.com',
            'mobile' => '1234567890',
            'password' => bcrypt('1234567890'),
        ]);

        User::factory()->create([
            'name' => 'officer',
            'is_admin' => false,
            'email' => 'officer@test.com',
            'mobile' => '1234567809',
            'password' => bcrypt('1234567890'),
        ]);

        User::factory(10)->create([
            'is_admin' => false,
        ]);
    }
}

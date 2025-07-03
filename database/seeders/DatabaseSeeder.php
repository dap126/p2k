<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::updateOrCreate(
            ['email' => 'haryah@example.com'],
            [
                'name' => 'harunyahya',
                'password' => bcrypt('harunyhy1'),
                'role' => 'user'
            ]
        );
        User::updateOrCreate(
            ['email' => 'mahyadi@example.com'],
            [
                'name' => 'mahyadi',
                'password' => bcrypt('mahyadi12'),
                'role' => 'user'
            ]
        );
        User::updateOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'admin',
                'password' => bcrypt('admin123'),
                'role' => 'admin'
            ]
        );
        User::updateOrCreate(
            ['email' => 'hanif@example.com'],
            [
                'name' => 'hanif',
                'password' => bcrypt('hanif123'),
                'role' => 'user'
            ]
        );
        User::updateOrCreate(
            ['email' => 'nurul@example.com'],
            [
                'name' => 'nurul',
                'password' => bcrypt('nurul123'),
                'role' => 'user'
            ]
        );
        User::updateOrCreate(
            ['email' => 'yahya@example.com'],
            [
                'name' => 'yahya',
                'password' => bcrypt('yahya123'),
                'role' => 'user'
            ]
        );
        User::updateOrCreate(
            ['email' => 'mutia@example.com'],
            [
                'name' => 'mutia',
                'password' => bcrypt('mutia123'),
                'role' => 'user'
            ]
        );
        $this->call(LaporanSeeder::class);
    }
}

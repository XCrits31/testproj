<?php

declare(strict_types=1);

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
        $this->call([
            VenueSeeder::class,
            EventSeeder::class,
        ]);
        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'role' => 'admin',
        ]);
    }
}

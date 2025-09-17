<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            ServiceSeeder::class,
            SubSubServiceSeeder::class,
            TestimonialSeeder::class,
            SectorSeeder::class,
            BlogPostSeeder::class,
            VesselSeeder::class,
        ]);
    }
}

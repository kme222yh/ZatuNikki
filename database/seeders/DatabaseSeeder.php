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
        $this->call([
            BookTypeSeeder::class,
            // UserSeeder::class,
            // AnnouncementType::class,
        ]);

        // \App\Models\User::factory(10)->hasDiaries(1500)->has(\App\Models\Book::factory(3)->hasReadings(200))->create();
        // \App\Models\Announcement::factory(100)->create();
    }
}

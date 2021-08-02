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
            UserSeeder::class,
            AnnouncementType::class,
        ]);

        \App\Models\User::factory(10)->hasDiaries(500)->create();
        \App\Models\Announcement::factory(50)->create();
    }
}

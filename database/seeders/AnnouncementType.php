<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnnouncementType extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('announcement_types')->insert([
            'name' => 'おしらせ',
            'priority' => '1',
        ]);

        DB::table('announcement_types')->insert([
            'name' => 'メンテナンス',
            'priority' => '2',
        ]);
    }
}

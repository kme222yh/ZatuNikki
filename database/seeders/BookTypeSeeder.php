<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BookType;

class BookTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bt = new BookType();
        $bt->name = 'book';
        $bt->save();


        $bt = new BookType();
        $bt->name = 'web';
        $bt->save();
    }
}

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
        \App\Models\Movie::factory(5)->create();
        $artists = \App\Models\Artist::factory(10)->create();

        \App\Models\Movie::all()->each(function ($movie) use ($artists){
            $movie->artists()->saveMany($artists);
         });
    }
}

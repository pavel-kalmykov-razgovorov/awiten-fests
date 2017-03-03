<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ArtistsTableSeeder::class);
        $this->call(FestivalsTableSeeder::class);
        $this->call(GenresTableSeeder::class);
        $this->call(Artist_GenresTableSeeder::class);
        $this->call(Artist_FestivalTableSeeder::class);
        $this->call(Festival_GenresTableSeeder::class);
    }
}

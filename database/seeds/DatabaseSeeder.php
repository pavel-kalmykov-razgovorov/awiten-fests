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
        $this->call(ArtistGenreTableSeeder::class);
        $this->call(ArtistFestivalTableSeeder::class);
        $this->call(FestivalGenreTableSeeder::class);
        $this->call(PostsTableSeeder::class);
        $this->call(PhotosTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(AdminsTableSeeder::class);
        $this->call(ProvinceTableSeeder::class);
        $this->call(CountryTableSeeder::class);
    }
}

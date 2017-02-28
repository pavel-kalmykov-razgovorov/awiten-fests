<?php

use Illuminate\Database\Seeder;

class GenresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('genres')->delete();
        DB::table('genres')->insert(
            [
                ['genre' => 'Techno'],
                ['genre' => 'Tech House'],
                ['genre' => 'EDM'],
                ['genre' => 'Future House'],
                ['genre' => 'Trance'],
                ['genre' => 'Hardstyle']
            ]
        );
    }
}

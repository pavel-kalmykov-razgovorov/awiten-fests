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
                ['name' => 'Techno', 'permalink' => 'techno'],
                ['name' => 'Tech House', 'permalink' => 'tech-house'],
                ['name' => 'EDM', 'permalink' => 'edm'],
                ['name' => 'Future House', 'permalink' => 'future-house'],
                ['name' => 'Trance', 'permalink' => 'trance'],
                ['name' => 'Hardstyle', 'permalink' => 'hardstyle']
            ]
        );
    }
}

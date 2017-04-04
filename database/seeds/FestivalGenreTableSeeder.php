<?php

use Illuminate\Database\Seeder;

class FestivalGenreTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Id festivales
        $medusa = DB::table('festivals')->where('name', 'Medusa Sunbeach Festival')->first()->id;
        $arenal = DB::table('festivals')->where('name', 'Arenal Sound')->first()->id;
        $dreambeach = DB::table('festivals')->where('name', 'Dreambeach Festival')->first()->id;
        $awakenings = DB::table('festivals')->where('name', 'Awakenings')->first()->id;
        $sstory = DB::table('festivals')->where('name', 'A Summer Story')->first()->id;
        $aquasella = DB::table('festivals')->where('name', 'Aquasella')->first()->id;
        $wan = DB::table('festivals')->where('name', 'Wan Festival')->first()->id;
        $tomorrow = DB::table('festivals')->where('name', 'Tomorrowland')->first()->id;
        $umf = DB::table('festivals')->where('name', 'Ultra Music Festival')->first()->id;
        $jaco = DB::table('festivals')->where('name', 'The Jaco Festival')->first()->id;

        // Id generos
        $techno = DB::table('genres')->where('genre', 'Techno')->first()->id;
        $techouse = DB::table('genres')->where('genre', 'Tech House')->first()->id;
        $edm = DB::table('genres')->where('genre', 'EDM')->first()->id;
        $future = DB::table('genres')->where('genre', 'Future House')->first()->id;        
        $trance = DB::table('genres')->where('genre', 'Trance')->first()->id;
        $hardstyle = DB::table('genres')->where('genre', 'Hardstyle')->first()->id;

        DB::table('festival_genre')->delete();
        DB::table('festival_genre')->insert(
            [
             //   ['festival_id' => $medusa , 'genre_id' => $edm],
                ['festival_id' => $medusa , 'genre_id' => $techno],
                ['festival_id' => $medusa , 'genre_id' => $techouse],
                ['festival_id' => $medusa , 'genre_id' => $future],
                ['festival_id' => $medusa , 'genre_id' => $trance],
                ['festival_id' => $medusa , 'genre_id' => $hardstyle],
                ['festival_id' => $arenal , 'genre_id' => $edm],
                ['festival_id' => $arenal , 'genre_id' => $future],
             //   ['festival_id' => $dreambeach , 'genre_id' => $edm],
                ['festival_id' => $dreambeach , 'genre_id' => $techno],
                ['festival_id' => $dreambeach , 'genre_id' => $techouse],
                ['festival_id' => $dreambeach , 'genre_id' => $future],
                ['festival_id' => $dreambeach , 'genre_id' => $trance],
                ['festival_id' => $dreambeach , 'genre_id' => $hardstyle],
                ['festival_id' => $awakenings , 'genre_id' => $techno],
                ['festival_id' => $awakenings , 'genre_id' => $techouse],
              //  ['festival_id' => $sstory , 'genre_id' => $edm],
                ['festival_id' => $sstory , 'genre_id' => $techno],
                ['festival_id' => $sstory , 'genre_id' => $techouse],
                ['festival_id' => $sstory , 'genre_id' => $hardstyle],
                ['festival_id' => $aquasella , 'genre_id' => $techno],
                ['festival_id' => $aquasella , 'genre_id' => $techouse],
                ['festival_id' => $wan , 'genre_id' => $techno],
                ['festival_id' => $wan , 'genre_id' => $techouse],
                ['festival_id' => $tomorrow , 'genre_id' => $edm],
                ['festival_id' => $tomorrow , 'genre_id' => $techno],
                ['festival_id' => $tomorrow , 'genre_id' => $techouse],
                ['festival_id' => $tomorrow , 'genre_id' => $future],
                ['festival_id' => $tomorrow , 'genre_id' => $trance],
                ['festival_id' => $tomorrow , 'genre_id' => $hardstyle],
            //    ['festival_id' => $umf , 'genre_id' => $edm],
                ['festival_id' => $umf , 'genre_id' => $techno],
                ['festival_id' => $umf , 'genre_id' => $techouse],
                ['festival_id' => $umf , 'genre_id' => $future],
                ['festival_id' => $umf , 'genre_id' => $trance],
                ['festival_id' => $umf , 'genre_id' => $hardstyle],
                ['festival_id' => $jaco , 'genre_id' => $techno]
            ]
            );
    }
        
}

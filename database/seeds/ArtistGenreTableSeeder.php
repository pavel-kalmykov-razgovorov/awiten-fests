<?php

use Illuminate\Database\Seeder;

class ArtistGenreTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Id artistas
        $joris = DB::table('artists')->where('name', 'Joris Voorn')->first()->id;
        $osuna = DB::table('artists')->where('name', 'Paco Osuna')->first()->id;
        $hawtin = DB::table('artists')->where('name', 'Richie Hawtin')->first()->id;
        $cc = DB::table('artists')->where('name', 'Carl Cox')->first()->id;
        $beyer = DB::table('artists')->where('name', 'Adam Beyer')->first()->id;
        $carola = DB::table('artists')->where('name', 'Marco Carola')->first()->id;
        $capriati = DB::table('artists')->where('name', 'Joseph Capriati')->first()->id;
        $locodice = DB::table('artists')->where('name', 'Loco Dice')->first()->id;
        $ritch = DB::table('artists')->where('name', 'Paul Ritch')->first()->id;
        $panpot = DB::table('artists')->where('name', 'Pan-Pot')->first()->id;
        $armin = DB::table('artists')->where('name', 'Armin van Buuren')->first()->id;
        $pauldyk = DB::table('artists')->where('name', 'Paul van Dyk')->first()->id;
        $sanderdoorn = DB::table('artists')->where('name', 'Sander van Doorn')->first()->id;
        $diablo = DB::table('artists')->where('name', 'Don Diablo')->first()->id;
        $hardwell = DB::table('artists')->where('name', 'Hardwell')->first()->id;
        $galantis = DB::table('artists')->where('name', 'Galantis')->first()->id;
        $coone = DB::table('artists')->where('name', 'Coone')->first()->id;
        $zatox = DB::table('artists')->where('name', 'Zatox')->first()->id;
        $brennan = DB::table('artists')->where('name', 'Brennan Heart')->first()->id;

        //Id generos
        $techno = DB::table('genres')->where('genre', 'Techno')->first()->id;
        $techouse = DB::table('genres')->where('genre', 'Tech House')->first()->id;
        $edm = DB::table('genres')->where('genre', 'EDM')->first()->id;
        $future = DB::table('genres')->where('genre', 'Future House')->first()->id;        
        $trance = DB::table('genres')->where('genre', 'Trance')->first()->id;
        $hardstyle = DB::table('genres')->where('genre', 'Hardstyle')->first()->id;

        DB::table('artist_genre')->delete();
        DB::table('artist_genre')->insert(
            [
                
                ['artist_id' => $joris , 'genre_id' => $techno],
                ['artist_id' => $osuna , 'genre_id' => $techno],                
                ['artist_id' => $osuna , 'genre_id' => $techouse],
                ['artist_id' => $hawtin , 'genre_id' => $techno],
                ['artist_id' => $cc , 'genre_id' => $techno],
                ['artist_id' => $cc , 'genre_id' => $techouse],
                ['artist_id' => $beyer , 'genre_id' => $techno],
                ['artist_id' => $carola , 'genre_id' => $techno],
                ['artist_id' => $carola , 'genre_id' => $techouse],
                ['artist_id' => $capriati , 'genre_id' => $techno],
                ['artist_id' => $locodice , 'genre_id' => $techno],
                ['artist_id' => $locodice , 'genre_id' => $techouse],
                ['artist_id' => $ritch , 'genre_id' => $techno],
                ['artist_id' => $ritch , 'genre_id' => $techouse],
                ['artist_id' => $panpot , 'genre_id' => $techno],
                ['artist_id' => $panpot , 'genre_id' => $techouse],
                ['artist_id' => $armin , 'genre_id' => $trance],
                ['artist_id' => $armin , 'genre_id' => $edm],
                ['artist_id' => $pauldyk , 'genre_id' => $trance],
                ['artist_id' => $sanderdoorn , 'genre_id' => $trance],
                ['artist_id' => $sanderdoorn , 'genre_id' => $edm],
                ['artist_id' => $diablo , 'genre_id' => $edm],
                ['artist_id' => $diablo , 'genre_id' => $future],
                ['artist_id' => $hardwell , 'genre_id' => $edm],
                ['artist_id' => $galantis , 'genre_id' => $edm],
                ['artist_id' => $galantis , 'genre_id' => $future],
                ['artist_id' => $coone , 'genre_id' => $hardstyle],
                ['artist_id' => $coone , 'genre_id' => $edm],
                ['artist_id' => $zatox , 'genre_id' => $hardstyle],
                ['artist_id' => $brennan , 'genre_id' => $hardstyle]
            ]
        );
    }
}

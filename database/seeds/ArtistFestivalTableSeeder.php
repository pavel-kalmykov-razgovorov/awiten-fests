<?php

use Illuminate\Database\Seeder;

class ArtistFestivalTableSeeder extends Seeder
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

        // Id artistas
        $joris = DB::table('artists')->where('name', 'Joris Voorn')->first()->id;
        $tremor = DB::table('artists')->where('name', 'DJ Tremor')->first()->id;
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

        DB::table('artist_festival')->delete();
        DB::table('artist_festival')->insert(
            [
                ['festival_id' => $dreambeach, 'artist_id' => $panpot, 'confirmed' => true],
                ['festival_id' => $medusa, 'artist_id' => $hardwell, 'confirmed' => true],
                ['festival_id' => $medusa, 'artist_id' => $coone, 'confirmed' => true],
                ['festival_id' => $medusa, 'artist_id' => $hawtin, 'confirmed' => true],

                ['festival_id' => $medusa, 'artist_id' => $tremor, 'confirmed' => true],
                ['festival_id' => $arenal, 'artist_id' => $tremor, 'confirmed' => true],
                ['festival_id' => $dreambeach, 'artist_id' => $tremor, 'confirmed' => true],
                ['festival_id' => $awakenings, 'artist_id' => $tremor, 'confirmed' => true],
                ['festival_id' => $sstory, 'artist_id' => $tremor, 'confirmed' => true],
                ['festival_id' => $aquasella, 'artist_id' => $tremor, 'confirmed' => true],

                ['festival_id' => $medusa, 'artist_id' => $panpot, 'confirmed' => true],
                ['festival_id' => $medusa, 'artist_id' => $armin, 'confirmed' => true],
                ['festival_id' => $medusa, 'artist_id' => $capriati, 'confirmed' => true],
                ['festival_id' => $medusa, 'artist_id' => $joris, 'confirmed' => true],
                ['festival_id' => $medusa, 'artist_id' => $ritch, 'confirmed' => true],
                ['festival_id' => $arenal, 'artist_id' => $galantis, 'confirmed' => true],
                ['festival_id' => $arenal, 'artist_id' => $diablo, 'confirmed' => true],
                ['festival_id' => $arenal, 'artist_id' => $sanderdoorn, 'confirmed' => true],
                ['festival_id' => $dreambeach, 'artist_id' => $joris, 'confirmed' => true],
                ['festival_id' => $dreambeach, 'artist_id' => $osuna, 'confirmed' => true],
                ['festival_id' => $dreambeach, 'artist_id' => $cc, 'confirmed' => true],
                ['festival_id' => $dreambeach, 'artist_id' => $carola, 'confirmed' => true],
                ['festival_id' => $dreambeach, 'artist_id' => $locodice, 'confirmed' => true],
                ['festival_id' => $dreambeach, 'artist_id' => $sanderdoorn, 'confirmed' => true],
                ['festival_id' => $dreambeach, 'artist_id' => $diablo, 'confirmed' => true],
                ['festival_id' => $dreambeach, 'artist_id' => $brennan, 'confirmed' => true],
                ['festival_id' => $awakenings, 'artist_id' => $joris, 'confirmed' => true],
                ['festival_id' => $awakenings, 'artist_id' => $osuna, 'confirmed' => true],
                ['festival_id' => $awakenings, 'artist_id' => $cc, 'confirmed' => true],
                ['festival_id' => $awakenings, 'artist_id' => $beyer, 'confirmed' => true],
                ['festival_id' => $awakenings, 'artist_id' => $carola, 'confirmed' => true],
                ['festival_id' => $awakenings, 'artist_id' => $capriati, 'confirmed' => true],
                ['festival_id' => $awakenings, 'artist_id' => $locodice, 'confirmed' => true],
                ['festival_id' => $awakenings, 'artist_id' => $ritch, 'confirmed' => true],
                ['festival_id' => $awakenings, 'artist_id' => $hawtin, 'confirmed' => true],
                ['festival_id' => $awakenings, 'artist_id' => $panpot, 'confirmed' => true],
                ['festival_id' => $sstory, 'artist_id' => $beyer, 'confirmed' => true],
                ['festival_id' => $sstory, 'artist_id' => $zatox, 'confirmed' => true],
                ['festival_id' => $sstory, 'artist_id' => $brennan, 'confirmed' => true],
                ['festival_id' => $sstory, 'artist_id' => $hardwell, 'confirmed' => true],
                ['festival_id' => $sstory, 'artist_id' => $osuna, 'confirmed' => true],
                ['festival_id' => $sstory, 'artist_id' => $armin, 'confirmed' => true],
                ['festival_id' => $sstory, 'artist_id' => $pauldyk, 'confirmed' => true],
                ['festival_id' => $aquasella, 'artist_id' => $beyer, 'confirmed' => true],
                ['festival_id' => $aquasella, 'artist_id' => $capriati, 'confirmed' => true],
                ['festival_id' => $aquasella, 'artist_id' => $ritch, 'confirmed' => true],
                ['festival_id' => $aquasella, 'artist_id' => $osuna, 'confirmed' => true],
                ['festival_id' => $aquasella, 'artist_id' => $locodice, 'confirmed' => true],
                ['festival_id' => $wan, 'artist_id' => $hawtin, 'confirmed' => true],
                ['festival_id' => $wan, 'artist_id' => $carola, 'confirmed' => true],
                ['festival_id' => $wan, 'artist_id' => $osuna, 'confirmed' => true],
                ['festival_id' => $wan, 'artist_id' => $cc, 'confirmed' => true],
                ['festival_id' => $tomorrow, 'artist_id' => $hardwell, 'confirmed' => true],
                ['festival_id' => $tomorrow, 'artist_id' => $diablo, 'confirmed' => true],
                ['festival_id' => $tomorrow, 'artist_id' => $galantis, 'confirmed' => true],
                ['festival_id' => $tomorrow, 'artist_id' => $armin, 'confirmed' => true],
                ['festival_id' => $tomorrow, 'artist_id' => $pauldyk, 'confirmed' => true],
                ['festival_id' => $tomorrow, 'artist_id' => $coone, 'confirmed' => true],
                ['festival_id' => $tomorrow, 'artist_id' => $brennan, 'confirmed' => true],
                ['festival_id' => $tomorrow, 'artist_id' => $cc, 'confirmed' => true],
                ['festival_id' => $tomorrow, 'artist_id' => $panpot, 'confirmed' => true],
                ['festival_id' => $umf, 'artist_id' => $zatox, 'confirmed' => true],
                ['festival_id' => $umf, 'artist_id' => $sanderdoorn, 'confirmed' => true],
                ['festival_id' => $umf, 'artist_id' => $armin, 'confirmed' => true],
                ['festival_id' => $umf, 'artist_id' => $hardwell, 'confirmed' => true],
                ['festival_id' => $umf, 'artist_id' => $diablo, 'confirmed' => true],
                ['festival_id' => $umf, 'artist_id' => $coone, 'confirmed' => true],
                ['festival_id' => $jaco, 'artist_id' => $joris, 'confirmed' => true],
                ['festival_id' => $jaco, 'artist_id' => $osuna, 'confirmed' => true],
                ['festival_id' => $jaco, 'artist_id' => $hawtin, 'confirmed' => true],
                ['festival_id' => $jaco, 'artist_id' => $cc, 'confirmed' => true],
                ['festival_id' => $jaco, 'artist_id' => $beyer, 'confirmed' => true],
                ['festival_id' => $jaco, 'artist_id' => $capriati, 'confirmed' => true],
                ['festival_id' => $jaco, 'artist_id' => $locodice, 'confirmed' => true],
                ['festival_id' => $jaco, 'artist_id' => $ritch, 'confirmed' => true],
                ['festival_id' => $jaco, 'artist_id' => $panpot, 'confirmed' => true],
            ]
        );
    }

}

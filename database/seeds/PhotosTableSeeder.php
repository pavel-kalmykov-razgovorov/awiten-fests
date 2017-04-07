<?php

use Illuminate\Database\Seeder;

class PhotosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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

        DB::table('photos')->delete();
        DB::table('photos')->insert(
            [
                ['path' => '/images/festivales/aquasella/aquasella1.jpg', 'name' => 'aquasella1.jpg', 'festival_id' => $aquasella, 'permalink' => "aquasella1jpg"],
                ['path' => '/images/festivales/aquasella/aquasella2.jpg', 'name' => 'aquasella2.jpg', 'festival_id' => $aquasella, 'permalink' => "aquasella2jpg"],
                ['path' => '/images/festivales/aquasella/aquasella3.jpg', 'name' => 'aquasella3.jpg', 'festival_id' => $aquasella, 'permalink' => "aquasella3jpg"],
                ['path' => '/images/festivales/arenal-sound/arenal-sound1.jpg', 'name' => 'arenal-sound1.jpg', 'festival_id' => $arenal, 'permalink' => "arenal-sound1jpg"],
                ['path' => '/images/festivales/arenal-sound/arenal-sound2.jpg', 'name' => 'arenal-sound2.jpg', 'festival_id' => $arenal, 'permalink' => "arenal-sound2jpg"],
                ['path' => '/images/festivales/a-summer-story/a-summer-story1.jpg', 'name' => 'a-summer-story1.jpg', 'festival_id' => $sstory, 'permalink' => "a-summer-story1jpg"],
                ['path' => '/images/festivales/a-summer-story/a-summer-story2.jpg', 'name' => 'a-summer-story2.jpg', 'festival_id' => $sstory, 'permalink' => "a-summer-story2jpg"],
                ['path' => '/images/festivales/awakenings/awakenings1.jpg', 'name' => 'awakenings1.jpg', 'festival_id' => $awakenings, 'permalink' => "awakenings1jpg"],
                ['path' => '/images/festivales/awakenings/awakenings2.jpg', 'name' => 'awakenings2.jpg', 'festival_id' => $awakenings, 'permalink' => "awakenings2jpg"],
                ['path' => '/images/festivales/awakenings/awakenings3.jpg', 'name' => 'awakenings3.jpg', 'festival_id' => $awakenings, 'permalink' => "awakenings3jpg"],
                ['path' => '/images/festivales/awakenings/awakenings4.jpg', 'name' => 'awakenings4.jpg', 'festival_id' => $awakenings, 'permalink' => "awakenings4jpg"],
                ['path' => '/images/festivales/awakenings/awakenings5.jpg', 'name' => 'awakenings5.jpg', 'festival_id' => $awakenings, 'permalink' => "awakenings5jpg"],
                ['path' => '/images/festivales/dreambeach-festival/dreambeach1.jpg', 'name' => 'dreambeach1.jpg', 'festival_id' => $dreambeach, 'permalink' => "dreambeach1jpg"],
                ['path' => '/images/festivales/dreambeach-festival/dreambeach2.jpg', 'name' => 'dreambeach2.jpg', 'festival_id' => $dreambeach, 'permalink' => "dreambeach2jpg"],
                ['path' => '/images/festivales/the-jaco-festival/creamfields1.jpg', 'name' => 'creamfields1.jpg', 'festival_id' => $jaco, 'permalink' => "creamfields1jpg"],
                ['path' => '/images/festivales/the-jaco-festival/creamfields2.jpg', 'name' => 'creamfields2.jpg', 'festival_id' => $jaco, 'permalink' => "creamfields2jpg"],
                ['path' => '/images/festivales/the-jaco-festival/creamfields3.jpg', 'name' => 'creamfields3.jpg', 'festival_id' => $jaco, 'permalink' => "creamfields3jpg"],
                ['path' => '/images/festivales/the-jaco-festival/creamfields4.jpg', 'name' => 'creamfields4.jpg', 'festival_id' => $jaco, 'permalink' => "creamfields4jpg"],
                ['path' => '/images/festivales/medusa-sunbeach-festival/medusa1.jpg', 'name' => 'medusa1.jpg', 'festival_id' => $medusa, 'permalink' => "medusa1jpg"],
                ['path' => '/images/festivales/medusa-sunbeach-festival/medusa2.jpg', 'name' => 'medusa2.jpg', 'festival_id' => $medusa, 'permalink' => "medusa2jpg"],
                ['path' => '/images/festivales/medusa-sunbeach-festival/medusa3.jpg', 'name' => 'medusa3.jpg', 'festival_id' => $medusa, 'permalink' => "medusa3jpg"],
                ['path' => '/images/festivales/medusa-sunbeach-festival/medusa4.jpg', 'name' => 'medusa4.jpg', 'festival_id' => $medusa, 'permalink' => "medusa4jpg"],
                ['path' => '/images/festivales/medusa-sunbeach-festival/medusa-raul-barcia.jpg', 'name' => 'medusa-raul-barcia.jpg', 'festival_id' => $medusa, 'permalink' => "medusa-raul-barciajpg"],
                ['path' => '/images/festivales/tomorrowland/tomorrowland1.jpg', 'name' => 'tomorrowland1.jpg', 'festival_id' => $tomorrow, 'permalink' => "tomorrowland1jpg"],
                ['path' => '/images/festivales/tomorrowland/tomorrowland2.jpg', 'name' => 'tomorrowland2.jpg', 'festival_id' => $tomorrow, 'permalink' => "tomorrowland2jpg"],
                ['path' => '/images/festivales/tomorrowland/tomorrowland3.jpg', 'name' => 'tomorrowland3.jpg', 'festival_id' => $tomorrow, 'permalink' => "tomorrowland3jpg"],
                ['path' => '/images/festivales/tomorrowland/tomorrowland4.jpg', 'name' => 'tomorrowland4.jpg', 'festival_id' => $tomorrow, 'permalink' => "tomorrowland4jpg"],
                ['path' => '/images/festivales/tomorrowland/tomorrowland5.jpg', 'name' => 'tomorrowland5.jpg', 'festival_id' => $tomorrow, 'permalink' => "tomorrowland5jpg"],
                ['path' => '/images/festivales/tomorrowland/tomorrowland6.jpg', 'name' => 'tomorrowland6.jpg', 'festival_id' => $tomorrow, 'permalink' => "tomorrowland6jpg"],
                ['path' => '/images/festivales/ultra-music-festival/UMF1.jpg', 'name' => 'UMF1.jpg', 'festival_id' => $umf, 'permalink' => "umf1jpg"],
                ['path' => '/images/festivales/ultra-music-festival/UMF2.jpg', 'name' => 'UMF2.jpg', 'festival_id' => $umf, 'permalink' => "umf2jpg"],
                ['path' => '/images/festivales/ultra-music-festival/UMF-3.jpg', 'name' => 'UMF-3.jpg', 'festival_id' => $umf, 'permalink' => "umf-3jpg"],
                ['path' => '/images/festivales/ultra-music-festival/umf4.jpg', 'name' => 'umf4.jpg', 'festival_id' => $umf, 'permalink' => "umf4jpg"],
                ['path' => '/images/festivales/wan-festival/wan1.jpg', 'name' => 'wan1.jpg', 'festival_id' => $wan, 'permalink' => "wan1jpg"],
                ['path' => '/images/festivales/wan-festival/wan2.jpeg', 'name' => 'wan2.jpeg', 'festival_id' => $wan, 'permalink' => "wan2jpeg"],
                ['path' => '/images/festivales/wan-festival/wan3.png', 'name' => 'wan3.png', 'festival_id' => $wan, 'permalink' => "wan3png"],
            ]
        );
    }
}
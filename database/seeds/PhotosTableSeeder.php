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
                ['name' => 'aquasella1.jpg', 'festival_id' => $aquasella, 'permalink' => "aquasella1jpg"],
                ['name' => 'aquasella2.jpg', 'festival_id' => $aquasella, 'permalink' => "aquasella2jpg"],
                ['name' => 'aquasella3.jpg', 'festival_id' => $aquasella, 'permalink' => "aquasella3jpg"],
                ['name' => 'arenal-sound1.jpg', 'festival_id' => $arenal, 'permalink' => "arenal-sound1jpg"],
                ['name' => 'arenal-sound2.jpg', 'festival_id' => $arenal, 'permalink' => "arenal-sound2jpg"],
                ['name' => 'a-summer-story1.jpg', 'festival_id' => $sstory, 'permalink' => "a-summer-story1jpg"],
                ['name' => 'a-summer-story2.jpg', 'festival_id' => $sstory, 'permalink' => "a-summer-story2jpg"],
                ['name' => 'awakenings1.jpg', 'festival_id' => $awakenings, 'permalink' => "awakenings1jpg"],
                ['name' => 'awakenings2.jpg', 'festival_id' => $awakenings, 'permalink' => "awakenings2jpg"],
                ['name' => 'awakenings3.jpg', 'festival_id' => $awakenings, 'permalink' => "awakenings3jpg"],
                ['name' => 'awakenings4.jpg', 'festival_id' => $awakenings, 'permalink' => "awakenings4jpg"],
                ['name' => 'awakenings5.jpg', 'festival_id' => $awakenings, 'permalink' => "awakenings5jpg"],
                ['name' => 'dreambeach1.jpg', 'festival_id' => $dreambeach, 'permalink' => "dreambeach1jpg"],
                ['name' => 'dreambeach2.jpg', 'festival_id' => $dreambeach, 'permalink' => "dreambeach2jpg"],
                ['name' => 'creamfields1.jpg', 'festival_id' => $jaco, 'permalink' => "creamfields1jpg"],
                ['name' => 'creamfields2.jpg', 'festival_id' => $jaco, 'permalink' => "creamfields2jpg"],
                ['name' => 'creamfields3.jpg', 'festival_id' => $jaco, 'permalink' => "creamfields3jpg"],
                ['name' => 'creamfields4.jpg', 'festival_id' => $jaco, 'permalink' => "creamfields4jpg"],
                ['name' => 'medusa1.jpg', 'festival_id' => $medusa, 'permalink' => "medusa1jpg"],
                ['name' => 'medusa2.jpg', 'festival_id' => $medusa, 'permalink' => "medusa2jpg"],
                ['name' => 'medusa3.jpg', 'festival_id' => $medusa, 'permalink' => "medusa3jpg"],
                ['name' => 'medusa4.jpg', 'festival_id' => $medusa, 'permalink' => "medusa4jpg"],
                ['name' => 'medusa-raul-barcia.jpg', 'festival_id' => $medusa, 'permalink' => "medusa-raul-barciajpg"],
                ['name' => 'tomorrowland1.jpg', 'festival_id' => $tomorrow, 'permalink' => "tomorrowland1jpg"],
                ['name' => 'tomorrowland2.jpg', 'festival_id' => $tomorrow, 'permalink' => "tomorrowland2jpg"],
                ['name' => 'tomorrowland3.jpg', 'festival_id' => $tomorrow, 'permalink' => "tomorrowland3jpg"],
                ['name' => 'tomorrowland4.jpg', 'festival_id' => $tomorrow, 'permalink' => "tomorrowland4jpg"],
                ['name' => 'tomorrowland5.jpg', 'festival_id' => $tomorrow, 'permalink' => "tomorrowland5jpg"],
                ['name' => 'tomorrowland6.jpg', 'festival_id' => $tomorrow, 'permalink' => "tomorrowland6jpg"],
                ['name' => 'UMF1.jpg', 'festival_id' => $umf, 'permalink' => "umf1jpg"],
                ['name' => 'UMF2.jpg', 'festival_id' => $umf, 'permalink' => "umf2jpg"],
                ['name' => 'UMF-3.jpg', 'festival_id' => $umf, 'permalink' => "umf-3jpg"],
                ['name' => 'umf4.jpg', 'festival_id' => $umf, 'permalink' => "umf4jpg"],
                ['name' => 'wan1.jpg', 'festival_id' => $wan, 'permalink' => "wan1jpg"],
                ['name' => 'wan2.jpeg', 'festival_id' => $wan, 'permalink' => "wan2jpeg"],
                ['name' => 'wan3.png', 'festival_id' => $wan, 'permalink' => "wan3png"],
            ]
        );
    }
}
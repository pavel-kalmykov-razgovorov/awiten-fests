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
                        ['path' => '/storage/app/public/awiten-fests-data/festivales/aquasella', 'name' => 'aquasella1.jpg', 'festival_id' => $aquasella],
                        ['path' => '/storage/app/public/awiten-fests-data/festivales/aquasella', 'name' => 'aquasella2.jpg', 'festival_id' => $aquasella],
                        ['path' => '/storage/app/public/awiten-fests-data/festivales/aquasella', 'name' => 'aquasella3.jpg', 'festival_id' => $aquasella],
                        ['path' => '/storage/app/public/awiten-fests-data/festivales/arenal', 'name' => 'arenal-sound1.jpg', 'festival_id' => $arenal],
                        ['path' => '/storage/app/public/awiten-fests-data/festivales/arenal', 'name' => 'arenal-sound2.jpg', 'festival_id' => $arenal],
                        ['path' => '/storage/app/public/awiten-fests-data/festivales/asummerstory', 'name' => 'a-summer-story1.jpg', 'festival_id' => $sstory],
                        ['path' => '/storage/app/public/awiten-fests-data/festivales/asummerstory', 'name' => 'a-summer-story2.jpg', 'festival_id' => $sstory],
                        ['path' => '/storage/app/public/awiten-fests-data/festivales/awakenings', 'name' => 'awakenings1.jpg', 'festival_id' => $awakenings],
                        ['path' => '/storage/app/public/awiten-fests-data/festivales/awakenings', 'name' => 'awakenings2.jpg', 'festival_id' => $awakenings],
                        ['path' => '/storage/app/public/awiten-fests-data/festivales/awakenings', 'name' => 'awakenings3.jpg', 'festival_id' => $awakenings],
                        ['path' => '/storage/app/public/awiten-fests-data/festivales/awakenings', 'name' => 'awakenings4.jpg', 'festival_id' => $awakenings],
                        ['path' => '/storage/app/public/awiten-fests-data/festivales/awakenings', 'name' => 'awakenings5.jpg', 'festival_id' => $awakenings],
                        ['path' => '/storage/app/public/awiten-fests-data/festivales/dreambeach', 'name' => 'dreambeach1.jpg', 'festival_id' => $dreambeach],
                        ['path' => '/storage/app/public/awiten-fests-data/festivales/dreambeach', 'name' => 'dreambeach2.jpg', 'festival_id' => $dreambeach],
                        ['path' => '/storage/app/public/awiten-fests-data/festivales/jaco', 'name' => 'creamfields1.jpg', 'festival_id' => $jaco],
                        ['path' => '/storage/app/public/awiten-fests-data/festivales/jaco', 'name' => 'creamfields2.jpg', 'festival_id' => $jaco],
                        ['path' => '/storage/app/public/awiten-fests-data/festivales/jaco', 'name' => 'creamfields3.jpg', 'festival_id' => $jaco],
                        ['path' => '/storage/app/public/awiten-fests-data/festivales/jaco', 'name' => 'creamfields4.jpg', 'festival_id' => $jaco],
                        ['path' => '/storage/app/public/awiten-fests-data/festivales/medusa', 'name' => 'medusa1.jpg', 'festival_id' => $medusa],
                        ['path' => '/storage/app/public/awiten-fests-data/festivales/medusa', 'name' => 'medusa2.jpg', 'festival_id' => $medusa],
                        ['path' => '/storage/app/public/awiten-fests-data/festivales/medusa', 'name' => 'medusa3.jpg', 'festival_id' => $medusa],
                        ['path' => '/storage/app/public/awiten-fests-data/festivales/medusa', 'name' => 'medusa4.jpg', 'festival_id' => $medusa],
                        ['path' => '/storage/app/public/awiten-fests-data/festivales/medusa', 'name' => 'medusa-raul-barcia.jpg', 'festival_id' => $medusa],
                        ['path' => '/storage/app/public/awiten-fests-data/festivales/tomorrowland', 'name' => 'tomorrowland1.jpg', 'festival_id' => $tomorrow],
                        ['path' => '/storage/app/public/awiten-fests-data/festivales/tomorrowland', 'name' => 'tomorrowland2.jpg', 'festival_id' => $tomorrow],
                        ['path' => '/storage/app/public/awiten-fests-data/festivales/tomorrowland', 'name' => 'tomorrowland3.jpg', 'festival_id' => $tomorrow],
                        ['path' => '/storage/app/public/awiten-fests-data/festivales/tomorrowland', 'name' => 'tomorrowland4.jpg', 'festival_id' => $tomorrow],
                        ['path' => '/storage/app/public/awiten-fests-data/festivales/tomorrowland', 'name' => 'tomorrowland5.jpg', 'festival_id' => $tomorrow],
                        ['path' => '/storage/app/public/awiten-fests-data/festivales/tomorrowland', 'name' => 'tomorrowland6.jpg', 'festival_id' => $tomorrow],
                        ['path' => '/storage/app/public/awiten-fests-data/festivales/umf', 'name' => 'UMF1.jpg', 'festival_id' => $umf],
                        ['path' => '/storage/app/public/awiten-fests-data/festivales/umf', 'name' => 'UMF2.jpg', 'festival_id' => $umf],
                        ['path' => '/storage/app/public/awiten-fests-data/festivales/umf', 'name' => 'UMF-3.jpg', 'festival_id' => $umf],
                        ['path' => '/storage/app/public/awiten-fests-data/festivales/umf', 'name' => 'umf4.jpg', 'festival_id' => $umf],
                        ['path' => '/storage/app/public/awiten-fests-data/festivales/wan', 'name' => 'wan1.jpg', 'festival_id' => $wan],
                        ['path' => '/storage/app/public/awiten-fests-data/festivales/wan', 'name' => 'wan2.jpeg', 'festival_id' => $wan],
                        ['path' => '/storage/app/public/awiten-fests-data/festivales/wan', 'name' => 'wan3.png', 'festival_id' => $wan]

                    ]
                );
        }
}

<?php

use App\User;
use Illuminate\Database\Seeder;

class FestivalsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    //Probandooo
    public function run()
    {
        $promoter_ids = array_flatten(User::where('typeOfUser', 'promoter')->get(['id'])->toArray());

        DB::table('festivals')->delete();
        DB::table('festivals')->insert(
            [
                ['name' => 'Medusa Sunbeach Festival', 'location' => 'Cullera', 'date' => '2017-08-10 00:00:00', 'province' => 'Valencia',
                    'permalink' => 'medusa-sunbeach-festival', 'pathLogo' => 'logo.png', 'promoter_id' => $promoter_ids[rand(0, count($promoter_ids) - 1)]],
                ['name' => 'Arenal Sound', 'location' => 'Burriana', 'date' => '2017-08-02 00:00:00', 'province' => 'Castellon',
                    'permalink' => 'arenal-sound', 'pathLogo' => 'logo.png', 'promoter_id' => $promoter_ids[rand(0, count($promoter_ids) - 1)]],
                ['name' => 'Dreambeach Festival', 'location' => 'Villaricos', 'date' => '2017-07-17 00:00:00', 'province' => 'Almeria',
                    'permalink' => 'dreambeach-festival', 'pathLogo' => 'logo.png', 'promoter_id' => $promoter_ids[rand(0, count($promoter_ids) - 1)]],
                ['name' => 'Awakenings', 'location' => 'Gashouder', 'date' => '2017-04-14 00:00:00', 'province' => 'Amsterdam',
                    'permalink' => 'awakenings', 'pathLogo' => 'logo.png', 'promoter_id' => $promoter_ids[rand(0, count($promoter_ids) - 1)]],
                ['name' => 'A Summer Story', 'location' => 'Arganda del Rey', 'date' => '2017-06-23 00:00:00', 'province' => 'Madrid',
                    'permalink' => 'a-summer-story', 'pathLogo' => 'logo.png', 'promoter_id' => $promoter_ids[rand(0, count($promoter_ids) - 1)]],
                ['name' => 'Aquasella', 'location' => 'Arriondas', 'date' => '2017-07-21 00:00:00', 'province' => 'Asturias',
                    'permalink' => 'aquasella', 'pathLogo' => 'logo.png', 'promoter_id' => $promoter_ids[rand(0, count($promoter_ids) - 1)]],
                ['name' => 'Wan Festival', 'location' => 'Leganes', 'date' => '2018-01-01 00:00:00', 'province' => 'Madrid',
                    'permalink' => 'wan-festival', 'pathLogo' => 'logo.png', 'promoter_id' => $promoter_ids[rand(0, count($promoter_ids) - 1)]],
                ['name' => 'Tomorrowland', 'location' => 'Schorre Recreation Area', 'date' => '2017-07-28 00:00:00', 'province' => 'Boom',
                    'permalink' => 'tomorrowland', 'pathLogo' => 'logo.png', 'promoter_id' => $promoter_ids[rand(0, count($promoter_ids) - 1)]],
                ['name' => 'Ultra Music Festival', 'location' => 'Bayfront Park', 'date' => '2018-03-24 00:00:00', 'province' => 'Miami',
                    'permalink' => 'ultra-music-festival', 'pathLogo' => 'logo.png', 'promoter_id' => $promoter_ids[rand(0, count($promoter_ids) - 1)]],
                ['name' => 'The Jaco Festival', 'location' => 'Las Bitacoras', 'date' => '2017-08-25 00:00:00', 'province' => 'Alicante',
                    'permalink' => 'the-jaco-festival', 'pathLogo' => 'logo.png', 'promoter_id' => $promoter_ids[rand(0, count($promoter_ids) - 1)]]

            ]
        );

    }
}

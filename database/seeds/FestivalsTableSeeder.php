<?php

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
        DB::table('festivals')->delete();
        DB::table('festivals')->insert(
            [
                ['name' => 'Medusa Sunbeach Festival', 'location' => 'Cullera', 'date' => '2017-08-10 00:00:00', 'province' => 'Valencia', 'permalink' => 'medusa-sunbeach-festival', 'pathLogo' => '/images/festivales/medusa-sunbeach-festival/logo.png'],
                ['name' => 'Arenal Sound', 'location' => 'Burriana', 'date' => '2017-08-02 00:00:00', 'province' => 'Castellon', 'permalink' => 'arenal-sound', 'pathLogo' => '/images/festivales/arenal-sound/logo.png'],
                ['name' => 'Dreambeach Festival', 'location' => 'Villaricos', 'date' => '2017-07-17 00:00:00', 'province' => 'Almeria', 'permalink' => 'dreambeach-festival', 'pathLogo' => '/images/festivales/dreambeach-festival/logo.png'],
                ['name' => 'Awakenings', 'location' => 'Gashouder', 'date' => '2017-04-14 00:00:00', 'province' => 'Amsterdam', 'permalink' => 'awakenings', 'pathLogo' => '/images/festivales/awakenings/logo.png'],
                ['name' => 'A Summer Story', 'location' => 'Arganda del Rey', 'date' => '2017-06-23 00:00:00', 'province' => 'Madrid', 'permalink' => 'a-summer-story', 'pathLogo' => '/images/festivales/a-summer-story/logo.png'],
                ['name' => 'Aquasella', 'location' => 'Arriondas', 'date' => '2017-07-21 00:00:00', 'province' => 'Asturias', 'permalink' => 'aquasella', 'pathLogo' => '/images/festivales/aquasella/logo.png'],
                ['name' => 'Wan Festival', 'location' => 'Leganes', 'date' => '2018-01-01 00:00:00', 'province' => 'Madrid', 'permalink' => 'wan-festival', 'pathLogo' => '/images/festivales/wan-festival/logo.png'],
                ['name' => 'Tomorrowland', 'location' => 'Schorre Recreation Area', 'date' => '2017-07-28 00:00:00', 'province' => 'Boom', 'permalink' => 'tomorrowland', 'pathLogo' => '/images/festivales/tomorrowland/logo.png'],
                ['name' => 'Ultra Music Festival', 'location' => 'Bayfront Park', 'date' => '2018-03-24 00:00:00', 'province' => 'Miami', 'permalink' => 'ultra-music-festival', 'pathLogo' => '/images/festivales/ultra-music-festival/logo.png'],
                ['name' => 'The Jaco Festival', 'location' => 'Las Bitacoras', 'date' => '2017-08-25 00:00:00', 'province' => 'Alicante', 'permalink' => 'the-jaco-festival', 'pathLogo' => '/images/festivales/the-jaco-festival/logo.png']
                
            ]
        );
        
    }
}

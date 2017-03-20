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
                ['name' => 'Medusa Sunbeach Festival', 'location' => 'Cullera', 'date' => '10/08/2017', 'province' => 'Valencia', 'permalink' => 'medusa-sunbeach-festival', 'pathLogo' => '/images/logos/logo-medusa.png'],
                ['name' => 'Arenal Sound', 'location' => 'Burriana', 'date' => '02/08/2017', 'province' => 'Castellon', 'permalink' => 'arenal-sound', 'pathLogo' => '/images/logos/logo-arenal-sound.png'],
                ['name' => 'Dreambeach Festival', 'location' => 'Villaricos', 'date' => '17/07/2017', 'province' => 'Almeria', 'permalink' => 'dreambeach-festival', 'pathLogo' => '/images/logos/logo-dreambeach.png'],
                ['name' => 'Awakenings', 'location' => 'Gashouder', 'date' => '14/04/2017', 'province' => 'Amsterdam', 'permalink' => 'awakenings', 'pathLogo' => '/images/logos/logo-awakenings.png'],
                ['name' => 'A Summer Story', 'location' => 'Arganda del Rey', 'date' => '23/06/2017', 'province' => 'Madrid', 'permalink' => 'a-summer-story', 'pathLogo' => '/images/logos/logo-a-summer-story.png'],
                ['name' => 'Aquasella', 'location' => 'Arriondas', 'date' => '21/07/2017', 'province' => 'Asturias', 'permalink' => 'aquasella', 'pathLogo' => '/images/logos/logo-aqueasella.jpg'],
                ['name' => 'Wan Festival', 'location' => 'Leganes', 'date' => '01/01/2018', 'province' => 'Madrid', 'permalink' => 'wan-festival', 'pathLogo' => '/images/logos/logo-wan.png'],
                ['name' => 'Tomorrowland', 'location' => 'Schorre Recreation Area', 'date' => '28/07/2017', 'province' => 'Boom', 'permalink' => 'tomorrowland', 'pathLogo' => '/images/logos/logo-tomorrowland.png'],
                ['name' => 'Ultra Music Festival', 'location' => 'Bayfront Park', 'date' => '24/03/2017', 'province' => 'Miami', 'permalink' => 'ultra-music-festival', 'pathLogo' => '/images/logos/logo-ultra-music-festival.jpg'],
                ['name' => 'The Jaco Festival', 'location' => 'Las Bitacoras', 'date' => '25/08/2017', 'province' => 'Alicante', 'permalink' => 'the-jaco-festival', 'pathLogo' => '/images/logos/logo-the-jaco.png']
                
            ]
        );
        
    }
}

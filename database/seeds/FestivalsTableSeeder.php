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
                ['name' => 'Medusa Sunbeach Festival', 'location' => 'Cullera', 'date' => '10/08/2017', 'province' => 'Valencia', 'permalink' => 'medusa-sunbeach-festival'],
                ['name' => 'Arenal Sound', 'location' => 'Burriana', 'date' => '02/08/2017', 'province' => 'Castellon', 'permalink' => 'arenal-sound'],
                ['name' => 'Dreambeach Festival', 'location' => 'Villaricos', 'date' => '17/07/2017', 'province' => 'Almeria', 'permalink' => 'dreambeach-festival'],
                ['name' => 'Awakenings', 'location' => 'Gashouder', 'date' => '14/04/2017', 'province' => 'Amsterdam', 'permalink' => 'awakenings'],
                ['name' => 'A Summer Story', 'location' => 'Arganda del Rey', 'date' => '23/06/2017', 'province' => 'Madrid', 'permalink' => 'a-summer-story'],
                ['name' => 'Aquasella', 'location' => 'Arriondas', 'date' => '21/07/2017', 'province' => 'Asturias', 'permalink' => 'aquasella'],
                ['name' => 'Wan Festival', 'location' => 'Leganes', 'date' => '01/01/2018', 'province' => 'Madrid', 'permalink' => 'wan-festival'],
                ['name' => 'Tomorrowland', 'location' => 'Schorre Recreation Area', 'date' => '28/07/2017', 'province' => 'Boom', 'permalink' => 'tomorrowland'],
                ['name' => 'Ultra Music Festival', 'location' => 'Bayfront Park', 'date' => '24/03/2017', 'province' => 'Miami', 'permalink' => 'ultra-music-festival'],
                ['name' => 'The Jaco Festival', 'location' => 'Las Bitacoras', 'date' => '25/08/2017', 'province' => 'Alicante', 'permalink' => 'the-jaco-festival']
                
            ]
        );
        
    }
}

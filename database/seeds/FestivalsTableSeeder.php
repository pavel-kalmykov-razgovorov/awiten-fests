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
                ['name' => 'Medusa Sunbeach Festival', 'location' => 'Cullera', 'date' => '10/08/2017', 'province' => 'Valencia'],
                ['name' => 'Arenal Sound', 'location' => 'Burriana', 'date' => '02/08/2017', 'province' => 'Castellon'],
                ['name' => 'Dreambeach Festival', 'location' => 'Villaricos', 'date' => '17/07/2017', 'province' => 'Almeria'],
                ['name' => 'Awakenings', 'location' => 'Gashouder', 'date' => '14/04/2017', 'province' => 'Amsterdam'],
                ['name' => 'A Summer Story', 'location' => 'Arganda del Rey', 'date' => '23/06/2017', 'province' => 'Madrid'],
                ['name' => 'Aquasella', 'location' => 'Arriondas', 'date' => '21/07/2017', 'province' => 'Asturias'],
                ['name' => 'Wan Festival', 'location' => 'Leganes', 'date' => '01/01/2018', 'province' => 'Madrid'],
                ['name' => 'Tomorrowland', 'location' => 'Schorre Recreation Area', 'date' => '28/07/2017', 'province' => 'Boom'],
                ['name' => 'Ultra Music Festival', 'location' => 'Bayfront Park', 'date' => '24/03/2017', 'province' => 'Miami'],
                ['name' => 'The Jaco Festival', 'location' => 'Las Bitacoras', 'date' => '25/08/2017', 'province' => 'Alicante']
                
            ]
        );
        
    }
}

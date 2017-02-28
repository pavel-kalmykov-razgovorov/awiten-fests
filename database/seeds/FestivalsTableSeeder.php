<?php

use Illuminate\Database\Seeder;

class FestivalsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('festivals')->delete();
        DB::table('festivals')->insert(
            [
                ['name' => 'Medusa', 'address' => 'Calle Doctor Marañon Nº21', 'date' => '17/08/2017', 'province' => 'Valencia'],
                ['name' => 'Arenal', 'address' => 'Avd Castellon Nº11', 'date' => '27/08/2017', 'province' => 'Castellon'],
                ['name' => 'Dreambeach', 'address' => 'Avd Jaume I Nº82', 'date' => '17/07/2017', 'province' => 'Almeria'],
                ['name' => 'Barcelona Beach Festival', 'address' => 'Calle Barceloneta', 'date' => '11/07/2017', 'province' => 'Barcelona'],
                ['name' => 'A summer story', 'address' => 'Calle Falsa 123', 'date' => '14/07/2017', 'province' => 'Madrid'],
                ['name' => 'Tomorrowland', 'address' => 'Calle Bredlak Nº12', 'date' => '17/08/2017', 'province' => 'Boom'],
                ['name' => 'Ultra Music Festival', 'address' => 'Green Street', 'date' => '23/06/2017', 'province' => 'Miami'],
            ]
        );
        
    }
}

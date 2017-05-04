<?php

use Illuminate\Database\Seeder;

class CountryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('countries')->delete();
        DB::table('countries')->insert(
            [
                ['country' => 'España'],
                ['country' => 'Italia'],
                ['country' => 'Holanda'],
                ['country' => 'Belgica'],
                ['country' => 'Alemania']
            ]
        );
    }
}

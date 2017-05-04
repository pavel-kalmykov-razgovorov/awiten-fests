<?php

use Illuminate\Database\Seeder;

class ProvinceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('provinces')->delete();
        DB::table('provinces')->insert(
            [
                ['province' => 'Alicante'],
                ['province' => 'Valencia'],
                ['province' => 'Madrid'],
                ['province' => 'Castellon'],
                ['province' => 'Barcelona']
            ]
        );
    }
}

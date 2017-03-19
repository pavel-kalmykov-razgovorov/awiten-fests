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
                        ['path' => '/images', 'name' => 'foto1', 'festival_id' => $medusa]

                    ]
                );
        }
}

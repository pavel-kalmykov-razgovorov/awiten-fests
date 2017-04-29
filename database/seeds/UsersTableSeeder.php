<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        DB::table('users')->insert(
            [
                ['name' => 'Usuario Normal',
                'username' => 'Migala26',
                'email' => 'ejemplo@gmail.com',
                'password' => bcrypt('1234')]
            ]
        );
    }
}

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
                'username' => 'Promotor',
                'email' => 'ejemplo@gmail.com',
                'password' => bcrypt('1234'),
                'typeOfUser' => 'promoter',
                'confirmed' => 1],  
            ]
        );
          DB::table('users')->insert(
            [
               ['name' => 'Usuario',
                'username' => 'Admin',
                'email' => 'awitenfest@gmail.com',
                'password' => bcrypt('1234'),
                'typeOfUser' => 'admin',
                'confirmed' => 1],
            ]
        );
        DB::table('users')->insert(
            [
               ['name' => 'Otro',
                'username' => 'Representante',
                'email' => 'sds@gmail.com',
                'password' => bcrypt('1234'),
                'typeOfUser' => 'manager',
                'confirmed' => 1]
            ]
        );
    }
}

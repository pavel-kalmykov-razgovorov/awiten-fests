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
                'typeOfUser' => 'promoter'],  
            ]
        );
          DB::table('users')->insert(
            [
               ['name' => 'Usuario',
                'username' => 'Admin',
                'email' => 'otro@gmail.com',
                'password' => bcrypt('1234'),
                'typeOfUser' => 'admin'],
            ]
        );
        DB::table('users')->insert(
            [
               ['name' => 'Otro',
                'username' => 'Representante',
                'email' => 'sds@gmail.com',
                'password' => bcrypt('1234'),
                'typeOfUser' => 'manager']
            ]
        );
    }
}

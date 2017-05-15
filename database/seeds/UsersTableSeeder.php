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
                ['name' => 'Promoter1',
                'username' => 'Promotor1',
                'email' => 'ejemplo@gmail.com',
                'password' => bcrypt('1234'),
                'typeOfUser' => 'promoter',
                'confirmed' => 1],  
            ]
        );
        DB::table('users')->insert(
            [
                ['name' => 'Promoter2',
                'username' => 'Promotor2',
                'email' => 'prm2@gmail.com',
                'password' => bcrypt('1234'),
                'typeOfUser' => 'promoter',
                'confirmed' => 1],  
            ]
        );
        DB::table('users')->insert(
            [
               ['name' => 'Manager1',
                'username' => 'Representante1',
                'email' => 'sds@gmail.com',
                'password' => bcrypt('1234'),
                'typeOfUser' => 'manager',
                'confirmed' => 1]
            ]
        );
        DB::table('users')->insert(
            [
               ['name' => 'Manager2',
                'username' => 'Representante2',
                'email' => 'sds2@gmail.com',
                'password' => bcrypt('1234'),
                'typeOfUser' => 'manager',
                'confirmed' => 1]
            ]
        );
    }
}

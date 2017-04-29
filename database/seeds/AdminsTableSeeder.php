<?php

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('admins')->delete();
      DB::table('admins')->insert(
          [
              ['name' => 'Administrador',
              'username' => 'Neo',
              'email' => 'ejemplo1@gmail.com',
              'password' => bcrypt('1234')]
          ]
      );
    }
}

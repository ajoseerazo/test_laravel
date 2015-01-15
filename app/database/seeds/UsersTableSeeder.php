<?php

class UsersTableSeeder extends Seeder {

   /**
    * Run the database seeds.
    *
    * @return void
    */
   public function run() {
      $arrUser = array();
      $arrUser[0] = array(
          'username' => 'admin',
          'password' => Hash::make('1234'),
          'email' => 'prueba@prueba.com',
          'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
          'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
      );
      $arrUser[1] = array(
          'username' => 'amilcar',
          'password' => Hash::make('123456'),
          'email' => 'mcontreras73@gmail.com',
          'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
          'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
      );

      DB::table('users')->insert($arrUser);
   }

}

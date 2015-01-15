<?php

class ArticlesTableSeeder extends Seeder {

   /**
    * Run the database seeds.
    *
    * @return void
    */
   public function run() {
      $arrArticles = array();
      $arrArticles[0] = array(
          'name' => 'Ultimate of pegazo',
          'description' => 'Una armadura con incrustados de diamante, para resistir mas los daños causados por los enemigos',
          'prize' => '10',
          'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
          'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
      );
      

      DB::table('articles')->insert($arrArticles);
   }

}
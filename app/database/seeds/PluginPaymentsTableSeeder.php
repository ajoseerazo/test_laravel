<?php

class PluginPaymentsTableSeeder extends Seeder {

   /**
    * Run the database seeds.
    *
    * @return void
    */
   public function run() {
      $arrPlugins = array();
      $arrPlugins[0] = array(
          'plugin' => 'cash_victorius',
          'description' => 'pagos en efectivo',
          'version' => '1.0',
      );
      

      DB::table('plugin_payments')->insert($arrPlugins);
   }

}
<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

      DB::table('payments')->delete();
      DB::table('users')->delete();
      DB::table('articles')->delete();
      DB::table('plugin_payments')->delete();
      
      $this->call('UsersTableSeeder');
      $this->call('ArticlesTableSeeder');
      $this->call('PluginPaymentsTableSeeder');
	}

}

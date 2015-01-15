<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('payments', function($table){
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->integer('plugin_payment_id')->unsigned();
			$table->integer('article_id')->unsigned();
			$table->boolean('state');
			$table->integer('quantity');
			$table->double('amount');

			$table->foreign('user_id')->references('id')->on('users');
			$table->foreign('plugin_payment_id')->references('id')->on('plugin_payments');
			$table->foreign('article_id')->references('id')->on('articles');

			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}

}

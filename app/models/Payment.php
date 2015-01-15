<?php

class Payment extends Eloquent {

	protected $table = 'payments';

	public function loadConfiguration( $plugin ){
		$plugin_payment = DB::table('plugin_payments')->where('plugin', $plugin )->first(); 
		return $plugin_payment;
	}

	public function initPayment( $article ){
		$success = false;
		
		if( $article->prize*$this->quantity == $this->amount ){
			$success = true;
		}

		$this->endTransaction( $success );

		return $success;
	}

	public function endTransaction( $success ){
		$this->state = $success;
		$this->save();
	}

}

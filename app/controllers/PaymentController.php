<?php

class PaymentController extends \BaseController {

	public function store(){
		$rules = array(
			'user' => 'required',
			'plugin_payment' => 'required',
			'article' => 'required',
			'quantity' => 'required|numeric',
			'amount' => 'required|numeric'
		);	

		$validator = Validator::make( Input::all(), $rules );

		if( $validator->fails() ){
			return Response::json( $validator->messages() );
		}

		$payment = new Payment;

		/* Validamos que los datos de entrada sean validos */
		$user = User::find( Input::get('user') );

		if( count($user) == 0 ){
			return Response::json( array('success'=>false, 'message' => 'Ese usuario no existe') );
		}

		$plugin = $payment->loadConfiguration( Input::get('plugin_payment') );

		if( count($plugin) == 0 ){
			return Response::json( array('success'=>false, 'message' => 'No existe ese plugin de pago') );
		}

		$article = DB::table('articles')->where('name', Input::get('article') )->first();

		if( count($article) == 0){
			return Response::json( array('success'=>false, 'message' => 'No existe ese articulo') );	
		}
		/*---------------------------------------------*/

		$payment->user_id = Input::get('user');
		$payment->plugin_payment_id = $plugin->id;
		$payment->article_id = $article->id;
		$payment->quantity = Input::get('quantity');
		$payment->amount = Input::get('amount');

		$success = $payment->initPayment( $article );

		if( $success ){
			return Response::json( array('succes'=> true, 'message' => 'Proceso de pago finalizado exitosamente') );
		}else{
			return Response::json( array('success'=>false, 'message' => 'Ocurrio un problema al procesar el pago'));
		}
	}
}
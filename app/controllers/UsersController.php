<?php

class UsersController extends \BaseController {

	public function index(){
		$users = User::all();
		return Response::json( $users->toArray() );
	}

	public function show($id){
		$user = User::find($id);
		return Response::json( $user );
	}

	public function store(){
		$rules = array(
			'email' => 'required|email|unique:users',
			'username' => 'unique:users'
		);

		$validator = Validator::make(Input::all(), $rules);

		if( $validator->fails() ){
			return Response::json( $validator->messages() );
		}else{
			$user = new User();
			$user->email = Input::get('email');
			$user->username = Input::get('username');
			$user->password = Hash::make(Input::get('password'));

			if( $user->save() ){
				return Response::json( array('success'=>true) );
			}else{
				return Response::json( array('success'=>false, "message"=>"Ocurrio un error al agregar un nuevo usuario"));
			}	
		}
	}
}
<?php

class LoginController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function VistaLogin()
	{
		return View::make('login.login');
	}

	public function FuncionLogin(){

		$datos = array(
			'email' => Input::get('email'),
			'password' => Input::get('password'));

		$reglasValidacion = array(
			'email' => 'required|email|min:3|max:60',
			'password' => 'required|alpha_num|min:6|max:50');

		$mensajeValidacion = array(
			'required' => 'Este campo es obligatorio',
			'min' => 'Este campo debe contener mínimo :min caracteres',
			'max' => 'Este campo debe contener máximo :max caracteres',
			'email' => 'Este campo debe contener una dirección de correo válida',
			'alpha_num' => 'Este campo debe contener letras y/o números');

		$validador = Validator::make($datos, $reglasValidacion, $mensajeValidacion);

		if($validador->passes()){

			if(Auth::attempt($datos)){

				return Redirect::to('/mantenedor/listadoClientes');
			}

			else{

				return Redirect::to('/login/login')->with('msg_errorLogin', 'Datos incorrectos, vuelva a intentarlo');
			}
		}

		else{

			return Redirect::to('/login/login')->withInput()->withErrors($validador);
		}
	}

	public function FuncionLogout(){

		if(Auth::check()){

			Auth::logout();
			Session::flush();

			return Redirect::to('/login/login');
		}
	}


}

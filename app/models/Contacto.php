<?php

	class Contacto{

		protected $table = 'tblcontacto';
		protected $fillable = array('nombreCliente', 'apellidoCliente', 'telefonoCliente', 'celularCliente', 'emailCliente', 'cargo', 'estado');
	
		public function setContacto(){

			$idContacto = DB::table('tblcontacto')->insertGetId(
				array('nombreCliente' => Input::get('nombreCliente'),
					'apellidoCliente' => Input::get('apellidoCliente'),
					'telefonoCliente' => Input::get('telefonoCliente'),
					'celularCliente' => Input::get('celularCliente'),
					'emailCliente' => Input::get('emailCliente'),
					'cargo' => Input::get('cargo'),
					'estado' => 1));
			
			return $idContacto;

		}

		public function disableContacto($idContacto){

			$desactContacto = DB::table('tblcontacto')
				->where('idContacto', $idContacto)
				->update(array('estado' => 0));

			return $desactContacto;
		}


		public function updateContacto($idContacto){

			$updateContacto = DB::table('tblcontacto')
				->where('idContacto', $idContacto)
				->update(array('nombreCliente' => Input::get('nombreCliente'),
								'apellidoCliente' => Input::get('apellidoCliente'),
								'telefonoCliente' => Input::get('telefonoCliente'),
								'celularCliente' => Input::get('celularCliente'),
								'emailCliente' => Input::get('emailCliente'),
								'cargo' => Input::get('cargo')));

			return $updateContacto;

		}

	}

?>
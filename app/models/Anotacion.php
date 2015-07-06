<?php

	class Anotacion{

		protected $table = 'tblanotacion';
		protected $fillable = array('idContacto', 'idUsuario', 'fecha', 'created_at', 'updated_at');


		/**
		 * Función que devuelve un arreglo de todas las anotaciones y/o sus respectivos archivos adjuntos en base al Id de Contacto
		 *
		 * @return void
		 * @author Cris
		 * @param ($idContacto)
		 **/
		public function getDetalleAnotacion($idContacto){

			$anotaciones = DB::table('tblanotacion')
			->leftJoin('tblanotacionxarchivo', 'tblanotacionxarchivo.id_Anotacion', '=', 'tblanotacion.idAnotacion')
			->leftJoin('tblarchivo', 'tblanotacionxarchivo.idArchivo', '=', 'tblarchivo.idArchivo')
			->where('idContacto', $idContacto)
			->get();

			return $anotaciones;

		}

		/**
		 * Función que devuelve el primer registro de la tabla Anotacion y/o sus respectivos archivos adjuntos en base al Id de Contacto
		 *
		 * @return void
		 * @author Cris
		 * @param ($idContacto)
		 **/
		public function getAnotacionN($idContacto){


			$anotacionN = DB::table('tblanotacion')
				->leftJoin('tblanotacionxarchivo', 'tblanotacionxarchivo.id_Anotacion', '=', 'tblanotacion.idAnotacion')
				->leftJoin('tblarchivo', 'tblanotacionxarchivo.idArchivo', '=', 'tblarchivo.idArchivo')
				->where('idContacto', $idContacto)
				->first();

			return $anotacionN;

		}


		/**
		 * Función que inserta un registro en la tabla Anotación y a la vez rescata el Id resultante de la operación para su posterior uso
		 *
		 * @return void
		 * @author Cris
		 * @param ($idContacto)
		 **/
		public function setAnotacion($idContacto){

			$idAnotacion = DB::table('tblanotacion')->insertGetId(
				array('idContacto' => $idContacto,
					'anotacion' => Input::get('anotacion'),
					'idUsuario' => Auth::user()->idUsuario));

			return $idAnotacion;
		}

	}

?>
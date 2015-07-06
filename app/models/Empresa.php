<?php

	class Empresa{

		protected $table = 'tblempresa';
		protected $fillable = array('nombre', 'observacionesEmpresa');


		/**
		 * Funcion que lista toda la información relacionada a una empresa, siempre y cuando el estado del contacto sea 1 (Activo)
		 *
		 * @return void
		 * @author Cris
		 * @param (1)
		 **/
		public function getListadoContactos(){

			$clientes = DB::table('tblempresa')
			->join('tbldivision', 'tblempresa.idEmpresa', '=', 'tbldivision.idEmpresa')
			->join('tblcontactoxdivision', 'tblcontactoxdivision.idDivision', '=', 'tbldivision.idDivision')
			->join('tblcontacto', 'tblcontactoxdivision.idContacto', '=', 'tblcontacto.idContacto')
			->join('tblanotacion', 'tblcontacto.idContacto', '=', 'tblanotacion.idContacto')
			->join('tblusuario', 'tblusuario.idUsuario', '=', 'tblanotacion.idUsuario')
			->leftJoin('tblanotacionxarchivo', 'tblanotacionxarchivo.id_Anotacion', '=', 'tblanotacion.idAnotacion')
			->leftJoin('tblarchivo', 'tblanotacionxarchivo.idArchivo', '=', 'tblarchivo.idArchivo')
			->groupBy('tblcontacto.idContacto')
			->where('tblcontactoxdivision.estado', 1)
			
			->get();

			return $clientes;
		}

		/**
		 * Funcion que inserta 1 registro en la tabla Empresa y a la vez rescata la ID insertada para ser enviada a la siguiente vista
		 *
		 * @return void
		 * @author Cris
		 * @param ($idEmpresa)
		 **/
		public function setEmpresa(){

			$idEmpresa = DB::table('tblempresa')->insertGetId(
				array('nombre' => Input::get('nombre')));

			return $idEmpresa;
		}


		/**
		 * Funcion que retorna 1 registro del listado general en base a un idAnotacion específico
		 *
		 * @return void
		 * @author Cris
		 * @param($idAnotacion)
		 **/
		public function getDetalleListado($idAnotacion){

			$datosTbls = DB::table('tblempresa')
			->join('tbldivision', 'tblempresa.idEmpresa', '=', 'tbldivision.idEmpresa')
			->join('tblcontactoxdivision', 'tblcontactoxdivision.idDivision', '=', 'tbldivision.idDivision')
			->join('tblcontacto', 'tblcontactoxdivision.idContacto', '=', 'tblcontacto.idContacto')
			->join('tblanotacion', 'tblcontacto.idContacto', '=', 'tblanotacion.idContacto')
			->join('tblusuario', 'tblusuario.idUsuario', '=', 'tblanotacion.idUsuario')
			->leftJoin('tblanotacionxarchivo', 'tblanotacionxarchivo.id_Anotacion', '=', 'tblanotacion.idAnotacion')
			->leftJoin('tblarchivo', 'tblanotacionxarchivo.idArchivo', '=', 'tblarchivo.idArchivo')
			->where('tblanotacion.idAnotacion', $idAnotacion)
			->first();

			return $datosTbls;

		}


		/**
		 * Funcion que llena o "pobla" el primer combobox 'Empresa' de la sección "Ingresar Contacto a Empresa Existente"
		 *
		 * @return void
		 * @author Cris
		 **/
		public function getCmbEmpresasUno(){

			$empresas = DB::table('tblempresa')
			->select(DB::raw('DISTINCT tblempresa.nombre'), 'tblempresa.idEmpresa')
			->orderBy('nombre', 'asc')
			->lists('nombre', 'idEmpresa');

			return $empresas;
		}

		/**
		 * Funcion que llena o "pobla" el segundo combobox 'Empresa' de la sección "Ingresar Contacto a Empresa Existente"
		 *
		 * @return void
		 * @author 
		 **/
		public function getCmbEmpresasDos(){

			$empresas2 = DB::table('tblempresa')
			->select(DB::raw('DISTINCT tblempresa.nombre'), 'tblempresa.idEmpresa')
			->orderBy('nombre', 'asc')
			->lists('nombre', 'idEmpresa');

			return $empresas2;
		}

		public function updateEmpresa($idEmpresa){

			$updateEmpresa = DB::table('tblempresa')
				->where('idEmpresa', $idEmpresa)
				->update(array('nombre' => Input::get('nombre')));

			return $updateEmpresa;

		}

	}

?>
<?php

	class Division{

		protected $table = 'tbldivision';
		protected $fillable = array('idEmpresa', 'comuna', 'direccion', 'telefono', 'email', 'observacionesDivision');
	
		public function setDivision($idEmpresa){

			$idDivision = DB::table('tbldivision')->insertGetId(
				array('idEmpresa' => $idEmpresa,
					'direccion' => Input::get('direccion'),
					'comuna' => Input::get('tblcomuna'),
					'telefono' => Input::get('telefono'),
					'emailDivision' => Input::get('emailDivision')));

			return $idDivision;
		}

		public function getCmbDivisiones(){

			$divisiones = DB::table('tbldivision')
			->select(DB::raw('DISTINCT tbldivision.direccion'), 'tbldivision.idDivision')
			
			->orderBy('direccion', 'asc')
			->lists('direccion', 'idDivision');

			return $divisiones;
		}

		public function getDivisionxEmpresa($idEmpresa){

			$divisiones = DB::table('tblempresa')
			->join('tbldivision', 'tblempresa.idEmpresa', '=', 'tbldivision.idEmpresa')
			->where('tblempresa.idEmpresa', $idEmpresa)
			->orderBy('direccion', 'asc')
			->select('tbldivision.idDivision', 'tbldivision.direccion')
			->get();

			return $divisiones;
		}

		public function getComunas(){

			$comunas = DB::table('tbldivision')
				->select(DB::raw('DISTINCT tbldivision.comuna'))
				->orderBy('comuna', 'asc')
				->lists('comuna', 'comuna');

				return $comunas;
		}

		public function updateDivision($idDivision){

			$updateDivision = DB::table('tbldivision')
				->where('idDivision', $idDivision)
				->update(array('direccion' => Input::get('direccion'),
								'comuna' => Input::get('tbldivision'),
								'telefono' => Input::get('telefono'),
								'emailDivision' => Input::get('emailDivision')));

			return $updateDivision;


		}

	}

?>
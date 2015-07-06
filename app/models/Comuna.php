<?php

	class Comuna{

		protected $table = 'tblcomuna';

		public function getComunasXRegion($idRegion){

			$comunas = DB::table('tblregion')
				->join('tblcomuna', 'tblregion.idRegion', '=', 'tblcomuna.idRegion')
				->where('tblregion.idRegion', $idRegion)
				->orderBy('nombre', 'asc')
				->select('tblcomuna.idComuna', 'tblcomuna.nombre')
				->get();

			return $comunas;
		}

		public function getComunas(){


			$comuna = DB::table('tblcomuna')
				->select(DB::raw('DISTINCT tblcomuna.nombre'), 'tblcomuna.idComuna')
				->orderBy('nombre', 'asc')
				->lists('nombre', 'idComuna');

			return $comuna;

		}
	}


?>
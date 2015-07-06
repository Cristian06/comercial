<?php

	class Region{

		protected $table = 'tblregion';

		public function getRegiones(){

			$regiones = DB::table('tblregion')
				->select(DB::raw('DISTINCT tblregion.nombre'), 'tblregion.idRegion')
				->orderBy('idRegion', 'asc')
				->lists('nombre', 'idRegion');

			return $regiones;
		}
	}


?>
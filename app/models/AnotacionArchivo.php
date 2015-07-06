<?php

	class AnotacionArchivo{

		protected $table = 'tblanotacionxarchivo';
		protected $fillable = array('id_Anotacion', 'idArchivo');

		public function setAnotacionxArchivo($idAnotacion, $idArchivo){

			$insertTblAnotacionxArchivo = DB::table('tblanotacionxarchivo')->insert(
					array('id_Anotacion' => $idAnotacion,
						'idArchivo' => $idArchivo));

			return $insertTblAnotacionxArchivo;
		}

	}

?>
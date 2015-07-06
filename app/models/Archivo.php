<?php
	
	class Archivo{

		protected $table = 'tblarchivo';
		protected $fillable = array('rutaArchivo', 'nombreOriginal');

		public function setArchivo($nombreArchivo, $nombreArchivoOriginal){

			$idArchivo = DB::table('tblarchivo')->insertGetId(
					array('rutaArchivo' => $nombreArchivo,
						'nombreOriginal' => $nombreArchivoOriginal));

			return $idArchivo;
		}


	}


?>
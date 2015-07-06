<?php

	class ContactoDivision{

		protected $table = 'tblcontactoxdivision';
		protected $fillable = array('idContacto', 'idDivision', 'estado', 'created_at', 'updated_at');
	
		public function setContactoxDivision($idDivision, $idContacto){

			$contactoxdivision = DB::table('tblcontactoxdivision')->insert(
				array('idContacto' => $idContacto,
					'idDivision' => $idDivision,
					'estado' => 1));

			return $contactoxdivision;
		}

		public function disableContactoxDivision($idContacto){
			$desactContactoxDivision = DB::table('tblcontactoxdivision')
			->where('idContacto', $idContacto)
			->update(array('estado' => 0));

			return $desactContactoxDivision;

		}
	}

?>
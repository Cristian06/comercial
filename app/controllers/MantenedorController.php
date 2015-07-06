<?php

class MantenedorController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function ListadoClientes(){

		$Empresa = new Empresa();
		$clientes = $Empresa->getListadoContactos();
		
		return View::make('mantenedor.listadoClientes', array('clientes' => $clientes));
	}


	public function DetalleListado($idContacto, $idAnotacion){


		$Empresa = new Empresa();
		$datosTbls = $Empresa->getDetalleListado($idAnotacion);

		$clientes = $Empresa->getListadoContactos();

		$Anotacion = new Anotacion();
		$anotaciones = $Anotacion->getDetalleAnotacion($idContacto);

		$AnotacionN = new Anotacion();
		$anotacionN = $AnotacionN->getAnotacionN($idContacto);

		return View::make('mantenedor.listadoClientes', array('anotaciones' => $anotaciones, 'datosTbls' => $datosTbls, 'anotacionN' => $anotacionN, 'clientes' => $clientes));

	}


	/*----------------------------Ingreso Empresa Nueva*/
	public function VistaIngresoClientesEmpresa(){


		return View::make('mantenedor.ingresoClientesEmpresa');
	}

	public function IngresarClientesEmpresa(){

		$datosFormularioEmpresa = array(
			'nombre' => Input::get('nombre'));
			

		$reglasValidacionEmpresa = array(
			'nombre' => 'required|alpha_custom|min:3|max:500');	

		$mensajeValidacionEmpresa = array(
			'required' => 'Este campo es obligatorio',
			'alpha' => 'Este campo admite sólo letras',
			'alpha_num' => 'Este campo admite letras y/o números',
			'alpha_custom' => 'Este campo admite letras y/o números',
			'min' => 'Este campo debe contener almenos :min caracteres',
			'max' => 'Este campo debe contener como máximo :max caracteres');

		$validadorIngresoEmpresa = Validator::make($datosFormularioEmpresa, $reglasValidacionEmpresa, $mensajeValidacionEmpresa);

		if($validadorIngresoEmpresa->passes()){

			$Empresa = new Empresa();
			$idEmpresa = $Empresa->setEmpresa();  

			$Division = new Division();
			$comunas = $Division->getComunas();
			                    
			$Region = new Region();
			$region = $Region->getRegiones();

			$Comuna = new Comuna();
			$comuna = $Comuna->getComunas();

			return View::make('mantenedor.ingresoClientesDivision', 
				array(
					'idEmpresa' => $idEmpresa, 
					'region' => $region,
					'comuna' => $comuna));
			
		}	
		
		else{

			return Redirect::to('/mantenedor/vistaIngresoClientesEmpresa')->withInput()->withErrors($validadorIngresoEmpresa);
		}		

	}/*--------------------------------------------------------*/


	/*----------------------------Ingreso Division Nueva*/
	public function VistaIngresoClientesDivision($idEmpresa){

		//$Division = new Division();
		//$comunas = $Division->getComunas();


		
		return View::make('mantenedor.ingresoClientesDivision', array('idEmpresa' => $idEmpresa, 'comunas' => $comunas));
	}


	public function IngresarClientesDivision($idEmpresa){



		$datosFormularioDivision = array(
			'direccion' => Input::get('direccion'),
			'comuna' => Input::get('tblcomuna'),
			'telefono' => Input::get('telefono'),
			'emailDivision' => Input::get('emailDivision'));
		


		$reglasValidacionDivision = array(
			'direccion' => 'required|alpha_custom|min:3|max:500',
			'comuna' => 'required|alpha_custom|string',
			'telefono' => 'alpha_custom|min:6|max:500',
			'emailDivision' => 'email|min:3|max:500');	

		$mensajeValidacionDivision = array(
			'required' => 'Este campo es obligatorio',
			'alpha' => 'Este campo admite sólo letras',
			'alpha_num' => 'Este campo admite letras y/o números',
			'alpha_custom' => 'Este campo admite letras y/o números',
			'alpha_spaces' => 'Este campo admite sólo letras',
			'min' => 'Este campo debe contener almenos :min caracteres',
			'max' => 'Este campo debe contener como máximo :max caracteres',
			'email' => 'Este campo debe contener una dirección de correo válida',
			'integer' =>'Este campo admite sólo números de hasta 9 cifras');

		$validadorIngresoDivision = Validator::make($datosFormularioDivision, $reglasValidacionDivision, $mensajeValidacionDivision);

		if($validadorIngresoDivision->passes()){


			$Division = new Division();
			$idDivision = $Division->setDivision($idEmpresa);

			
			return View::make('mantenedor.ingresoClientesContacto', array('idDivision' => $idDivision));
			//return Redirect::to('/mantenedor/vistaIngresoClientesContacto')->with('msgExitoIngeso', 'Datos de cliente ingresados satisfactoriamente');

		}	
		
		else{
			
			return Redirect::to('/mantenedor/vistaIngresoClientesDivision/'.$idEmpresa)->withInput()->withErrors($validadorIngresoDivision);
		}		

	}


	/*----------------------------Ingreso Contacto Nuevo*/

	public function vistaIngresoClientesContacto($idDivision){


		return View::make('mantenedor.ingresoClientesContacto', array('idDivision' => $idDivision));
	}

	
	public function IngresarClientesContacto($idDivision){

		$datosFormularioContacto = array(
			'nombreCliente' => Input::get('nombreCliente'),
			'apellidoCliente' => Input::get('apellidoCliente'),
			'telefonoCliente' => Input::get('telefonoCliente'),
			'celularCliente' => Input::get('celularCliente'),
			'emailCliente' => Input::get('emailCliente'),
			'cargo' => Input::get('cargo'));
			

		$reglasValidacionContacto = array(
			'nombreCliente' => 'alpha_custom|min:2|max:500',
			'apellidoCliente' => 'alpha_custom|min:2|max:500',
			'telefonoCliente' => 'alpha_custom|min:2|max:255',
			'celularCliente' => 'alpha_custom|min:2|max:255',
			'emailCliente' => 'email|min:2|max:500',
			'cargo' => 'alpha_custom|min:2|max:500');	

		$mensajeValidacionContacto = array(
			'required' => 'Este campo es obligatorio',
			'alpha' => 'Este campo admite sólo letras',
			'alpha_num' => 'Este campo admite letras y/o números',
			'alpha_custom' => 'Este campo admite letras y/o números',
			'alpha_spaces' => 'Este campo admite sólo letras',
			'min' => 'Este campo debe contener almenos :min caracteres',
			'max' => 'Este campo debe contener como máximo :max caracteres',
			'email' => 'Este campo debe contener una dirección de correo válida',
			'integer' => 'Este campo admite sólo números de hasta 9 cifras',
			'boolean' => 'Este campo no admite otros caracteres');

		$validadorIngresoContacto = Validator::make($datosFormularioContacto, $reglasValidacionContacto, $mensajeValidacionContacto);

		if($validadorIngresoContacto->passes()){

			$Contacto = new Contacto();
			$idContacto = $Contacto->setContacto();

			
			$ContactoDivision = new ContactoDivision();
			$idContactoxDivision = $ContactoDivision->setContactoxDivision($idDivision, $idContacto);
			

			return View::make('mantenedor.ingresoClientesAnotacion', array('idContacto' => $idContacto));			

		}	
		
		else{

			return Redirect::to('/mantenedor/vistaIngresoClientesContacto/'.$idDivision)->withInput()->withErrors($validadorIngresoContacto);
		}		

	}

	/*----------------------------Ingreso Anotacion Nueva*/
	public function VistaIngresoClientesAnotacion($idContacto){


		return View::make('mantenedor.ingresoClientesAnotacion', array('idContacto' => $idContacto));
	}

	public function IngresarClientesAnotacion($idContacto){


		$datosFormularioAnotacionN = array(
			'anotacion' => Input::get('anotacion'),
			'propuesta' => Input::get('propuesta'));

		$archivo = Input::file('propuesta');
		$archivoOriginal = Input::file('propuesta');

		$reglasValidacionAnotacionN = array(
			'anotacion' => 'alpha_custom|min:2|max:1000',
			'propuesta' => 'mimes:pdf,doc,docx,xls,xlsx,ppt,pptx|size:20');

		$mensajeValidacionAnotacionN = array(
			'alpha_custom' => 'Este campo admite letras y/o números',
			'mimes' => 'Sólo se admiten PDFs, PPTs, DOCs y Planillas Excel',
			'size' => 'El campo admite sólo archivos hasta :size MB');

		$validadorIngresoAnotacionN = Validator::make($datosFormularioAnotacionN, $reglasValidacionAnotacionN, $mensajeValidacionAnotacionN);

		if($validadorIngresoAnotacionN->passes()){


			if(Input::hasFile('propuesta')){
				
				$nombreArchivo =  time().'.'.$archivo->getClientOriginalExtension();
				$nombreArchivoOriginal = $archivoOriginal->getClientOriginalName();
		
				$archivo->move(public_path().'/assets/propuestas/', $nombreArchivo);

				
				$Archivo = new Archivo();
				$idArchivo = $Archivo->setArchivo($nombreArchivo, $nombreArchivoOriginal);
				

				$Anotacion = new Anotacion();
				$idAnotacion = $Anotacion->setAnotacion($idContacto);


				$AnotacionxArchivo = new AnotacionArchivo();
				$insertTblAnotacionxArchivo = $AnotacionxArchivo->setAnotacionxArchivo($idAnotacion, $idArchivo);
				
			}
				/*-------------------------------------------------------------*/
			else{

				$Anotacion = new Anotacion();
				$idAnotacion = $Anotacion->setAnotacion($idContacto);
			}


			return Redirect::to('/mantenedor/DetalleListado/'.$idContacto.'/'.$idAnotacion)->with('msgExitoIngresoN', 'Datos de cliente ingresados satisfactoriamente');
		}

		else{

			return Redirect::to('/mantenedor/vistaAgregarAnotacionxCliente/'.$idContacto)->withInput()->withErrors($validadorIngresoAnotacionN);
		}
	}

	/*-------NO APLICA POR AHORA--------------
	public function VistaModificarAnotacion($idAnotacion){

		$cliente = DB::table('tblempresa')
			->join('tbldivision', 'tblempresa.idEmpresa', '=', 'tbldivision.idEmpresa')
			->join('tblcontactoxdivision', 'tblcontactoxdivision.idDivision', '=', 'tbldivision.idDivision')
			->join('tblcontacto', 'tblcontactoxdivision.idContacto', '=', 'tblcontacto.idContacto')
			->join('tblanotacion', 'tblcontacto.idContacto', '=', 'tblanotacion.idContacto')
			->select('tblempresa.nombre', 'tblempresa.observacionesEmpresa', 'tbldivision.comuna', 'tbldivision.direccion', 'tbldivision.telefono', 
					'tbldivision.email', 'tbldivision.observacionesDivision', 'tblcontacto.nombreCliente', 'tblcontacto.apellidoCliente',
					'tblcontacto.telefonoCliente', 'tblcontacto.celularCliente', 'tblcontacto.cargo', 'tblanotacion.idAnotacion', 'tblanotacion.anotacion')
			->where('tblanotacion.idAnotacion', $idAnotacion)
			->first();


			return View::make('mantenedor.modificarAnotacion', array('cliente' => $cliente));
	}

	public function ModificarAnotacion($idAnotacion){

		$anotacion = array('anotacion' => Input::get('anotacion'));

		$reglaValidacion = array('anotacion' => 'required|alpha_custom|min:2|max:1000');

		$mensajeValidacion = array(
			'required' => 'Este campo es obligatorio',
			'alpha_custom' => 'Este campo admite letras y/o números',
			'min' => 'Este campo debe contener almenos :min caracteres',
			'max' => 'Este campo debe contener como máximo :max caracteres',);

		$validadorModificacion = Validator::make($anotacion, $reglaValidacion, $mensajeValidacion);

		if($validadorModificacion->passes()){

			$modificacion = DB::table('tblanotacion')
					->where('idAnotacion', $idAnotacion)
					->update(array('anotacion' => Input::get('anotacion')));

			 return Redirect::to('/mantenedor/listadoClientes');

		}

		else{

			return Redirect::to('/mantenedor/vistaModificacionAnotacion')->withInput()->withErrors($validadorModificacion);
		}
	}*/

	public function VistaIngresoAnotacionN($idContacto, $idAnotacion){

		
		return View::make('mantenedor.ingresoAnotacionN', array('idContacto' => $idContacto, 'idAnotacion' => $idAnotacion));

	}

	public function IngresoAnotacionN($idContacto, $idAnotacion){

		$datosFormularioAnotacionN = array(
			'anotacion' => Input::get('anotacion'),
			'propuesta' => Input::get('propuesta'));

		$archivo = Input::file('propuesta');
		$archivoOriginal = Input::file('propuesta');

		$reglasValidacionAnotacionN = array(
			'anotacion' => 'alpha_custom|min:2|max:1000',
			'propuesta' => 'mimes:pdf,doc,docx,xls,xlsx,ppt,pptx|size:20');

		$mensajeValidacionAnotacionN = array(
			'alpha_custom' => 'Este campo admite letras y/o números',
			'mimes' => 'Sólo se admiten PDFs, PPTs, DOCs y Planillas Excel',
			'size' => 'El campo admite sólo archivos hasta :size MB');

		$validadorIngresoAnotacionN = Validator::make($datosFormularioAnotacionN, $reglasValidacionAnotacionN, $mensajeValidacionAnotacionN);

		if($validadorIngresoAnotacionN->passes()){


			if(Input::hasFile('propuesta')){
				
				$nombreArchivo =  time().'.'.$archivo->getClientOriginalExtension();
				$nombreArchivoOriginal = $archivoOriginal->getClientOriginalName();
		
				$archivo->move(public_path().'/assets/propuestas/', $nombreArchivo);

				
				$Archivo = new Archivo();
				$idArchivo = $Archivo->setArchivo($nombreArchivo, $nombreArchivoOriginal);
				

				$Anotacion = new Anotacion();
				$idAnotacion = $Anotacion->setAnotacion($idContacto);


				$AnotacionxArchivo = new AnotacionArchivo();
				$insertTblAnotacionxArchivo = $AnotacionxArchivo->setAnotacionxArchivo($idAnotacion, $idArchivo);
				
			}
				/*-------------------------------------------------------------*/
			else{

				$Anotacion = new Anotacion();
				$idAnotacion = $Anotacion->setAnotacion($idContacto);
			}


			return Redirect::to('/mantenedor/DetalleListado/'.$idContacto.'/'.$idAnotacion)->with('msgExitoIngresoN', 'Datos de cliente ingresados satisfactoriamente');
		}

		else{

			return Redirect::to('/mantenedor/vistaAgregarAnotacionxCliente/'.$idContacto.'/'.$idAnotacion)->withInput()->withErrors($validadorIngresoAnotacionN);
		}
	}


	public function VistaIngresoEmpresaExistente(){

		$Empresa = new Empresa();
		$empresas = $Empresa->getCmbEmpresasUno();
		$empresas2 = $Empresa->getCmbEmpresasDos();


		$Division = new Division();
		$divisiones = $Division->getCmbDivisiones();


		return View::make('.mantenedor.ingresoEmpresaExistente', array('empresas' => $empresas, 'empresas2' => $empresas2, 'divisiones' => $divisiones));

	}

	public function IngresoEmpresaExistente(){


		$idEmpresa = Input::get('tblempresa');
	
		return View::make('mantenedor.ingresoClientesDivision', array('idEmpresa' => $idEmpresa));
	}

	public function IngresoEmpresaDivisionExistente(){


		$idDivision = Input::get('tbldivision');

		
		return View::make('mantenedor.ingresoClientesContacto', array('idDivision' => $idDivision));
	}

	public function getCmb($idEmpresa){

		$Division = new Division();
		$divisiones = $Division->getDivisionxEmpresa($idEmpresa);
		
		return View::make('mantenedor.infoDropdownlistDivision', array('divisiones' => $divisiones));
	}

	public function getComunas($idRegion){

		$Comuna = new Comuna();
		$comunas = $Comuna->getComunasxRegion($idRegion);

		return View::make('mantenedor.dropDownComunas', array('comunas' => $comunas));

	}


	public function DesactivarContacto($idContacto){

		$Contacto = new Contacto();
		$desactContacto = $Contacto->disableContacto($idContacto);

		$ContactoDivision = new ContactoDivision();
		$desactContactoxDivision = $ContactoDivision->disableContactoxDivision($idContacto);

		return Redirect::to('/mantenedor/listadoClientes')->with('msgDesactivate', 'El Contacto Ha Sido Eliminado del Listado');

	}

	public function VistaModificarDatosEmpresa($idEmpresa, $idContacto, $idAnotacion){

		$Empresa = new Empresa();
		$datosTbls = $Empresa->getDetalleListado($idAnotacion);

		return View::make('mantenedor.modificarEmpresa', array('datosTbls' => $datosTbls, 'idEmpresa' => $idEmpresa, 'idContacto' => $idContacto, 'idAnotacion' => $idAnotacion));


	}

	public function VistaModificarDatosDivision($idDivision, $idContacto, $idAnotacion){

		$Empresa = new Empresa();
		$datosTbls = $Empresa->getDetalleListado($idAnotacion);

		$Division = new Division();
		$comunas = $Division->getComunas();

		$Region = new Region();
		$region = $Region->getRegiones();

		$Comuna = new Comuna();
		$comuna = $Comuna->getComunas();

	
		return View::make('mantenedor.modificarDivision', 
			array(
				'datosTbls' => $datosTbls, 
				'idDivision' => $idDivision, 
				'idContacto' => $idContacto, 
				'idAnotacion' => $idAnotacion, 
				'region' => $region,
				'comuna' => $comuna));


	}

	public function VistaModificarDatosContacto($idContacto, $idAnotacion){

		$Empresa = new Empresa();
		$datosTbls = $Empresa->getDetalleListado($idAnotacion);

		return View::make('mantenedor.modificarContacto', array('datosTbls' => $datosTbls, 'idContacto' => $idContacto, 'idAnotacion' => $idAnotacion));

	}

	public function ModificarDatosEmpresa($idEmpresa, $idContacto, $idAnotacion){



		$datosFormularioEmpresa = array(
			'nombre' => Input::get('nombre'));
			

		$reglasValidacionEmpresa = array(
			'nombre' => 'required|alpha_custom|min:3|max:500');	

		$mensajeValidacionEmpresa = array(
			'required' => 'Este campo es obligatorio',
			'alpha' => 'Este campo admite sólo letras',
			'alpha_num' => 'Este campo admite letras y/o números',
			'alpha_custom' => 'Este campo admite letras y/o números',
			'min' => 'Este campo debe contener almenos :min caracteres',
			'max' => 'Este campo debe contener como máximo :max caracteres');

		$validadorModificarEmpresa = Validator::make($datosFormularioEmpresa, $reglasValidacionEmpresa, $mensajeValidacionEmpresa);

		if($validadorModificarEmpresa->passes()){

			$Empresa = new Empresa();
			$updateEmpresa = $Empresa->updateEmpresa($idEmpresa);  
			$datosTbls = $Empresa->getDetalleListado($idAnotacion);

			$Anotacion = new Anotacion();
			$anotaciones = $Anotacion->getDetalleAnotacion($idContacto);

			$AnotacionN = new Anotacion();
			$anotacionN = $AnotacionN->getAnotacionN($idContacto);


			return View::make('mantenedor.detalleListado', array('datosTbls' => $datosTbls, 'anotaciones' => $anotaciones, 'anotacionN' => $anotacionN));
			
		}	
		
		else{

			return Redirect::to('modificarInfoEmpresa/'.$idEmpresa.'/'.$idContacto.'/'.$idAnotacion)->withInput()->withErrors($validadorModificarEmpresa);
		}		


	}

	public function ModificarDatosDivision($idDivision, $idContacto, $idAnotacion){


		$datosFormularioDivision = array(
			'direccion' => Input::get('direccion'),
			'comuna' => Input::get('tbldivision'),
			'telefono' => Input::get('telefono'),
			'emailDivision' => Input::get('emailDivision'));
		

		$reglasValidacionDivision = array(
			'direccion' => 'alpha_custom|min:3|max:500',
			'comuna' => 'alpha_custom|string',
			'telefono' => 'alpha_custom|min:2|max:500',
			'emailDivision' => 'email|min:3|max:500');	

		$mensajeValidacionDivision = array(
			'required' => 'Este campo es obligatorio',
			'alpha' => 'Este campo admite sólo letras',
			'alpha_num' => 'Este campo admite letras y/o números',
			'alpha_custom' => 'Este campo admite letras y/o números',
			'alpha_spaces' => 'Este campo admite sólo letras',
			'min' => 'Este campo debe contener almenos :min caracteres',
			'max' => 'Este campo debe contener como máximo :max caracteres',
			'email' => 'Este campo debe contener una dirección de correo válida',
			'integer' =>'Este campo admite sólo números de hasta 9 cifras');

		$validadorModificarDivision = Validator::make($datosFormularioDivision, $reglasValidacionDivision, $mensajeValidacionDivision);

		if($validadorModificarDivision->passes()){


			$Division = new Division();
			$updateDivision = $Division->updateDivision($idDivision);

			$Empresa = new Empresa();
			$datosTbls = $Empresa->getDetalleListado($idAnotacion);

			$Anotacion = new Anotacion();
			$anotaciones = $Anotacion->getDetalleAnotacion($idContacto);

			$AnotacionN = new Anotacion();
			$anotacionN = $AnotacionN->getAnotacionN($idContacto);

			
			return View::make('mantenedor.detalleListado', array('datosTbls' => $datosTbls, 'anotaciones' => $anotaciones, 'anotacionN' => $anotacionN));
			//return Redirect::to('/mantenedor/vistaIngresoClientesContacto')->with('msgExitoIngeso', 'Datos de cliente ingresados satisfactoriamente');

		}	
		
		else{
			
			return Redirect::to('modificarInfoDivision/'.$idDivision.'/'.$idContacto.'/'.$idAnotacion)->withInput()->withErrors($validadorModificarDivision);
		}		


	}

	public function ModificarDatosContacto($idContacto, $idAnotacion){



		$datosFormularioContacto = array(
			'nombreCliente' => Input::get('nombreCliente'),
			'apellidoCliente' => Input::get('apellidoCliente'),
			'telefonoCliente' => Input::get('telefonoCliente'),
			'celularCliente' => Input::get('celularCliente'),
			'emailCliente' => Input::get('emailCliente'),
			'cargo' => Input::get('cargo'));
			

		$reglasValidacionContacto = array(
			'nombreCliente' => 'alpha_custom|min:2|max:500',
			'apellidoCliente' => 'alpha_custom|min:2|max:500',
			'telefonoCliente' => 'alpha_custom|min:2|max:255',
			'celularCliente' => 'alpha_custom|min:2|max:255',
			'emailCliente' => 'email|min:2|max:500',
			'cargo' => 'alpha_custom|min:2|max:500');	

		$mensajeValidacionContacto = array(
			'required' => 'Este campo es obligatorio',
			'alpha' => 'Este campo admite sólo letras',
			'alpha_num' => 'Este campo admite letras y/o números',
			'alpha_custom' => 'Este campo admite letras y/o números',
			'alpha_spaces' => 'Este campo admite sólo letras',
			'min' => 'Este campo debe contener almenos :min caracteres',
			'max' => 'Este campo debe contener como máximo :max caracteres',
			'email' => 'Este campo debe contener una dirección de correo válida',
			'integer' => 'Este campo admite sólo números de hasta 9 cifras',
			'boolean' => 'Este campo no admite otros caracteres');

		$validadorModificarContacto = Validator::make($datosFormularioContacto, $reglasValidacionContacto, $mensajeValidacionContacto);

		if($validadorModificarContacto->passes()){

			
			$Contacto = new Contacto();
			$updateContacto = $Contacto->updateContacto($idContacto);

			$Empresa = new Empresa();
			$datosTbls = $Empresa->getDetalleListado($idAnotacion);

			$Anotacion = new Anotacion();
			$anotaciones = $Anotacion->getDetalleAnotacion($idContacto);

			$AnotacionN = new Anotacion();
			$anotacionN = $AnotacionN->getAnotacionN($idContacto);

			return View::make('mantenedor.detalleListado', array('datosTbls' => $datosTbls, 'anotaciones' => $anotaciones, 'anotacionN' => $anotacionN));			

		}	
		
		else{

			return Redirect::to('modificarInfoContacto/'.$idContacto.'/'.$idAnotacion)->withInput()->withErrors($validadorModificarContacto);
		}		

	}
	

}

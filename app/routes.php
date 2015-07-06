<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', array('uses' => 'LoginController@VistaLogin'));

Route::get('/login/login', array('uses' => 'LoginController@VistaLogin'));



	Route::any('/FuncionLogin', array('uses' => 'LoginController@FuncionLogin', 'as' => 'frmLogin'));
Route::group(['before' => 'auth'], function(){
	Route::get('/mantenedor/listadoClientes', array('uses' => 'MantenedorController@ListadoClientes'));

	Route::get('/mantenedor/vistaIngresoClientesEmpresa', array('uses' => 'MantenedorController@VistaIngresoClientesEmpresa'));

	Route::get('/mantenedor/vistaIngresoClientesDivision/{idEmpresa}', array('uses' => 'MantenedorController@VistaIngresoClientesDivision', 'as' => 'ingresoDivision'));

	Route::get('/mantenedor/vistaIngresoClientesContacto/{idDivision}', array('uses' => 'MantenedorController@VistaIngresoClientesContacto'));

	Route::get('/mantenedor/vistaIngresoClientesAnotacion/{idContacto}', array('uses' => 'MantenedorController@VistaIngresoClientesAnotacion'));

	Route::post('/mantenedor/ingresoClientesEmpresa', array('uses' => 'MantenedorController@IngresarClientesEmpresa'));

	Route::post('/mantenedor/ingresoClientesDivision/{idEmpresa}', array('uses' => 'MantenedorController@IngresarClientesDivision'));

	Route::post('/mantenedor/ingresoClientesContacto/{idDivision}', array('uses' => 'MantenedorController@IngresarClientesContacto'));

	Route::post('/mantenedor/ingresoClientesAnotacion/{idContacto}', array('uses' => 'MantenedorController@IngresarClientesAnotacion'));

	Route::any('/mantenedor/DetalleListado/{idContacto}/{idAnotacion}', array('uses' => 'MantenedorController@DetalleListado'));

	Route::get('/mantenedor/vistaModificacionAnotacion/{idAnotacion}', array('uses' => 'MantenedorController@VistaModificarAnotacion'));

	Route::post('/mantenedor/modificarAnotacion/{idAnotacion}', array('uses' => 'MantenedorController@ModificarAnotacion'));

	Route::get('/mantenedor/vistaIngresoEmpresaExistente', array('uses' => 'MantenedorController@VistaIngresoEmpresaExistente'));

	Route::post('/mantenedor/FuncionIngresoEmpresaExistente', array('uses' => 'MantenedorController@IngresoEmpresaExistente'));

	Route::post('/mantenedor/FuncionIngresoEmpresaDivisionExistente', array('uses' => 'MantenedorController@IngresoEmpresaDivisionExistente'));

	Route::get('/mantenedor/vistaAgregarAnotacionxCliente/{idContacto}/{idAnotacion}', array('uses' => 'MantenedorController@VistaIngresoAnotacionN'));

	Route::post('/mantenedor/IngresoAnotacionN/{idContacto}/{idAnotacion}', array('uses' => 'MantenedorController@IngresoAnotacionN'));

	Route::get('/mantenedor/infoDropdownlistDivision/{idEmpresa}', array('uses' => 'MantenedorController@getCmb'));

	Route::get('/desactivarContacto/{idContacto}', array('uses' => 'MantenedorController@DesactivarContacto'));

	Route::get('/propuesta', array('uses' => 'MantenedorController@verPropuesta'));

	Route::get('modificarInfoEmpresa/{idEmpresa}/{idContacto}/{idAnotacion}', array('uses' => 'MantenedorController@VistaModificarDatosEmpresa'));

	Route::get('modificarInfoDivision/{idDivision}/{idContacto}/{idAnotacion}', array('uses' => 'MantenedorController@VistaModificarDatosDivision'));

	Route::get('modificarInfoContacto/{idContacto}/{idAnotacion}', array('uses' => 'MantenedorController@VistaModificarDatosContacto'));

	Route::get('/mantenedor/dropDownComunas/{idRegion}', array('uses' => 'MantenedorController@getComunas'));

	Route::post('modificacionEmpresa/{idEmpresa}/{idContacto}/{idAnotacion}', array('uses' => 'MantenedorController@ModificarDatosEmpresa'));

	Route::post('modificacionDivision/{idDivision}/{idContacto}/{idAnotacion}', array('uses' => 'MantenedorController@ModificarDatosDivision'));

	Route::post('modificacionContacto/{idContacto}/{idAnotacion}', array('uses' => 'MantenedorController@ModificarDatosContacto'));

	Route::get('/Logout', array('uses' => 'LoginController@FuncionLogout'));



});


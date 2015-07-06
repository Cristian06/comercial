@extends('layouts.base')

@section('modificarAnotacion')

	<style type="text/css">

		.header{
			background-color: #00A1DD;
			margin-bottom: 30px;
			text-align: right;
			color: white;
			border-radius: 10px;
			height: 100px;
			padding-top: 13px;
			padding-right: 50px;
		}

			.header a{
				color: white;
			}
			.header a:hover{
				text-decoration: none;
			}

		.menu{
			
			margin-bottom: 20px;

		}

	</style>


	<div class="header">

		<h3>Bienvenido {{ Auth::user()->nombreUsuario }} | {{ HTML::link('/Logout', 'Cerrar Sesión') }}</h3>


	</div>

	<div class="menu">
{{-- 
		<ul class="nav nav-tabs">
			<li >{{ HTML::link('/mantenedor/vistaIngresoClientesEmpresa', 'Ingresar Nuevo Contacto') }}</li>
			<li >{{ HTML::link('/mantenedor/vistaIngresoEmpresaExistente', 'Ingresar Contacto a Empresa Existente') }}</li>
		</ul> --}}

	</div>


	<div class="panel panel-primary">

		<div class="panel-heading"><h3>Modificación de Anotación {{ $cliente->idAnotacion }}</h3></div>

		<div class="panel-body">

			{{ Form::open(array('url' => '/mantenedor/modificarAnotacion/'.$cliente->idAnotacion, 'role' => 'form')) }}

				{{ Form::label('anotacion', 'Anotación') }}
				{{ Form::textarea('anotacion', $cliente->anotacion, array('class' => 'form-control')) }}

				<br>{{ Form::submit('Modificar Anotación', array('class' => 'btn btn-primary')) }}
				{{ HTML::link('/mantenedor/listadoClientes', 'Cancelar') }}

			{{ Form::close() }}

		</div>

		<div class="panel-footer"></div>


	</div>

@stop
@extends('layouts.base')

@section('ingresoEmpresaExistente')

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
			padding-left: 30px;
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
		.fondoImg{
			border-radius: 10px;
			margin-top: -2px;
			background-color:#BAC6C9;
			padding: 7px;
		}

	</style>

	<script type="text/javascript">

	

		$(document).ready(function(){
			$("#tblempresa").change(function(){
				$("#tbldivision").load("infoDropdownlistDivision/"+this.value);
			});
		});

			

	</script>


	
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-8">
			
			<div class="header">

				<img src="{{ URL::asset('assets/img/welcome-logo.png') }}" class="img-responsive pull-left fondoImg">

				<h3>Bienvenida {{ Auth::user()->nombreUsuario }} | {{ HTML::link('/Logout', 'Cerrar Sesión') }}</h3>
			</div>
		</div>
	</div>


	<div class="row">

		
		<div class="col-md-12 col-sm-12 col-xs-8">

			<div class="menu">

				<ul class="nav nav-tabs">
					<li >{{ HTML::link('/mantenedor/vistaIngresoClientesEmpresa', 'Ingresar Nuevo Contacto') }}</li>
					<li >{{ HTML::link('/mantenedor/listadoClientes', 'Volver al Listado') }}</li>
				</ul>

			</div>

		</div>
	</div>


	<div class="row">

		<div class="col-md-12 col-sm-12 col-xs-8">

			<div class="panel panel-primary">

				<div class="panel-heading"><h4>Empresas Ingresadas Anteriormente</h4></div> 

				<div class="panel-body"> 

					{{ Form::open(array('url' => '/mantenedor/FuncionIngresoEmpresaExistente', 'role' => 'form')) }}

						{{ Form::label('nombre', 'Seleccione Empresa') }}
						
						{{ Form::select('tblempresa', $empresas, Input::old('tblempresa'), array('class' => 'form-control'))}}

						<br>{{ Form::submit('Siguiente', array('class' => 'btn btn-primary')) }}
		
					{{ Form::close() }}

				</div>

				<div class="panel-footer"></div>

			</div>

		</div>

	</div>

	<div class="row">

		<div class="col-md-12 col-sm-12 col-xs-8">

			<div class="panel panel-primary">

				<div class="panel-heading"><h4>Empresas y Divisiones Ingresadas Anteriormente</h4></div>

				<div class="panel-body">

					{{ Form::open(array('url' => '/mantenedor/FuncionIngresoEmpresaDivisionExistente', 'role' => 'form')) }}

						{{ Form::label('tblempresa', 'Seleccione Empresa') }}
						{{ Form::select('tblempresa', $empresas2, Input::old('tblempresa'), array('class' => 'form-control', 'id' => 'tblempresa')) }}

						
							{{ Form::label('tbldivision', 'Seleccione División') }}
							{{ Form::select('tbldivision', $divisiones, Input::old('tbldivision'), array('class' => 'form-control', 'id' => 'tbldivision')) }}

							
						<br>{{ Form::submit('Siguiente', array('class' => 'btn btn-primary')) }}


					{{ Form::close() }}


				</div>

				<div class="panel-footer"></div>


			</div>
		</div>

	</div>


	

@stop
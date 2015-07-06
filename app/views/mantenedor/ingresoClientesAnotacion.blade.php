@extends('layouts.base')

@section('ingresoClientesEmpresa')

	<script type="text/javascript">

		$(function(){

			$("#btnRegistroAnotacion").click(function(){

				textarea = $("textarea").val();
				textarea_line = textarea.replace(new RegExp("\n", "g"), "<br>");
				textarea = $("textarea").val(textarea_line);

			});

		});

			

	</script>

	<style type="text/css">

		.txtError{
			margin-left: 30px;
			color: red;
			font-weight: bold;
		}

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
			
			/*width: 1046px;*/
			margin-left: -35px;
			margin-bottom: 20px;

		}

		.linkVolverListado{
			float: right;
			margin-top: -28px;
			margin-right: 10px;
		}

		.not-active{
			pointer-events:none;
			cursor: default;
		}

		ul{

		}
		li{
			display: inline;
			margin-left: 30px;
		}
		.fondoImg{
			border-radius: 10px;
			margin-top: -2px;
			background-color:#BAC6C9;
			padding: 7px;
		}

	</style>



	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-8">
			
			<div class="header">

				<img src="{{ URL::asset('assets/img/welcome-logo.png') }}" class="img-responsive pull-left fondoImg">

				<h3>Bienvenido {{ Auth::user()->nombreUsuario }} | {{ HTML::link('/Logout', 'Cerrar Sesión') }}</h3>
			</div>
		</div>
	</div>

	<div class="row">

		<div class="col-md-12 col-sm-12 col-xs-8">

			<div class="menu">

				<ul class="nav nav-tabs">
					<li role="navigation" class="not-active">{{ HTML::link('/mantenedor/vistaIngresoClientesEmpresa', 'Ingresar Datos Empresa') }}</li>
					<li role="navigation" class="not-active">{{ HTML::link('/mantenedor/vistaIngresoClientesDivision', 'Ingresar Datos División') }}</li>
					<li role="navigation" class="not-active">{{ HTML::link('/mantenedor/vistaIngresoClientesContacto', 'Ingresar Datos Contacto') }}</li>
					<li role="navigation" class="active">{{ HTML::link('/mantenedor/vistaIngresoClientesAnotacion', 'Ingresar Datos Anotación') }}</li>
					<li role="navigation">{{ HTML::link('/mantenedor/listadoClientes', 'Volver al Listado') }}</li>
				</ul>

			</div>
		</div>
	</div>



	<div class="row">

		<div class="col-md-12 col-sm-12 col-xs-8">

			<div class="panel panel-primary">

				<div class="panel-heading"><h3>Ingreso Datos</h3></div>

				<div class="panel-body">

			
					{{ Form::open(array('url' => '/mantenedor/ingresoClientesAnotacion/'.$idContacto, 'files' => 'true', 'role' => 'form')) }}

						{{ Form::label('anotacion', 'Observaciones') }}
						{{ Form::label('', $errors->first('anotacion'), array('class' => 'txtError')) }}
						{{ Form::textarea('anotacion', '', array('class' => 'form-control', 'placeholder' => 'Ingrese las Observaciones para el Contacto',)) }}

						{{ Form::label('propuesta', 'Archivo Propuesta (Máximo 20 MB)') }}
						{{ Form::label('', $errors->first('propuesta'), array('class' => 'txtError')) }}
						{{ Form::file('propuesta', array('class' => 'form-control', 'class' => 'btn btn-primary')) }}


						<br>{{ Form::submit('Registrar Cliente', array('class' => 'btn btn-primary', 'id' => 'btnRegistroAnotacion')) }}


					{{ Form::close() }}

				</div>

				<div class="panel-footer"></div>

			</div>

		</div>

	</div>

@stop
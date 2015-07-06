@extends('layouts.base')

@section('ingresoAnotacionN')

	<script type="text/javascript">

		function volver(){

			window.history.back();
		}

		$(function(){
			$("#btnAgregarAnotacion").click(function(){
				textarea = $("textarea").val();
				textarea_line = textarea.replace(new RegExp("\n", "g"), "<br>");
				textarea = $("textarea").val(textarea_line);
			});
		});

	</script>


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

		.txtError{
			margin-left: 30px;
			color: red;
			font-weight: bold;
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
					
					
					<li >{{ HTML::link('/mantenedor/DetalleListado/'.$idContacto.'/'.$idAnotacion, 'Volver al Detalle') }}</li>
				</ul>

			</div>
		</div>
	</div>

	<div class="row">

		<div class="col-md-12 col-sm-12 col-xs-8">

			<div class="panel panel-primary">

				<div class="panel-heading"><h4>Añadir Observación</h4></div>

				<div class="panel-body">

					{{ Form::open(array('url' => '/mantenedor/IngresoAnotacionN/'.$idContacto.'/'.$idAnotacion, 'role' => 'form', 'files' => 'true')) }}

						{{ Form::label('anotacion', 'Observaciones') }}
						{{ Form::label('', $errors->first('anotacion'), array('class' => 'txtError')) }}
						{{ Form::textarea('anotacion', null, array('class' => 'form-control')) }}

						{{ Form::label('propuesta', 'Archivo Adjunto (Máximo 20 MB)' ) }}
						{{ Form::label('',  $errors->first('propuesta'), array('class' => 'txtError')) }}
						{{ Form::file('propuesta', array('class' => 'form-control', 'class' => 'btn btn-primary')) }}

						<br>{{ Form::submit('Ingresar Observación', array('class' => 'btn btn-primary', 'id' => 'btnAgregarAnotacion')) }}

					{{ Form::close() }}


				</div>

				<div class="panel-footer"></div>

			</div>
		</div>
	</div>

@stop

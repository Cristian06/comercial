@extends('layouts.base')

@section('ingresoAnotacionN')

	<script type="text/javascript">

		function volver(){

			window.history.back();
		}

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

				<div class="panel-heading"><h4>Modificar Datos Contacto</h4></div>

				<div class="panel-body">

					{{ Form::open(array('url' => 'modificacionContacto/'.$idContacto.'/'.$idAnotacion, 'role' => 'form', 'files' => 'true')) }}

						{{ Form::label('nombreCliente', 'Nombre Contacto') }}
						{{ Form::label('', $errors->first('nombreCliente'), array('class' => 'txtError')) }}
						{{ Form::text('nombreCliente', $datosTbls->nombreCliente, array('class' => 'form-control')) }}

						{{ Form::label('apellidoCliente', 'Apellido Contacto') }}
						{{ Form::label('', $errors->first('apellidoCliente'), array('class' => 'txtError')) }}
						{{ Form::text('apellidoCliente', $datosTbls->apellidoCliente, array('class' => 'form-control')) }}

						{{ Form::label('telefonoCliente', 'N° Teléfono Contacto') }}
						{{ Form::label('', $errors->first('telefonoCliente'), array('class' => 'txtError')) }}
						{{ Form::text('telefonoCliente', $datosTbls->telefonoCliente, array('class' => 'form-control')) }}

						{{ Form::label('celularCliente', 'Celular Contacto') }}
						{{ Form::label('', $errors->first('celularCliente'), array('class' => 'txtError')) }}
						{{ Form::text('celularCliente', $datosTbls->celularCliente, array('class' => 'form-control')) }}

						{{ Form::label('emailCliente', 'E-mail Contacto') }}
						{{ Form::label('', $errors->first('emailCliente'), array('class' => 'txtError')) }}
						{{ Form::text('emailCliente', $datosTbls->emailCliente, array('class' => 'form-control')) }}

						{{ Form::label('cargo', 'Cargo Contacto') }}
						{{ Form::label('', $errors->first('Cargo'), array('class' => 'txtError')) }}
						{{ Form::text('cargo', $datosTbls->cargo, array('class' => 'form-control')) }}

						<br>{{ Form::submit('Modificar Datos', array('class' => 'btn btn-primary')) }}

					{{ Form::close() }}


				</div>

				<div class="panel-footer"></div>

			</div>
		</div>
	</div>

@stop
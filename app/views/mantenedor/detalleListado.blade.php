@extends('layouts.base')

@section('detalleDatos')

	<script type="text/javascript">

		function confirmDesactivar(){

			if(!confirm('¿Esta segura que desea desactivar este Contacto? Éste se borrará del listado')){
				return false;
			}
		}

	</script>


	<style type="text/css">

		span{
			margin-left: 40px;
		}

/*
		.detalleDatos{
			width: 1000px;
			margin: auto;
		}*/

		/*.detalles{
			width: 850px;
			margin: auto;
		}

		.infoEjecutivo{
			width: 300px;
			float: left;
			clear: both;
			margin-left: 60px;
		}

		.infoEmpresa{
			width: 300px;
			float: right;
			margin-right: 55px;
		}
*/
		.infoDivision{
			
			line-height: 14px;
			
		}

		.infoContacto{
			
			line-height: 14px;
			
		}

		/*.infoAnotacion{
			width: 703px;
			float: left;
			margin-left: 60px;
			
		}*/
		.footerLinks{
			margin-top: 5px;

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
		.panel-body a{
			color: #3C763D;
			font-weight: bold;
			/*background-color: #D6EBCC;*/
			padding: 6px;
			border-radius: 6px;
		}
		.panel-body a:hover{
			text-decoration: none;
			color: #3C763D;
			background-color: #D6EBCC;
			padding: 6px;
			border-radius: 6px;
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
		.txtAlert{

			color: #CE4844 !important;
		}

		.txtBlue{
			color: #2F6FA6 !important;
		}
		

	</style>


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
					<li >{{ HTML::link('/mantenedor/vistaAgregarAnotacionxCliente/'.$datosTbls->idContacto.'/'.$anotacionN->idAnotacion, 'Agregar Observación') }}</li>
					<li>{{ HTML::link('/desactivarContacto/'.$datosTbls->idContacto, 'Desactivar Contacto', array('class' => 'txtAlert', 'onClick' => 'return confirmDesactivar()')) }}</li>
					<li >{{ HTML::link('/mantenedor/listadoClientes', 'Volver al Listado') }}</li>
				</ul>

			</div>
		</div>
	</div>

	@if(Session::has('msgExitoIngresoN'))

		<div class="alert alert-success">

			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				
				<span aria-hidden="true">&times;</span>

			</button>

			<strong>{{ 'Una nueva Observación ha sido ingresada' }}</strong>

		</div>

	@endif

	<div class="row">

		<div class="col-md-12 col-sm-12 col-xs-8">
			<div class="panel panel-primary">

			

			<div class="panel-body">

			<div class="col-lg-6 col-md-6 col-sm-12">
				 <div class="infoEjecutivo">
					<div class="panel panel-primary">

						<div class="panel-heading"><h4>Detalle Ejecutiva | Empresa</h4></div>

						<div class="panel-body">

							{{ Form::label('nombreUsuario', 'Nombre Ejecutiva:', array('class' => 'txtBlue')) }}
							{{ Form::label('', $datosTbls->nombreUsuario) }}

							<br>{{ Form::label('nombre', 'Nombre Empresa:', array('class' => 'txtBlue')) }}
							{{ Form::label('', $datosTbls->nombre) }}

							<br><br>{{ HTML::link('modificarInfoEmpresa/'.$datosTbls->idEmpresa.'/'.$datosTbls->idContacto.'/'.$datosTbls->idAnotacion, 'Modificar Datos') }}
							
						</div>

					</div>
				</div>
			</div>

		

			<div class="col-lg-6 col-md-6 col-sm-12">
				<div class="infoDivision">
					<div class="panel panel-primary">

						<div class="panel-heading"><h4>Detalle División Empresa</h4></div>

						<div class="panel-body">

							<br>{{ Form::label('direccion', 'Dirección:', array('class' => 'txtBlue')) }}
							{{ Form::label('', isset($datosTbls->direccion) ? $datosTbls->direccion: " ") }}

							
							<br>{{ Form::label('comuna', 'Comuna:', array('class' => 'txtBlue')) }}
							{{ Form::label('', isset($datosTbls->comuna) ? $datosTbls->comuna: " ") }}
							

							<br>{{ Form::label('telefono', 'Teléfono:', array('class' => 'txtBlue')) }}
							{{ Form::label('', isset($datosTbls->telefono) ? $datosTbls->telefono: " ") }}

							<br>{{ Form::label('emailDivision', 'E-mail:', array('class' => 'txtBlue')) }}
							{{ HTML::mailto('', isset($datosTbls->emailDivision) ? $datosTbls->emailDivision: " ") }}
						

							<br><br>{{ HTML::link('modificarInfoDivision/'.$datosTbls->idDivision.'/'.$datosTbls->idContacto.'/'.$datosTbls->idAnotacion, 'Modificar Datos') }}
					
						</div>

					</div>
				</div>
			</div>


			<div class="col-lg-6 col-md-6 col-sm-12">
				<div class="infoContacto">
					<div class="panel panel-primary">

						<div class="panel-heading"><h4>Detalle Contacto</h4></div>

						<div class="panel-body">

							{{ Form::label('nombreCliente', 'Nombre:', array('class' => 'txtBlue')) }}
							{{ Form::label('', $datosTbls->nombreCliente) }}

							<br>{{ Form::label('apellidoCliente', 'Apellido:', array('class' => 'txtBlue')) }}
							{{ Form::label('', $datosTbls->apellidoCliente) }}

							<br>{{ Form::label('telefonoCliente', 'N° Teléfono:', array('class' => 'txtBlue')) }}
							{{ Form::label('', isset($datosTbls->telefonoCliente) ? $datosTbls->telefonoCliente: " ") }}

							<br>{{ Form::label('celularCliente', 'N° Celular:', array('class' => 'txtBlue')) }}
							{{ Form::label('', isset($datosTbls->celularCliente) ? $datosTbls->celularCliente: " ") }} 
							
							<br>{{Form::label('emailCliente', 'E-mail:', array('class' => 'txtBlue')) }}
							{{ HTML::mailto(isset($datosTbls->emailCliente) ? $datosTbls->emailCliente: " ") }}

							<br>{{ Form::label('cargo', 'Cargo:', array('class' => 'txtBlue')) }}
							{{ Form::label('', $datosTbls->cargo) }}


							<br><br>{{ HTML::link('modificarInfoContacto/'.$datosTbls->idContacto.'/'.$datosTbls->idAnotacion, 'Modificar Datos') }}

				
							
						</div>

					</div>
				</div> 
			</div>
				
			<div class="col-lg-6 col-md-6 col-sm-12">
				<div class="infoAnotacion">
					<div class="panel panel-primary">

						<div class="panel-heading"><h4>Detalle Observación</h4></div>

						<div class="panel-body">

								{{ Form::label('anotacion', 'Observaciones:', array('class' => 'txtBlue')) }}
							@foreach($anotaciones as $anotacion)


								
								<br><b>-> {{ $anotacion->anotacion }}</b>

							@endforeach

								<br><br>{{ Form::label('propuesta', 'Archivos Adjuntos:', array('class' => 'txtBlue')) }}
								
							@foreach($anotaciones as $propuesta)


								@if(isset($propuesta->idArchivo))
							
								<br>{{"<a href=/assets/propuestas/".$propuesta->rutaArchivo." target='_blank'>Click para ver Archivo</a>"}}

								@else
								
								<br>{{"No hay Archivos adjuntos" }}

								@endif

							
							@endforeach
						
						</div>

					</div>
				</div>
			</div>

			</div>

			</div>
		</div>

	</div>
@stop

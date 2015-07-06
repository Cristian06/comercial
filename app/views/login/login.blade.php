<!DOCTYPE html>
<html>

	<head>

		<title>Panel Comercial</title>

		<meta charset="UTF-8">
		<meta name="viewport" content="width-device-width, initial-scale=1">

		<!-- JQuery -->
		<script type="text/javascript" src="{{ URL::asset('assets/js/jquery-2.1.3.min.js') }}"></script>

		<!-- Bootstrap -->
		<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/css/bootstrap.min.css') }}">

		<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/css/bootstrap-theme.min.css') }}">

		<script type="text/javascript" src="{{ URL::asset('assets/js/bootstrap.min.js') }}"></script>

		<!-- DataTable -->
		<script type="text/javascript" src="{{ URL::asset('assets/js/jquery.dataTables.js') }}"></script>

		<script type="text/javascript" src="{{ URL::asset('assets/js/jquery.dataTables.min.js') }}"></script>

		<script type="text/javascript" src="{{ URL::asset('assets/js/bootbox.js') }}"></script>

		<script type="text/javascript" src="{{ URL::asset('assets/js/bootbox.min.js') }}"></script>

		<!--<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/css/jquery.dataTables.css') }}">

		<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/css/jquery.dataTables.min.css') }}">-->


		<!-- Versión Boostrap DataTable -->
		<script type="text/javascript" src="{{ URL::asset('assets/js/dataTables.bootstrap.min.js') }}"></script>

		<script type="text/javascript" src="{{ URL::asset('assets/js/dataTables.bootstrap.js') }}"></script>

		<link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/css/dataTables.bootstrap.css') }}">

		<script type="text/javascript">

			function ErrorDatos(){

				alert('Datos incorrectos, vuelva a intentarlo');
			}

		</script>


		<style type="text/css">

		/*.Login{
			width: 800px;
			margin: auto;
		}*/

		body{
			margin-top: 40px;
			background: transparent url("assets/img/subtle_dots.png") repeat scroll 0% 0%;
		}

		.txtError{
			margin-left: 30px;
			color: red;
			font-weight: bold;
		}

		.panel-primary{
			border-color: #00A1DD !important;
		}
			.panel-primary > .panel-heading{
				background-image: none !important;
				background-color: #00A1DD !important;
				border-color: #00A1DD !important;
			}

		</style>

	</head>

	<body>

		<div class="container">

			<div class="row">
					<div class="col-xs-7 col-sm-7 col-md-offset-3 col-md-6 col-lg-offset-3 col-lg-6">
					
					<p align="center"><img src="{{ URL::asset('assets/img/welcome-logo.png') }}" class="img-responsive"></p>
				
				</div>

			</div>
			
			<div class="row">

				<div class="col-xs-7 col-sm-7 col-md-offset-3 col-md-6 col-lg-offset-3 col-lg-6">

					<div class="panel panel-primary">

						<div class="panel-heading"><h3>Bienvenido al Panel Comercial</h3></div>

						<div class="panel-body">

							{{ Form::open(array( 'route' => 'frmLogin', 'role' => 'form' )) }}

								{{ Form::label('email', 'Correo Electrónico') }}
								{{ Form::label('', $errors->first('email'), array('class' => 'txtError')) }}
								{{ Form::email('email', null, array('class' => 'form-control', 'placeholder' => 'Ingrese su dirección de correo ')) }}

								{{ Form::label('password', 'Contraseña') }}
								{{ Form::label('', $errors->first('password'), array('class' => 'txtError')) }}
								{{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'Ingrese su contraseña')) }}

								<br>{{ Form::submit('Iniciar Sesión', array('class' => 'btn btn-primary')) }}

							{{ Form::close() }}

						</div>

						<div class="panel-footer"></div>

					</div>

				</div>

		</div>

		@if(Session::has('msg_errorLogin'))

			<script>ErrorDatos()</script>

		@endif

	</body>

</html>
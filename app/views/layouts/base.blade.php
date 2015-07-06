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


	<style type="text/css">

		@font-face {/*--normal--*/
	        font-family: 'sourcesansproregular';
	        src: url('http://static.vgroup.cl/fonts/sourcesansproregular-webfont.eot');
	        src: url('http://static.vgroup.cl/fonts/sourcesansproregular-webfont.eot?#iefix') format('embedded-opentype'),
	             url('http://static.vgroup.cl/fonts/sourcesansproregular-webfont.woff') format('woff'),
	             url('http://static.vgroup.cl/fonts/sourcesansproregular-webfont.ttf') format('truetype'),
	             url('http://static.vgroup.cl/fonts/sourcesansproregular-webfont.svg#sourcesansproregular') format('svg');
	        font-weight: normal;
	        font-style: normal;
	 }

	@font-face {/*--bold--*/
		    font-family: 'sourcesanspro-bold';
		    src: url('http://static.vgroup.cl/fonts/sourcesanspro-bold-webfont.eot');
		    src: url('http://static.vgroup.cl/fonts/sourcesanspro-bold-webfont.eot?#iefix') format('embedded-opentype'),
		         url('http://static.vgroup.cl/fonts/sourcesanspro-bold-webfont.woff2') format('woff2'),
		         url('http://static.vgroup.cl/fonts/sourcesanspro-bold-webfont.woff') format('woff'),
		         url('http://static.vgroup.cl/fonts/sourcesanspro-bold-webfont.ttf') format('truetype'),
		         url('http://static.vgroup.cl/fonts/sourcesanspro-bold-webfont.svg#sourcesanspro-bold') format('svg');
		    font-weight: bold;
		    font-style: normal;
	}

	@font-face {/*--italic--*/
		    font-family: 'sourcesanspro-it';
		    src: url('http://static.vgroup.cl/fonts/sourcesanspro-it-webfont.eot');
		    src: url('http://static.vgroup.cl/fonts/sourcesanspro-it-webfont.eot?#iefix') format('embedded-opentype'),
		         url('http://static.vgroup.cl/fonts/sourcesanspro-it-webfont.woff2') format('woff2'),
		         url('http://static.vgroup.cl/fonts/sourcesanspro-it-webfont.woff') format('woff'),
		         url('http://static.vgroup.cl/fonts/sourcesanspro-it-webfont.ttf') format('truetype'),
		         url('http://static.vgroup.cl/fonts/sourcesanspro-it-webfont.svg#sourcesanspro-it') format('svg');
		    font-weight: normal;
		    font-style: italic;
	}

	@font-face {/*--boldItalic--*/
		    font-family: 'sourcesanspro-boldit';
		    src: url('http://static.vgroup.cl/fonts/sourcesanspro-boldit-webfont.eot');
		    src: url('http://static.vgroup.cl/fonts/sourcesanspro-boldit-webfont.eot?#iefix') format('embedded-opentype'),
		         url('http://static.vgroup.cl/fonts/sourcesanspro-boldit-webfont.woff2') format('woff2'),
		         url('http://static.vgroup.cl/fonts/sourcesanspro-boldit-webfont.woff') format('woff'),
		         url('http://static.vgroup.cl/fonts/sourcesanspro-boldit-webfont.ttf') format('truetype'),
		         url('http://static.vgroup.cl/fonts/sourcesanspro-boldit-webfont.svg#sourcesanspro-boldit') format('svg');
		    font-weight: bold;
		    font-style: italic;
	}

		body{
			background: transparent url("{{URL::asset('assets/img/subtle_dots.png')}}") repeat scroll 0% 0%;
		}

		ul{
			text-decoration:none;
		}

		li{
			display: inline;
		}

		.head{
			background-color: #398AB9;
			height: 68px;
		}

		.contLogo{
			margin-top: 8px;
		}

		.content{
			background-color: white;
		}

		#aside{
			background-color: #398AB9;
		}

		.sidebar{
			height: 666px;
			padding-top: 40px;
		}

			.sidebar a{
			 	color: white;
			 	font-family: "sourcesanspro-bold";
			 	font-weight: bold;
			 	font-style: normal;
			}

			.sidebar li{
				line-height: 49px;
			}

	</style>

</head>



<body>

	<div class="container">

		<!-- Header -->
		<div class="row">

			<div class="col-lg-2 col-md-2 col-sm-2 hidden-xs">

				<div class="contLogo">
					<p align="center"><img src="{{ URL::asset('assets/img/welcome-logo.png') }}" class="img-responsive"></p>
				</div>
			</div>

			<div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
				<header class="head">
					@include('partials.head')
				</header>

			</div>

		</div>

		<div class="row">

			<!-- Aside -->
			<div class="col-lg-2 col-md-2 col-sm-2 hidden-xs" id="aside">

				<aside class="sidebar">
				<!-- Nuevo menú -->
					<li >{{ HTML::link('/mantenedor/vistaIngresoClientesEmpresa', 'Ingresar Nuevo Contacto') }}</li>
					<li >{{ HTML::link('/mantenedor/vistaIngresoEmpresaExistente', 'Ingresar Contacto a Empresa Existente') }}</li>

				</aside>

			</div>

			<!-- Listado -->
			<div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">

				<div class="content">
					@yield('content')
				</div>

			</div>

		</div>
		
		


	</div>

</body>
</html>
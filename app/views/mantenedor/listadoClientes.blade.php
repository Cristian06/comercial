@extends('layouts.base')

@section('content')

	

	<script type="text/javascript">

		$(document).ready(function() { 
		    
		    $("#tblClientes").DataTable({
		    	"language": {
		    		"url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
		    	}
		    });

		    $(function () {
  				$('[data-toggle="tooltip"]').tooltip()
			});
				    
		}); 

	</script>



	<style type="text/css">


	

		

	</style>


		<div class="iconIngreso">
			
		</div>

		<div class="iconListado">
			
		</div>

	@if(Session::has('msgExitoIngeso'))
		<div class="alert alert-success" role="alert">

		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			
			<span aria-hidden="true">&times;</span>

		</button>

		<strong>{{'Datos de Contacto Ingresados Satisfactoriamente'}}</strong>

		</div>
	@endif

	@if(Session::has('msgDesactivate'))

		<div class="alert alert-success">

			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				
				<span aria-hidden="true">&times;</span>

			</button>

			<strong>{{'El Contacto ha sido Eliminado del Listado'}}</strong>

		</div>

	@endif

	
			<table cellpadding="0" cellspacing="0" border="0" class="table  table-hover table-bordered table-condensed" id="tblClientes">
			<thead>
				<tr>
					<th>Ejecutiva</th>
					<th>Nombre Empresa</th>
					<th>Nombre Contacto</th>
					<th>Apellido Contacto</th>
					<th>E-mail Contacto</th>	
					<th>N° Teléfono Contacto</th>
					<th>Acciones Disponibles</th>

				</tr>
			</thead>

			<tbody>
				@foreach($clientes as $cliente)
				<tr>
					<td>{{ $cliente->nombreUsuario }}</td>
					<td>{{ $cliente->nombre }}</td>	
					<td>{{ $cliente->nombreCliente }}</td>
					<td>{{ $cliente->apellidoCliente }}</td>
					<td>{{ HTML::mailto(isset($cliente->emailCliente) ? $cliente->emailCliente: " ") }}</td>
					<td>{{ $cliente->telefonoCliente }}</td>
					<td>
						<span data-toggle="modal" data-target="#myModal">




							<a class="glyphicon glyphicon-eye-open" data-toggle="tooltip" data-placement="bottom" title="Ver Detalle" href="{{ URL::TO('/mantenedor/DetalleListado/'.$cliente->idContacto.'/'.$cliente->idAnotacion) }}"></a>
						</span>

						<span class="glyphicon glyphicon-plus" data-toggle="tooltip" data-placement="bottom" title="Agregar Observación"></span>
						<span class="glyphicon glyphicon-pencil" data-toggle="tooltip" data-placement="bottom" title="Modificar Datos Contacto"></span>
						<span class="glyphicon glyphicon-pencil" data-toggle="tooltip" data-placement="bottom" title="Modificar Datos División"></span>
						<span class="glyphicon glyphicon-pencil" data-toggle="tooltip" data-placement="bottom" title="Modificar Datos Empresa"></span>
						<span class="glyphicon glyphicon-trash" data-toggle="tooltip" data-placement="bottom" title="Desactivar Contacto"></span>

						

					</td>
					
					
				</tr>
				@endforeach

			</tbody>

			</table>

	<!-- Modal -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  		<div class="modal-dialog" role="document">
   			<div class="modal-content">
      			<div class="modal-header">
        			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        			<h4 class="modal-title" id="myModalLabel">Modal title</h4>
      			</div>
      			<div class="modal-body">
        		
      			</div>
      			<div class="modal-footer">
        			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        			<button type="button" class="btn btn-primary">Save changes</button>
      			</div>
    		</div>
  		</div>
	</div>


	


@stop




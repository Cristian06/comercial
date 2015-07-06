@foreach($comunas as $comuna)

	<option value="{{$comuna->nombre}}">{{ $comuna->nombre }}</option>
	
@endforeach
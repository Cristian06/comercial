
@foreach($divisiones as $division)
		
	<option value="{{$division->idDivision}}">{{$division->direccion}}</option>

@endforeach
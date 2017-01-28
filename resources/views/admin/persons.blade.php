@extends('layouts.main')
@section('tittle', 'Empresas')
@section('content')
<table class="table table-striped">
	<a href="{{route('person.create')}}" class="btn btn-default ">Registrar Empresa </a>
	<thead>
		<th>Nombre</th>
		<th>Apellido</th>
		<th>Ciudad</th>
		<th>Teléfono</th>
		<th></th>
	</thead>
	<tbody>
		@foreach($persons as $person)
		<tr>
			<td>{{ $person->firstName }}</td>
			<td>{{ $person->surname }}</td>
			<td>{{ $person->city->name }}</td>
			<td> </td>
			<td>
				<form action="{{route('person.destroy', $person->id )}}" method="POST" id="delete">
					{{ csrf_field() }}
					<input name="_method"	type="hidden" value="DELETE">
					<a href="{{route('person.edit', $person->id )}}" class="btn btn-warning"><span class="glyphicon glyphicon-wrench"></span></a>

					<button type="submit"  class="btn btn-danger glyphicon glyphicon-remove-circle"></button>
				</form>

			</td>
		</tr>
		@endforeach
	</tbody>
</table>
{!! $persons->render()  !!}
@endsection
@section('script')
<script>
	$('#delete').submit(function() {
		var c = confirm("Estas seguro de eliminar esta empresa?");
		return c;  
	});
</script>
@endsection
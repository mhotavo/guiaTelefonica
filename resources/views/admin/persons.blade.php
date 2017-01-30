@extends('layouts.main')
@section('tittle', 'Personas')
@section('content')
<div class="panel panel-default">
	<div class="panel-heading">
		Listado Personas
	</div>
	<div class="panel-body">
		<table class="table table-striped">
			<a href="{{route('person.create')}}" class="btn btn-default ">Registrar Empresa </a>
			<thead>
				<th>Primer Nombre</th>
				<th>Segundo  Nombre</th>
				<th>Primer Apellido</th>
				<th>Segundo Apellido</th>
				<th>Ciudad</th>
				<th></th>
			</thead>
			<tbody>
				@foreach($persons as $person)
				<tr>
					<td>{{ $person->firstName }}</td>
					<td>{{ $person->secondName }}</td>
					<td>{{ $person->surname }}</td>
					<td>{{ $person->secondSurname }}</td>
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
	</div>
	{!! $persons->render()  !!}
</div>

@endsection
@section('script')
<script>
	$('#delete').submit(function() {
		var c = confirm("Estas seguro de eliminar esta persona?");
		return c;  
	});
</script>
@endsection
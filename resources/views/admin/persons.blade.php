@extends('layouts.main')
@section('tittle', 'Empresas')
@section('content')
<table class="table table-striped">
	<a href="{{route('person.create')}}" class="btn btn-default ">Registrar Persona </a>
	<thead>
		<th>Nombre</th>
		<th class="hidden-xs">Categoría</th>
		<th>Teléfono</th>
		<th></th>
	</thead>
	<tbody>
		@foreach($persons as $person)
<span>aa</span>
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
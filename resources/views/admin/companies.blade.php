@extends('layouts.main')
@section('tittle', 'Empresas')
@section('content')
<div class="panel panel-default">
	<div class="panel-heading">
		Listado Empresas
	</div>
	<div class="panel-body">
		<table class="table table-striped">
			<a href="{{route('company.create')}}" class="btn btn-default ">Registrar Empresa </a>
			<thead>
				<th>Nombre</th>
				<th class="hidden-xs">Categoría</th>
				<th>Ciudad</th>
				<th></th>
			</thead>
			<tbody>
				@foreach($companies as $company)
				<tr>
					<td>{{ $company->name}}</td>
					<td class="hidden-xs">{{ $company->category->name }}</td>
					<td>{{ $company->city->name}}</td>
					<td>
						<form action="{{route('company.destroy', $company->id )}}" method="POST" id="delete">
							{{ csrf_field() }}
							<input name="_method"	type="hidden" value="DELETE">
							<a href="{{route('company.edit', $company->id )}}" class="btn btn-warning"><span class="glyphicon glyphicon-wrench"></span></a>

							<button type="submit"  class="btn btn-danger glyphicon glyphicon-remove-circle"></button>
						</form>

					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	{!! $companies->render()  !!}
</div>
@endsection
@section('script')
<script>
	$('#delete').submit(function() {
		var c = confirm("Estas seguro de eliminar esta empresa?");
		return c;  
	});
</script>
@endsection
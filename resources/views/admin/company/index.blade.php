@extends('admin.layouts.main')
@section('tittle', 'Listado Empresas')
@section('tittlePanel', 'Listado Empresas')
@section('content')
<!--seach -->
<form class="navbar-form pull-right" role="search" method="GET" action="{{  route('company.index')  }}">
	<div class="form-group">
		<input type="text" class="form-control" placeholder="Buscar" aria-describedby="search" name="name">
		<button  id="search" class="btn btn-default"><i class="fa fa-search" aria-hidden="true"></i></button>
	</div>
</form>

<!-- End seach -->
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
{!! $companies->render()  !!}
@endsection
@section('script')
<script>
	$('#delete').submit(function() {
		var c = confirm("Estas seguro de eliminar esta empresa?");
		return c;  
	});
</script>
@endsection
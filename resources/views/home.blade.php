@extends('layouts.frontMain')
@section('tittle', 'Tú Guía')
@section('content')
<div class="row">
    <div class="hidden-xs col-sm-1 col-md-1 col-lg-1"></div>
    <div class="col-xs-12 col-sm-10 col-md-10 col-lg-10">
        <form class="form" role="form" method="POST" action="{{  route('search')  }}">
            {{ csrf_field() }}    
            <div class="form-group">
                <label for="search">¿Qué buscas? &nbsp;</label>
                <input type="text" class="form-control" name="search" id="search" required placeholder="Raul Gomez, Hotel, Drogeria, etc.">
            </div>
            <div class="form-group">
                <input type="text" class="typeahead form-control" required placeholder="Ciudad" id="city">
                <input type="hidden" class="form-control" required  name="idCity" id="idCity"> 
                <input type="hidden" class="form-control" name="idCategory" id="idCategory"> 
            </div>
            <div class="form-group">
                <label class="radio-inline"><input type="radio" name="type" checked value="c">Empresas</label>
                <label class="radio-inline"><input type="radio" name="type" value="p">Personas</label>
            </div>
            <button type="submit" class="btn btn-primary">Buscar</button>
        </form>
    </div>
</div>

@endsection

@extends('admin.layouts.main')
@section('tittle', 'Editar Empresa')
@section('tittlePanel',  $company->name )
@section('content')
@if(!empty($company->logo))
<div class="thumbnail">
    <img src="{{ asset('img/logos/'.$company->logo) }}" class="img-responsive" alt="{{ $company->name }}"  width="304" >
</div>
@endif
<form class="form-horizontal" role="form" method="POST" action="{{  route('company.update', $company->id)  }}" enctype="multipart/form-data">
    {{ csrf_field() }}               
    <input type="hidden" name="_method" value="PUT">
    <div class="form-group">
        <label class="control-label col-sm-2" for="name">
            Nombre Empresa 
        </label>
        <div class="col-sm-10">
            <input type="text" required class="form-control" name="name" value="{{ $company->name }}"/>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="address">
            Dirección:
        </label>
        <div class="col-sm-10">
            <input type="text" required class="form-control" name="address" value="{{ $company->address }}"/>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="category">
            Categoria:
        </label>
        <div class="col-sm-10">
            <input type="text" class="typeahead form-control" name="category" id="category" value="{{ $company->category->name }}"/>
            <input type="hidden" class="form-control" name="idCategory" id="idCategory" value="{{ $company->idCategory }}">
        </div>
    </div> 
    <div class="form-group">
        <label class="control-label col-sm-2" for="dayOpen">
            Días Atención:
        </label>
        <div class="col-sm-2">
            <select name="dayOpen" id="dayOpen" class="form-control">
                <option value="Lunes">Lunes</option>
                <option value="Martes">Martes</option>
                <option value="Miercoles">Miercoles</option>
                <option value="Jueves">Jueves</option>
                <option value="Viernes">Viernes</option>
                <option value="Sabado">Sábado</option>
                <option value="Domingo">Domingo</option>
            </select>
        </div>
        <label class="control-label col-sm-1 text-center" for="dayClose" style="text-align: center">
            a
        </label>
        <div class="col-sm-2">
           <select name="dayClose" id="dayClose" class="form-control">
            <option value="Lunes">Lunes</option>
            <option value="Martes">Martes</option>
            <option value="Miercoles">Miercoles</option>
            <option value="Jueves">Jueves</option>
            <option value="Viernes">Viernes</option>
            <option value="Sabado">Sábado</option>
            <option value="Domingo">Domingo</option>
        </select>        
    </div>
    <label class="control-label col-sm-1" for="opening">
        Horario:
    </label>
    <div class="col-sm-2">
        <input type="time" required class="form-control" name="hourOpen" value="{{ $company->hourOpen }}" />
    </div>
    <div class="col-sm-2">
        <input type="time" required class="form-control" name="hourClose" value="{{ $company->hourClose }}"/>
    </div>
</div>
<div class="form-group">
    <label class="control-label col-sm-2" for="city">
        Ciudad:
    </label>
    <div class="col-sm-10">
        <input type="text" class="typeahead form-control" name="city" id="city" value="{{ $company->city->name }}"/>
        <input type="hidden" class="form-control" id="idCity" name="idCity" value="{{ $company->idCity }}"/>
    </div>
</div>
<div class="form-group">
    <label class="control-label col-sm-2" for="email">
        E-mail:
    </label>
    <div class="col-sm-4">
        <input type="email" class="form-control" name="email" value="{{ $company->email }}"/>
    </div>
    <label class="control-label col-sm-2" for="website">
       Web:
   </label>
   <div class="col-sm-4">
       <input type="text" class="form-control" name="website"   value="{{ $company->website }}"/>
       <small class="text-info">www.mycompany.com</small>

   </div>
</div>
<div class="form-group">
    <label class="control-label col-sm-2" for="facebook">
        Facebook:
    </label>
    <div class="col-sm-4">
        <input type="text" class="form-control" name="facebook"  value="{{ $company->facebook }}"/>
        <small class="text-info">www.facebook.com/<b>usuario</b></small>
    </div>
    <label class="control-label col-sm-2" for="instagram">
        Instagram:
    </label>
    <div class="col-sm-4">
        <input type="text" class="form-control" name="instagram" value="{{ $company->instagram }}"/>
        <small class="text-info">www.instagram.com/<b>usuario</b></small>
    </div>

</div>
<div class="form-group">
    <label class="control-label col-sm-2" for="description">
        Descripción:
    </label>
    <div class="col-sm-10">
      <textarea name="description" id="description" class="form-control trumbowyg"  >{{ $company->description }}</textarea>
  </div>
</div>
<div class="form-group ">
    <label class="control-label  col-xs-12 col-sm-2" for="phones">
        Telefonos:
    </label>
    <div class="col-xs-6 col-sm-6">
        <input type="text" class="form-control "   name="phones[]" maxlength="10" placeholder="Teléfono ó Celular 1"/>
    </div>
    <div class="col-xs-3 col-sm-3">
        <input type="text" class="form-control "  maxlength="4" name="extensions[]" placeholder="Ext. "/>
    </div>
    <a href="" class="btn_add col-xs-2 col-sm-1">
        <i class="fa fa-plus-circle fa-2x " style="color: #20C220" aria-hidden="true">
        </i>
    </a>
</div>
<div class="phones">
    @foreach ($phones as $phone)
    <div class="form-group ">
        <label class="control-label  col-xs-12 col-sm-2" for="phones">
        </label>
        <div class="col-xs-6 col-sm-6">
            <input type="text" class="form-control "  required name="phones[]" maxlength="10" value="{{ $phone->phone}}"/>
        </div>
        <div class="col-xs-3 col-sm-3">
            <input type="text" class="form-control "  maxlength="4" name="extensions[]" value="{{$phone->extension}}"/>
        </div>
        <a class="btn_del col-xs-2 col-sm-1"><i class=" fa fa-times-circle fa-2x " style="color:red" aria-hidden="true"></i></a>
    </div>
    @endforeach

</div>
<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">
            Guardar
        </button>
    </div>               
</div>
</form>
@endsection
@section('script')
<script>
    $( document ).ready(function() {
        $("#dayOpen").val("{{$company->dayOpen }}");
        $("#dayClose").val("{{$company->dayClose }}");
    });
</script>
@endsection

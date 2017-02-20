@extends('admin.layouts.main')
@section('tittle', 'Registrar Empresa')
@section('tittlePanel', 'Registrar Empresa')
@section('content')
<form class="form-horizontal" role="form" method="POST" action="{{  route('company.store')  }}" enctype="multipart/form-data">
    {{ csrf_field() }}               
    <div class="form-group">
        <label class="control-label col-sm-2" for="name">
            Nombre Empresa 
        </label>
        <div class="col-sm-10">
            <input type="text" required class="form-control" name="name" placeholder=""/>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="address">
            Dirección:
        </label>
        <div class="col-sm-10">
            <input type="text" required class="form-control" name="address" placeholder=""/>
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
            <option value="Viernes" selected>Viernes</option>
            <option value="Sabado">Sábado</option>
            <option value="Domingo">Domingo</option>
        </select>        
    </div>
    <label class="control-label col-sm-1" for="opening">
        Horario:
    </label>
    <div class="col-sm-2">
        <input type="time" required class="form-control" name="hourOpen" value="08:00" />
    </div>
    <div class="col-sm-2">
        <input type="time" required class="form-control" name="hourClose" value="18:00"/>
    </div>
</div>
<div class="form-group">
    <label class="control-label col-sm-2" for="city">
        Ciudad:
    </label>
    <div class="col-sm-10">
        <input type="text" class="typeahead form-control city" name="city" id="city" placeholder=""/>
        <input type="hidden" class="form-control" id="idCity" name="idCity" placeholder=""/>
    </div>
</div>
<div class="form-group">
    <label class="control-label col-sm-2" for="category">
        Categoria:
    </label>
    <div class="col-sm-10">
        <input type="text" class="typeahead form-control category" name="category" id="category" placeholder=""/>
        <input type="hidden" class="form-control" name="idCategory" id="idCategory">
    </div>
</div> 
<div class="form-group">
    <label class="control-label col-sm-2" for="email">
        E-mail:
    </label>
    <div class="col-sm-4">
        <input type="email" class="form-control" name="email" placeholder=""/>
    </div>
    <label class="control-label col-sm-2" for="website">
     Web:
 </label>
 <div class="col-sm-4">
    <input type="text" class="form-control" name="website" placeholder="www.mycompany.com"/>
</div>
</div>
<div class="form-group">
    <label class="control-label col-sm-2" for="facebook">
        Facebook:
    </label>
    <div class="col-sm-4">
        <input type="text" class="form-control" name="facebook" placeholder=""/>
        <small class="text-info">https://www.facebook.com/<b>usuario</b></small>
    </div>
    <label class="control-label col-sm-2" for="website">
        Instagram:
    </label>
    <div class="col-sm-4">
        <input type="text" class="form-control" name="instagram" placeholder=""/>
        <small class="text-info">https://www.instagram.com/<b>usuario</b></small>
    </div>

</div>
<div class="form-group">
    <label class="control-label col-sm-2" for="description">
        Descripción:
    </label>
    <div class="col-sm-10">
      <textarea name="description" id="description" cols="30" class="form-control trumbowyg" rows="6">Hola</textarea>
  </div>
</div>
<div class="form-group">
    <label class="control-label col-sm-2" for="website">
        Logo:
    </label>
    <div class="col-sm-10">
        <input type="file" class="form-control" name="logo" placeholder=""/>
    </div>
</div>
<div class="form-group ">
    <label class="control-label  col-xs-12 col-sm-2" for="phones">
        Telefonos:
    </label>
    <div class="col-xs-6 col-sm-6">
        <input type="text" class="form-control "  required name="phones[]" maxlength="10" placeholder="Teléfono ó Celular 1"/>
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
 
@extends('admin.layouts.main')
@section('tittle', 'Editar Persona')
@section('tittlePanel',  $person->firstName .' '. $person->surname   )
@section('content')
<form class="form-horizontal" role="form" method="POST" action="{{  route('person.update', $person->id)  }}">
    {{ csrf_field() }}   
    <input type="hidden" name="_method" value="PUT">            
    <div class="form-group">
        <label class="control-label col-sm-2" for="firstName">
            Primer Nombre:
        </label>
        <div class="col-sm-10">
            <input type="text" required class="form-control" name="firstName" value="{{ $person->firstName }}"/>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="secondName">
            Segundo Nombre:
        </label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="secondName" value="{{ $person->secondName }}"/>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="surname">
            Primer Apellido:
        </label>
        <div class="col-sm-10">
            <input type="text" required class="form-control" name="surname" value="{{ $person->surname }}"/>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="secondSurname">
            Segundo Apellido:
        </label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="secondSurname" value="{{ $person->secondSurname }}"/>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="birthday">
            Fecha Nacimiento:
        </label>
        <div class="col-sm-10">
            <input type="date" required class="form-control" name="birthday" value="{{ $person->birthday }}"/>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="address">
            Dirección:
        </label>
        <div class="col-sm-10">
            <input type="text" required class="form-control" name="address" value="{{ $person->address }}"/>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="city">
            Ciudad:
        </label>
        <div class="col-sm-10">
            <input type="text" class="typeahead form-control" name="city" id="city" value="{{ $person->city->name }}"/>
            <input type="hidden" class="form-control" id="idCity" name="idCity" value="{{ $person->idCity }}"/>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="profession">
            Profesión:
        </label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="profession" value="{{ $person->profession }}"/>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="email">
            E-mail:
        </label>
        <div class="col-sm-4">
            <input type="email" class="form-control" name="email" value="{{ $person->email }}"/>
        </div>
        <label class="control-label col-sm-2" for="website">
         Web:
     </label>
     <div class="col-sm-4">
         <input type="text" class="form-control" name="website"   value="{{ $person->website }}"/>
         <small class="text-info">www.myperson.com</small>

     </div>
 </div>
 <div class="form-group">
    <label class="control-label col-sm-2" for="facebook">
        Facebook:
    </label>
    <div class="col-sm-4">
        <input type="text" class="form-control" name="facebook"  value="{{ $person->facebook }}"/>
        <small class="text-info">www.facebook.com/<b>usuario</b></small>
    </div>
    <label class="control-label col-sm-2" for="instagram">
        Instagram:
    </label>
    <div class="col-sm-4">
        <input type="text" class="form-control" name="instagram" value="{{ $person->instagram }}"/>
        <small class="text-info">www.instagram.com/<b>usuario</b></small>
    </div>

</div>
<div class="form-group ">
    <label class="control-label  col-xs-12 col-sm-2" for="phones">
        Telefonos:
    </label>
    <div class="col-xs-6 col-sm-6">
        <input type="text" class="form-control "    name="phones[]" maxlength="10" placeholder="Teléfono ó Celular 1"/>
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
</script>
@endsection

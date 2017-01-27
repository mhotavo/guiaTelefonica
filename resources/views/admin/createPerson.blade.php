@extends('layouts.main')
@section('content')

<div class="panel panel-default">
    <div class="panel-heading">
        Agregar Persona
    </div>
    <div class="panel-body">
        <form class="form-horizontal" role="form" method="POST" action="{{  route('person.store')  }}">
            {{ csrf_field() }}               
            <div class="form-group">
                <label class="control-label col-sm-2" for="firstName">
                    Primer Nombre:
                </label>
                <div class="col-sm-10">
                    <input type="text" required class="form-control" name="firstName" placeholder=""/>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="secondName">
                    Segundo Nombre:
                </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="secondName" placeholder=""/>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="surname">
                    Primer Apellido:
                </label>
                <div class="col-sm-10">
                    <input type="text" required class="form-control" name="surname" placeholder=""/>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="secondSurname">
                    Segundo Apellido:
                </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="secondSurname" placeholder=""/>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="birthday">
                    Fecha Nacimiento:
                </label>
                <div class="col-sm-10">
                    <input type="date" required class="form-control" name="birthday" placeholder=""/>
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
                <label class="control-label col-sm-2" for="city">
                    Ciudad:
                </label>
                <div class="col-sm-10">
                    <input type="text" class="typeahead form-control" name="city" id="city" placeholder=""/>
                    <input type="hidden" class="form-control" id="idCity" name="idCity" placeholder=""/>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="profession">
                    Profesión:
                </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="profession" placeholder=""/>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="email">
                    E-mail:
                </label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" name="email" placeholder=""/>
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
    </div>
</div>

@endsection
@section('script')
<script>
  

 $("input[name$='firstName']").val("Milton");
 $("input[name$='surname']").val("Otavo");
 $("input[name$='birthday']").val("1993-10-10");
 $("input[name$='address']").val("Mz 33 Casa 21");
 $("input[name$='idCity']").val("73001000");
 $("input[name$='phones[]']").val("3224567898");
 $("input[name$='email']").val("milton.otavo@gmail.com");



</script>
@endsection

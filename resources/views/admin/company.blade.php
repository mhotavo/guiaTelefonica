@extends('layouts.main')
@section('content')
<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading">
                Agregar Empresa
            </div>
            <div class="panel-body">
                <form class="form-horizontal" role="form" method="POST" action="{{  route('company.store')  }}">
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
                        <label class="control-label col-sm-2" for="city">
                            Categoria:
                        </label>
                        <div class="col-sm-10">
                            <input type="text" class="typeahead form-control" name="category" id="category" placeholder=""/>
                            <input type="hidden" class="form-control" name="idCategory" id="idCategory">
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
                        <label class="control-label col-sm-2" for="email">
                            E-mail:
                        </label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" name="email" placeholder=""/>
                        </div>
                    </div>
                    <div class="form-group">
                    <label class="control-label col-sm-2" for="website">
                            Sitio Web:
                        </label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" name="website" placeholder=""/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="description">
                            Descripción:
                        </label>
                        <div class="col-sm-10">
                          <textarea name="description" id="description" cols="30" class="form-control" rows="6">Hola</textarea>
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
</div>
</div>
@endsection
@section('script')
<script>
   $(document).ready(function() 
   {
                var max_fields      = 4; //maximum input boxes allowed
                var add_button      = $(".btn_add"); //Add button ID
                var x = 1; //initlal text box count
                $(add_button).click(function(e){ //on add input button click
                    e.preventDefault();
                    if(x < max_fields){ //max input box allowed
                        x++; //text box increment
                        $(".phones").append('\
                            <div class="form-group">\
                                <label class="control-label  col-xs-12 col-sm-2" for="phones"></label>\
                                <div class="col-xs-6 col-sm-6">  \
                                    <input type="text" class="form-control "  required name="phones[]" maxlength="10" placeholder="Teléfono ó Celular '+x+'">\
                                </div>\
                                <div class="col-xs-3 col-sm-3">  \
                                    <input type="text" class="form-control "  maxlength="4" name="extensions[]" placeholder="Ext.">\
                                </div>\
                                <a class="btn_del col-xs-2 col-sm-1"><i class=" fa fa-times-circle fa-2x " style="color:red" aria-hidden="true"></i></a>\
                            </div>\
                            '); //add input box
                    }
                });
                $(document).on('click', '.btn_del', function(e) { 
                    e.preventDefault(); 
                    $(this).parent('div').remove(); 
                    x--;
                });
            });

   $("input[name$='name']").val("Mercacentro");;
   $("input[name$='address']").val("Mz 33 Casa 21");
   $("input[name$='idCity']").val("73001000");
   $("input[name$='phones[]']").val("3224567898");
   $("input[name$='email']").val("mercacentro@gmail.com");


</script>
@endsection

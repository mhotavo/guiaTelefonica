@extends('layouts.main')

@section('content')
<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-info">
            <div class="panel-heading">Agregar Persona</div>
            <div class="panel-body">
            <form class="form-horizontal">
                  <div class="form-group">
                    <label class="control-label col-sm-2" for="firstName">Primer Nombre:</label>
                    <div class="col-sm-10">
                      <input type="text" required class="form-control" id="firstName" placeholder="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-sm-2" for="surname">Segundo Nombre:</label>
                    <div class="col-sm-10"> 
                      <input type="text" class="form-control" id="surname" placeholder="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-sm-2" for="secondName">Primer Apellido:</label>
                    <div class="col-sm-10"> 
                      <input type="text" required class="form-control" id="secondName" placeholder="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-sm-2" for="secondSurname">Segundo Apellido:</label>
                    <div class="col-sm-10"> 
                      <input type="text" class="form-control" id="secondSurname" placeholder="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-sm-2" for="birthday">Fecha Nacimiento:</label>
                    <div class="col-sm-10"> 
                      <input type="date" required class="form-control" id="birthday" placeholder="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-sm-2" for="address">Dirección:</label>
                    <div class="col-sm-10"> 
                      <input type="text" required class="form-control" id="address" placeholder="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-sm-2" for="address">Teléfonos:</label>
                    <div class="col-sm-10"> 
                      <input type="text" required class="form-control" id="address" placeholder="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-sm-2" for="city">Ciudad:</label>
                    <div class="col-sm-10"> 
                      <input type="text" class="typeahead form-control" id="city" placeholder="">
                      <input type="hidden" class="form-control" id="idCity" placeholder="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-sm-2" for="profession">Profesión:</label>
                    <div class="col-sm-10"> 
                      <input type="text" class="form-control" id="profession" placeholder="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-sm-2" for="email">E-mail:</label>
                    <div class="col-sm-10"> 
                      <input type="email" class="form-control" id="email" placeholder="">
                    </div>
                  </div>
                    <div class="form-group ">
                     <label class="control-label  col-xs-12 col-sm-2" for="phones">Telefonos:</label>
                         <div class=" col-xs-8 col-sm-1 phones"> 
                            <div>
                                 <input type="text" class="form-control "  name="indicators[]" placeholder="57">
                                 <br>
                            </div>
                        </div>
                        <div class=" col-xs-8 col-sm-4 phones"> 
                            <div>
                                 <input type="text" class="form-control "  name="phones[]" placeholder="123456789">
                                 <br>
                            </div>
                        </div>
                        <div class=" col-xs-8 col-sm-1 phones"> 
                            <div>
                                 <input type="text" class="form-control "  name="extensions[]" placeholder="ext">
                                 <br>
                            </div>
                        </div>
                        <div class="col-xs-1 col-sm-1"> 
                             <i class=" btn_add fa fa-plus-circle fa-2x" style="color: #20C220" aria-hidden="true"></i>
                        </div>
                    </div>
                  <div class="form-group"> 
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-default">Guardar</button>
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
                 $(document).ready(function() {
                var max_fields      = 10; //maximum input boxes allowed
                var wrapper         = $(".phones"); //Fields wrapper
                var add_button      = $(".btn_add"); //Add button ID
                
                var x = 1; //initlal text box count
                $(add_button).click(function(e){ //on add input button click
                    e.preventDefault();
                    if(x < max_fields){ //max input box allowed
                        x++; //text box increment
                        $(wrapper).append('<div><input type="text"  class="form-control" name="phones[]"/> \
                        <a href="#" class="remove_field">Eliminar</a></div>'); //add input box
                    }
                });
                
                $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
                    e.preventDefault(); $(this).parent('div').remove(); x--;
                })
            });
        </script>
@endsection

   $('.datatable').DataTable({
       "language": {
           "lengthMenu": "Mostrar _MENU_  resultados por pagina",
           "zeroRecords": "Nothing found - sorry",
           "info": " _PAGE_ de _PAGES_",
           "infoEmpty": "No records available",
           "infoFiltered": "(filtered from _MAX_ total records)",
           "sSearch": "Filtrar Resultados &nbsp;"
       },
       "pagingType": "simple_numbers",
       "lengthMenu": [
           [10, 25, 50, -1],
           [10, 25, 50, "All"]
       ],
       "searching": true,
       "bFilter": true,
       "bLengthChange": false
   });
   $('.trumbowyg').trumbowyg({
       lang: 'es',
       btns: ['btnGrp-semantic', 'btnGrp-justify', 'btnGrp-lists', ['fullscreen']]
   });
   $('#delete').submit(function() {
       var c = confirm("Estas seguro de eliminar este registro?");
       return c;
   });
   if ($(".phones")) {
       var max_fields = 4; //maximum input boxes allowed
       var add_button = $(".btn_add"); //Add button ID
       var x = 1; //initlal text box count
       $(add_button).click(function(e) { //on add input button click
           e.preventDefault();
           if (x < max_fields) { //max input box allowed
               x++; //text box increment
               $(".phones").append('\
                        <div class="form-group">\
                        <label class="control-label  col-xs-12 col-sm-2" for="phones"></label>\
                        <div class="col-xs-6 col-sm-6">  \
                        <input type="text" class="form-control "  required name="phones[]" maxlength="10" placeholder="Teléfono ó Celular ' + x + '">\
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
   }
<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="{{ asset('js/bootstrap.min.js') }}"></script>

<!-- Plugin JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js" integrity="sha384-mE6eXfrb8jxl0rzJDBRanYqgBxtJ6Unn4/1F7q4xRRyIw7Vdg9jP4ycT7x1iVsgb" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
<!-- Contact Form JavaScript -->
<script src="{{ asset('js/jqBootstrapValidation.js') }}"></script>
<script src="{{ asset('js/contact_me.js') }}"></script>

<!-- Theme JavaScript -->
<script src="{{ asset('js/agency.min.js') }}"></script>

<script>
    var pathCity = "{{ route('SearchCities') }}";
    $('#city').typeahead({
        source:  function (query, process) {
            return $.get(pathCity, { query: query }, function (data) {
                return process(data);
            });
        },
        updater: function(item) {
            $('#idCity').val(item.id);
            return item;
        }

    });

    var pathCategory = "{{ route('SearchCategories') }}";
    $('#search, #category').typeahead({
        source:  function (query, process) {
            return $.get(pathCategory, { query: query }, function (data) {
                return process(data);
            });
        },
        updater: function(item) {
            $('#idCategory').val(item.id);
            return item;
        }
    });

    if ( $(".phones") ) {
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

        }


    </script>
    @yield('script')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <title>
     @yield('tittle', 'Buscar') 
 </title>
 <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet" type="text/css" media="all" />
 <link rel="stylesheet" href=" {{ asset('css/font-awesome.min.css') }} ">
 <link rel="stylesheet" href="{{ asset('plugins/trumbowyg/ui/trumbowyg.min.css') }}">
 <script>
    window.Laravel = <?php echo json_encode([
        'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
  @include('admin.layouts/nav')
  <div class="container">
    @if (count($errors)>
    0)
    <div class="alert alert-danger">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">
            &times;
        </a>
        <ul>
            @foreach ($errors->
            all() as $error)
            <li>
                {{ $error }}
            </li>
            @endforeach
        </ul>
    </div>
    @endif
    @include('flash::message')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    @yield('tittlePanel', 'Titulo') 
                </div>
                <div class="panel-body">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
    <script src="{{ asset('plugins/trumbowyg/trumbowyg.min.js') }}"></script>
    <script src="{{ asset('plugins/trumbowyg/langs/es.min.js') }}"></script>
    <script src="//cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('plugins/dataTables/js/dataTables.bootstrap.min.js') }}"></script>
    <script>
        $('.trumbowyg').trumbowyg({
            lang: 'es',
            btns: [
            'btnGrp-semantic',
            'btnGrp-justify',
            'btnGrp-lists',
            ['fullscreen']
            ]
        });

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
</body>
</html>

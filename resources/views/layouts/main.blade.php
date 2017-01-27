<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <title>
       @yield('tittle', 'Buscar') 
   </title>
   <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet" type="text/css" media="all" />
   <link rel="stylesheet" href=" {{ asset('css/font-awesome.min.css') }} ">
   <script>
    window.Laravel = <?php echo json_encode([
        'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
                    <span class="sr-only">
                        Guía Telefónica
                        <i class="fa fa-phone" aria-hidden="true">
                        </i>
                    </span>
                    <span class="icon-bar">
                    </span>
                    <span class="icon-bar">
                    </span>
                    <span class="icon-bar">
                    </span>
                </button>
                <a class="navbar-brand" href="{{ url("/") }}">
                    Guia Telefonica
                    <i class="fa fa-phone" aria-hidden="true">
                    </i>
                        <!--
                            Menú mobile
                        -->
                    </a>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="#">
                                Buscar &nbsp;
                                <i class="fa fa-search" aria-hidden="true">
                                </i>
                            </a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                Registrarse &nbsp;
                                <i class="fa fa-user-plus" aria-hidden="true">
                                </i>
                                <span class="caret">
                                </span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ route('person.index') }}">
                                        Personas
                                    </a>
                                </li>
                                <li class="divider">
                                </li>
                                <li>
                                    <a href="{{ route('company.create') }}">
                                        Empresas
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                        <!--<li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li> -->
                        @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                Listar
                                <span class="caret">
                                </span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ route('person.index') }}">
                                        Personas
                                    </a>
                                </li>
                                <li class="divider">
                                </li>
                                <li>
                                    <a href="{{ route('company.index') }}">
                                        Empresas
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }}
                                <span class="caret">
                                </span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>
                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
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
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
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
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>
        Guía Telefónica | @yield('tittle', 'Buscar')
    </title>
    <link href="css/bootstrap.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="css/font-awesome.min.css"/>
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
                    <a class="navbar-brand" href="#">
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
                                    <a href="#">
                                        Personas
                                    </a>
                                </li>
                                <li class="divider">
                                </li>
                                <li>
                                    <a href="#">
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
                                Agregar <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ url('/person') }}">
                                        Persona
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="{{ url('company') }}">
                                    Empresa
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ url('/logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
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
        @yield('content')
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
    <script>
      var path = "{{ route('autocomplete') }}";
      $('input.typeahead').typeahead({
        source:  function (query, process) {
            return $.get(path, { query: query }, function (data) {
                    //console.log(data);
                    return process(data);
                });
        },
        updater: function(item) {
            $('#idCity').val(item.id);
            return item;
        }

    });
</script>
@yield('script')
</body>
</html>

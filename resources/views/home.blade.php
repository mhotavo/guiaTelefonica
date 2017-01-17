<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>
        Guía Telefónica
    </title>
    <link href="css/bootstrap.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="css/font-awesome.min.css"/>
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
                </div>
            </div>
        </nav>
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <form>
                        <div class="form-group">
                            <label for="email">
                                Nombre:
                            </label>
                            <input type="email" class="form-control" id="email"/>
                        </div>
                        <div class="form-group">
                            <label for="pwd">
                                Apellido:
                            </label>
                            <input type="password" class="form-control" id="pwd"/>
                        </div>
                        <div class="form-group" id="prefetch">
                            <label for="city">
                                Ciudad:
                            </label>
                            <input class="typeahead form-control" type="text"/>
                            <input class="form-control" type="hidden" id="idCity" />
                        </div>
                        <button type="submit" class="btn btn-default">
                            Buscar
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
        <script>
          var path = "{{ route('autocomplete') }}";
          $('input.typeahead').typeahead({
            source:  function (query, process) {
                return $.get(path, { query: query }, function (data) {
                    console.log(data);
                    return process(data);
                });
            },
            updater: function(item) {
                $('#idCity').val(item.id);
                return item;
            }

        });
    </script>
</body>
</html>

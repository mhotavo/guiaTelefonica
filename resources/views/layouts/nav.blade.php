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
                                    <a href="{{ route('person.create') }}">
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
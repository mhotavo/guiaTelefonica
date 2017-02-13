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
 <!--  <link rel="stylesheet" href="{{ asset('plugins/dataTables/css/dataTables.bootstrap.min.css') }}">
 <link rel="stylesheet" href="//cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css"> -->
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
     <div class="col-sm-2 sidenav hidden-xs">

     </div>
     <div class="col-sm-8 col-xs-12"> 
       @yield('content')
     </div>
     <div class="col-sm-2 sidenav hidden-xs">
      <div class="well">
        <p>ADS</p>
      </div>
      <div class="well">
        <p>ADS</p>
      </div>
    </div>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="{{ asset('js/bootstrap.min.js') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
  <script src="//cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
  
  <script src="{{ asset('plugins/dataTables/js/dataTables.bootstrap.min.js') }}"></script>
  <script src="{{ asset('plugins/trumbowyg/trumbowyg.min.js') }}"></script>
  <script src="{{ asset('plugins/trumbowyg/langs/es.min.js') }}"></script>
  <script src="{{ asset('js/app.js') }}"></script>
  @yield('script')
</body>
</html>

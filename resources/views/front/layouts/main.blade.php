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
 <link  href="{{ asset('plugins/trumbowyg/ui/trumbowyg.min.css') }}">
 <link rel="stylesheet" href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" media="all" />
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
      <div class="col-md-2 sidenav hidden-xs hidden-sm">
        <div class="well">
          <p>ADS</p>
        </div>
        <div class="well">
          <p>ADS</p>
        </div>
      </div>
      <div class="col-md-8 col-xs-12"> 
       @yield('content')
     </div>
     <div class="col-md-2 sidenav hidden-xs hidden-sm">
      <div class="well">
        <p>ADS</p>
      </div>
      <div class="well">
        <p>ADS</p>
      </div>
    </div>
  </div>
  @include('front.layouts/footer')
  @yield('script')
</body>
</html>

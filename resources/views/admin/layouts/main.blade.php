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
 <link href="{{ asset('css/app.css') }}" />

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
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap3-typeahead.min.js') }}"></script>
    <script src="{{ asset('plugins/trumbowyg/trumbowyg.min.js') }}"></script>
    <script src="{{ asset('plugins/trumbowyg/langs/es.min.js') }}"></script>
    <script src="{{ asset('plugins/dataTables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/dataTables/js/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script>

     var pathCity = "{{ route('SearchCities') }}";
     $('.city').typeahead({
       source: function(query, process) {
         return $.get(pathCity, {
           query: query
         }, function(data) {
           return process(data);
         });
       },
       updater: function(item) {
         $('#idCity').val(item.id);
         return item;
       }
     });


     var pathCategory = "{{ route('SearchCategories') }}";
     $('.category').typeahead({
      source: function(query, process) {
        return $.get(pathCategory, {
          query: query
        }, function(data) {
          return process(data);
        });
      },
      updater: function(item) {
        $('#idCategory').val(item.id);
        return item;
      }
    });
     


  </script>
  @yield('script')
</body>
</html>

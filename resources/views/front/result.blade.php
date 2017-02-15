@extends('front.layouts.main')
@section('tittle', 'Resultados')
@section('tittlePanel', 'Resultados')
@section('content')
<!-- -->
<table id="" class="datatable"  >
    <thead>
        <tr >
            <th>&nbsp;</th>
        </tr>
    </thead>
    <tbody>
        @foreach($companies as $company)
        <tr>
            <td>
                <div class=" panel panel-success">
                 <div class="panel-heading">{{ $company->name }}</div>
                 <div class="panel-body">
                     <div class="col-md-4 col-xs-12">
                        <a href="">
                            <img class="img-responsive thumbnail" src="{{ asset('img/logos/'. $company->logo)  }}" alt="">
                        </a>
                    </div>
                    <div class="col-md-8  col-xs-12">
                        <table width="100%">
                            <tr>
                                <td>
                                    <i class="fa fa-map-marker" aria-hidden="true"></i> 
                                    &nbsp;
                                    {{ $company->address }}
                                </td>
                            </tr> 
                            <tr>
                                <td>
                                    <i class="fa fa-clock-o" aria-hidden="true"></i>
                                    &nbsp;
                                    Lunes a Viernes 08:00AM a 06:00pm
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    @foreach($company->phones as $phone) 
                                    <i class="fa fa-phone-square" aria-hidden="true"></i>
                                    &nbsp;
                                    {{ $phone->phone }} 
                                    @if($phone->extension!="")
                                    - {{$phone->extension}}
                                    @endif
                                    <br>
                                    @endforeach
                                </td>
                            </tr>
                            <tr>
                             <td>
                                 <i class="fa fa-laptop" aria-hidden="true"></i>

                                 &nbsp;
                                 <a href="{{ $company->website }}">www.{{ $company->name }}.com</a> 
                             </td>
                         </tr>                 
                         <tr>
                             <td><i class="fa fa-facebook-official" aria-hidden="true"></i></td>
                         </tr>
                         <tr>
                            <td><i class="fa fa-instagram" aria-hidden="true"></i></td>
                        </tr>
                        <tr>
                            <td><i class="fa fa-youtube-square" aria-hidden="true"></i></td>
                        </tr>
                    </table>

                </div>
            </div>
        </div>
    </td>
</tr>

@endforeach

</tbody>
</table>



@endsection
@section('script')
<script> 
    $('.datatable').DataTable( {
        "language": {
            "lengthMenu": "Mostrar _MENU_  resultados por pagina",
            "zeroRecords": "Nothing found - sorry",
            "info": " _PAGE_ de _PAGES_",
            "infoEmpty": "No records available",
            "infoFiltered": "(filtered from _MAX_ total records)",
            "sSearch" : "Filtrar Resultados &nbsp;"
        },
        "pagingType": "simple_numbers",
        "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
        "searching": true,
        "bFilter": true,
        "bLengthChange" : false

    } );


</script>
@endsection
@extends('admin.layouts.main')
@section('tittle', 'Resultados')
@section('content')
<!-- -->
<table id="example" class="datatable" cellspacing="0" width="100%">
    <thead>
        <tr>
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
                    <div class="col-md-8  col-xs-">
                        <table>
                            <tr>
                                <td class="text-primary text-left col-md-4"><b>Dirección</b></td>
                                <td>{{ $company->address }}</td>
                            </tr>
                            <tr>
                               <td class="text-primary text-left col-md-4"><b>Web</b></td>
                               <td><a href="{{ $company->website }}">www.{{ $company->name }}.com</a> </td>

                           </tr>
                           <tr>
                            <td class="text-primary text-left col-md-4"><b>Horario </b></td>
                            <td>Lunes a Viernes 08:00AM a 06:00pm</td>
                        </tr>

                        <tr>
                            <td class="text-primary text-left col-md-4"><b>Telefonos</b></td>
                            <td>
                                @foreach($company->phones as $phone) 
                                {{ $phone->phone }} 
                                @if($phone->extension!="")
                                - {{$phone->extension}}
                                @endif

                                <br>
                                @endforeach
                            </td>
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
        "pagingType": "numbers",
        "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
        "searching": true,
        "bFilter": false,
        "bLengthChange" : false

    } );

    
</script>
@endsection
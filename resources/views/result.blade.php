@extends('layouts.frontMain')
@section('tittle', 'Tú Guía')
@section('content')
@foreach($companies as $company)
<div class="row panel panel-success">
 <div class="panel-heading">{{ $company->name }}</div>
 <div class="panel-body">
     <div class="col-md-4 col-xs-6">
        <a href="">
            <img class="img-responsive" src="{{ asset('imgLogos/'. $company->logo)  }}" alt="">
        </a>
    </div>
    <div class="col-md-8  col-xs-6">
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
@endforeach
{!! $companies->render()  !!}

@endsection

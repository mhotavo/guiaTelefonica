@extends('front.layouts.main')
@section('tittle', 'Resultados')
@section('tittlePanel', 'Resultados')
@section('content')
@foreach($companies as $company)

<div class=" panel panel-success">
   <div class="panel-heading">{{ $company->name }}</div>
   <div class="panel-body">
       <div class="col-md-4 col-xs-12">
        <a href="">
            <img class="img-responsive thumbnail" src="{{ asset('img/logos/'. $company->logo)  }}" alt="">
        </a>
        <p class="small text-justify">
            {{ $company->description }}
        </p>
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


@endforeach
{{ $companies->links() }}

@endsection
@section('script')
<script> 
   

</script>
@endsection
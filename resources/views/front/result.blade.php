@extends('front.layouts.main')
@section('tittle', 'Resultados')
@section('tittlePanel', 'Resultados')
@section('content')

<table id="table_id" class="datatable display">
  <thead>
    <tr>
      <th>&nbsp;</th>
    </tr>
  </thead>
  <tbody>
    @foreach($companies as $company)
    <tr>
      <td>
        <div class=" panel panel-primary">
         <div class="panel-heading">{{ strtoupper($company->name) ." - ". $company->city->name }}</div>
         <div class="panel-body">
           <div class="col-md-4 col-xs-12">
            <a href="">
              <img class="img-responsive thumbnail" src="{{ asset('img/logos/'. $company->logo)  }}" alt="">
            </a>
            <p class="small text-justify">
              {{ $company->description }}
            </p>
          </div>
          <div class="col-md-8  col-xs-12 table-responsive">
            <table width="100%" class="">
              <tr>
                <td>
                  <i class="fa fa-map-marker fa-lg red" aria-hidden="true"></i> 
                  &nbsp;
                  {{ $company->address }}
                </td>
              </tr> 
              <tr>
                <td>
                  <i class="fa fa-calendar fa-lg blue" aria-hidden="true"></i>
                  &nbsp;
                  {{ $company->dayOpen ." - ". $company->dayClose  }}
                </td>
              </tr>
              <tr>
                <td>
                  <i class="fa fa-clock-o fa-lg blue" aria-hidden="true"></i>
                  &nbsp;
                  {{ $company->hourOpen ." - ". $company->hourClose  }}
                </td>
              </tr>
              <tr>
                <td>
                  @foreach($company->phones as $phone) 
                  <i class="fa fa-phone-square fa-lg green" aria-hidden="true"></i>
                  &nbsp;
                  {{ $phone->phone }} 
                  @if($phone->extension!="")
                  - {{$phone->extension}}
                  @endif
                  <br>
                  @endforeach
                </td>
              </tr>
              @if($company->website!="")
              <tr>
               <td>
                 <i class="fa fa-laptop fa-lg" aria-hidden="true"></i>
                 &nbsp;
                 <a href="{{ $company->website }}">{{ $company->website }}</a> 
               </td>
             </tr> 
             @endif                
             <tr>
               <td>
                 @if($company->facebook!="")
                 <a href="https://www.facebook.com/{{ $company->facebook }}" target="_blank">
                   <img src="{{ asset('img/facebook.png') }}" width="26px" alt="">         
                 </a>
                 @endif
                 @if($company->instagram!="")
                 <a href="https://www.instagram.com/{{ $company->instagram }}" target="_blank">
                   <img src="{{ asset('img/instagram.png') }}" width="26px" alt="">         
                 </a>
                 @endif
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


</script>
@endsection
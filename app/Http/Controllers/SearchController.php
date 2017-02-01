<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\City;
use App\Person;
use App\Company;


class SearchController extends Controller
{

  public function search(Request $request)
  {
    $this->validate($request, [
     'search' => 'required',
     'idCity' => 'required',
     'typeSearch' => 'required',
     ]);

    $city=$request->input('idCity') ;
    if ($request->input('typeSearch')=="Person" ) {
      $persons = Person::Name($request->input('search'))->get();
      $persons = $persons->filter(function($person) use ($city)
      {
       if ($person->idCity==$city) {
         return true;
       }
     });

      printf(($persons));
    }
    elseif ($request->input('typeSearch')=="Company"){
      if ($request->input('idCategory')=="" ) {
        $companies = Company::Name($request->input('search'))->orderBy('name', 'ASC')->paginate(20);
      } else {
        $companies = Company::ByCategory($request->input('idCategory'))->orderBy('name', 'ASC')->paginate(20);
      }


     /* $companies = $companies->filter(function($company) use ($city)
      {
       if ($company->idCity==$city) {
         return true;
       }
     });*/
     return view('result')->with('companies', $companies);
     # printf(($companies));
   }




 }

 public function SearchCities(Request $request)
 {

  $this->validate($request, [
    'query' => 'required',
    ]);
  $data = DB::table('cities as c') 
  ->select(DB::raw('CONCAT(c.name, " - " ,  d.name) as name, c.id')) 
  ->join('departments as d', 'c.idDepartment', '=', 'd.id')
  ->where("c.name","LIKE","%{$request->input('query')}%")
  ->get();
  return response()->json($data);

}

public function SearchCategories(Request $request)
{

  $this->validate($request, [
    'query' => 'required',
    ]);

  $data = DB::table('categories as c') 
  ->select(DB::raw('c.name, c.id')) 
  ->where("c.name","LIKE","%{$request->input('query')}%")
  ->get();
  return response()->json($data);

}

}

<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\City;
use App\Person;


class SearchController extends Controller
{

  public function search(Request $request)
  {
    $this->validate($request, [
      'search' => 'required',
      'idCity' => 'required'
      ]);
    $persons = Person::Name($request->input('search'))->get();

    printf(($persons));

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

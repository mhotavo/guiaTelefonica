<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\City;


class SearchController extends Controller
{

  public function search()
  {
    return view('home');
  }

  public function autocomplete(Request $request)
  {

    $data = DB::table('cities as c') 
    ->select(DB::raw('CONCAT(c.name, " - " ,  d.name) as name, c.id')) 
    ->join('departments as d', 'c.idDepartment', '=', 'd.id')
    ->where("c.name","LIKE","%{$request->input('query')}%")
    ->get();
    return response()->json($data);
  }

}

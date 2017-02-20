<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\City;
use App\Person;
use App\Company;


class FrontController extends Controller
{
	public function index(){
		return view('front.index');
	}

	public function search(Request $request)
	{

		$this->validate($request, [
			'city' => 'required',
			]);
		$search=$request->input('search');
		$category=$request->input('idCategory');
		#Busca ID de la ciudad 
		$city=explode(' -', $request->input('city'));
		$city = City::Name($city[0])->get();
		foreach ($city as $key => $value) {
			$city= $value['id'];
		}
		#Falta: Hacer scope para category cuando sea null, buscar similar y asignar a $category

		
		$companies = Company::Name($search,$category, $city)->get();
		return view('front.result')->with('companies', $companies);
	}



	/*public function search(Request $request)
	{
		$this->validate($request, [
			'search' => 'required',
			'idCity' => 'required',
			'type' => 'required',
			]);

		$city=$request->input('idCity') ;
		if ($request->input('type')=="p" ) {
			$persons = Person::Name($request->input('search'))->get();
			$persons = $persons->filter(function($person) use ($city)
			{
				if ($person->idCity==$city) {
					return true;
				}
			});

			printf(($persons));
		}
		elseif ($request->input('type')=="c"){
			if ($request->input('idCategory')=="" ) {
				$companies = Company::Name($request->input('search'))->get();
			} else {
				$companies = Company::ByCategory($request->input('idCategory'))->get();
			}


			$companies = $companies->filter(function($company) use ($city)
			{
				if ($company->idCity==$city) {
					return true;
				}
			}); 
			return view('front.result')->with('companies', $companies);
#			printf(($companies)); 

		} else {
			return view('home');
		}

	} */

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

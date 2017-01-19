<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;
use App\City;
use Maatwebsite\Excel\Facades\Excel;

class ImportController extends Controller
{
	public function departments()
	{
		Excel::load('books.csv', function($reader) {

			foreach ($reader->get() as $csv) {
				Department::create([
					'id' => $csv->id,
					'name' =>$csv->name
					]);
			}
		});
		return Department::all();
	}

	public function cities()
	{
		Excel::load('cities.csv', function($reader) {
			foreach ($reader->get() as $csv) {
				$i=City::find($csv->id);
				if ($i==null) {
					City::create([
						'id' => $csv->id,
						'idDepartment' => $csv->department,
						'name' =>$csv->name
						]);
				}
			}
		});
		return City::all();
	}
}

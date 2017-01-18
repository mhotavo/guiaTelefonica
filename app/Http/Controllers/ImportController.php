<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;
use Maatwebsite\Excel\Facades\Excel;

class ImportController extends Controller
{
	public function import()
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
}

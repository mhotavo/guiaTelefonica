<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Person extends Model
{
	protected $table = "persons";

	protected $fillable = ['firstName', 'secondName', 'surname', 'secondSurname', 'birthday', 'phone', 'cellPhone', 'address', 'idCity', 'profession', 'email', 'website', 'facebook', 'twitter', 'instagram'];

	public function city()
	{
		return $this->belongsTo('App\City', 'idCity');
	}


	public function phones()
	{
		return $this->hasMany('App\Phone');
	}

	public function scopeName($query, $name)
	{

		return $query->where('firstName', 'LIKE', "%$name%")
		->orWhere('secondName', 'LIKE',"%$name%")
		->orWhere('surname', 'LIKE',"%$name%")
		->orWhere('secondSurname', 'LIKE',"%$name%")
		->orWhere(DB::raw("CONCAT(firstName, ' ', secondName)"), 'LIKE',"%$name%")
		->orWhere(DB::raw("CONCAT(firstName, ' ', surname)"), 'LIKE',"%$name%")
		->orWhere(DB::raw("CONCAT(secondName, ' ', surname)"), 'LIKE',"%$name%")
		->orWhere(DB::raw("CONCAT(surname, ' ', secondSurname)"), 'LIKE',"%$name%");
	}
}

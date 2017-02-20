<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
	protected $table ="companies";

	protected $fillable =['name', 'idCategory', 'description', 'address', '	dayOpen', 'dayClose', '	hourOpen', 'hourClose', 'idCity', 'email', 'website','facebook', 'twitter', 'instagram'];

	public function category()
	{
		return $this->belongsTo('App\Category', 'idCategory');
	}

	public function city()
	{
		return $this->belongsTo('App\City', 'idCity');
	}

	public function branches()
	{
		return $this->hasMany('App\Branch');
	}

	public function phones()
	{
		return $this->hasMany('App\Phone', 'idCompany');
	}

	public function scopeName($query, $name, $category, $city)
	{
		if ($category=="") {
			return $query
			->where('idCity', '=',"$city")
			->where('name', 'LIKE', "%$name%")
			->orWhere('description', 'LIKE',"%$name%")
			->orWhere('address', 'LIKE',"%$name%")
			->orWhere('email', 'LIKE',"%$name%")
			->orWhere('website', 'LIKE',"%$name%"); 

		} else {
			return $query
			->where('name', 'LIKE', "%$name%")
			->orWhere('description', 'LIKE',"%$name%")
			->orWhere('address', 'LIKE',"%$name%")
			->orWhere('email', 'LIKE',"%$name%")
			->orWhere('website', 'LIKE',"%$name%")
			->orWhere('idCategory', '=',"$category")
			->where('idCity', '=',"$city")
			;
		}
		
	}

	public function scopeByCategory($query, $name)
	{
		return $query->where('idCategory', '=', "$name");
	}
}

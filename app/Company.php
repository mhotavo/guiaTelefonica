<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
	protected $table ="companies";

	protected $fillable =['name', 'idCategory', 'description', 'phone', 'cellPhone', 'address', 'idCity', 'email', 'website','facebook', 'twitter', 'instagram'];

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
		return $this->hasMany('App\Phone');
	}

	public function scopeName($query, $name)
	{
		return $query->where('name', 'LIKE', "%$name%")
		->orWhere('description', 'LIKE',"%$name%")
		->orWhere('address', 'LIKE',"%$name%")
		->orWhere('email', 'LIKE',"%$name%")
		->orWhere('website', 'LIKE',"%$name%");
	}
}

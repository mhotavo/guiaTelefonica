<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
	protected $table ="companies";

	protected $fillable =['name', 'idCategory', 'description', 'phone', 'cellPhone', 'address', 'idCity', 'email', 'website','facebook', 'twitter', 'instagram'];

	public function category()
	{
		return $this->belongsTo('App\Category');
	}

	public function city()
	{
		return $this->belongsTo('App\City');
	}

	public function branches()
	{
		return $this->hasMany('App\Branch');
	}

	public function phones()
	{
		return $this->hasMany('App\Phone');
	}
}

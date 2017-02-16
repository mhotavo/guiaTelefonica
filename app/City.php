<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
	protected $table ="cities";

	protected $fillable =['id','idDepartment', 'name'];

	public function department()
	{
		return $this->belongsTo('App\Department','idDepartment');
	}

	public function companies()
	{
		return $this->hasMany('App\Company');
	}

	public function persons()
	{
		return $this->hasMany('App\Person');
	}

	public function branch()
	{
		return $this->hasMany('App\Branch');
	}

	public function scopeName($query, $name)
	{
 
		return $query->where('name', 'LIKE', "%$name%");
	}
}


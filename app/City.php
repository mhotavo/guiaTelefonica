<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
	protected $table ="cities";

	protected $fillable =['idDepartament', 'name'];

	public function departament()
	{
		return $this->belongsTo('App\Departament');
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
}


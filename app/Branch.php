<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
	protected $table ="branchoffices";

	protected $fillable =['idCompany',  'phone', 'cellPhone', 'address', 'idCity'];

	public function company()
	{
		return $this->belongsTo('App\Company');
	}

	public function city()
	{
		return $this->belongsTo('App\City');
	}
}

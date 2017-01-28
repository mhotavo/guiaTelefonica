<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
	protected $table ="phones";

	protected $fillable =['idCompany',  'idPerson', 'idBranch', 'indicator', 'phone', 'extension', 'whatsapp'];

	public function department()
	{
		return $this->belongsTo('App\Department','id');
	}


	public function branch()
	{
		return $this->belongsTo('App\Branch','id');
	}

	public function person()
	{
		return $this->belongsTo('App\Person','id');
	}

	public function company()
	{
		return $this->belongsTo('App\Company','id');
	}

	public function scopePhoneCompany($query, $id)
	{
		return $query->where('idCompany', '=', "$id");
	}

	public function scopePhonePerson($query, $id)
	{
		return $query->where('idPerson', '=', "$id");
	}

	public function scopePhoneBranch($query, $id)
	{
		return $query->where('idBranch', '=', "$id");
	}

}

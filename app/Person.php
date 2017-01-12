<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
	protected $table ="persons";

	protected $fillable =['firstName', 'secondName', 'surname', 'secondSurname', 'birthday', 'phone', 'cellPhone', 'address', 'idCity', 'profession', 'email', 'website', 'facebook', 'twitter', 'instagram'];

	public function city()
	{
		return $this->belongsTo('App\City');
	}
}

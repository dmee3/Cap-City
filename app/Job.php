<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
	public $timestamps = false;
	protected $fillable = ['name', 'description'];

	public function member() {
		return $this->hasMany('App\Member');
	}
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conflict extends Model
{
    /* Model relationships */
	public function user() { return $this->belongsTo('App\User'); }
}

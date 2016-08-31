<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    /* Model relationships */
	public function user() { return $this->belongsTo('App\User'); }
}

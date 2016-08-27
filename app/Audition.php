<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Audition extends Model
{
	public function getNameAttribute() {
		return $this->first_name . " " . $this->last_name;
	}
}

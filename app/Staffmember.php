<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staffmember extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'pay', 'position', 'conflict_section'
    ];

	public function user() { return $this->hasOne('user'); }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conflict extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'date_absent', 'reason'
    ];

    /* Model relationships */
	public function user() { return $this->belongsTo('App\User'); }
}

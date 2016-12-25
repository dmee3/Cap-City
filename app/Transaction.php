<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'title', 'amount', 'date_paid', 'notes'
    ];

	public function user() { return $this->belongsTo('App\User'); }
}

<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'dues', 'section', 'subsection'
    ];

	public function user() { return $this->hasOne('App\User'); }
}

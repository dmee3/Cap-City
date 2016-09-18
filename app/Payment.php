<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{

/**
 * NOTE:
 * type is stripe/check/cash
 * info is check number
 * category is incoming dues payment (0) or outgoing staff payment (1)
 */

	use softDeletes;

	/**
	 * The attributes that should be mutated to dates.
	 *
	 * @var array
	 */
	protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'amount', 'date_paid', 'type', 'info', 'category'
    ];

    /* Model relationships */
	public function user() { return $this->belongsTo('App\User'); }
}

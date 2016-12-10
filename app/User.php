<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
	use SoftDeletes;

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
        'first_name', 'last_name', 'email', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token'
    ];

	/**
	 * Check for a given role on the current user.
	 *
	 * @param string role
	 * @return bool
	 */
	public function is($role) {

		foreach ($this->roles()->get() as $r) {
			if ($r->name == $role) {
				return true;
			}
		}

		return false;
	}

	public function name() {
		return $this->first_name . ' ' . $this->last_name;
	}

	/* Model relationships */
	public function roles() { return $this->belongsToMany('App\Role'); }
	public function payments() { return $this->hasMany('App\Payment'); }
	public function conflicts() { return $this->hasMany('App\Conflict'); }
	public function member() { return $this->hasOne('App\Member'); }
	public function futureConflicts() {
		$today = \Carbon\Carbon::today();
		return $this->hasMany('App\Conflict')->whereDate('date_absent', '>=', $today)->orderBy('date_absent');
	}
}

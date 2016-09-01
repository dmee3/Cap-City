<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
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
	protected function is($role) {

		foreach ($this->roles()->get() as $r) {
			if ($r->name == $role) {
				return true;
			}
		}

		return false;
	}

	/* Model relationships */
	public function roles() { return $this->belongsToMany('App\Role'); }
	public function payments() { return $this->hasMany('App\Payments'); }
	public function conflicts() { return $this->hasMany('App\Conflicts'); }
}

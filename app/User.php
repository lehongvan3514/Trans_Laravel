<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

use Auth;

class User extends Authenticatable
{
    //
    protected $guarded = [];

    public $timestamps = false;
    public function hasRole($role)
	{
		
	    return User::where('role', $role)->where('id', auth()->user()->id)->first();
	}

	
}

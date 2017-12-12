<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    //
    protected $guarded = [];
    public $timestamps = false;

    public function drivers(){

    	return $this->belongsTo(User::class,'driver_id');
    }

    public function owners(){

    	return $this->belongsTo(User::class,'user_id');
    }
    
}

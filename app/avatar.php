<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class avatar extends Model
{
    public function users(){
    	return $this->belongsTo('App\User');
    	//dd($user->id);
    }
}

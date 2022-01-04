<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Collectie extends Model
{
    public function items(){
        return $this->hasMany('App\Item');
    }

    public function users(){
        return $this->hasMany('App\User');
    }
}

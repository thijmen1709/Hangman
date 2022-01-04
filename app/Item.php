<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    public function collectie(){
        return $this->belongsTo('App\Collectie');
    }
}

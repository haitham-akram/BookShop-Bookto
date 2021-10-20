<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Place extends Model
{
    use SoftDeletes;
    public function BookInfo(){
        return $this->hasMany('App\BookInfo');
    }
}

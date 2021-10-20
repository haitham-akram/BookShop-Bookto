<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Writer extends Model
{
    use SoftDeletes;
    public function BookInfo(){
        return $this->hasMany('App\BookInfo');
    }

}

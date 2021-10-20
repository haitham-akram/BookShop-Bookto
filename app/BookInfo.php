<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BookInfo extends Model
{
    protected $table = "book_infos";
    use SoftDeletes;
    public function Writer(){
        return $this->belongsTo('App\Writer');
    }
    public function Category(){
        return $this->belongsTo('App\Category');
    }
    public function Place(){
        return $this->belongsTo('App\Place');
    }
    public function Book(){
        return $this->belongsTo('App\Book');
    }
}

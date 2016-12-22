<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table = 'review';

    public function author(){
        return $this->belongsTo('App\User');
    }
}

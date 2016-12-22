<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table = 'review';
    protected $fillable = ['order_id','user_id','product_id','review','rating'];

    public function author(){
        return $this->belongsTo('App\User');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Like extends Model
{

    protected $guarded = [];

    public function comment(){
        return $this->belongsTo('App\Comment');
    }
    public function reply(){
        return $this->belongsTo('App\Reply');
    }
    public function user(){
        return $this->belongsTo('App\User');
    }


}

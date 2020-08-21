<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
    protected $fillable = ['title', 'description', 'slug', 'channel_id','category_id', 'requirement'];

    public function channel(){
        return $this->belongsTo('App\Channel');
    }

    public function video(){
        return $this->hasMany('App\Video');
    }

    public function category(){
        return $this->belongsTo('App\Category');
    }

    /*public function user(){
        return $this->belongsTo('App\User');
    }*/

    public function comment(){
        return $this->hasMany('App\Comment');
    }
}

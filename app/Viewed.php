<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Viewed extends Model
{
    protected $fillable = ['user_id', 'playlist_id'];

    public function playlist(){
        return $this->belongsTo('App\Playlist');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }
}

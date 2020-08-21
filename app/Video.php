<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable = ['playlist_id','title','description','slug','path','category_id'];

    public function playlist(){
        return $this->belongsTo('App\Playlist');
    }

    public function category(){
        return $this->belongsTo('App\Category');
    }
}

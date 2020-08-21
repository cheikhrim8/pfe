<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Comment extends Model
{
    protected $fillable = ['user_id' , 'playlist_id' , 'content'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function playlist(){
        return $this->belongsTo('App\Playlist');
    }

    public function replies(){
        return $this->hasMany('App\Reply');
    }

    public function likes(){
        return $this->hasMany('App\Like');
    }

    public function is_liked_by_user_auth()
    {
        $id = Auth::id();
        $likers = array();
        foreach ($this->likes as $like):
            array_push($likers, $like->user_id);
        endforeach;

        if (in_array($id, $likers)):
            return true;
        else:
            return false;
        endif;
    }


}

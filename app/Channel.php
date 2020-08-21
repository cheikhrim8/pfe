<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Channel extends Model
{
    protected $fillable = ['title','slug','user_id'];

    public function discussion(){
        return $this->hasMany('App\Discussion');
    }

    public function playlist(){
        return $this->hasMany('App\Playlist');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function subscriber(){
        return $this->hasMany('App\Subscriber');
    }

    public function is_subscribed_by_user_auth()
    {
        $id = Auth::id();
        $subscribers = [];
        foreach ($this->subscriber as $subs) {
            array_push($subscribers, $subs->user_id);
        }

        if (in_array($id, $subscribers)) {
            return true;
        } else {
            return false;
        }
    }

    public function has_channel()
    {
        $id = Auth::id();
        $users = [];
        foreach ($this->channel as $chan) {
            array_push($users, $chan->user_id);
        }

        if (in_array($id, $users)) {
            return true;
        } else {
            return false;
        }
    }

}

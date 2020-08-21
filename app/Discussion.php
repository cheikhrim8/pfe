<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Discussion extends Model
{
    protected $fillable = ['title', 'content', 'slug', 'user_id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function discussionComment()
    {
        return $this->hasMany('App\DiscussionComment');
    }

    public function watcher(){
        return $this->hasMany('App\Watcher');
    }

    public function is_watched_by_user_auth()
    {
        $id = Auth::id();
        $watchers = [];
        foreach ($this->watcher as $watch) {
            array_push($watchers, $watch->user_id);
        }

        if (in_array($id, $watchers)) {
            return true;
        } else {
            return false;
        }
    }

    public function hasReplied(){
        $id = Auth::id();
        $replies = [];
        foreach ($this->reply as $reply){
            array_push($replies, $reply->user_i);
        }

        if (in_array($id, $replies))
            return true;
        else
            return false;
    }

}

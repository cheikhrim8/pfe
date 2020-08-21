<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DiscussionComment extends Model
{
    protected $fillable = ['user_id' , 'discussion_id' , 'content'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function discussion()
    {
        return $this->belongsTo('App\Discussion');
    }

    public function replyDiscussionComment(){
        return $this->hasMany('App\ReplyDiscussionComment');
    }
}

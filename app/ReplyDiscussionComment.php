<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReplyDiscussionComment extends Model
{
    protected $fillable = ['user_id', 'discussion_comment_id', 'content'];

    public function discussionComment(){
        return $this->belongsTo('App\DiscussionComment');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }
}

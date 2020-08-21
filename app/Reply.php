<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Reply extends Model
{
    protected $fillable = ['content', 'comment_id', 'user_id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function discussion()
    {
        return $this->belongsTo('App\Discussion');
    }
    public function comment()
    {
        return $this->belongsTo('App\Comment');
    }

    public function likes(){
        return $this->hasMany('App\Like');
    }



   /* public function is_disliked_by_user_auth()
    {
        $id = Auth::id();
        $dislikers = array();
        foreach ($this->dislike as $dislike):
            array_push($dislikers, $dislike->user_id);
        endforeach;

        if (in_array($id, $dislikers)):
            return true;
        else:
            return false;
        endif;
    }*/

}

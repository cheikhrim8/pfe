<?php

namespace App\Http\Controllers;

use App\Like;
use App\Reply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RepliesController extends Controller
{

    public function store(Request $request)
    {
        $this->validate($request, [
            'content' => 'required'
        ]);

        Reply::create([
            'user_id' => Auth::id(),
            'comment_id' => $request->input('comment_id'),
            'content' => $request->input('content'),
        ]);

        return redirect()->back()->with('status', 'Replied To This Comment');

    }

    public function like()
    {

    }

    public function postLikeReply(Request $request)
    {
        $reply_id = $request['replyId'];
        $is_like = $request['isLike'] === 'true';
        $update = false;
        $reply = Reply::find($reply_id);

        if (!$reply) {
            return null;
        }

        $user = Auth::user();
        $like = $user->likes()->where('reply_id', $reply_id)->first();

        if ($like) {
            $already_like = $like->like;
            $update = true;
            if ($already_like == $is_like) {
                $like->delete();
                return null;
            }
        } else {
            $like = new Like();
        }
        $like->like = $is_like;
        $like->user_id = $user->id;
        $like->reply_id = $reply->id;

        if ($update){
            $like->update();
        }else {
            $like->save();
        }

        return null;
    }

    public function unlike($id)
    {

        $like = Like::where('user_id', Auth::id())->where('reply_id', $id)->first();

        $like->delete();

        return back()->with('status', 'Unlike This this Reply');
    }

}

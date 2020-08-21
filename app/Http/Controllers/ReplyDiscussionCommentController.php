<?php

namespace App\Http\Controllers;

use App\ReplyDiscussionComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReplyDiscussionCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'content' => 'required'
        ]);

       $user = ReplyDiscussionComment::create([
            'user_id' => Auth::id(),
            'discussion_comment_id' => $request->input('discussion_comment_id'),
           'content' => $request->input('content')
        ]);
        return redirect()->back()->with('status' , 'Replied to this comment');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ReplyDiscussionComment  $replyDiscussionComment
     * @return \Illuminate\Http\Response
     */
    public function show(ReplyDiscussionComment $replyDiscussionComment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ReplyDiscussionComment  $replyDiscussionComment
     * @return \Illuminate\Http\Response
     */
    public function edit(ReplyDiscussionComment $replyDiscussionComment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ReplyDiscussionComment  $replyDiscussionComment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ReplyDiscussionComment $replyDiscussionComment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ReplyDiscussionComment  $replyDiscussionComment
     * @return \Illuminate\Http\Response
     */
    public function destroy(ReplyDiscussionComment $replyDiscussionComment)
    {
        //
    }
}

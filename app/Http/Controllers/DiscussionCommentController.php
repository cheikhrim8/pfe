<?php

namespace App\Http\Controllers;

use App\DiscussionComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DiscussionCommentController extends Controller
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

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $this->validate($request, [
            'content' => 'required'
        ]);
        DiscussionComment::create([
            'user_id' => Auth::id(),
            'content' => $request->input('content'),
            'discussion_id' => $request->input('discussion_comment_id')
        ]);

        return redirect()->back()->with('status' , 'Commented Successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DiscussionComment  $discussionComment
     * @return \Illuminate\Http\Response
     */
    public function show(DiscussionComment $discussionComment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DiscussionComment  $discussionComment
     * @return \Illuminate\Http\Response
     */
    public function edit(DiscussionComment $discussionComment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DiscussionComment  $discussionComment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DiscussionComment $discussionComment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DiscussionComment  $discussionComment
     * @return \Illuminate\Http\Response
     */
    public function destroy(DiscussionComment $discussionComment)
    {
        //
    }
}

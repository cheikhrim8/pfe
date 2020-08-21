<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
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
        $this->validate($request ,[
            'content' => 'required'
        ]);

        Comment::create([
            'user_id' => auth()->id(),
            'playlist_id' => $request->input('playlist_id'),
            'content' => $request->input('content')
        ]);

        return back()->with('status' , 'Commented');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        //
    }

    public function like($id){
        Like::create([
            'user_id' => auth()->id(),
            'comment_id' => $id
        ]);

        return back()->with('status' , 'liked ');
    }

    public function dislike($id){

        $like = Like::where('user_id', Auth::id())->where('comment_id', $id)->first();

        $like->delete();

        return back()->with('status' , 'Disliked ');
    }
}

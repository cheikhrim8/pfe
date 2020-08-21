<?php

namespace App\Http\Controllers;

use App\Category;
use App\Playlist;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PlaylistsController extends Controller
{
    public function index()
    {
        $playlists = Playlist::paginate(6);

        return view('channels.playlists.index')->with('playlists',$playlists);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('channels.playlists.create' , [
            'categories' => Category::all(),
            'channel_id' => \request()->channel_id
        ]);
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
           'description' => 'required' ,
            'requirement' => 'required',
            'title' => ['required','string','unique:playlists']
        ]);

        Playlist::create([
           'title' => $request->input('title'),
           'description' => $request->input('description'),
           'requirement' =>  $request->input('requirement'),
           'slug' =>  Str::slug($request->input('title'), '-'),
           'category_id' =>  $request->input('category_id'),
           'channel_id' =>  \request('channel_id'),
        ]);

        return back()->with('status' , 'playlist created');

    }


    public function show($id)
    {

        return view('channels.playlists.show')
            ->with('playlist',Playlist::where('id', $id)->first());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

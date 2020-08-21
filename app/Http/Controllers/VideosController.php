<?php

namespace App\Http\Controllers;

use App\Category;
use App\Playlist;
use App\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class VideosController extends Controller
{

    public function index()
    {
        return view('welcome')->with('videos', Video::all());
    }

    public function create($id)
    {
        return view('channels.playlists.upload')
            ->with('category', Category::all())
            ->with('playlist', Playlist::where('id', $id)->first());
    }


    public function store(Request $request, $id)
    {

        /* $this->validate($request, [
             'video' => 'required|video|max:200000'
         ]);*/

        $videoCount = count(\request('video'));
//       dd($videoCount);

        for ($i = 0; $i < $videoCount; $i++) {

            $videoNameWithExtension = $request->file('video')[$i]->getClientOriginalName();
            $videoName = Str::slug(pathinfo($videoNameWithExtension, PATHINFO_FILENAME), '-')[$i];
            $extension = $request->file('video')[$i]->getClientOriginalExtension();
            $videoToStore = $videoName . '-' . time() . '.' . $extension;
            $upload = $request->file('video')[$i]->storeAs('public/videos', $videoToStore);
//dd(\request()->all());
            Video::create([
               'title' => $videoNameWithExtension,
//                'title' => $request->file('video')[$i]->getClientOriginalName(),
                'playlist_id' => $id,
               'path' => $videoToStore
//                'path' => $request->file('video')[$i]->getClientOriginalName()
            ]);
        }
        return redirect('/playlist/show/' . $id . '/' . \request('slug'))
            ->with('status', 'video uploaded successfully');
    }

    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Channel;
use App\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class ChannelsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('channels.index')->with('channels', Channel::all());
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }


    public function subscribe($id)
    {

        Subscriber::create([
            'user_id' => auth()->id(),
            'channel_id' => $id
        ]);

        return back()->with('status' , 'Subscribed successfully');
    }

    public function unsubscribe($id)
    {

        $subscriber = Subscriber::where('user_id', Auth::id())->where('channel_id', $id)->first();

        $subscriber->delete();
        return back()->with('status' , 'Unsubscribed successfully');
    }


    public function show(Channel $channel)
    {

        return view('channels.show' , ['channel' => $channel]);
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


    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {

    }




}

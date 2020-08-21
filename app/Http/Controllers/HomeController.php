<?php

namespace App\Http\Controllers;

use App\Channel;
use App\Discussion;
use App\Playlist;
use http\Env\Request;
use Validator;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('dashboard', [
            'channels' => Channel::orderBy('created_at', 'desc')->paginate(4 ,['*'], 'channel'),
            'discussions' => Discussion::orderBy('created_at', 'desc')->paginate(4 ,['*'], 'discussion'),
            'playlists' => Playlist::orderBy('created_at', 'desc')->paginate(4 ,['*'], 'playlist'),
        ]);
    }

    public function store(Request $request){
        $rules = array(
            ''
        );
    }

}

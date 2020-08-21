<?php

namespace App\Http\Controllers;

use App\Discussion;
use App\Watcher;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class DiscussionsController extends Controller
{

    public function index()
    {
//        $discussions = Discussion::orderBy('created_at', 'desc')->paginate(3);
        switch (\request('filter')) {
            case 'me':
                $result = Discussion::where('user_id', Auth::id())->paginate(3);
                break;

            case 'solved':
                $answered = [];
                foreach (Discussion::all() as $d){

                    if ($d->hasReplied()){
                        array_push($answered, $d);
                    }
                }

                $result = new paginator($answered, 3);

                break;

            default:
                $result = Discussion::orderBy('created_at', 'desc')->paginate(3);
                break;

        }

        return view('forum')
            ->with('discussions', $result)
            ->with('resent', Discussion::orderBy('created_at', 'desc')->take(2)->get());
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required'
        ]);

        Discussion::create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'slug' => Str::slug($request->input('title'), '-'),
            'user_id' => Auth::id()
        ]);

        return back()->with('status' , 'discussion created ');
    }


    public function edit(Discussion $discussion)
    {

        /* dd(Discussion::where('id', $id)->first());*/

        return view('discussions.edit' ,[
            'discussion' => $discussion
        ]);
    }



    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required'
        ]);


        $discussion = Discussion::find($id);

            $discussion->title = $request->input('title');
            $discussion->content = $request->input('content');
            $discussion->slug = Str::slug($request->input('title'), '-');
            $discussion->user_id = Auth::id();

            $discussion->save();
//        return back()->with('status' , 'discussion created ');
        return redirect('/discussion/show/' . $discussion->slug)
            ->with('status', 'discussion update successfully');
    }


    public function destroy(Discussion $discussion)
    {
        $discussion->delete();
        return redirect('/forum?filter=me')->with('status', 'Deleted Successfully');
    }


    public function show($slug)
    {

        return view('discussions.show')
            ->with('discussion', Discussion::where('slug', $slug)->first());
    }


    public function eye($id)
    {
        Watcher::create([
            'user_id' => Auth::id(),
            'discussion_id' => $id
        ]);

        return redirect()->back()->with('status', 'Marked as watched');
    }

    public function eye_slash($id)
    {
        $watch = Watcher::where('user_id', Auth::id())->where('discussion_id', $id)->first();
        $watch->delete();

        return redirect()->back()->with('status', 'Marked as non watched');
    }

    /* public function userDiscussion(){

         return view('discussions.userDiscussion')
             ->with('discussions', Discussion::where('user_id', Auth::id())->get());
     }

     public function answeredDiscussion(){

         return view('discussions.answered-discussion')
             ->with('discussions', Discussion::where(''));
     }*/


}

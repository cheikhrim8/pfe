@extends('layouts.app',['pageSlug' => 'playlists'])
@section('content')

    <div class="row justify-content-center">
        @foreach($playlists as $playlist)
            <div class="col- col-sm-6 col-md-4 col-lg-3 ">
                <a href="{{route('playlist.show',['slug'=>$playlist->slug,'id'=>$playlist->id])}}">
                <div class="card">
                    <div class="card-header">
                        <img data-toggle="modal" data-target=""
                             onclick="window.location.href='{{route('playlist.show',['slug'=>$playlist->slug,'id'=>$playlist->id])}}'"
                             src="/black/img/avatars/admin.png" class="card-img-top" width="100" alt="">
                    </div>
                    <div class="card-body">
                        <p class="lead">{{$playlist->title}}</p>
                        <p>{{$playlist->description}}</p>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div class="card-text">
                                    <h1 class="lead">

                                    </h1>
                                </div>
                            </div>
                            <div class="col"></div>
                            <div class="col"></div>
                        </div>
                    </div>
                </div>
                </a>
            </div>
        @endforeach
    </div>
    <hr>

    <div class="row justify-content-center ">
        <span class="ml-auto mr-auto">{{$playlists->links()}}</span>
    </div>

    <div class="modal fade" id="showPlaylist" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                </div>
            </div>
        </div>
    </div>


    {{--    <x-show-playlist></x-show-playlist>--}}

@endsection



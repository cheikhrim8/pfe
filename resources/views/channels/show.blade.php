@extends('layouts.app' , ['pageSlug' => 'channel'])
@section('content')

    <div class="row">
        <div class="col-md-9">
            <div class="jumbotron jumbotron-fluid">

                <div class="container">
                    <form action="{{route('playlists.create')}}" method="get">
                        @csrf
                        <input type="hidden" name="channel_id" value="{{$channel->id}}">
                        <button type="submit" class="btn btn-primary float-right">New Playlist</button>
                    </form>
                    <h1 class="display-3 text-dark">{{$channel->title}}</h1>
                    <p class="lead text-muted">This is a modified jumbotron that occupies the entire horizontal
                        space of its parent.</p>
                    <hr class="mt-2">
                    <div class="row">
                        <div class="col">
                            followers
                            <div class="badge badge-danger">{{count($channel->subscriber)}}</div>
                        </div>
                        <div class="col">
                            <span class="float-right text-dark"><i
                                    class="fas fa-clock"></i> {{$channel->created_at}} </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-4 col-10">
            <div class="card">
                <div class="card-body">
                    <div class="row justify-content-center">
                        <img class="rounded-circle" width="200" height="200"
                             src="/black/img/avatars/{{$channel->user->avatar}}" alt="">
                    </div>
                    <div class="">
                        <p class="lead">{{$channel->user->name}}</p>
                        <p class="lead">{{$channel->user->email}}</p>
                        <p class="lead">{{$channel->user->name}}</p>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="button-container">
                        <button class="btn btn-icon btn-round btn-facebook">
                            <i class="fab fa-facebook"></i>
                        </button>
                        <button class="btn btn-icon btn-round btn-twitter">
                            <i class="fab fa-twitter"></i>
                        </button>
                        <button class="btn btn-icon btn-round btn-google">
                            <i class="fab fa-google-plus"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>

    </div>
    {{--Recent added--}}
    <div class="row">
        <div class="col">
            <h2>Recent playlists added</h2>
        </div>
    </div>

    {{--    All Playlist --}}
    <h3>Playlists</h3>
    <div class="row justify-content-center">
        @foreach($channel->playlist as $playlist)
            <div class="col-md-4 col-lg-3">
                <div class="card playlist">
                    <div class="card-header">
                        <img data-toggle="modal" data-target=""
                             onclick="window.location.href='{{route('playlist.show',['slug'=>$playlist->slug,'id'=>$playlist->id])}}'"
                             src="/black/img/avatars/admin.png" class="card-img-top" width="100" alt="">
                    </div>
                    <div class="card-body">
                        <div class="badge badge-primary float-right">{{$playlist->category->category}}</div>
                        <div class="card-text">{{$playlist->title}}</div>
                    </div>
                    <div class="card-footer text-center">
                            <span class="badge badge-white"> {{count($playlist->video)}}
                                <i class="fas fa-video"></i>
                            </span>
                        <span class="badge badge-white mx-2"> {{count($playlist->comment)}} <i
                                class="fas fa-comments"></i></span>
                        <span class="badge badge-white"> {{  date('d/m/Y', strtotime($playlist->created_at))}}
                                <i class="fas fa-clock"></i></span>
                    </div>
                </div>
            </div>
        @endforeach
    </div>


@endsection



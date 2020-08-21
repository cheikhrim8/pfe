<style>
    .reply-comment-form {
        display: none;
    }
</style>
@extends('layouts.app', ['pageSlug' => 'dashboard'])

@section('content')
    <div class="row">
        <div class="col-12">
            @if(session('status'))
                <x-alert type="danger" :message="session('status')"></x-alert>
            @endif
        </div>
    </div>

    <div class="row my-3">
        <div class="col">
            <button class="btn btn-simple reply-comment"><i class="fas fa-comment text-white fa-2x"></i>
            </button>
            <form action="{{route('discussions.store')}}" method="post" class="reply-comment-form">
                @csrf
                <div class="form-group">
                    <label for="title">Subject</label>
                    <input type="text" name="title" id="title" class="form-control">
                </div>
                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea name="content" id="content" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" name="" id="" value="Create">
                    <input type="reset" class="btn btn-danger" name="" id="" value="Reset">
                </div>
            </form>
        </div>
        <div class="col">
            <button class="btn btn-simple reply-comment"><i class="fas fa-comment text-white fa-2x"></i>
            </button>
            <form action="{{route('discussions.store')}}" method="post" class="reply-comment-form">
                form 3
            </form>
        </div>
        <div class="col">
            <button class="btn btn-simple reply-comment"><i class="fas fa-comment text-white fa-2x"></i>
            </button>
            <form action="{{route('discussions.store')}}" method="post" class="reply-comment-form">
                form2
            </form>
        </div>
    </div>

    {{--    Recent channels --}}
    <section class="">
        <h1>Recent channel created</h1>
        <div class="row justify-content-center">
            @foreach($channels as $channel)
                <div class="col-12  col-md-4 col-lg-3">
                    <div class="card">
                        <div class="card-header">
                            <p>{{$channel->user->name}}</p>
                            <h1 class="display-4 card-title">{{$channel->title}}</h1>
                            <div class="card-body">
                                <p>{{count($channel->playlist)}} playlists</p>
                                <p>{{count($channel->subscriber)}} subscribers</p>
                            </div>
                            <div class="card-footer">

                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    <div class="row justify-content-center">
        <span class="float-right">{{$channels->links()}}</span>
    </div>
    <hr class="my-5 border-primary">

    {{--    Recent playlist --}}
    <h1>Playlists</h1>
    <div class="row justify-content-center">
        @foreach($playlists as $playlist)
            <div class="col-md-4 col-lg-3">
                <div class="card">
                    <div class="card-header">
                        <a href="{{route('playlist.show',['slug'=>$playlist->slug,'id'=>$playlist->id])}}">
                            <img data-toggle="modal" data-target=""
                                 {{--onclick="window.location.href='{{route('playlist.show',['slug'=>$playlist->slug,'id'=>$playlist->id])}}'"--}}
                                 src="/black/img/avatars/admin.png" class="card-img-top" width="100" alt="">

                        </a>
                    </div>
                    <div class="card-body">
                        <div class="badge badge-primary float-right">{{$playlist->category->category}}</div>
                        <div class="card-text">{{$playlist->title}}</div>
                    </div>
                    <div class="card-footer text-center">
                            <span class="badge badge-white"> {{count($playlist->video)}}
                                <i class="fas fa-video"></i>
                            </span>
                        <span class="badge badge-white"> {{count($playlist->comment)}} <i
                                class="fas fa-comments"></i></span>
                        <span class="badge badge-white"> {{  date('d/m/Y', strtotime($playlist->created_at))}}
                                <i class="fas fa-clock"></i></span>
                        <span class="badge badge-secondary">By {{$playlist->channel->user->name}}</span>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="row justify-content-center">
        <span class="">{{$playlists->links()}}</span>
    </div>

    <hr class="my-5 border-primary shadow-lg">

    {{--    Recent discussion  --}}
    <h1>Recent discussions created</h1>
    <div class="row justify-content-center">
        @foreach($discussions as $discussion)
            <div class="col-11  col-md-4 col-lg-3">
                <div class="card">
                    <div class="card-header">
                        <p>{{$discussion->user->name}}</p>
                        <h1 class="display-4 card-title">{{$discussion->title}}</h1>
                        <div class="card-body">
                            {{--                            <p>{{count($discussion->reply)}} replies</p>--}}
                            <p>{{count($discussion->discussionComment)}} comments</p>
                        </div>
                        <div class="card-footer">

                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="row justify-content-center">
        <span class="float-right">{{$discussions->links()}}</span>
    </div>

@endsection

@push('js')
    <script>
        $('.reply-comment').on('click', function () {
            $('.reply-comment-form').hide();
            $(this).next('.reply-comment-form').show();
        });
    </script>

@endpush

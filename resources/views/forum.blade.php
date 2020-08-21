@extends('layouts.app',['pageSlug'=>'all discussions','link' => route('forum')])
@section('content')

    @if(session('status'))
        <x-alert type="success" :message="session('status')"></x-alert>
    @endif

    <div class="container mt-5 py-7 py-lg-8">
        <div class="row">
            <div class="col-lg-8">
                <h1 class="text-white text-center"><i class="fas fa-comments fa-1x"></i> Discussions!</h1>
                @foreach($discussions as $discussion)
                    <div class="card">
                        <div class="card-header">
                            <img class="rounded-circle" src="black/img/avatars/{{$discussion->user->avatar}}" alt="" height="50px" width="50px">
                            <span>{{$discussion->user->name}}</span>&nbsp;&nbsp;
                            <span class="lead fas fa-clock"> {{$discussion->created_at->diffForHumans()}}</span>
                            <a href="{{route('discussion.show',['slug'=>$discussion->slug])}}"
                               class="btn btn-light btn-sm fas fa-book-open float-right"></a>
                        </div>
                        <hr>
                        <div class="card-body">
                            <h2 class="card-title">{{$discussion->title}}</h2>
                            <p class="card-text">{{Str::limit($discussion->content,100)}}</p>
                            <a href="{{route('discussion.show',['slug'=>$discussion->slug])}}"
                               class="btn btn-info"> Read more.......</a>
                        </div>
                        <div class="card-footer">
                            <hr>
                            <a href="{{route('discussion.show',['slug'=>$discussion->slug])}}"
                               class="badge badge-secondary">
                            @if(count($discussion->discussionComment) === 0 ) 0 comment
                                @elseif(count($discussion->discussionComment) === 1) {{count($discussion->discussionComment)}} comment
                                @else {{count($discussion->discussionComment)}} comments
                                @endif
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="col-lg-4 d-lg-block">
                <h3><i class="fas fa-clock"></i> Recently Added</h3>
                @foreach($resent as $discussion)
                    <div class="card bg-white">
                        <div class="card-header text-dark">
                            <span class="lead fas fa-clock"> {{$discussion->created_at->diffForHumans()}}</span>
                            <a href="{{route('discussion.show',['slug'=>$discussion->slug])}}"
                               class="btn btn-light btn-sm fas fa-book-open float-right"></a>
                        </div>
                        <hr>
                        <div class="card-body">
                            <h4 class="card-title text-dark">{{$discussion->title}}</h4>
                            <p class="card-text text-dark">{{Str::limit($discussion->content,80)}}
                                <a href="{{route('discussion.show',['slug'=>$discussion->slug])}}"
                                   class=""> Read more.......</a>
                            </p>
                        </div>
                        <div class="card-footer">
                            <hr>
                            <a href="{{route('discussion.show',['slug'=>$discussion->slug])}}"
                               class="badge badge-dark">{{count($discussion->discussionComment)}} comment</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <span class="float-right">{{$discussions->links()}}</span>
    </div>


@endsection

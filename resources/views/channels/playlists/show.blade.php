@extends('layouts.app',['pageSlug'=>'showPlaylist'])
@section('content')

    @if(session('status'))
        <x-alert type="success" :message="session('status')"></x-alert>
    @endif
    <style>
        .reply-comment-form {
            display: none;
        }
    </style>
    <div class="row justify-content-between">
        <div class="col-md-10">
            <span class="display-2 text-capitalize text-primary">{{$playlist->title}}</span>
            @can('instructor')
                @if($playlist->channel->user_id === auth()->id())
                    <form action="{{route('video.store',['id' => $playlist->id, 'slug'=>$playlist->slug])}}"
                          class="" method="post"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="mt-2">
                            <label for="video">Upload Videos</label>
                            <input type="file" required multiple size="30" name="video[]" class="bg-transparent">
                            <button type="submit" class="fas fa-upload btn btn-info float-right"> upload</button>
                        </div>
                    </form>
                @endif
            @endcan
        </div>
    </div>
    <div class="row justify-content-center my-5">
        <div class="col">

            {{--            Playlist Videos--}}

            <div id="accordion">
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h5 class="mb-0">
                            <button class="btn btn-link text-white" data-toggle="collapse" data-target="#collapseOne"
                                    aria-expanded="true" aria-controls="collapseOne">
                                <span class="display-4 text-capitalize">playlist videos</span>
                            </button>
                            <span
                                class="badge badge-white p-3 lead float-right">
                                @if($playlist->video->count() > 1)
                                    {{$playlist->video->count()}} Videos
                                @elseif($playlist->video->count() == 1)
                                    {{$playlist->video->count()}} Video
                                @else
                                    Playlist Empty
                                @endif
                            </span>
                        </h5>
                    </div>

                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne"
                         data-parent="#accordion">
                        <div class="card-body">
                            <?php $i = 1 ?>
                            @foreach($playlist->video as $video)
                                <div class="card">
                                    <div class="card-body">
                                        <a href="/storage/videos/{{$video->path}}"
                                           class="html5lightbox" data-width="480" data-height="320"
                                           title="{{$video->title}}">
                                            <div class="row justify-content-between">
                                                <div class="col-1">
                                                    <img class="d-inline" src="https://via.placeholder.com/150" alt="">
                                                </div>
                                                <div class="col-10">
                                                    {{$video->title}}
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <?php $i++ ?>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>

            {{--            Playlist description  --}}

            <div class="row justify-content-center">
                <div class="col-md-12">
                    <h2 class="display-3">Playlist Description</h2>
                    @php
                        echo $playlist->description
                    @endphp
                </div>
            </div>

            {{--   Playlist Requirements  --}}

            <div class="row justify-content-center">
                <div class="col-md-12">
                    <h2 class="display-3">Playlist Requirements</h2>
                    @php
                        echo $playlist->requirement
                    @endphp
                </div>
            </div>

        </div>

        {{--        Instructor Information     --}}

        <div class="col-lg-3 col-md-4 col-10">
            <div class="card">
                <div class="card-body">
                    <div class="row justify-content-center">
                        <img class="rounded-circle" width="200" height="200"
                             src="/black/img/avatars/{{$playlist->channel->user->avatar}}" alt="">
                    </div>
                    <div class="">
                        <p class="lead">{{$playlist->channel->user->name}}</p>
                        <p class="lead">{{$playlist->channel->user->email}}</p>
                        <p class="lead">{{$playlist->channel->user->name}}</p>
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

    {{--    Comments section --}}
    <hr class="">
    <section class="mt-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <h3 class="display-4">If you have any question you should not hesitate to ask</h3>
                @foreach($playlist->comment as $comment)
                    <div class="card bg-transparent">
                        <div class="card-header">

                            @if(auth()->id() === $comment->user_id)
                                <div class="dropdown float-right">
                                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button"
                                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                        <a class="dropdown-item" href="#">Edit</a>
                                        <a class="dropdown-item" href="#">Delete</a>
                                    </div>
                                </div>
                            @endif

                            <span class="float-right mx-3">{{$comment->created_at->diffForHumans()}}</span>
                            <img class="rounded-circle" src="/black/img/avatars/{{$comment->user->avatar}}" width="50px"
                                 height="50px" alt="">
                            <strong class="ml-2">{{$comment->user->name}}</strong>
                        </div>
                        <div class="card-body">
                            <p class="card-text ml-5" style="font-size: 1.2em">{{$comment->content}}</p>
                        </div>

                        {{--                        Comment Replies Section--}}

                        <div class="row justify-content-center">
                            <div class="col-md-10">
                                @foreach($comment->replies as $reply)
                                    <div class="bg-transparent">
                                        <div class="card-header">
                                            <img class="rounded-circle"
                                                 src="/black/img/avatars/{{$reply->user->avatar}}" width="30px"
                                                 height="30px" alt="">
                                            <span class="float-right">{{$reply->created_at->diffForHumans()}}</span>
                                            <strong class="ml-2">{{$reply->user->name}}</strong>
                                        </div>
                                        <div class="card-body">
                                            <p class="card-text ml-5">{{$reply->content}}</p>

                                            {{--<div class="">
                                                --}}{{--                                                @if(!$reply->is_liked_by_user_auth())--}}{{--
                                                <a href="{{route('comment.like', $reply->id)}}">
                                                    <i class="fas fa-thumbs-up btn btn-simple"></i>
                                                </a>
                                                --}}{{--                                                @else--}}{{--
                                                <a href="{{route('comment.like', $reply->id)}}"
                                                   class="btn btn-simple">
                                                    <i class="fas fa-thumbs-down text-secondary"></i>
                                                </a>
                                                --}}{{--                                                @endif--}}{{--
                                                <span class="badge badge-white float-right">
--}}{{--                                                        <i class="fas fa-thumbs-up"></i> {{count($reply->like)}}--}}{{--
                                                    </span>
                                            </div>--}}

                                            <br>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        {{--              Like and Dislike Section--}}

                        <div class="card-footer reply-block">

                            @if(auth()->id() === $comment->user_id)
                                this is my playlist
                            @else
                                @if ($comment->is_liked_by_user_auth())
                                    <a href="{{ route('comment.dislike', ['id' => $comment->id])}}"
                                       class="like btn btn-secondary" data-id=""><i
                                            class="fas fa-thumbs-down"></i></a>&nbsp;
                                @else
                                    <a href="{{ route('comment.like',['id' => $comment->id])}}"
                                       class="like btn btn-info"><i
                                            class="fas fa-thumbs-up"></i></a>&nbsp;
                                @endif
                            @endif


                            <button class="btn btn-simple reply-comment"><i class="fas fa-share text-white"></i>
                            </button>
                            <form action="{{route('replies.store')}}" method="post" class="reply-comment-form">
                                <input type="hidden" name="comment_id" value="{{$comment->id}}">
                                <div class="modal-body">
                                    @csrf
                                    <div class="form-group">
                                        <label for="content" class="">Leave A Comment</label>
                                        <textarea required name="content"
                                                  placeholder="Leave your comment........{{$comment->id}}"
                                                  class="form-control text-dark bg-white"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit"
                                            class="btn btn-primary">Reply
                                    </button>
                                </div>
                            </form>

                            <span class="float-right badge badge-white">
                                <i class="fas fa-thumbs-up"></i> {{count($comment->likes)}}
                            </span>
                            <span class="float-right badge badge-white mr-2">
                                <i class="fas fa-comment"></i> {{count($comment->replies)}}
                            </span>
                        </div>
                    </div>
                @endforeach
                <form action="{{route('comments.store', $playlist->id)}}" method="post">
                    @csrf
                    <div class="form-group">
                        <input type="hidden" name="playlist_id" value="{{$playlist->id}}">
                        <label for="content" class="">Comment</label>
                        <textarea name="content" id="content" placeholder="Leave your comment........"
                                  class="text-dark bg-white form-control" cols="50" rows="10"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="comment">
                    </div>
                </form>
                {{--                @endif--}}
            </div>
        </div>
    </section>

@endsection

@push('js')
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

    <script>
        {{--var token = '{{Session::token()}}';--}}
        {{--var urlLike = '{{route('like')}}';--}}


        $(document).ready(function () {

            $(function () {
                $('.reply-comment').on('click', function (e) {
                    e.stopImmediatePropagation();
                    $('.reply-comment-form').hide();
                    $(this).next('.reply-comment-form').show();
                });
            });
            /*let like
              $('.like').on('click', function (event) {
                  event.stopImmediatePropagation();
                  const commentId = $(this).attr('data-id');

                  // console.log(commentId);
                  // let isLike = event.target.previousElementSibling === null ? true : false;
                  let isLike = $(this).hasClass('btn-danger')?$(this).removeClass('btn-danger'):
                      $(this).siblings('a').addClass('btn-danger');
                  //let isLike = $(this).siblings('a').bg('red');r

                  console.log(isLike);

                  /!*$.ajax({
                      method: 'post',
                      url: urlLike,
                      data: {isLike: isLike, replyId: commentId, _token: }
                      /!*.done(function () {

                      })*!/
                  });*!/
              });*/

        });


    </script>


@endpush

@extends('layouts.app',['pageSlug' => 'show'])
@section('content')

    <style>
        .reply-comment-form {
            display: none
        }
    </style>

    @if(session('status'))
        <x-alert type="success" :message="session('status')"></x-alert>
    @endif

    <div class="row justify-content-center">
        <div @auth() class="col-md-12" @else class="col-md-10" @endauth>
            <h4 class="text-white">{{$discussion->title}}</h4>
            <div class="card">
                <div class="card-header">
                    <img src="/black/img/avatars/{{$discussion->user->avatar}}" alt="" height="50px"
                         width="50px">
                    <span>{{$discussion->user->name}}</span>&nbsp;&nbsp;
                    <span class="lead fas fa-clock"> {{$discussion->created_at->diffForHumans()}}</span>


                    @if($discussion->user_id === auth()->id())

                        <div class="dropdown float-right">
                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                <a class="dropdown-item edit-discussion-btn"
                                   href="{{route('discussions.edit',$discussion->id)}}">Edit</a>
                                <form action="{{route('discussions.destroy', $discussion->id)}}" method="post">
                                    @csrf
                                    <input type="hidden" name="_method" value="delete">
                                    <input type="submit" value="DELETE"
                                           class="dropdown-item delete-discussion-btn"
                                           onclick="return confirm('are you sure that you want to delete this discussion')"
                                           style="cursor: pointer">
                                </form>
                            </div>
                        </div>

                    @endif
                    {{--
                     @if($discussion->is_watched_by_user_auth())
                         <a href="{{route('discussion.eye-slash',['id'=>$discussion->id])}}"
                            class="btn btn-danger btn-sm fas fa-eye-slash float-right"></a>
                     @else
                         <a href="{{route('discussion.eye',['id'=>$discussion->id])}}"
                            class="btn btn-success btn-sm fas fa-eye float-right"></a>
                     @endif
                 </div>
                 <hr>--}}

                    <div class="card-body">
                        <h2 class="card-title">{{$discussion->title}}</h2>
                        <p class="card-text">{{$discussion->content}}</p>

                        {{--
                        <hr>
                        <span class="badge badge-secondary">{{count($discussion->discussionComment)}} Reply</span>
                    </div>
                    <div class="card-footer">
                        @foreach($discussion->discussionComment as $comment)
                            <div class="card bg-transparent">
                                <div class="card-header">
                                    <img class="rounded-circle" src="/black/img/avatars/{{$comment->user->avatar}}"
                                         alt=""
                                         height="50px"
                                         width="50px">
                                    <span>{{$comment->user->name}}</span>&nbsp;&nbsp;
                                    <span
                                        class="lead fas fa-clock"> {{$comment->created_at->diffForHumans()}}</span>
                                </div>
                                <hr>
                                <div class="card-body">
                                    <p class="card-text">{{$comment->content}}</p>
                                </div>
                                <div class="card-footer reply-block">
                                    <span class="fas fa-share fa-2x reply-btn"></span>
                                    <span class="float-right">
                                    <a href="#"><i class="fas fa-thumbs-up fa-2x"></i>  </a> 100
                                    <a href="#"><i class="fas fa-thumbs-down fa-2x"></i></a> 12
                                    </span>
                                    <section class="comment-block row justify-content-center">
                                        <form action="{{route('discussion-comment-reply.store')}}" method="post"
                                              class="reply-form col-md-9 d-none">
                                            <input type="hidden" name="discussion_comment_id" value="{{$comment->id}}">
                                            <div class="modal-body">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="content" class="">Leave A Comment</label>
                                                    <textarea required name="content" id="content"
                                                              placeholder="Leave your comment........"
                                                              class="form-control text-dark"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit"
                                                        class="btn btn-primary">Reply
                                                </button>
                                            </div>
                                        </form>
                                    </section>
                                </div>

                                --}}{{--<div class="card-footer">
                                    @if($comment->is_liked_by_user_auth())
                                        <a href="{{route('reply.unlike',['id'=>$comment->id])}}"
                                           class="text-danger fas fa-thumbs-down fa-2x"></a>
                                    @else
                                        <a href="{{route('reply.like',['id'=>$comment->id])}}"
                                           class="fas fa-thumbs-up fa-2x"></a>
                                    @endif
                                    <span class="float-right">
                                                    <span class=" fas fa-thumbs-up"></span>
                                                    <span class="">{{count($comment->like)}}</span>&nbsp;&nbsp;
                                                </span>
                                </div>--}}{{--
                            </div>
                        @endforeach
                        @auth()
                            <hr class="">
                            <form action="{{route('discussion-comment.store',['id'=>$discussion->id])}}"
                                  method="post">
                                @csrf
                                <div class="form-group text-secondary p-3 ">
                                    <label for="content" class="text-white" style="font-size: 20px">Leave Comment
                                        ......</label>
                                    <textarea class="form-control" name="content"
                                              id="content" cols="50" rows="30"
                                              placeholder="Leave Your reply here....."></textarea>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-info btn-lg float-left">Comment</button>
                                </div>
                            </form>
                        @else
                            <div class="alert alert-warning alert-dismissible fade show" role="alert"
                                 style="top: 0; left: 30%; width: 40%; position: absolute">
                                <div class="alert-heading">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="alert-body">
                                    <h3 class="display">Please LogIn </h3>
                                </div>
                                <div class="alert-footer row justify-content-center">
                                    <a href="{{ route('register') }}" class="nav-link">
                                        <i class="tim-icons icon-laptop"></i> {{ __('Register') }}
                                    </a>
                                    <a href="{{ route('login') }}" class="nav-link">
                                        <i class="tim-icons icon-single-02"></i> {{ __('Login') }}
                                    </a>
                                </div>

                            </div>
                        @endauth
                    </div>
                </div>
            </div>
        </div>--}}



                        {{--@foreach($discussion->discussionComment as $comment)
                            <div class="card bg-transparent">
                                <div class="card-header">
                                    <span class="float-right">{{$comment->created_at->diffForHumans()}}</span>
                                    <img class="rounded-circle" src="/black/img/avatars/{{$comment->user->avatar}}"
                                         width="50px"
                                         height="50px" alt="">
                                    <strong class="ml-2">{{$comment->user->name}}</strong>
                                </div>
                                <div class="card-body">
                                    <p class="card-text ml-5" style="font-size: 1.2em">{{$comment->content}}</p>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-md-10">
                                        @foreach($comment->replyDiscussionComment as $reply)
                                            <div class="bg-transparent">
                                                <div class="card-header">
                                                    <img class="rounded-circle"
                                                         src="/black/img/avatars/{{$reply->user->avatar}}" width="30px"
                                                         height="30px" alt="">
                                                    <span
                                                        class="float-right">{{$reply->created_at->diffForHumans()}}</span>
                                                    <strong class="ml-2">{{$reply->user->name}}</strong>
                                                </div>
                                                <div class="card-body">
                                                    <p class="card-text ml-5">{{$reply->content}}</p>
                                                    <hr>
                                                    <div class="float-right">
                                                        <a href="#"><i class="fas fa-thumbs-up text-secondary"></i></a>
                                                        &nbsp;
                                                        <a href="#"><i
                                                                class="fas fa-thumbs-down text-secondary"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="card-footer comment-block">
                                    <span class="fas fa-share fa-2x reply-btn"></span>
                                    <section class="reply-block row justify-content-center">
                                        <form action="{{route('discussion-comment-reply.store')}}" method="post"
                                              class="reply-form col-md-8">
                                            <input type="hidden" name="discussion_comment_id" value="{{$comment->id}}">
                                            <div class="modal-body">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="content" class="">Leave A Comment</label>
                                                    <textarea required name="content" id="content"
                                                              placeholder="Leave your comment........{{$comment->id}}"
                                                              class="form-control bg-white"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit"
                                                        class="btn btn-primary">Reply
                                                </button>
                                            </div>
                                        </form>
                                    </section>
                                </div>
                            </div>
                        @endforeach
                        <form action="{{route('discussion-comment.store')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <input type="hidden" name="discussion_comment_id" value="{{$discussion->id}}">
                                <label for="content" class="">Comment</label>
                                <textarea name="content" id="content" dis="Leave your comment........"
                                          class="text-dark bg-white form-control" cols="50" rows="10"></textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="comment">
                            </div>
                        </form>--}}

                        <section class="mt-5">
                            <div class="row justify-content-center">
                                <div class="col-md-10">
                                    <h3 class="display-4">If you have any question you should not hesitate to ask</h3>
                                    @foreach($discussion->discussionComment as $comment)
                                        <div class="card bg-transparent">
                                            <div class="card-header">
                                                <span class="float-right">{{$comment->created_at->diffForHumans()}}</span>
                                                <img class="rounded-circle" src="/black/img/avatars/{{$comment->user->avatar}}" width="50px"
                                                     height="50px" alt="">
                                                <strong class="ml-2">{{$comment->user->name}}</strong>
                                            </div>
                                            <div class="card-body">
                                                <p class="card-text ml-5" style="font-size: 1.2em">{{$comment->content}}</p>
                                            </div>
                                            <div class="row justify-content-center">
                                                <div class="col-md-10">
                                                    @foreach($comment->replyDiscussionComment as $reply)
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
                                                                <div class="">
                                                                    {{--@if(!$reply->is_liked_by_user_auth())--}}
                                                                        <a href="{{route('reply.like', $reply->id)}}">
                                                                            <i class="fas fa-thumbs-up btn btn-simple"></i>
                                                                        </a>
{{--                                                                    @else--}}
                                                                        <a href="{{route('reply.unlike', $reply->id)}}" class="btn btn-simple">
                                                                            <i class="fas fa-thumbs-down text-secondary"></i>
                                                                        </a>
{{--                                                                    @endif--}}
                                                                    <span class="badge badge-white float-right">
                                                        <i class="fas fa-thumbs-up"></i>{{-- {{count($reply->like)}}--}}
                                                    </span>
                                                                </div>

                                                                <br>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="card-footer reply-block">
                                                <a href="#" class="btn btn-simple bg-danger"><i class="fas fa-thumbs-up text-secondary"></i></a>&nbsp;
                                                <a href="#" class="btn btn-simple"><i class="fas fa-thumbs-down text-secondary"></i></a>&nbsp;
                                                <button class="btn btn-simple reply-comment"><i class="fas fa-share text-white"></i>
                                                </button>
                                                <form action="{{route('discussion-comment-reply.store')}}" method="post" class="reply-comment-form">
                                                    <input type="hidden" name="discussion_comment_id" value="{{$comment->id}}">
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
                                <i class="fas fa-thumbs-up"></i> {{count($comment->replyDiscussionComment)}}
                            </span>
                                                <span class="float-right badge badge-white mr-2">
                                <i class="fas fa-comment"></i> {{count($comment->replyDiscussionComment)}}
                            </span>
                                            </div>
                                        </div>
                                    @endforeach
                                    <form action="{{route('comments.store', $comment->id)}}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <input type="hidden" name="discussion_comment_id" value="{{$comment->id}}">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>

        $(function () {
            $('.reply-comment').on('click', function (e) {
                e.stopImmediatePropagation();
                $('.reply-comment-form').hide();
                $(this).next('.reply-comment-form').show();
            });
        });
    </script>

@endpush

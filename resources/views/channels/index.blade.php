@extends('layouts.app',['pageSlug'=>'channels'])

@section('content')
    {{-- <div class="header py-7 py-lg-8">
         <div class="container">
             <div class="header-body text-center mb-7">
                 <div class="row justify-content-center">
                     <div class="col-lg-5 col-md-6">
                         @foreach($channels as $channel)
                             <div class="card">
                                 <div class="card-header">
                                 {{$channel->title}}
                                 </div>
                             </div>
                         @endforeach
                     </div>
                 </div>
             </div>
         </div>
     </div>--}}

    <div class="row justify-content-center">
        <div class="col-md-12">
            @foreach($channels as $channel)
                <div class="card pointer-event">
                    <div class="card-header" onclick="window.location.href='{{route('channels.show' , $channel->id)}}'">
                        @if(auth()->id() === $channel->user_id)
                            <form action="{{route('playlists.create')}}" method="get">
                                @csrf
                                <input type="hidden" name="channel_id" value="{{$channel->id}}">
                                <button type="submit" class="btn btn-primary float-right">Add Playlist</button>
                            </form>
                        @else
                            @if(!$channel->is_subscribed_by_user_auth())
                                <a href="{{route('subscribe.channel' , $channel->id)}}" class="btn btn-danger float-right">Subscribe</a>
                            @else
                                <a href="{{route('unsubscribe.channel' , $channel->id)}}" class="btn btn-secondary float-right">Unsubscribe</a>
                            @endif
                        @endif
                        {{-- @endif--}}
                        <img src="black/img/avatars/{{$channel->user->avatar}}" height="50px" width="50px" alt="">
                        <span>{{$channel->user->name}}</span>
                        <span class="display-4">{{$channel->title}}</span>
                        <span> Created {{$channel->created_at}}</span>
                    </div>
                    <div class="card-body">
                        <h1>playlists</h1>
                        <div class="row">
                            @foreach($channel->playlist as $playlist)
                                <div class="col- col-md-3 col-lg-3">
                                    <div class="card">
                                        <div class="card-header">
                                            <img data-toggle="modal" data-target=""
                                                 onclick="window.location.href='{{route('playlist.show',['slug'=>$playlist->slug,'id'=>$playlist->id])}}'"
                                                 src="/black/img/avatars/admin.png" class="card-img-top" width="100"
                                                 alt="">
                                        </div>
                                        <div class="card-body">

                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                    </div>
                </div>
            @endforeach
        </div>
    </div>



@endsection

@push('js')
    <script>
        $(document).ready(function (e) {

            alert(123)
            $(".playlist").on('contextmenu', function (ev) {

                console.log('hello')

            });
        });
    </script>

@endpush

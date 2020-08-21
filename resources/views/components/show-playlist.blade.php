{{--@foreach($videos as $video)
    <a href="storage/videos/{{$video->path}}" data-toggle="lightbox">
        <video controls width="" src="storage/videos/{{$video->path}}"></video>
    </a>
@endforeach--}}

<div class="card">
    @foreach($videos as $video)
        <div class="row no-gutters">
            <div class="col-auto">
                {{--            <img src="//placehold.it/200" class="img-fluid" alt="">--}}
                <a href="storage/videos/{{$video->path}}" data-toggle="lightbox">
                    <video controls width="100px" height="100px" src="storage/videos/{{$video->path}}"></video>
                </a>
            </div>
            <div class="col">
                <div class="card-block px-2">
                    <a href="" class="card-text">{{$video->title}}</a>
                </div>
            </div>
        </div>
    @endforeach
</div>

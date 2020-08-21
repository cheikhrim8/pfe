@extends('layouts.app',['pageSlug'=>'upload video'])
@section('content')

    <div class="card container">
        <div class="card-header">
            <h2 class="card-header text-capitalize">update videos to this playlist</h2>
        </div>
        <div class="card-body">
            <form action="{{route('video.store',['id' => $playlist->id, 'slug'=>$playlist->slug])}}" method="post"
                  enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-3">
                        <div class=" btn btn-lg btn-primary">
                            <i class="fas fa-upload fa-5x"></i>
                            <input type="file" multiple size="30" name="video[]" class="fa fa-upload upload fa-3x">
                        </div>
                    </div>
                    <div class="col-9">
                        <div class="form-group">
                            <label for="category">category</label>
                            <select name="category" id="category" class="select form-control bg-dark">
                                @foreach($category as $cat)
                                    <option value="{{$cat->id}}">{{$cat->category}}</option>
                                @endforeach
                            </select>
                        </div>
                        <input type="submit" value="upload" class="btn btn-success">
                    </div>
                </div>
            </form>
        </div>
    </div>


    <style>
        div {
            position: relative;
            overflow: hidden;
        }

        .upload {
            position: absolute;
            font-size: 50px;
            opacity: 0;
            right: 0;
            top: 20%;
        }
    </style>
@endsection

@extends('layouts.app',['pageSlug' => 'edit discussion'])
@section('content')
    <div class="row justify-content-center">
        <div class="col-12 col-sm-10 col-md-9 col-lg-9">
            <div class="card">
                <div class="card-header">
                    <h2 class="header-title">Edit Discussion</h2>
                </div>
                <form action="{{route('discussions.update',$discussion->id)}}" method="post">
                    <div class="card-body">
                        @csrf
                        <input type="hidden" name="_method" value="put">
                        <div class="form-group">
                            <label for="title" class="lead text-white">Title</label>
                            <input type="text" id="title" class="form-control" value="{{$discussion->title}}"
                                   name="title">
                        </div>
                        <div class="form-group">
                            <label for="content" class="lead text-white">Content</label>
                            <textarea rows="10" type="text" id="content" class="form-control chart-area"
                                      name="content">{{$discussion->content}}</textarea>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="form-group">
                            <input type="submit" value="save the change" class="btn btn-info">
                            <input type="reset" value="reset The Changes" class="btn btn-primary">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop


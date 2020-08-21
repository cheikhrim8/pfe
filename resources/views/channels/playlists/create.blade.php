@extends('layouts.app', ['pageSlug' => ''])
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h4 class="display-4">Create a playlist</h4>
                </div>
                <div class="card-body">
                    <form action="{{route('playlists.store')}}" method="post">
                        @csrf
                        <input type="hidden" name="channel_id" value="{{$channel_id}}">
                        <div class="form-group{{ $errors->has('title') ? ' has-danger' : '' }}">
                            @include('alerts.feedback', ['field' => 'title'])
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title" class="form-control">
                        </div>
                        <div class="form-group ">
                            <label for="category">Category</label>
                            <select class="form-control" name="category_id" id="category">
                                @foreach($categories as $category)
                                    <option class="bg-dark" value="{{$category->id}}">{{$category->category}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group{{ $errors->has('description') ? ' has-danger' : '' }}">
                            <label for="description">Description</label>
                            <textarea class="form-control" name="description" id="description" cols="30"
                                      rows="10"></textarea>
                        </div>
                        <div class="form-group{{ $errors->has('requirement') ? ' has-danger' : '' }}">
                            <label for="requirement">Requirement</label>
                            <textarea class="form-control" name="requirement" id="requirement" cols="30"
                                      rows="10"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Create" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


@push('js')

    <script>
        CKEDITOR.replace('description');
        CKEDITOR.replace('requirement');
    </script>

@endpush

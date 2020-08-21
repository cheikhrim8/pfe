@extends('layouts.app', ['pageSlug'=> 'user-discussion'])
@section('content')

    <div id="accordion">
        <?php $i = 1?>
        @foreach ($discussions as $discussion)
            <div class="card">
                <div class="card-header">
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
                                <input type="submit" value="DELETE" class="dropdown-item delete-discussion-btn"
                                       >
                            </form>
                        </div>
                    </div>
                    <h5 class="mb-0">
                        <button class="btn text-muted btn-link" data-toggle="collapse" data-target="#collapse{{$i}}"
                                aria-expanded="true" aria-controls="collapse{{$i}}">
                            {{$discussion->title}}
                        </button>
                    </h5>
                </div>
                <div id="collapse{{$i}}" class="collapse" aria-labelledby="heading{{$i}}" data-parent="#accordion">
                    <div class="card-body">
                        {{$discussion->content}}
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row justify-content-around">
                        <span class="float-right fas fa-clock"> {{$discussion->created_at}}</span>
                        <span class="float-right fas fa-clock"> {{$discussion->created_at}}</span>
                        <span class="float-right fas fa-clock"> {{$discussion->created_at}}</span>
                    </div>

                </div>
            </div>
            <?php $i++ ?>
        @endforeach
    </div>


    <div class="modal fade" id="edit-discussio-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Discussion</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                {{--<form id="edit-form" action="{{route('discussions.edit',$discussion->id)}}" method="post">
                    @csrf
                    <input type="hidden" id="id" value="put" name="_method">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="title" class="col-form-label">Title:</label>
                            <input type="text" class="form-control text-dark" id="title">
                        </div>
                        <div class="form-group">
                            <label for="content" class="col-form-label">Content:</label>
                            <textarea class="form-control text-dark" id="content"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <input type="submit" value="Edit Discussion" id="edit-btn" class="btn btn-primary">
                    </div>
                </form>--}}
            </div>
        </div>
    </div>


@stop

@push('js')
    <script>
        $(document).ready(function () {

            $('.edit-discussion-btn').on('click', function () {
                let id = $(this).attr('data-id');

                let title = $(this).attr('data-title');
                let content = $(this).attr('data-content');

                $('#id').val(id);
                $('#title').val(title);
                $('#content').text(content);

                $('#edit-btn').on('click', function () {
                    $('#edit-form').attr('action', '/discussions/' + id);
                });
            });


        });
    </script>

@endpush

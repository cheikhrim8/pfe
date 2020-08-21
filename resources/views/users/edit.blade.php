@extends('layouts.app', ['pageSlug' => 'users'])

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card text-center">
                <div class="card-header">
                    <h4 class="card-title">Edit <strong>{{$user->name}}</strong> Role</h4>
                </div>
                <div class="card-body">
                    <form action="{{route('users.update', $user->id)}}" method="post">
                        @csrf
                        @method('patch')
                        @foreach($roles as $role)
                            <div class="form-group">
                                <input type="checkbox" class="form-check-input" name="roles[]" value="{{$role->id}}"
                                       id="{{$role->id}}"
                                @foreach($user->roles as $userRole)
                                    @if($userRole->id === $role->id )
                                        checked
                                        @endif
                                    @endforeach
                                >
                                <label for="{{$role->id}}" class="form-check-label"> {{$role->name}} </label>
                            </div>

                        @endforeach
                        <button type="submit" class="btn btn-primary">modifier les roles</button>
                    </form>

                </div>
            </div>
        </div>

    </div>

@endsection

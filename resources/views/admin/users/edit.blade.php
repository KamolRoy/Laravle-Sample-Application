@extends('layouts.admin')

@section('content')
    <h2>Edit User</h2>

    <div class="row">
        <div class="col-sm-3">
        <img src="{{$user->photo? $user->photo->file : '/images/default.jpg'}}" alt="" class="img-responsive img-rounded">
    </div>

        <div class="col-sm-9">

            {!! Form::model ($user, ['method'=>'PATCH', 'action'=> ['AdminUserController@update', $user->id], 'files'=>true]) !!}

                <div class="form-group">
                    {!! Form::label('name', 'Name:') !!}
                    {{--The first parameter name is need to be same like database--}}
                    {!! Form::text('name', null, ['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('email', 'Email:') !!}
                    {!! Form::email('email', null, ['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('role_id', 'Role:') !!}
                    {!! Form::select('role_id',[''=>'Choose Options'] + $roles, null, ['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('password', 'Password:') !!}
                    {!! Form::password('password', ['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('is_active', 'Status') !!}
                    {!! Form::select('is_active', array(1=>'Active', 0=>'Not Active' ), null, ['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('photo_id', 'Image') !!}
                    {!! Form::file('photo_id', null, ['class'=>'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::submit('Update', ['class'=>'btn btn-primary']) !!}
                    <a class="btn btn-primary" href="{{route('admin.users.index')}}">Cancel</a>
                </div>

            {!! Form::close() !!}

            {!! Form::open (['method'=>'DELETE', 'action'=> ['AdminUserController@destroy', $user->id], 'class'=>'pull-right']) !!}
                <div class="form-group">
                    {!! Form::submit('Delete User', ['class'=>'btn btn-danger']) !!}
                </div>
            {!! Form::close() !!}

    </div>
    </div>

    <div class="row">
        @include('includes.errors')
    </div>


@endsection


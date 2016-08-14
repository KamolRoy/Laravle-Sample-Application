@extends('layouts.admin')

@section('content')
    <h2>Edit Post</h2>


    <div class="row">
        <div class="col-sm-2">
            <img src="{{$post->photo? $post->photo->file : '/images/default.jpg'}}" alt="" class="img-responsive img-rounded">
        </div>
        <div class="col-sm-10">
            {!! Form::model ($post, ['method'=>'PATCH', 'action'=> ['AdminPostController@update', $post->id], 'files'=>true]) !!}
            <div class="form-group">
                {!! Form::label('title', 'Title') !!}
                {!! Form::text('title', null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('category_id', 'Category:') !!}
                {!! Form::select('category_id',$categories, null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('photo_id', 'Image') !!}
                {!! Form::file('photo_id', null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('body', 'Description:') !!}
                {!! Form::textarea('body', null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Update Post', ['class'=>'btn btn-primary']) !!}
                <a class="btn btn-primary" href="{{route('admin.posts.index')}}">Cancel</a>
            </div>
            {!! Form::close() !!}

            {!! Form::open (['method'=>'DELETE', 'action'=> ['AdminPostController@destroy', $post->id], 'class'=>'pull-right']) !!}
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
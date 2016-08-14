@extends('layouts.admin')

@section('content')


    @if(count($comments) > 0)
        <h4>Comment of post {{$post->title}}</h4>

        <table class="table table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Post ID</th>
                <th>Author</th>
                <th>Email</th>
                <th>Body</th>
                <th>Created At</th>
            </tr>
            </thead>

            @foreach($comments as $comment)
                <tbody>
                <tr>
                    <td>{{$comment->id}}</td>
                    <td>{{$comment->post_id}} / <a href="{{route('home.post', $comment->post->id)}}">View</a></td>
                    <td>{{$comment->author}}</td>
                    <td>{{$comment->email}}</td>
                    <td>{{$comment->body}}</td>
                    <td>{{$comment->created_at}}</td>
                    <td>
                        @if($comment->is_active==1)
                            {!! Form::open (['method'=>'PATCH', 'action'=> ['PostCommentController@update', $comment->id]]) !!}
                            <input type="hidden" name="is_active" value="0">
                            <div class="form-group">
                                {!! Form::submit('Un-approved', ['class'=>'btn btn-info']) !!}
                            </div>
                            {!! Form::close() !!}

                        @else
                            {!! Form::open (['method'=>'PATCH', 'action'=> ['PostCommentController@update', $comment->id]]) !!}
                            <input type="hidden" name="is_active" value="1">
                            <div class="form-group">
                                {!! Form::submit('Approved', ['class'=>'btn btn-success']) !!}
                            </div>
                            {!! Form::close() !!}
                        @endif
                    </td>
                    <td>
                        {!! Form::open (['method'=>'DELETE', 'action'=> ['PostCommentController@destroy', $comment->id], 'class'=>'pull-right']) !!}
                        <div class="form-group">
                            {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                        </div>
                        {!! Form::close() !!}
                    </td>
                </tr>
                </tbody>
            @endforeach


        </table>

    @else
        <h3>No Comments Found</h3>
    @endif


@endsection
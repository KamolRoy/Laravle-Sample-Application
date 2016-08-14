@extends('layouts.admin')

@section('content')


    @if(count($replies) > 0)
        <h4>Replies of post {{$comment->title}}</h4>

        <table class="table table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Post ID</th>
                <th>Author</th>
                <th>Email</th>
                <th>Body</th>
                <th>Created At</th>
                <th>Status</th>
                <th>Delete</th>
            </tr>
            </thead>

            @foreach($replies as $reply)
                <tbody>
                <tr>
                    <td>{{$reply->id}}</td>
                    <td>{{$reply->comment->post->id}} / <a href="{{route('home.post', $reply->comment->post->id)}}">View Post</a></td>
                    <td>{{$reply->author}}</td>
                    <td>{{$reply->email}}</td>
                    <td>{{$reply->body}}</td>
                    <td>{{$reply->created_at}}</td>
                    <td>
                        @if($reply->is_active==1)
                            {!! Form::open (['method'=>'PATCH', 'action'=> ['CommentReplyController@update', $reply->id]]) !!}
                            <input type="hidden" name="is_active" value="0">
                            <div class="form-group">
                                {!! Form::submit('Un-approved', ['class'=>'btn btn-info']) !!}
                            </div>
                            {!! Form::close() !!}

                        @else
                            {!! Form::open (['method'=>'PATCH', 'action'=> ['CommentReplyController@update', $reply->id]]) !!}
                            <input type="hidden" name="is_active" value="1">
                            <div class="form-group">
                                {!! Form::submit('Approved', ['class'=>'btn btn-success']) !!}
                            </div>
                            {!! Form::close() !!}
                        @endif
                    </td>
                    <td>
                        {!! Form::open (['method'=>'DELETE', 'action'=> ['CommentReplyController@destroy', $reply->id], 'class'=>'pull-right']) !!}
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
        <h3>No Repliess Found</h3>
    @endif


@endsection
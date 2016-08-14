@extends('layouts.blog-post')

@section('content')

    @if(Session::has('comment_message'))
        <p class="bg-info">{{session('comment_message')}}</p>
    @endif

    <!-- Blog Post -->

    <!-- Title -->
    <h1>{{$post->title}}</h1>

    <!-- Author -->
    <p class="lead">
        by <a href="#">{{$post->user->name}}</a>
    </p>

    <hr>

    <!-- Date/Time -->
    <p><span class="glyphicon glyphicon-time"></span> Posted {{$post->created_at->diffForHumans()}}</p>

    <hr>

    <!-- Preview Image -->
    <img class="img-responsive" src="{{$post->photo->file}}" alt="">

    <hr>

    <!-- Post Content -->
    <p>{{$post->body}}</p>
    <hr>

    <!-- Blog Comments -->

    @if(Auth::check())

        <!-- Comments Form -->
        <div class="well">
            <h4>Leave a Comment:</h4>


            {!! Form::open (['method'=>'POST', 'action'=> 'PostCommentController@store']) !!}
                <input type="hidden" name="post_id" value="{{$post->id}}">

                <div class="form-group">
                    {!! Form::label('body', ' ') !!}
                    {!! Form::textarea('body', null, ['class'=>'form-control', 'rows'=>3]) !!}
                </div>
                <div class="form-group">
                    {!! Form::submit('Submit', ['class'=>'btn btn-primary']) !!}
                </div>
            {!! Form::close() !!}


        </div>
    @endif


    <hr>

    <!-- Posted Comments -->

    <!-- Comment -->

    @if(Auth::check() && count($comments)>0)
            @foreach($comments as $comment)
                @if($comment->is_active == 1)
                    <div class="media">
                        <a class="pull-left" href="#">
                            <img height="64" class="media-object" src="{{$comment->photo ? $comment->photo : '/images/default.jpg'}}" alt="">
                        </a>

                        <div class="media-body">
                            <h4 class="media-heading">{{$comment->author}}
                                <small>{{$comment->created_at}}</small>
                            </h4>
                            <p>{{$comment->body}}</p>




                                @if(count($comment->commentReplies)>0)
                                    @foreach($comment->commentReplies as $reply)
                                        @if($reply->is_active == 1)
                                            <!-- Nested Comment -->
                                            <div class="media" id="nested-comment">
                                                <a class="pull-left" href="#">
                                                    <img class="media-object" src="http://placehold.it/64x64" alt="">
                                                </a>
                                                <div class="media-body">
                                                    <h4 class="media-heading">{{$reply->author}}
                                                        <small>{{$reply->created_at}}</small>
                                                    </h4>
                                                    <p>{{$reply->body}}</p>
                                                </div>
                                            </div>
                                            <!-- End Nested Comment -->
                                        @endif
                                    @endforeach
                                @endif

                            {{--This part will toggle hide and show while reply button click--}}
                            <button id="replyme" class="toggle-reply btn btn-primary pull-right">Reply</button>

                            <div class="comment-reply-container">


                                <div class="comment-reply">
                                    {!! Form::open (['method'=>'POST', 'action'=> 'CommentReplyController@createReply']) !!}
                                        <input type="hidden" name="comment_id" value="{{$comment->id}}">
                                        <div class="form-group">
                                            {!! Form::label('body', 'Body') !!}
                                            {!! Form::textarea('body', null, ['class'=>'form-control', 'rows'=>2]) !!}
                                        </div>
                                            <div class="form-group">
                                                    {!! Form::submit('Reply', ['class'=>'btn btn-primary']) !!}
                                            </div>
                                    {!! Form::close() !!}
                                </div>

                            </div>

                        </div>
                    </div>
                @endif
            @endforeach
    @endif



@endsection

@section('scripts')
    <script>
        $(".comment-reply-container .toggle-reply").click(function () {
            $(this).next().slideToggle("slow");
        });


    </script>
@endsection
@extends('layouts.admin')

@section('content')
    <h2>Post Index Page</h2>
    @if(Session::has('deleted_post'))
        <p class="bg-danger">{{session('deleted_post')}}</p>
    @endif
     <table class="table table-striped">
         <thead>
           <tr>
               <th>ID</th>
               <th>Image</th>
               <th>Owner</th>
               <th>Category ID</th>
               <th>Title</th>
               <th>Body</th>
               <th>Created At</th>
               <th>Updated At</th>
           </tr>
         </thead>
         <tbody>
            @if($posts)
                @foreach($posts as $post)
                    <tr>
                        <td>{{$post->id}} / <a href="{{route('home.post', $post->id)}}">View</a></td>
                        <td><img height="20" width="22" src="{{$post->photo ? $post->photo->file : '/images/default.jpg'}}" alt=""></td>
                        <td><a href="{{route('admin.posts.edit', $post->id)}}">{{$post->user->name}}</a></td>
                        <td>{{$post->category ? $post->category->name : 'Uncategorized'}}</td>
                        <td>{{$post->title}}</td>
                        <td>{{$post->body}}</td>
                        <td><a href="{{route('admin.comments.show', $post->id)}}">View Comments</a></td>
                        <td>{{$post->created_at->diffForhumans()}}</td>
                        <td>{{$post->updated_at->diffForhumans()}}</td>
                    </tr>
                @endforeach
            @endif
         </tbody>
       </table>

    <div class="row">
        <div class="col-sm-6 col-sm-offset-5">
            {{$posts->render()}}
        </div>
    </div>
@endsection
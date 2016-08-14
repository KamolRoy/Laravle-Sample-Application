@extends('layouts.admin')

@section('content')
    @if($photos)
     <table class="table table-striped">
         <thead>
             <tr>
                 <th>ID</th>
                 <th>Name</th>
                 <th>Created</th>
                 <th>Image</th>
             </tr>
         </thead>

         <tbody>
         @foreach($photos as $photo)
             <tr>
                 <td>{{$photo->id}}</td>
                 <td>{{$photo->file}}</td>
                 <td>{{$photo->created_at ? $photo->created_at->diffForhumans() : 'No Date'}}</td>
                 <td><img height="50" src="{{$photo->file ? $photo->file : '/images/default.jpg'}}" alt=""></td>
                 <td>
                     {!! Form::open (['method'=>'DELETE', 'action'=> ['AdminMediaController@destroy', $photo->id]]) !!}
                         <div class="form-group">
                             {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                         </div>
                     {!! Form::close() !!}
                 </td>
             </tr>
         @endforeach
         </tbody>
     </table>
    @endif
@endsection
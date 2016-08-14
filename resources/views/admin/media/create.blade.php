@extends('layouts.admin')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.css">
@endsection

@section('content')
    <h2>Upload Image</h2>
    {!! Form::open (['method'=>'POST', 'action'=> 'AdminMediaController@store','class'=>'dropzone']) !!}

    {!! Form::close() !!}

@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.js"></script>
@endsection
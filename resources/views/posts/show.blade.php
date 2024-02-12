@extends('layouts.app')
@section('title')
    Show
@endsection
@section('content')
    <div class="card my-5">
        <div class="card-header">
            View of the {{$post['title']}} post.
        </div>
        <div class="card-body">
            <h5 class="card-title">{{$post['title']}}</h5>
            <p class="card-text">{{$post['description']}}</p>
            <p class="card-text">{{$post['created_at']}}</p>
        </div>
    </div>
@endsection

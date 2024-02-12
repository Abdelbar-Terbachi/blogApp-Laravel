@extends('layouts.app')
@section('title')
    Edit
@endsection
@section('content')

    <div class="container mt-5">
        @if ($errors->any())
            <div class="alert alert-danger my-5">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="{{route('posts.update' ,$post->id)}}">
            @csrf
            @method("PUT")
            <div class="form-group mb-5">
                <label for="title">Title:</label>
                <input type="text" class="form-control" id="title" name="title" value="{{$post->title}}">
            </div>

            <div class="form-group mb-5">
                <label for="description" class="mb-1">Description:</label>
                <textarea class="form-control mb-3" name="description" id="description" rows="3"
                          placeholder="Enter description">{{$post->description}}</textarea>
            </div>

            <div class="form-group mb-5">
                <label for="selectInput" class="mb-1">Select:</label>
                <select name="post_creator" class="form-control mb-3" id="selectInput">
                    @foreach($users as $user)
                        <option @selected($post->user_id == $user->id) value="{{$user->id}}">{{$user->name}}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>

@endsection

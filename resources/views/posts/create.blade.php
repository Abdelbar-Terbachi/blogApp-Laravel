@extends('layouts.app')
@section('title')
    Create
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
        <form action="{{route('posts.store')}}" method="POST">
            @csrf
            <div class="form-group mb-5">
                <label for="title">Title:</label>
                <input type="text" value="{{old('title')}}" class="form-control" id="title" name="title"
                       placeholder="Enter title">
            </div>

            <div class="form-group mb-5">
                <label for="description" class="mb-1">Description:</label>
                <textarea class="form-control mb-3" name="description" id="description" rows="3"
                          placeholder="Enter description"> {{old('description')}}</textarea>
            </div>

            <div class="form-group mb-5">
                <label for="selectInput" class="mb-1">Select:</label>
                <select name="post_creator" class="form-control mb-3" id="selectInput">
                    @foreach($users as $user)
                        <option value="{{$user->id}}">{{$user->name}}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

@endsection

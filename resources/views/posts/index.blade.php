@extends('layouts.app')
@section('title')
    Index
@endsection
@section('content')
    <main>
        <div class="text-center">
            <a href="{{route('posts.create')}}" type="button" class="btn btn-primary my-5 "> Add</a>
        </div>
    </main>
    <section class="text-center">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Created By</th>
                <th scope="col">Created at</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($posts as $post)
                <tr>
                    <td>{{$post->id}}</td>
                    <td>{{$post->title}}</td>
                    <td>{{$post->posted_by}}</td>
                    <td>{{$post->created_at}}</td>
                    <td>
                        <a class="btn btn-primary" href="{{route("posts.show", $post->id)}}">View</a>
                        <a class="btn btn-secondary" href="{{route("posts.edit", $post->id)}}">Edit</a>
                        <form style="display: inline" action="{{route('posts.destroy',$post->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>

    </section>
@endsection

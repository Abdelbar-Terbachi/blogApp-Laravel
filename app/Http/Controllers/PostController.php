<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $postsFromDb = Post::all(); // Collection Object
        return view('posts.index', ['posts' => $postsFromDb]);
    }

    public function show(Post $post)

    {
        //$singlePostFromDb = Post::findOrFail($post);
        return view('posts.show', ['post' => $post]);
    }

    public function create()
    {


        $usersFromDb = User::all();
        return view('posts.create', ['users' => $usersFromDb]);
    }

    public function store()
    {
        request()->validate([
            'title'=>['required', 'min:3'],
            'description'=>['required', 'min:5'],
            'post_creator'=>['required', 'exists:users,id'],
        ]);
        $title = request()->title;
        $description = request()->description;
        $post_creator = \request()->post_creator;
        $post = new Post;

       Post::create([
           "title"=> $title,
           "description" => $description,
           "user_id" => $post_creator,
       ]);
        return to_route('posts.index');
    }

    public function edit(Post $post)
    {

        $usersFromDb = User::all();
        return view("posts.edit", ['users' => $usersFromDb, "post"=>$post]);
    }

    public function update($postId)
    {
        request()->validate([
            'title'=>['required', 'min:3'],
            'description'=>['required', 'min:5'],
            'post_creator'=>['required', 'exists:users,id'],
        ]);
        $oldPost = Post::find($postId);
        $oldPost->title = request()->title;
        $oldPost->description = request()->description;
        $oldPost->user_id = request()->post_creator;
        $oldPost->save();

        return to_route('posts.show', $postId);
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return to_route('posts.index');
    }
}

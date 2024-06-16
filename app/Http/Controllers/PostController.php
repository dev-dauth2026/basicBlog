<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function deletePost(Post $post){
        if(auth()->user()->id === $post['user_id']){
            $post->delete();
        }
        return redirect('/');
    }

    public function updatePost(Post $post, Request $request){
        if(auth()->user()->id !== $post['user_id']){
            return redirect('/');
        }

        $editPostFields = $request->validate([
            'title' => 'required',
            'body' => 'required'
        ]);

        $editPostFields['title'] = strip_tags($editPostFields['title'] );
        $editPostFields['body'] = strip_tags($editPostFields['body'] );

        $post->update($editPostFields);
        return redirect('/');

    }

    public function showEditPost(Post $post){
        if(auth()->user()->id !== $post['user_id']){
            return redirect('/');
        }

        return view('edit-post',['post'=>$post]);
    }
    public function createPost(Request $request){
        $createPostFields = $request->validate([
            'title' =>'required',
            'body' =>'required'
        ]);

        $createPostFields['title'] = strip_tags($createPostFields['title']);
        $createPostFields['body'] = strip_tags($createPostFields['body']);
        $createPostFields['user_id'] = auth()->id();
        Post::create($createPostFields);
        return redirect('/');


    }
}

<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Resources\PostResource;

class PostController extends Controller
{
    public function allPosts()
    {
        $posts = Post::all();

        if ($posts) {
            return PostResource::collection($posts);
        }

        return response()->json('No post found');
    }

    public function index()
    {
        $userId = $this->_userId();
        $posts = Post::where('user_id', $userId)->get();

        if ($posts) {
            return PostResource::collection($posts);
        }

        return response()->json('No post found for you');
    }

    public function store(Request $request)
    {
        $post = new Post();
        $post->user_id = $this->_userId();
        $post->title = $request->title;
        $post->detail = $request->detail;

        if ($post->save()) {
            return new PostResource($post);
        }

        return response()->json('Post not created');
    }

    public function show($id)
    {
        $post = $this->_post($id);

        if ($post) {
            return new PostResource($post);
        }

        return response()->json('No post found for you');
    }

    public function update(Request $request, $id)
    {
        $post = $this->_post($id);

        if ($post) {
            $post->title = $request->title;
            $post->detail = $request->detail;
            $post->save();
            return new PostResource($post);
        }

        return response()->json('No post found for you');
    }

    public function destroy($id)
    {
        $post = $this->_post($id);

        if ($post) {
            $post->delete();
            return new PostResource($post);
        }

        return response()->json('No post found for you');
    }

    protected function _userId()
    {
        return auth('api')->user()->id;
    }

    protected function _post($id)
    {
        $userId = $this->_userId();
        $post = Post::where('user_id', $userId)->where('id', $id)->first();
        return $post;
    }
}

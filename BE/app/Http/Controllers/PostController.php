<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allposts = Post::orderBy("created_at", "desc")->get();
        return response()->json($allposts);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "title" => "required|max:40",
            "body" => "required",
            "time" => "required",
        ]);
        $post = Post::create([
            "title" => $request->title,
            "body" => $request->body,
            "time" => $request->time,
            'satatus' => $request->status,
            'user_id' => $request->user()->id,
        ]);
        return response()->json([
            'status' => 'success',
            'message' => 'post create'
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $post = Post::find($id);
        if (!$post) {
            return response()->json([
                'message' => ' post not found'
            ], 401);
        }
        return response()->json($post, 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        if (!$post) {
            return response()->json('post not found', 404);
        }
        $validatepost = $request->validate([
            'title' => 'required|max:20',
            'body' => 'required',
            'status' => 'required',
            'time' => 'required',
        ]);
        $post->update($validatepost);
        return response()->json([
            'message' => 'post update',
            'post' => $post
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        $post = Post::find($id);
        if (!$post) {
            return response()->json('post not found', 404);
        }
        $post->delete();
        return response()->json([
            'message' => 'post deleted',
        ]);
    }
}

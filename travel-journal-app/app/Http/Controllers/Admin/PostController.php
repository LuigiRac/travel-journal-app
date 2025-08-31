<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Post;

use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
   //INDEX
    public function index()
    {
        $posts = Post::all();
        // dd($posts);

        return view('posts.index', compact('posts'));
    }

    // CREATE
    public function create()
    {
        return view('posts.create');
    }

    // STORE
    public function store(Request $request)
    {
        // dd($request);

        $dataPost=$request->all();

        // dd($dataPost);

            $newPost = new Post();

            $newPost->location = $dataPost['location'];
            $newPost->description = $dataPost['description'];
            $newPost->positive = $dataPost['positive'];
            $newPost->negative = $dataPost['negative'];
            $newPost->cost = $dataPost['cost'];
            $newPost->physical_effort = $dataPost['physical_effort'];
            $newPost->economic_effort = $dataPost['economic_effort'];

            if(array_key_exists('image', $dataPost)) {
                dump('immagine esiste');
                $img_post = Storage::putFile('post', $dataPost['image']);

                $newPost->image = $img_post;
            }

            $newPost->save();
            
            return redirect()->route('posts.show', $newPost)->with('success', 'Post creato con successo!');
    }

    // SHOW
    public function show(Post $post)
    {
        // dd($post);
        $previousPostId = Post::where('id', '<', $post->id)->max('id');
        $nextPostId = Post::where('id', '>', $post->id)->min('id');


        return view('posts.show', compact('post', 'previousPostId', 'nextPostId'));
    }

    // EDIT
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    // UPDATE
    public function update(Request $request, Post $post)
    {
        $dataPost=$request->all();

        // dd($dataPost);


            $post->location = $dataPost['location'];
            $post->description = $dataPost['description'];
            $post->positive = $dataPost['positive'];
            $post->negative = $dataPost['negative'];
            $post->cost = $dataPost['cost'];
            $post->physical_effort = $dataPost['physical_effort'];
            $post->economic_effort = $dataPost['economic_effort'];

            if ($request->hasFile('image')) {
        
            if ($post->image && Storage::exists($post->image)) {
                Storage::delete($post->image);
            }

            $img_post = Storage::putFile('post', $request->file('image'));
            $post->image = $img_post;

            }

            $post->update();

            return redirect()->route('posts.show', $post)->with('success', 'Post creato con successo!');
    
    }

    //DESTROY
    public function destroy(Post $post)
    {

        if ($post->image && Storage::exists($post->image)) {
        Storage::delete($post->image);
    }

        $post->delete();
        
        return redirect()->route('posts.index');
    }
}

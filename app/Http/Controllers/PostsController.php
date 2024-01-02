<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PostsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware("auth");
    }
    public function create()
    {
        return view("posts.create");
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            "caption" => ['required', 'string', 'min:8'],
            "image" => ["required", "image"],
        ]);
        $imagePath = $request->image->store('uploads', 'public');

        Image::make(public_path("storage/{$imagePath}"))->fit(1200,1200)->save();

        Post::create([
                'caption'=> $validated['caption'],
                "user_id" => auth()->user()->id,
                'image' => $imagePath
            ],
        );
        return redirect('/profile/'.auth()->user()->username);
    }

    public function show($post){
        $post = base64_decode($post);
        $post =Post::where('id', $post)->firstOrFail();
        return view('posts.show',compact('post'));
    }
}

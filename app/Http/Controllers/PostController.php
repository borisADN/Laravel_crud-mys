<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;



class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $posts = Post::all();
        return view('post-create', compact('posts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|max:300|string',
            'image' => 'nullable|mimes:jpeg,png,jpg,gif|max:1024',
            'body' => 'required|string|max:2000',
        ]);
        if ($request->has('image')) {
            $imageName = time() . '.' . $request->image->getClientOriginalExtension();

            $request->image->move(public_path('uploads/images'), $imageName);
            $data['image'] = $imageName;
        } else {
            $data['image'] = 'default.png';
        }

        Post::create($data);

        return back()->with('success', 'Post created successfully');
        // return redirect()->route('posts.index')->with('success', 'Post created successfully');
    }


    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('post-edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $data = $request->validate([
            'title' => 'required|max:300|string',
            'image' => 'sometimes|mimes:jpeg,png,jpg,gif|max:1024',
            'body' => 'required|string|max:2000',
        ]);
        if ($request->has('image')) {
            $path = public_path('uploads/images/' . $post->image);
           if(File::exists($path))
           {
            File::delete($path);
           }

            $imageName = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('uploads/images'), $imageName);
            $data['image'] = $imageName;
        }

        $post->update($data);
        return redirect()->route('post.create')->with('success', 'Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        if($post->image != 'default.png'){
            $path = public_path('uploads/images/'.$post->image);
            if(File::exists($path)){
                File::delete($path);
            }
        }
        $post->delete();
        return back()->with('success', 'Post deleted successfully');
    }
}

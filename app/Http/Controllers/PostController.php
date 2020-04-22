<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Requests\Post\CreatePostRequest;
use App\Http\Requests\Post\UpdatePostRequest;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /* Create a new controller instance.
   *
   * @return void
   */
    public function __construct() {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('post.index')->with('posts', Post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     *Request Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request)
    {
//        $post = new Post();

        $image = $request->image->store('posts');
        Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'content' => $request->content,
            'image' => $image,
            'published_at' => $request->published_at
        ]);

        session()->flash('success', 'Post created successfully');

        return redirect(route('post.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        // $posts = Post::findOrFail($id);
        return view('post.create')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        // accessing request content from the view
        $data = $request->only(['title','description','content','published_at']);

        // dd($data);

        // check if new image
        if ($request->hasFile('image')) {

            // upload it
            $image = $request->image->store('posts');

            // delete old one automatically
            // Storage::delete($post->image);
            $post->deleteImage();

            $data['image'] = $image;
        }

        // Update attributes
        $post->update($data);

        // flash message
        session()->flash('success', 'post updated successfully');

        // redirect user
        return redirect(route('post.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::withTrashed()->where('id', $id)->firstOrFail();

        if ($post->trashed()) {
            Storage::delete($post->image); // B'cos $post->image is a path to the file
            $post->forceDelete();
        } else {
            $post->delete();
        }

        $post->delete();
        session()->flash('success', 'Post trashed successfully');

        return redirect( route('post.index') );
    }
    /**
     * Display a list of all trashed posts.
     *
     * @return \Illuminate\Http\Response
     */
    public function trashed() {

        // $trashed = Post::withTrashed()->get();
        $trashed = Post::onlyTrashed()->get();

        return view('post.index')->withPosts($trashed);
    }


    public function restore ($id) {

        $post = Post::withTrashed()->where('id', $id)->firstOrFail();

        $post->restore();

        session()->flash('success', 'Post restore successfully');

        return redirect()->back();
    }
}

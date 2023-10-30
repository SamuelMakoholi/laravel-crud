<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use DB;
use File;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::paginate(4);
        return view('index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categories = Category::all();
        return view('create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'image' => ['required','image','max:2028','mimes:png,jpg'],
            'title' => ['required'],
            'description' => ['required'],
            'category_id' => ['required','integer'],
        ]);



        $filename = time().'-'.$request->image->getClientOriginalName();
        $filePath = $request->image->storeAs('uploads', $filename);

        $post = new Post();

        $post->title = $request->title;
        $post->description = $request->description;
        $post->category_id = $request->category_id;
        $post->image = $filePath;
        $post->save();
        return redirect()->route('posts.index')->with('success', 'Post Created Successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $post = Post::findOrFail($id);

        return view('show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
       $post = Post::findOrfail($id);

       $categories = Category::all();
       return view('edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //'image' => ['required','image','max:2028','mimes:png,jpg'],
        $request->validate([

            'title' => ['required'],
            'description' => ['required'],
            'category_id' => ['required','integer'],
        ]);
        $post = Post::findorfail($id);

        if($request->hasfile('image')){
            $request->validate(
                [
                    'image' => ['required', 'max:2028', 'image'],
                ]
            );

            $filename = time().'-'.$request->image->getClientOriginalName();
            $filePath = $request->image->storeAs('uploads', $filename);

            File::delete(public_path($post->image));


            $post->image = $filePath;


            // $post->image = 'storage/'.$filePath;
        }

        $post->title = $request->title;
        $post->description = $request->description;
        $post->category_id = $request->category_id;
        $post->save();
        return redirect()->route('posts.index')->with('success', 'Post Created Successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $destroy = Post::findOrFail($id);

        $destroy->delete();
        return redirect()->route('posts.index');
    }


    //show the trashed resources

    public function trashed()
    {
        $posts = Post::onlyTrashed()->get();

        return view('trashed', compact('posts'));
    }


    //restore the trashed resource
    public function restore($id)
    {

        $post= Post::onlyTrashed()->findOrFail($id);

        $post->restore();

        return redirect()->route('posts.trashed');

    }

    //force delete
    public function forceDelete($id)
    {

        $post= Post::onlyTrashed()->findOrFail($id);

        File::delete(public_path($post->image));

        $post->forceDelete();

        return redirect()->back();
    }
}

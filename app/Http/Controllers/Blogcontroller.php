<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use App\Models\Category;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class Blogcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): view
    {
        $comments=Comment::with('categories')->get();

        return view('blog.index' , ['comments'=>$comments]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories=Category::all();

        return view('blog.create' , ['categories'=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBlogRequest $request)
    {
     $catgory_id []=$request->category_id;

     $comment=Comment::create([
     'username'=>$request->title,
     'comment'=>$request->body,
     ]);
     foreach ($catgory_id as $id) {
         $comment->Categories()->attach($id);
     }

        return redirect()->route('blog.index');
    }



    public function show(string $id): view
    {
        $categories=Category::where('id' , $id)->with('comments')->get();

        return view('blog.show' , ['categories'=>$categories]);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): view
    {
        $comment=Comment::find($id);
        $categories=Category::all();
        return view('blog.update' , ['comment'=>$comment , 'categories'=>$categories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBlogRequest $request, string $id)
    {
        $catgory_id []=$request->category_id;
        $comment=Comment::find($id);
        $comment->username=$request->title;
        $comment->comment=$request->body;
        foreach ($catgory_id as $id) {
            $comment->categories()->sync($id);
        }
        $comment->save();
        return redirect()->route('blog.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $comment=Comment::find($id)->delete();
        $comment->detach();
        return back();
    }
}

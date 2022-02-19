<?php

namespace App\Http\Controllers;
use App\Http\Requests\PostFormRequest;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response(
            Post::get()
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostFormRequest $request)
    {
        $post = Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'content' => $request->content,
            'is_active' => 1
        ]);

        $categoryAdd = Category::firstOrCreate(["title"=>$request->category],
        ["title"=>$request->title, "description"=>$request->description, "content"=>$request->content, "is_active"=>1]
        );
        $post->category()->save($categoryAdd);

        return response(
            $post
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response(
            Post::find($id)
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return response(
            Post::find($id)->update(["title"=>$request->title, "description"=>$request->description, "content"=>$request->content, "is_active"=>$request->is_active ?? 0])
        );        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return response(
            Post::find($id)->delete()
        );
    }
}

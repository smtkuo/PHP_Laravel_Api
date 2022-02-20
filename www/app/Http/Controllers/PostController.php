<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostFormRequest;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            (new Post)->with('categories')->get()
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


        if(!Auth::user()){
            return response(
                ["error"=>"Please login or Signup"]
            );
        }

        $post = Post::create([
            'title' => $request->title,
            'description' => $request->description ?? null,
            'content' => $request->content ?? null,
            'is_active' => 1
        ]);
        
        $categoryAdd = Category::firstOrCreate(
            ["title" => $request->category],
            ["title" => $request->category, "description" => $request->description, "content" => $request->content, "is_active" => 1]
        );
        $post->categoriable()->save($categoryAdd);


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
        if(!Auth::user()){
            return response(
                ["error"=>"Please login or Signup"]
            );
        }

        $post = new Post;
        $getPost = $post->where("id",$id);
        if($getPost == null){
            return response(
                ["error" => "Post is not active or deleted"]
            );
        }

        
        $stats = $getPost->first()->stats()->first();
        if($stats){
            $getPost->first()->stats()->update(
                ["post_id"=>$id, "views"=> $getPost->first()->stats()->first()->newVisit()]
            );
        }else{
            $getPost->first()->stats()->create(
                ["post_id"=>$id, "views"=> 1]
            );
        }


        return response(
            $getPost->with('category')->first()
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function viewRelationship($id,$relationship)
    {
        $post = new Post;
        $post = $post->where("id",$id)->first();
        if($post){
            if(method_exists($post,$relationship)){
                $post = $post->$relationship()->first();
            }
        }
        if($post==null){
            $post = ["error" => "Post is not active"];
        }
        return response(
            $post
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
            Post::where("id",$id)->update(["title" => $request->title, "description" => $request->description, "content" => $request->content, "is_active" => $request->is_active ?? 0])
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
        Post::where("id",$id)->delete();
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Categoriables;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response(
            (new Category)->with('posts')->get()
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return response(
            Category::firstOrCreate(
                ["title"=>$request->title],
                [ 'title' => $request->title ?? null, 'description' => $request->description ?? null, 'content' => $request->content ?? null, 'is_active' => 1 ]
            )
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
        $category = Category::where("id",$id);
        if($category == null){
            return response(
                ["error" => "Post is not active or deleted"]
            );
        }
        return response(
            $category->with('posts')->first()
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
            Category::where("id",$id)->update(["title" => $request->title ?? null, "description" => $request->description ?? null, "content" => $request->content ?? null, "is_active" => $request->is_active ?? 0])
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
        Category::where("id",$id)->delete();
    }
}

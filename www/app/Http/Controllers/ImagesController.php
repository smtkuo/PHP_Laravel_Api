<?php

namespace App\Http\Controllers;
use App\Http\Requests\PostFormRequest;
use App\Models\Category;
use App\Models\Images;
use Illuminate\Http\Request;

class ImagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response(
            (new Images)->with('categories')->get()
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
        $image = Images::create([
            'title' => $request->title,
            'description' => $request->description ?? null,
            'content' => $request->content ?? null,
            'is_active' => 1
        ]);
        
        $categoryAdd = Category::firstOrCreate(
            ["title" => $request->category],
            ["title" => $request->category, "description" => $request->description, "content" => $request->content, "is_active" => 1]
        );
        $image->categoriable()->save($categoryAdd);


        return response(
            $image
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
        $image = Images::where("id",$id);
        if($image == null){
            return response(
                ["error" => "Post is not active or deleted"]
            );
        }
        return response(
            $image->with('category')->first()
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
            Images::where("id",$id)->update(["title" => $request->title, "description" => $request->description, "content" => $request->content, "is_active" => $request->is_active ?? 0])
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
        Images::where("id",$id)->delete();
    }
}

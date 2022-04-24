<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Vote;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::all();
        $posts = Post::where("id", "<>", "-1");
        if (request()->category) {
            $posts = $posts->where("category_id", request()->category);
        }
        $Posts = $posts->get();

        return view("Posts.index", ["Posts" => $Posts, "categories" => $category]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();

        return view("Posts.create", ["categories" => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            "title" => "required",
            "desc" => "required",
            "image" => "required",
            "category_id" => "required",
        ]);

        $file = $request->image;
        $ext = $file->getClientOriginalExtension();
        $filename = time() . "." . $ext;
        $file->move('storage/images/', $filename);
        $img = "storage/images/" . $filename;

        Post::create([
            "title" => $request->title,
            "description" => $request->desc,
            "image" => $img,
            "category_id" => $request->category_id
        ]);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {


        return view("Posts.show", ["Post" => Post::find($id),
        "hasVoted" =>auth()->user() ? Vote::where("user_id", auth()->user()->id)->where("post_id", $id)->count() > 0 : false]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories=Category::all();
        return view("Posts.edit", ["Post" => Post::find($id),
    "categories"=>$categories]);
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

        $data = $request->only(["title", "description","category_id"]);
        $Post = Post::find($id);
        if ($request->hasFile("image")) {
            $file = $request->image;
            $ext = $file->getClientOriginalExtension();
            $filename = time() . "." . $ext;
            $file->move('storage/images/', $filename);
            $img = "storage/images/" . $filename;
            unlink($Post->image);
            $data["image"] = $img;
        }


        $Post->update($data);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $req)
    {
        $Post = Post::find($req->id);
        $Post->delete();
        return back();
    }
    // vote
    public function vote(Request $req,$id)
    {
        // $Post = Post::find($req->id);
        $vote=Vote::where("post_id",$id)->where("user_id",auth()->user()->id)->first();
        if($vote){
            $vote->delete();
        }else{
            Vote::create([
                "post_id"=>$id,
                "user_id"=>auth()->user()->id
            ]);
        }
        return back();
    }

}

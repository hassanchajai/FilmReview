<?php

namespace App\Http\Controllers;

use App\Models\Film;
use Illuminate\Http\Request;

class FilmsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $films = Film::all();
        return view("films.index", ["films" => $films]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("films.create");
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
            "image" => "required"
        ]);

        $file = $request->image;
        $ext = $file->getClientOriginalExtension();
        $filename = time() . "." . $ext;
        $file->move('storage/images/', $filename);
        $img = "storage/images/" . $filename;

        Film::create([
            "title" => $request->title,
            "description" => $request->desc,
            "image" => $img
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

        
        return view("films.show",["film"=>Film::find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view("films.edit", ["film" => Film::find($id)]);
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

        $data=$request->only(["title","description"]);
        $film = Film::find($id);
        if ($request->hasFile("image")) {
            $file = $request->image;
            $ext = $file->getClientOriginalExtension();
            $filename = time() . "." . $ext;
            $file->move('storage/images/', $filename);
            $img = "storage/images/" . $filename;
            unlink($film->image);
            $data["image"]=$img;
        }


        $film->update($data);
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
        $film=Film::find($req->id);
        $film->delete();
        return back();
    }
}

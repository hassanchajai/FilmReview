<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

class CommentsController extends Controller
{
    public function store(Request $request){
        Comment::create([
            "comment"=>$request->comment,
            "film_id"=>$request->film_id,
            "user_id"=>$request->user_id
        ]);
        return back();
    }
}

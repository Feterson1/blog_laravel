<?php

namespace App\Http\Controllers\Personal\Comment;

use App\Http\Controllers\Controller;
use App\Http\Requests\Personal\Comment\UpdateRequest;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index(){

        $comments = auth()->user()->comments;

        return view('personal.comments.index',compact('comments'));

    }

    public function edit(Comment $comment){

        return view('personal.comments.edit',compact('comment'));


    }

    public function update(UpdateRequest $request,Comment $comment){

        $data = $request->validated();
        $comment->update($data);

        return redirect()->route('personal.comment.index');


    }

    public function delete(Comment $comment){
        
        $comment->delete();
        
        return redirect()->route('personal.comment.index');


    }
}

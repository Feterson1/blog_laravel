<?php

namespace App\Http\Controllers\Post\Comment;

use App\Http\Controllers\Controller;
use App\Http\Requests\Personal\Comment\UpdateRequest;
use App\Http\Requests\Post\Comment\StoreRequest;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Termwind\Components\Dd;

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
    public function store(Post $post,StoreRequest $request){
        
        $data = $request->validated();
        
        $data['user_id'] = auth()->user()->id;
        $data['post_id'] = $post->id;
        
        Comment::create($data);
        return redirect()->route('post.show',$post->id);


    }
}

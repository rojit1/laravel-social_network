<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Post;
class CommentController extends Controller
{
    public function postComment(Request $request,$id){

        $this->validate($request,[
            'comment'=>'required'
        ]);
    	$cmnt = new Comment;
    	$cmnt->user_id=auth()->user()->id;
        $cmnt->post_id=Post::find($id)->id;
    	$cmnt->comment=$request->input('comment');
    	$cmnt->save();

    	return redirect('/posts');
    }

    public function showComment($id){
    	
    }
}

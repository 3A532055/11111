<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\CreateCommentRequest;

use App\Comment as CommentEloquent;

use Auth;
use Redirect;


class PostCommentController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function store($post_id, CreateCommentRequest $request)
    {
        $comment = new CommentEloquent($request->only('content'));
        $comment->post_id = $post_id;
        $comment->user_id = Auth::user()->id;
        $comment->save();
        return Redirect::back();
    }

    public function destroy($post_id, $comment_id)
    {
        $comment = CommentEloquent::where('post_id',$post_id)->findOrFail($comment_id);
        if(Auth::user()->isAdmin() || Auth::user()->id == $comment->user_id ){
            $comment->delete();
        }
        return Redirect::back();
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\PostRequest;

use App\Http\Requests;

use App\Post as PostEloquent;
use App\PostType as PostTypeEloquent;
use App\Comment as CommentEloquent;

use \Carbon\Carbon as Carbon;

use Auth;
use View;
use Redirect;


class PostController extends Controller
{
    public function __construct(){
        $this->middleware(['auth'], ['except' => [
            'index',
            'show'
            ]
        ]);
    }

    public function index()
    {
        $posts=PostEloquent::orderBy('created_at','DESC')->paginate(5);
        $post_types=PostTypeEloquent::orderBy('name','ASC')->get();
        return View::make('post.index',['posts'=>$posts,'post_types'=>$post_types]);
    }

    public function create()
    {
        $post_types=PostTypeEloquent::orderBy('name','ASC')->get();
        return View::make('post.create',['post_types'=>$post_types]);
    }

    public function store(PostRequest $request)
    {
        $post = new PostEloquent($request->all());
        $post->user_id = Auth::user()->id;
        $post->save();
        return Redirect::route('post.index');
    }

    public function show($id)
    {
        $post = PostEloquent::findOrFail($id);
        $comments = CommentEloquent::where('post_id',$post->id)->orderBy('created_at','DESC')->paginate(5);
        return View::make('post.show',['post'=>$post,'comments'=>$comments]);
    }

    public function edit($id)
    {
        $post = PostEloquent::findOrFail($id);
        $post_types=PostTypeEloquent::orderBy('name','ASC')->get();
        return View::make('post.edit',['post'=>$post,'post_types'=>$post_types]);
    }

    public function update(PostRequest $request, $id)
    {
        $post = PostEloquent::findOrFail($id);
        $post->fill($request->all());
        $post->save();
        return Redirect::route('post.index');
    }

    public function destroy($id)
    {
        $post=PostEloquent::findOrFail($id);
        $post->delete();
        return Redirect::route('post.index');
    }

}

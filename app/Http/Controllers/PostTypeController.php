<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\PostTypeRequest;

use App\Post as PostEloquent;
use App\PostType as PostTypeEloquent;

use View;
use Redirect;

class PostTypeController extends Controller
{
    public function __construct(){
        $this->middleware(['auth'], ['except' => ['show']]);
    }

    public function create()
    {
        return View::make('posttype.create');
    }

    public function store(PostTypeRequest $request)
    {
        PostTypeEloquent::create($request->only('name'));
        return Redirect::route('post.index');
    }

    public function show($type_id)
    {
        $type = PostTypeEloquent::findOrFail($type_id);
        $posts = PostEloquent::where('type',$type_id)->orderBy('created_at','DESC')->paginate(5);
        $post_types = PostTypeEloquent::orderBy('name','ASC')->get();
        return View::make('post.index',['posts'=>$posts,'post_types'=>$post_types,'type'=>$type]);
    }

    public function edit()
    {

    }

    public function update()
    {

    }

    public function destroy()
    {

    }
}

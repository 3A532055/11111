<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\PostRequest;

use App\Http\Requests;

use App\Post as PostEloquent;
use App\PostType as PostTypeEloquent;

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



}

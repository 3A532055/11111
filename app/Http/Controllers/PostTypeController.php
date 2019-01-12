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

    }

    public function store()
    {

    }

    public function show($id)
    {

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

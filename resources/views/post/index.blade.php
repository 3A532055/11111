@extends('layouts.master')

@section('title','所有評論')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-8">
                <h4>
                    @if(Auth::check())
                            <div class="pull-right">
                                <a class="btn btn-xs btn-default" href="{{ route('post.create') }}" style="margin-left: 20px;">
                                    <i class="glyphicon glyphicon-plus"></i>
                                    <span style="padding-left: 5px;">新增評論</span>
                                </a>
                            </div>
                    @endif

                    @if(isset($keyword))
                        搜尋：{{ $keyword }}
                    @else
                        所有評論
                    @endif
                </h4>
                <hr />
                @if(count($posts) == 0)
                    <p class="text-center">
                        沒有任何評論
                    </p>
                @endif
                @foreach ($posts as $post)
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="container-fluid" style="padding:0;">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h1 style="margin-top:0;">{{ $post->title }}</h1>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        @if($post->postType!=null)
                                            <span class="badge" style="margin-left:10px;">{{ $post->postType->name }}</span>
                                        @endif
                                    </div>
                                    <div class="col-md-4 text-right">
                                        {{ $post->created_at->toDateString() }}
                                    </div>
                                </div>
                                <hr style="margin:10px 0;" />
                                <div class="row">
                                    <div class="col-md-12" style="height:100px;overflow:hidden;">
                                        {{ $post->content }}
                                    </div>
                                </div>
                                <div class="row" style="margin-top:10px;">
                                    <div class="col-md-8">
                                        @if(Auth::check())

                                                <form method="POST" action="{{ route('post.destroy',['post'=>$post->id]) }}">

                                                    <span style="padding-left: 10px;">
                                                    <a class="btn btn-xs btn-primary" href="{{ route('post.edit',['post'=>$post->id]) }}">
                                                        <i class="glyphicon glyphicon-pencil"></i>
                                                        <span style="padding-left: 5px;">編輯文章</span>
                                                    </a>
                                                        {{ csrf_field() }}

                                                        <input type="hidden" name="_method" value="DELETE" />
                                                    <button type="submit" class="btn btn-xs btn-danger">
                                                        <i class="glyphicon glyphicon-trash"></i>
                                                        <span style="padding-left: 5px;">刪除評論</span>
                                                    </button>
                                                </span>
                                                </form>
                                         @endif
                                    </div>
                                    <div class="col-md-4">
                                        <a href="{{ route('post.show',['post'=>$post->id]) }}" class="pull-right">繼續閱讀...</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="row">
            <div class="col-xs-8">
                @if(isset($keyword))
                    {{ $posts->appends(['keyword' => $keyword])->render() }}
                @else
                    {{ $posts->render() }}
                @endif
            </div>
        </div>
    </div>
@endsection
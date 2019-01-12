@extends('layouts.master')

@section('title',$post->title)

@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="row">
                <div class="page-header">
                    <h1>
                        {{ $post->title }}
                        @if(Auth::check())
                                <div class="pull-right">
                                    <form method="POST" action="{{ route('post.destroy',['post'=>$post->id]) }}">
			                            <span style="padding-left: 10px;">
			                                {{ csrf_field() }}
                                            <input type="hidden" name="_method" value="DELETE" />
			                                <button type="submit" class="btn btn-xs btn-danger">
			                                    <i class="glyphicon glyphicon-trash"></i>
			                                    <span style="padding-left: 5px;">刪除評論</span>
			                                </button>
			                            </span>
                                    </form>
                                </div>
                                <div class="pull-right">
                                    <a class="btn btn-xs btn-primary" href="{{ route('post.edit',['post'=>$post->id]) }}">
                                        <i class="glyphicon glyphicon-pencil"></i>
                                        <span style="padding-left: 5px;">編輯評論</span>
                                    </a>
                                </div>
                        @endif
                    </h1>
                    <div class="row" style="padding-bottom:10px;">
                        <div class="col-xs-6">
                            @if($post->postType!=null)
                                <span class="badge" style="margin-left:10px;">{{ $post->postType->name }}</span>
                            @endif
                        </div>
                        <div class="col-xs-6 text-right">
                            {{ $post->created_at }}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        {{ $post->content }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
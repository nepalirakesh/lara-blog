@extends('layouts.layout')
@section('title','| Home')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="jumbotron">
                    <h1 class="d-sm-inline-block">latest post</h1>
                    <p class="lead">{{$latest_post->title}}</p>
                    <p class="lead">{{Str::limit($latest_post->body,10)}}</p>
                    <p class="lead"> Written by {{$latest_post->user->name}} at {{date('M j, Y H:m',strtotime($latest_post->created_at))}}</p>
                    <hr class="my-4">
                    <a  href="{{route('posts.show',$latest_post->id)}}"
                       role="button">Read More</a>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 mt-lg-5">
                @foreach($posts_home as $post)
                    <div class="post">
                        <h4><b>{{$post->title}}</b></h4>
                        <p>{{Str::limit($post->body,10)}}
                        </p>
                        {{--                        <form action="{{route('show_post',$post->id)}}, method="Post">--}}
                        {{--                        <button type="submit" class="btn btn-primary">Read More</button>--}}
                        {{--                        </form>--}}

                        <p><i>Written by {{$post->user->name}} at :{{date('M j, Y H:m',strtotime($post->created_at))}}</i>
                        </p>

                        <a href="{{route('posts.show',$post->id)}}">Read More</a>
                        <hr>

                    </div>
                @endforeach
                <hr>
            </div>

        </div>
        {{$posts_home->links()}}
    </div>
@endsection


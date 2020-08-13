@extends('layouts.layout')
@section('title','user_dashboard')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-4">
                <div class="post">
                    @if(count($posts)>0)
                    @foreach($posts as $post)
                        <h3>{{$post->title}}</h3>
                        <p>{{Str::limit($post->body,10)}}</p>
                        <p>{{date('M j,Y H:m',strtotime($post->created_at))}}</p>
                        <a href="{{route('posts.show',$post->id)}}" class="btn btn-group-sm btn-outline-secondary">Read
                            More</a>

                    @endforeach
                    @else
                    <h4>No post created!!!!!</h4>
                    @endif
                        <a href="{{route('posts.create')}}" class="btn btn-primary float-right">Create Post</a>
                </div>
            </div>
        </div>
    </div>
@endsection


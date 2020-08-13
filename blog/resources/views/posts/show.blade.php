@extends('layouts.layout')
@section('title','| View Post')
@section('content')

    <div class="container mt-4">
        <div class="card">
            <h5 class="card-header">{{$post->title}}</h5>
            <div class="card-body">
                <p class="card-text">{{$post->body}}</p>
                <hr>
                @if(!Auth::guest())
                    @if(Auth::user()->id ==$post->user_id)
                        <form action="{{route('posts.destroy',$post->id)}}" method="POST">
                            <a href="{{route('posts.edit',$post->id)}}" class="btn btn-success">Edit</a>
                            @csrf
                            @method('DELETE')
                            <a href="{{route('user_blog')}}" class="btn btn-success">Back</a>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    @endif
                @endif


                <a href="{{route('home')}}">Home</a>


            </div>
        </div>
    </div>


@endsection

@extends('layouts.layout')
@section('title','| Edit Blog Post')
@section('content')
    <div class="container">
        <div class="row">
            <div class="cols-md-4 mt-4">
                <form action="{{route('posts.update',$post->id)}}" method="post">
                    @method('PATCH')
                    @csrf
                    <div class="form-group">
                        <label for="title">Title:</label>
                        <input type="text" name="title" id="title" class="form-control" value="{{$post->title}}" >
                        @error('title')
                        <span class="text-danger">{{$errors->first('title')}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="body">Body:</label>
                        <input type="textarea" class="form-control" id="body" value="{{$post->body}}" name="body">
                        @error('title')
                        <span class="text-danger">{{$errors->first('title')}}</span>
                        @enderror
                    </div>

                    <a href="{{route('posts.index')}}" class="btn btn-primary" >Back</a>
                    <button type="submit" class="btn btn-success">Update</button>
                </form>
            </div>
        </div>
    </div>
@stop

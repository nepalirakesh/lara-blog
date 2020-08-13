@extends('layouts.layout')
@section('title','| Create New Post')
@section('content')

    <div class="container">
        <div class="row ">
            <div class="col-md-8 mt-4 offset-md-2">
                <h1>Create New Post</h1>
                <hr>
                <form action="{{route('posts.store')}}" method="POST">
               @csrf
                    <div class="form-group">
                        <label for="Title">Title:</label>
                        <input type="text" class="form-control" id="title"
                               placeholder="title" name="title" value="{{old('title')}}">
                       @error('title')
                        <span class="text-danger">{{$errors->first('title')}}</span>
                        @enderror
                    </div>


                   <div class="form-group">
                        <label for="body">Body:</label>
                        <textarea class="form-control" id="body" rows="3" name="body">{{old('body')}}</textarea>
                        @error('body')
                        <span class="text-success">{{$errors->first('body')}}</span>
                        @enderror
                    </div>
                    <input type="submit" class="btn btn-success">
                </form>


            </div>
        </div>
    </div>
@endsection

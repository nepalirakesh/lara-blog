@extends('layouts.layout')
@section('title','| All Posts')
@section('content')
   <div class="container">
    <div class="row mt-3">
        <div class="col-auto">
            <table class="table table-bordered">
                <thead>
                <tr class="text-center">
                    <th>SN</th>
                    <th>Title</th>
                    <th>Body</th>
                    <th>Created AT</th>
                    <th colspan="3">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($all_post as $post)
                    <tr>

                        <td>{{$loop->iteration}}</td>
                        <td>{{$post->title}}</td>
                        <td>{{Str::limit($post->body,10)}}</td>
                        <td>{{date('M j, Y H:m',strtotime($post->created_at))}}</td>
                        <form action="{{route('posts.destroy',$post->id)}}" method="POST">
                            <td><a href="{{route('posts.show',$post->id)}}" class="btn btn-sm btn-primary">Show</a></td>
                            <td><a href="{{route('posts.edit',$post->id)}}" class="btn btn-sm btn-success">Edit</a></td>
                            @csrf
                            @method('DELETE')
                           <td> <button type="submit" class="btn btn-sm btn-danger">Delete</button></td>
                        </form>

                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
   </div>
@endsection


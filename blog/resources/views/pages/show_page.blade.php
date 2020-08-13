@extends('layouts.layout')
@section('title','| post')
@section('content')
    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <h4>{{$post->title}}</h4>
            </div>
            <div class="card-body">
                <p class="card-text">{{$post->body}}</p>
                <hr>
                <a href="{{route('home')}}" class="btn btn-success">Home</a>

            </div>
        </div>
    </div>
@endsection


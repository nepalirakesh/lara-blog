<?php

namespace App\Http\Controllers;

use App\Models\Post;

use App\User;
use Illuminate\Http\Request;




class PostController extends Controller
{

    public function __construct(){
        $this->middleware('auth')->except('show');
    }
    public function index()
    {
        $all_post=Post::all();
        return view('posts.index',compact('all_post'));
    }


    public function create()
    {
        return view('posts.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'body'  => 'required'
            ]);
        //Post::create($request->all());
        $post = new Post;
        $post->title =$request->get('title');
        $post->body=$request->get('body');
        $post->user_id=auth()->user()->id;
        $post->save();


        //Session::flash('success','successfully created');


        return redirect()->route('user_blog')->with('success','successfully created');
       // return view('pages.home',compact('post',$post->id));
    }



    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show',compact('post'));
    }


    public function edit($id)
    {

       $post = Post::find($id);
       if(auth()->user()->id!==$post->user_id){
           $user=auth()->user();
            return redirect()->route('user_blog')->with('error','unauthorize route');
       }

        return view('posts.edit',compact('post'));



    }


    public function update(Request $request, $id)
    {

        $request->validate([
            'title'=>'required',
            'body'=>'required'
        ]);
        $post = Post::find($id);
        $post->title=$request->get('title');
        $post->body=$request->get('body');
        $post->save();
        return redirect()->route('user_blog')->with('error','unauthorize route');
    }



    public function destroy($id)
    {
        $post=Post::find($id);

        if(auth()->user()->id!==$post->user_id){
            $user_id=auth()->user()->id;
            $user=User::find($user_id);
            $posts=$user->posts;

            return view('pages.user_dashboard',compact('posts'))->with('error','unauthorized access');
        }
        $post->delete();
        //return "deleted";
        return redirect()->route('posts.index')->with('success','deleted successfully');



    }
}

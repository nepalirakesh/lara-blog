<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\User;

class PagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only('getUserPost');
    }

    public function getHome()
    {
        $posts_home = Post::paginate(5);
        $latest_post = Post::latest()->first();


        return view('pages.home', compact('posts_home', 'latest_post'));
    }

    public function getAbout()
    {
        $first = 'rakesh';
        $last = 'man';
        $full = $first . " " . $last;

        return view('pages.about', compact('full'));

    }

    //
    public function getContact()
    {
        $data = ['email' => 'kinarisako@gmail.com', 'phone' => 98554111];
        return view('pages.contact', compact('data'));

    }


    public function getUserPost()
    {

        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        $posts = $user->posts;

//        if (count($posts) == 0) {
//            return view('pages.user_dashboard',$posts)->with('error', 'no post created');
//
//        }
        return view('pages.user_dashboard',compact('posts'));


    }

    public function getShowPost($id)
    {
        $post = Post::find($id);
        return view('pages.show_page', compact('post'));
    }
}

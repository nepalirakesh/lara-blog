<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\Post;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $user_id= auth()->user()->id;
        $user=User::find($user_id);
        $posts=$user->posts;
        return view('pages.user_dashboard',compact('user','posts'))->with('success','welcome ');
    }
}
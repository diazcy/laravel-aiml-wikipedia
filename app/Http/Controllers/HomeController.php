<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use App\Post;
use App\Category;
use App\User;

class HomeController extends Controller
{
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('/admin.dashboard')->with('posts_count',Post::all()->count())
                                       ->with('trashed_count',Post::onlyTrashed()->get()->count())
                                       ->with('users_count',User::all()->count())
                                       ->with('tags_count',Tag::all()->count())
                                       ->with('categories_count',Category::all()->count());
    }

     public function error()
    {
      
      return view('404notFound');
    }

}

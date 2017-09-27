<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use App\Category;
use App\Post;
use App\Tag;
class FrontEndController extends Controller
{
    public function index()
    {
      $post = Post::all();
      return view ('index')
      	->with('title', Setting::first()->site_name)
      	->with('categories', Category::take(5)->get())
        ->with('posts',$post)
      	->with('first_post', Post::orderBy('created_at','desc')->first())
      	->with('second_post', Post::orderBy('created_at','desc')->skip(1)->take(1)->get()->first())
      	->with('third_post', Post::orderBy('created_at','desc')->skip(2)->take(1)->get()->first())
      	->with('javascript',Category::find(10))
      	->with('vuejs',Category::find(11))
      	->with('settings',Setting::first());
    }

    public function singlePost($slug)
    {     $post = Post::where('slug', $slug);
          $post = Post::where('slug', $slug)->first();
          $next_id = Post::where('id','>', $post->id)->min('id');
          $prev_id = Post::where('id','<', $post->id)->max('id');
          return view('single') ->with('post',$post)
            					->with('title', $post->title)
      	    					->with('categories', Category::take(5)->get())
      	    					->with('settings',Setting::first())
      	    					->with('next',Post::find($next_id))
      	    					->with('prev',Post::find($prev_id))
      	    					->with('tags',Tag::all());
    }
    public function category($id)
    {
      $category = Category::find($id);

      return view('category')->with('category',$category)
      						 ->with('title',$category->name)	
      						 ->with('categories', Category::take(5)->get())
      	    				 ->with('settings',Setting::first());
    }
    public function tag($id)
    {
      $tag = Tag::find($id);
      //dd($tag);
      if($tag === null){
         $x = Setting::all();
         //dd($x);
         return view('includes.404notFound')->with('settings',Setting::first()) ->with('categories', Category::take(5)->get());
        
      }
      return view('tag')->with('tag',$tag)
                       
      				    ->with('title',$tag->tag)	
      				    ->with('categories', Category::take(5)->get())
      	    			->with('settings',Setting::first());
    }
    public function error()
    {
      
      return view('includes.404notFound')->with('settings',Setting::first()) ->with('categories', Category::take(5)->get());
         
    }

}

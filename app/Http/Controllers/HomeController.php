<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Post::latest()->take(6)->get();
        return view('home', compact('posts'));
    }
    public function post()
    {
        $posts = Post::latest()->paginate(2);
        $latestpost = Post::latest()->take(3)->get();
        $categories = Category::take(10)->get();
        $tags = Tag::all();
        return view('posts', compact('posts','categories','latestpost','tags'));
    }
    public function singlepost($slug)
    {
        $post = Post::where('slug', $slug)->first();
        $posts = Post::latest()->take(3)->get();
        $categories = Category::take(10)->get();
        $tags = Tag::all();
        return view('singlepost', compact('post','categories','posts','tags'));
    }
    public function categories()
    {
        $categories = Category::all();
        
        return view('categories', compact('categories'));
    }

}

<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $posts = Post::latest()->take(6)->published()->get();
        $feature = Post::take(3)->get();
        return view('home', compact('posts','feature'));
    }
    public function post()
    {
        $posts = Post::latest()->published()->paginate(2);
        $latestpost = Post::latest()->take(3)->published()->get();
        $categories = Category::take(10)->get();
        $tags = Tag::all();
        return view('posts', compact('posts','categories','latestpost','tags'));
    }
    public function singlepost($slug)
    {
        $post = Post::where('slug', $slug)->first();
        $latestpost = Post::latest()->take(3)->published()->get();
        $categories = Category::take(10)->get();
        $tags = Tag::all();
        // $posts = Post::latest()->take(3)->published()->get();
        // Increase View count
        $postKey = 'post_'.$post->id;
        if(!Session::has($postKey)){
            $post->increment('view_count');
            Session::put($postKey, 1);
        }
        return view('singlepost', compact('post','categories','latestpost','tags'));
    }
    public function categories()
    {
        $categories = Category::all();
        
        return view('categories', compact('categories'));
    }
    public function categoryPost($slug)
    {
        $category = Category::where('slug', $slug)->first();
        $posts = $category->posts()->published()->paginate(10);

        return view('categoryPost', compact('posts'));
    }
    public function search(Request $request)
    {
        $this->validate($request, ['search' => 'required|max:255']);
        $search = $request->search;
        $posts = Post::where('title', 'like', "%$search%")->paginate(10);
        $posts->appends(['search' => $search]);
        return view('search', compact('posts', 'search'));
    }
    public function likePost($post){
        // Check if user already liked the post or not
        $user = Auth::user();
        $likePost = $user->likedPosts()->where('post_id', $post)->count();
        if($likePost == 0){
            $user->likedPosts()->attach($post);
        } else{
            $user->likedPosts()->detach($post);
        }
        return redirect()->back();
    }
   

}

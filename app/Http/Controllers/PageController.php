<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\Reply;
use App\Comment;
use App\Category;
use App\Tag;

class PageController extends Controller
{
    public function index(){
        $posts = Post::orderBy('title', 'asc')->get();
        $my_posts = Post::orderBy('id', 'desc')->get();
        $bottom_posts = Post::orderBy('id', 'desc')->get();
        $categories = Category::all();
        $other_posts = Post::orderBy('title', 'asc')->paginate(10);
        $tags = Tag::all();
        return view('pages.index',[
            'posts' => $posts,
            'my_posts' => $my_posts,
            'bottom_posts' => $bottom_posts,
            'categories' => $categories,
            'other_posts' => $other_posts,
            'tags' => $tags
        ]);
    }

    public function single($slug){
        $posts = Post::where('slug', '=', $slug)->first();
        $my_posts = Post::orderBy('id', 'asc')->get();
        $tags = Tag::all();
        return view('pages.single',[
            'posts' => $posts,
            'my_posts' => $my_posts,
            'tags' => $tags
        ]);
    }

    public function health(){
        $posts = Post::orderBy('id', 'desc')->paginate(16);
        $categories = Category::all();
        return view('pages.health',[
            'posts' => $posts,
            'categories' => $categories
        ]);
    }
    public function people(){
        $posts = Post::orderBy('id', 'asc')->paginate(16);
        $categories = Category::all();
        return view('pages.people',[
            'posts' => $posts,
            'categories' => $categories
        ]);
    }
    public function lifestyle(){
        $posts = Post::orderBy('title', 'desc')->paginate(16);
        $categories = Category::all();
        return view('pages.lifestyle',[
            'posts' => $posts,
            'categories' => $categories
        ]);
    }
    public function petroleum(){
        return view('pages.petroleum');
    }
    public function science(){
        return view('pages.science');
    }
    public function foreign(){
        return view('pages.foreign');
    }
    public function companies(){
        return view('pages.companies');
    }
    public function journalism(){
        return view('pages.journalism');
    }
    public function housing(){
        return view('pages.housing');
    }
    public function logistics(){
        return view('pages.logistics');
    }
    public function automobile(){
        return view('pages.automobile');
    }
    public function programming(){
        return view('pages.programming');
    }
    public function happenings(){
        return view('pages.happenings');
    }
    public function technology(){
        return view('pages.technology');
    }
    public function entertainment(){
        return view('pages.entertainment');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\Reply;
use App\Comment;
use App\Category;
use App\Tag;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        $posts = Post::all();
        $categories = Category::all();
        $tags = Tag::all();
        return view('dashboard.index',[
            'user' => $user->post,
            'posts'=> $posts,
            'categories' => $categories,
            'tags' => $tags
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required|max:255',
            'slug' => 'required|max:255|alpha_dash',
            'category_id' => 'required|integer',
            'content' => 'required|min:20',
            'image' => 'image|nullable|max:2000'
        ]);
        if($request->hasFile('image')){
            $imageNameWithExt = $request->file('image')->getClientOriginalName();
            $imageName = pathinfo($imageNameWithExt, PATHINFO_FILENAME);
            $imageExtension = $request->file('image')->getClientOriginalExtension();
            $imageFullName = $imageName.'_'.time().'.'.$imageExtension;
            $location = $request->file('image')->storeAs('public/blog_images', $imageFullName);
        }
        else{
            $imageFullName = 'no_image.jpg';
        }

        $posts = new Post;
        $posts->title = $request->input('title');
        $posts->slug = $request->input('slug');
        $posts->category_id = $request->input('category_id');
        $posts->content = $request->input('content');
        $posts->image = $imageFullName;
        $posts->user_id = auth()->user()->id;
        $posts->save();
        $posts->tags()->sync($request->tags, false);

        return redirect()->route('dashboard.index')->withSuccess('Article has successfully been created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $posts = Post::find($id);

        if(auth()->user()->id !== $posts->user_id){
            return redirect()->route('dashboard.index')->withError('You do not have access to this file');
        }
        $categories = Category::all();
        $category_array = [];
        foreach($categories as $category){
            $category_array[$category->id] = $category->name;
        }

        $tags = Tag::all();
        $tag_array = [];
        foreach($tags as $tag){
            $tag_array[$tag->id] = $tag->name;
        }

        return view('dashboard.show',[
            'posts' => $posts,
            'categories' => $category_array,
            'tags' => $tag_array
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $posts = Post::find($id);
        if($request->input('slug') == $posts->slug){
            $this->validate($request,[
                'title' => 'required|max:255',
                'category_id' => 'required|integer',
                'content' => 'required|min:20',
                'image' => 'image|nullable|max:2000'
            ]);
        }
        else{
            $this->validate($request,[
                'title' => 'required|max:255',
                'slug' => 'required|max:255|alpha_dash|unique:post, slug',
                'category_id' => 'required|integer',
                'content' => 'required|min:20',
                'image' => 'image|nullable|max:2000'
            ]);
        }

        if($request->hasFile('image')){
            $imageNameWithExt = $request->file('image')->getClientOriginalName();
            $imageName = pathinfo($imageNameWithExt, PATHINFO_FILENAME);
            $imageExtension = $request->file('image')->getClientOriginalExtension();
            $imageFullName = $imageName.'_'.time().'.'.$imageExtension;
            $location = $request->file('image')->storeAs('public/blog_images', $imageFullName);
        }

        $posts = Post::find($id);
        $posts->title = $request->input('title');
        $posts->slug = $request->input('slug');
        $posts->category_id = $request->input('category_id');
        $posts->content = $request->input('content');
        if($request->hasFile('image')){
            $posts->image = $imageFullName;
        }
        $posts->user_id = auth()->user()->id;
        $posts->save();

        if(isset($request->tags)){
            $posts->tags()->sync($request->tags);
        }
        else{
            $posts->tags()->sync([]);
        }

        return redirect()->route('dashboard.show', $posts->id)->withSuccess('Article has successfully been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $posts = Post::find($id);
        if(auth()->user()->id !== $posts->user_id){
            return redirect()->route('dashboard.index')->withError('You do not have access to this file');
        }
        if(auth()->user()->id !== $posts->user_id){
            return redirect()->route('dashboard.index')->withError('You have no access to this file');
        }

        $posts->tags->detach();

        if($posts->image !== 'no_image.jpg'){
            Storage::delete('public/blog_images', $posts->image);
        }

        $posts->delete();
        return redirect()->route('dashboard.index', $posts->id)->withSuccess('Article has successfully been updated');
    }
}

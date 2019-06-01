<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\Reply;
use App\Comment;
use App\Category;
use App\Tag;
use App\Http\Requests\StoreFormValidation;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(StoreFormValidation $request, $post_id)
    {


        $posts = Post::find($post_id);

        $comments = new Comment;
        $comments->name = $request->input('name');
        $comments->email = $request->input('email');
        $comments->comment = $request->input('comment');
        $comments->approved = true;
        $comments->post()->associate($posts);
        $comments->save();

        return redirect()->route('index.single', $posts->slug)->withSuccess('Comment received');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $this->validate($request, [
            'comment' => 'required|max:255'
        ]);
        $comments = Comment::find($id);
        $comments->comment = $request->input('comment');
        $comments->save();

        return redirect()->route('index.single', $comments->post->slug)->withSuccess('Comment updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comments = Comment::find($id);
        $post_id = $comments->post->id;
        $comments->delete();

        return redirect()->route('index.single', $comments->post->slug)->withSuccess('Comment deleted successfully');
    }
}

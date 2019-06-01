@extends('layouts.app')

@section('content')
    <div class="row justify-content-center" id="wrapper single_wrapper">
        <div class="col-md-7">
            <div class="row">
                <div class="col-md-12 my-tags-col">
                    {{-- {{ dd($posts->tags) }} --}}
                    @foreach ($posts->tags as $tag)
                    <span class="category"><a href="{{ route('tag.show', $tag->id) }}">{{ $tag->name }}</a></span>&emsp;<span class="dot"></span>&emsp;
                    @endforeach
                </div>
                <div class="col-md-12"><hr></div>
                <div class="col-md-8 text-justify">
                    <h3>{{ ucfirst($posts->title) }}</h3>
                    <span class="category"><a href="{{ route('category.show', $posts->category->id) }}">{{ $posts->category->name }}</a></span> <span class="dot"></span> <span class="author">{{ $posts->user->name }}</span>
                    <p>{!! str_limit($posts->content, 300) !!}</p>
                    <img src="/storage/blog_images/{{ $posts->image }}" width="100%" alt="">
                    <small class="image_name" style="float: right;font-style:italic;color:#999;">{{ date('M j, Y H:i a', strtotime($posts->created_at)) }}</small><hr>
                    <p>{!! $posts->content !!}</p>
                </div>
                <div class="col-md-4">
                    <h3>People Are Reading</h3><hr>
                    <ol class="other_read">
                        @foreach ($my_posts->take(10) as $post)
                            <li><a href="{{ url('blogs/'.$post->slug) }}">{!! str_limit($post->content, 70) !!}</a></li>
                        @endforeach
                    </ol>
                </div>
            </div>
            <div class="col-md-12">
                <p>
                    <button class="btn btn-outline-primary btn-md" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                        Leave a comment
                    </button>
                </p>
                <div class="collapse" id="collapseExample" style="margin-bottom: 20px;">
                    <div class="card card-body">
                        {!! Form::open(['action' => ['CommentController@store', $posts->id], 'method' => 'POST', 'data-parsley-validate' => '']) !!}
                            <div class="form-group">
                                {{ form::label('name', 'Name') }}
                                {{ form::text('name', '', ['class' => 'form-control', 'required' => '', 'placeholder' => 'Enter a name here']) }}
                            </div>
                            <div class="form-group">
                                {{form::label('email', 'Email')}}
                                {{ form::text('email', '', ['class' => 'form-control', 'required' => '', 'placeholder' => 'Enter and email here']) }}
                            </div>
                            <div class="form-group">
                                {{ form::label('comment', 'Comment') }}
                                {{ form::textarea('comment', '', ['class' => 'form-control', 'required' => '', 'rows' => '2']) }}
                            </div>
                            {{ form::submit('Submit Comment', ['class' => 'btn btn-md btn-outline-primary']) }}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <p>
                    <a href="" data-toggle="collapse" data-target="#my_collapseExample" aria-expanded="false" aria-controls="collapseExample"><h3>All Comments</h3></a>
                </p>
                <div class="collapse" id="my_collapseExample" style="margin-bottom: 20px;">
                    <div class="card card-body">
                        <span>{{ $posts->comment()->count() }} Comments</span>
                        @foreach ($posts->comment as $comment)
                            <div class="comments">
                                <div class="general-info">
                                    <div class="author-info">
                                        <div class="author-image">
                                            <img src="" alt="">
                                        </div>
                                        <div class="author-name">
                                            <h4>{{$comment->name}}</h4>
                                            <p class="author-time">{{date('j / m / Y   h:i a', strtotime($comment->created_at))}}</p>
                                        </div>
                                    </div>
                                    <div class="comment-content">
                                        <p>{{$comment->comment}}</p>
                                        <a href="" class="btn btn-outline-success btn-sm" data-toggle="collapse" data-target="#reply_collapseExample" aria-expanded="false" aria-controls="collapseExample">Reply</a>
                                        <a href="" class="btn btn-outline-primary btn-sm"  data-toggle="collapse" data-target="#edit_collapseExample" aria-expanded="false" aria-controls="collapseExample">Edit</a>
                                        <a href="" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#delete_exampleModal">Delete</a>
                                        <!-- Modal -->
                                        <div class="modal fade" id="delete_exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Delete Comment</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Are you sure you want to delete this comment?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        {!! Form::open(['action' => ['CommentController@destroy', $comment->id], 'method' => 'DELETE']) !!}
                                                            {{ form::submit('Delete', ['class' => 'btn btn-outline-primary btn-md']) }}
                                                        {!! Form::close() !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="collapse" id="edit_collapseExample" style="margin-bottom: 20px;">
                                            <div class="card card-body">
                                                {!! Form::open(['action' => ['CommentController@update', $comment->id], 'method' => 'PUT', 'data-parsley-validate' => '']) !!}
                                                    <div class="form-group">
                                                        {{ form::label('comment', 'Comment') }}
                                                        {{ form::textarea('comment', $comment->comment, ['class' => 'form-control', 'required' => '', 'rows' => '2']) }}
                                                    </div>
                                                    {{ form::submit('Update Comment', ['class' => 'btn btn-md btn-outline-primary']) }}
                                                {!! Form::close() !!}
                                            </div>
                                        </div>
                                        <div class="collapse" id="reply_collapseExample" style="margin-bottom: 20px;">
                                            <div class="card card-body">
                                                {!! Form::open(['action' => ['ReplyController@store', $comment->id], 'method' => 'POST', 'data-parsley-validate' => '']) !!}
                                                    <div class="form-group">
                                                        {{ form::label('name', 'Name') }}
                                                        {{ form::text('name', '', ['class' => 'form-control', 'required' => '', 'placeholder' => 'Enter a name here']) }}
                                                    </div>
                                                    <div class="form-group">
                                                        {{form::label('email', 'Email')}}
                                                        {{ form::text('email', '', ['class' => 'form-control', 'required' => '', 'placeholder' => 'Enter and email here']) }}
                                                    </div>
                                                    <div class="form-group">
                                                        {{ form::label('reply', 'Comment') }}
                                                        {{ form::textarea('reply', '', ['class' => 'form-control', 'required' => '', 'rows' => '2']) }}
                                                    </div>
                                                    {{ form::submit('Submit Comment', ['class' => 'btn btn-md btn-outline-primary']) }}
                                                {!! Form::close() !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


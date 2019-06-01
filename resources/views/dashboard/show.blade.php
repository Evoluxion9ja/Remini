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
                    <div class="row">
                        <div class="col-md-6">
                            Created On <br>
                            {{ date('M j, Y H:i a', strtotime($posts->created_at)) }}
                        </div>
                        <div class="col-md-6">
                            Updated On <br>
                            {{ date('M j, Y H:i a', strtotime($posts->updated_at)) }}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary btn-md btn-block" data-toggle="modal" data-target="#exampleModalLong">
                                Edit Blog
                            </button>
                            {!! Form::open(['action' => ['PostController@update', $posts->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data', 'data-parsley-validate' => '']) !!}
                                @section('stylesheets')
                                    {{ Html::style('css/select2.min.css') }}
                                @endsection
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Update Blog</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    {{ form::label('title', 'Article Title') }}
                                                    {{ form::text('title', $posts->title, ['class' => 'form-control', 'required' => '', 'minLength' => '5', 'maxLength' => '255']) }}
                                                </div>
                                                <div class="form-group">
                                                    {{ form::label('slug', 'Article Slug') }}
                                                    {{ form::text('slug', $posts->slug, ['class' => 'form-control', 'required' => '', 'minLength' => '5', 'maxLength' => '255']) }}
                                                </div>
                                                <div class="form-group">
                                                    {{ form::label('category_id', 'Category') }}
                                                    {{ form::select('category_id', $categories, $posts->category->id,['class' => 'form-control form-control custom-slelct']) }}
                                                </div>
                                                <div class="form-group">
                                                    {{ form::label('tags', 'Blog Tags') }}
                                                    {{ form::select('tags[]', $tags, $posts->tags, ['class' => 'form-control custom-slelct select2-multi', 'multiple' => 'multiple']) }}
                                                </div>
                                                <div class="form-group">
                                                    {{ form::label('content', 'Blog Content') }}
                                                    {{ form::textarea('content', $posts->content, ['class' => 'form-control', 'required' => '', 'id' => 'article-ckeditor']) }}
                                                </div>
                                                <div class="form-group">
                                                    {{ form::label('image', 'Blog Image') }}
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="image" name="image">Upload</span>
                                                        </div>
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" id="image" name="image" aria-describedby="inputGroupFileAddon01">
                                                            <label class="custom-file-label" for="image">Choose Image</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                {{ form::submit('Update Blog', ['class' => 'btn btn-outline-primary btn-md']) }}
                                                <button type="button" class="btn btn-outline-danger btn-md" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @section('javascripts')
                                    {{ Html::script('js/select2.min.js') }}
                                    <script type="text/javascript">
                                        $(document).ready(function(){
                                            $('.select2-multi').select2();
                                        });
                                    </script>
                                @endsection
                            {!! Form::close() !!}
                        </div>
                        <div class="col-md-6">
                            {!! Form::open(['action' => ['PostController@destroy',$posts->id], 'method' => 'DELETE']) !!}
                                {{ form::submit('Delete', ['class' => 'btn btn-danger btn-block btn-md']) }}
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


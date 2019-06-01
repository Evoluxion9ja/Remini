@extends('layouts.app')

@section('content')
    <div class="row justify-content-center" id="wrapper">
        <div class="col-md-8 my-column ">
            <div class="row">
                <div class="col-md-5">
                    <h1>All Articles</h1>
                </div>
                <div class="col-md-7">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-outline-primary btn-md btn-block" data-toggle="modal" data-target="#exampleModalLong">
                        Start Blogging
                    </button>
                    {!! Form::open(['action' => 'PostController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'data-parsley-validate' => '']) !!}
                        @section('stylesheets')
                            {{ Html::style('css/select2.min.css') }}
                        @endsection
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Create A Blog</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            {{ form::label('title', 'Article Title') }}
                                            {{ form::text('title', '', ['class' => 'form-control', 'required' => '', 'minLength' => '5', 'maxLength' => '255']) }}
                                        </div>
                                        <div class="form-group">
                                            {{ form::label('slug', 'Article Slug') }}
                                            {{ form::text('slug', '', ['class' => 'form-control', 'required' => '', 'minLength' => '5', 'maxLength' => '255']) }}
                                        </div>
                                        <div class="form-group">
                                            {{ form::label('category_id', 'Category') }}
                                            <select name="category_id" id="category_id" class="custom-select">
                                                <option value="Selct-one">Choose Category</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            {{ form::label('tags', 'Blog Tags') }}
                                            <select name="tags[]" id="tags[]" class="custom-select select2-multi" multiple="multiple" style="width: 100%">
                                                @foreach ($tags as $tag)
                                                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            {{ form::label('content', 'Blog Content') }}
                                            {{ form::textarea('content', '', ['class' => 'form-control', 'required' => '', 'id' => 'article-ckeditor']) }}
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
                                        {{ form::submit('Publish Blog', ['class' => 'btn btn-outline-primary btn-md']) }}
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
            </div>
        </div>
        <div class="col-md-12"><hr></div>
        <div class="col-md-10">
            <table class="table table-bordered table-light">
                <thead>
                    <th><small><strong>#</strong></small></th>
                    <th><small><strong>Post Title</strong></small></th>
                    <th><small><strong>Category</strong></small></th>
                    <th><small><strong>Created At</strong></small></th>
                    <th><small><strong>Actions</strong></small></th>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td><small><strong>{{ $post->id }}</strong></small></td>
                            <td><small>{{ $post->title }}</small></td>
                            <td><small>{{ $post->category->name }}</small></td>
                            <td><small>{{ date('M j, Y H:i a', strtotime($post->created_at)) }}</small></td>
                            <td>
                                <a href="{{ route('dashboard.show', $post->id) }}">Details</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

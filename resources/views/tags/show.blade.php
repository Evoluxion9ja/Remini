@extends('layouts.app')
@section('content')
    <div class="row justify-content-center" id="wrapper">
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-4">
                    <h1 class="cat-head">{{ $tags->name }}</h1>
                    <span>{{ $tags->post()->count() }}Articles</span>
                </div>
                <div class="col-md-8 my-column">
                    <a href="" class="btn btn-outline-primary btn-md btn-block" data-toggle="modal" data-target="#exampleModal">Modify</a>
                    {!! Form::open(['action' => ['TagController@update', $tags->id], 'method' => 'PUT', 'data-parsley-validate' => '']) !!}
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Update Tag</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        {{ form::text('name', $tags->name, ['class' => 'form-control', 'required' => '']) }}
                                        {{ form::submit('Update', ['class' => 'btn btn-primary btn-md button']) }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="row">
                @foreach ($tags->post as $post)
                    <div class="col-md-3">
                        $post->title
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

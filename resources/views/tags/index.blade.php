@extends('layouts.app')

@section('content')
    <div class="row justify-content-center" id="wrapper">
       <div class="col-md-10">
           <div class="row justify-content-center">
               <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-4">
                            <h1 class="cat-head">All Blog Tags</h1>
                        </div>
                        <div class="col-md-8 my-column">
                                {!! Form::open(['action' => 'TagController@store', 'method' => 'POST', 'data-parsley-validate']) !!}
                                    {{ form::text('name', '', ['class' => 'form-control', 'required' => '', 'placeholder' => 'Create new Category']) }}
                                    {{ form::submit('Create', ['class' => 'btn btn-primary btn-md button']) }}
                                {!! Form::close() !!}
                        </div>
                    </div>
               </div>
           </div>
       </div>
       @foreach ($my_tags as $my_tag)
            <div class="col-md-2 category-cols">
                <h6><small>{{ strtoupper($my_tag->name) }}</small></h6>
                <hr>
                <p>{{ $my_tag->post()->count() }} <small><strong>Articles</strong></small></p>
                <span>
                    <a href="{{ route('tag.show', $my_tag->id) }}" class="btn btn-sm btn-outline-light">Details</a>
                    <a href="" class="btn btn-sm btn-outline-light" data-toggle="modal" data-target="#exampleModal">Delete</a>
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog my-dialog" role="document">
                            <div class="modal-content my-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">{{ $my_tag->name }}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <span>Are you sure you want to delete this tag?</span>
                                    <div class="modal-footer">
                                        {{ Html::linkRoute('tag.index', 'Cancel', [], ['class' => 'btn btn-outline-success btn-md', 'data-dismiss' => 'modal']) }}
                                        {!! Form::open(['action' => ['TagController@destroy', $my_tag->id], 'method' => 'DELETE']) !!}
                                            {{ form::submit('Delete', ['class' => 'btn btn-outline-danger btn-md']) }}
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </span>
            </div>
        @endforeach
        <div class="col-md-12">
            <p>{{ $my_tags->links() }}</p>
        </div>
    </div>
@endsection

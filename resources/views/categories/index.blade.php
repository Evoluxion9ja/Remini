@extends('layouts.app')

@section('content')
    <div class="row justify-content-center" id="wrapper">
       <div class="col-md-10">
           <div class="row justify-content-center">
               <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-4">
                            <h1 class="cat-head">Categories</h1>
                        </div>
                        <div class="col-md-8 my-column">
                                {!! Form::open(['action' => 'CategoryController@store', 'method' => 'POST', 'data-parsley-validate']) !!}
                                    {{ form::text('name', '', ['class' => 'form-control', 'required' => '', 'placeholder' => 'Create new Category']) }}
                                    {{ form::submit('Create', ['class' => 'btn btn-primary btn-md button']) }}
                                {!! Form::close() !!}
                        </div>
                    </div>
               </div>
           </div>
       </div>
       @foreach ($my_categories as $category)
            <div class="col-md-2 category-cols">
                <h6><small>{{ strtoupper($category->name) }}</small></h6>
                <hr>
                <p>{{ $category->post()->count() }} <small><strong>Articles</strong></small></p>
                <span>
                    <a href="{{ url('categories/'.$category->id) }}" class="btn btn-sm btn-outline-light">Details</a>
                    <a href="" class="btn btn-sm btn-outline-light" data-toggle="modal" data-target="#exampleModal">Delete</a>
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog my-dialog" role="document">
                            <div class="modal-content my-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">{{ $category->name }}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <span>Are you sure you want to delete the category?</span>
                                    <div class="modal-footer">
                                        {{ Html::linkRoute('category.index', 'Cancel', [], ['class' => 'btn btn-outline-success btn-md', 'data-dismiss' => 'modal']) }}
                                        {!! Form::open(['action' => ['CategoryController@destroy', $category->id], 'method' => 'DELETE']) !!}
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
    </div>
    <div class="row justify-content-center" id="wrapper">
        <div class="col-md-10">{{ $my_categories->links() }}</div>
    </div>
@endsection

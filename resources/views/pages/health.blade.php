@extends('layouts.app')

@section('content')
    <div class="row justify-content-center" id="wrapper">
        <div class="col-md-10 health-column" style="margin-bottom: 20px;">
            <h1 class="text-center">{{ __('Health') }}</h1>
            <h5 class="filter-container" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">FILTER BY &Downarrow;</h5>
            <div class="collapse" id="collapseExample">
                <div class="card card-body category-collapse">
                    <div class="row">
                        @foreach ($categories->slice(10, 15) as $category)
                            <div class="col-md-4">
                                <h5><a href="{{ url('categories/'.$category->id) }}">{{ ucfirst($category->name) }}</a></h5>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-10">
            <div class="row">
                @foreach ($posts as $post)
                    <div class="col-md-3 page-column">
                        <figure class="page-figure text-center">
                            <img src="/storage/blog_images/{{ $post->image }}" width="100%" alt="">
                            <figcaption class="text-center page-captions">
                                <a href="{{ url('blogs/'.$post->slug) }}"><h5>{!! str_limit($post->content,50 ) !!}</h5></a>
                            </figcaption>
                            <span class="category"><a href="{{ route('category.show', $post->category->id) }}">{{ $post->category->name }}</a></span>
                        </figure>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

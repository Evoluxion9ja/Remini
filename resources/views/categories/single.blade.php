@extends('layouts.app')

@section('content')
    <div class="row justify-content-center" id="wrapper">
        <div class="col-md-10 health-column">
            <h1 class="text-center">{{ $categories->name }}</h1>
            <h5 class="filter-container" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">FILTER BY &Downarrow;</h5>
            <div class="collapse" id="collapseExample">
                <div class="card card-body category-collapse">
                    <div class="row">
                        @foreach ($my_categories as $category)
                            <div class="col-md-4">
                                <h5><a href="{{ url('categories/'.$category->name)}}">{{ ucfirst($category->name) }}</a></h5>
                            </div>
                        @endforeach
                    </div>
                    {{ $my_categories->links() }}
                </div>
            </div>
        </div>
        <div class="col-md-10">
            <div class="row">
                @foreach ($categories->post as $post)
                    <div class="col-md-3 page-column">
                        <figure class="page-figure text-center">
                            <img src="/storage/blog_images/{{ $post->image }}" width="100%" alt="">
                            <figcaption class="text-center page-captions">
                                <a href="{{ url('blogs/'.$post->slug) }}"><h5>{!! str_limit($post->content,50 ) !!}</h5></a>
                            </figcaption>
                        </figure>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="col-md-10">
        
    </div>
@endsection

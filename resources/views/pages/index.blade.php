@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            @section('stylesheets')
                {{ Html::style('engine1/style.css') }}
            @endsection
            <!-- Start WOWSlider.com BODY section -->
            <div id="wowslider-container1">
                <div class="ws_images"><ul>
                    @foreach ($posts as $post)
                    <li><a href="#" target="_self"><img src="/storage/blog_images/{{ $post->image }}" alt="" title="{{ str_limit($post->content, 100) }}" id="wows1_0"/></a></li>
                    @endforeach
                        /*<li><a href="#" target="_self"><img src="data1/images/33.jpg" alt="It was popularised in the 1960s with the release of Letraset sheets" title="It was popularised in the 1960s with the release of Letraset sheets" id="wows1_0"/></a></li>
                        <li><img src="data1/images/36.jpg" alt="It was popularised in the 1960s with the release of Letraset sheets" title="It was popularised in the 1960s with the release of Letraset sheets" id="wows1_1"/></li>
                        <li><img src="data1/images/37.jpg" alt="It was popularised in the 1960s with the release of Letraset sheets" title="It was popularised in the 1960s with the release of Letraset sheets" id="wows1_2"/></li>
                        <li><img src="data1/images/53.jpg" alt="It was popularised in the 1960s with the release of Letraset sheets" title="It was popularised in the 1960s with the release of Letraset sheets" id="wows1_3"/></li>
                        <li><img src="data1/images/62.jpg" alt="It was popularised in the 1960s with the release of Letraset sheets" title="It was popularised in the 1960s with the release of Letraset sheets" id="wows1_4"/></li>
                        <li><a href="http://wowslider.net" target="_self"><img src="data1/images/66.jpg" alt="javascript slideshow" title="It was popularised in the 1960s with the release of Letraset sheets" id="wows1_5"/></a></li>
                        <li><img src="data1/images/78.jpg" alt="It was popularised in the 1960s with the release of Letraset sheets" title="It was popularised in the 1960s with the release of Letraset sheets" id="wows1_6"/></li>*/
                    </ul></div>
                    <div class="ws_bullets"><div>
                        <a href="#" title="It was popularised in the 1960s with the release of Letraset sheets"><span><img src="data1/tooltips/33.jpg" alt="It was popularised in the 1960s with the release of Letraset sheets"/>1</span></a>
                        <a href="#" title="It was popularised in the 1960s with the release of Letraset sheets"><span><img src="data1/tooltips/36.jpg" alt="It was popularised in the 1960s with the release of Letraset sheets"/>2</span></a>
                        <a href="#" title="It was popularised in the 1960s with the release of Letraset sheets"><span><img src="data1/tooltips/37.jpg" alt="It was popularised in the 1960s with the release of Letraset sheets"/>3</span></a>
                        <a href="#" title="It was popularised in the 1960s with the release of Letraset sheets"><span><img src="data1/tooltips/53.jpg" alt="It was popularised in the 1960s with the release of Letraset sheets"/>4</span></a>
                        <a href="#" title="It was popularised in the 1960s with the release of Letraset sheets"><span><img src="data1/tooltips/62.jpg" alt="It was popularised in the 1960s with the release of Letraset sheets"/>5</span></a>
                        <a href="#" title="It was popularised in the 1960s with the release of Letraset sheets"><span><img src="data1/tooltips/66.jpg" alt="It was popularised in the 1960s with the release of Letraset sheets"/>6</span></a>
                        <a href="#" title="It was popularised in the 1960s with the release of Letraset sheets"><span><img src="data1/tooltips/78.jpg" alt="It was popularised in the 1960s with the release of Letraset sheets"/>7</span></a>
                    </div>
                </div>
                <div class="ws_script" style="position:absolute;left:-99%"><a href="http://wowslider.net">css image slider</a> by WOWSlider.com v8.8</div>
                <div class="ws_shadow"></div>
            </div>
            <script type="text/javascript" src="engine1/wowslider.js"></script>
            <script type="text/javascript" src="engine1/script.js"></script>
            <!-- End WOWSlider.com BODY section -->
            @section('javascripts')
                {{ Html::script('engine1/jquery.js') }}
            @endsection
        </div>
    </div>
    <div class="row" id="wrapper">
        <div class="col-md-12">
                <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="row inner-row">
                                @foreach ($posts->take(2) as $post)
                                    <div class="col-md-6 inner-col">
                                        <figure>
                                            <a href="{{ url('blogs/'.$post->slug) }}"><img src="/storage/blog_images/{{ $post->image }}" width="100%" alt="" style="margin-bottom:15px;"></a>
                                            <figcaption class="text-center first-fig">
                                                <a href="{{ url('blogs/'.$post->slug) }}"><p>{{ $post->title }}</p></a>
                                                <span class="category"><a href="{{ route('category.show', $post->category->id) }}">{{ $post->category->name }}</a></span> <span class="dot"></span> <span class="author">{{ $post->user->name }}</span>
                                            <figcaption>
                                        </figure>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="row second-row justify-content-center">
                        <div class="col-md-7">
                            @foreach ($my_posts->take(2) as $my_post)
                                <div class="row inner-row" style="margin-bottom:20px;">
                                    <div class="col-6 second-inner-col">
                                        <figure>
                                            <a href="{{ url('blogs/'.$post->slug) }}"><img src="/storage/blog_images/{{ $my_post->image }}" width="100%" alt=""></a>
                                        </figure>
                                    </div>
                                    <div class="col-6 second-inner-col">
                                        <figure class="centered-figure text-center">
                                            <a href="{{ url('blogs/'.$post->slug) }}"><p class="upper-text" style="font-size: 14px;line-height:13px;"> <h3>{!! str_limit($my_post->content, 50) !!}</h3> </p></a>
                                            <span class="category"><a href="{{ route('category.show', $my_post->category->id) }}">{{ $my_post->category->name }}</a></span> <span class="dot"></span> <span class="author">{{ $my_post->user->name }}</span>
                                            <a href="{{ url('blogs/'.$post->slug) }}" class="lower-text text-justify"><p class="">{!! str_limit($post->content, 150) !!}</p></a>
                                        </figure>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="row third-row justify-content-center">
                        <div class="col-md-8">
                            <div class="row">
                                @foreach ($bottom_posts->slice(2,4) as $post)
                                    <div class="col-md-3  third-col">
                                        <figure class="third-figure">
                                            <a href="{{ url('blogs/'.$post->slug) }}"><img src="/storage/blog_images/{{ $post->image }}" width="100%" alt=""></a>
                                        </figure>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="row category-row forth-row justify-content-center">
                        <div class="col-md-10 major-cat-bg">
                            <div class="row">
                                @foreach ($categories as $category)
                                    <div class="col-md-12"><hr>
                                        <h3>{{ $category->name }}</h3>
                                        <div class="row">
                                            @foreach ($category->post as $post)
                                                <div class="col-md-2 category-small">
                                                    <figure class="cate-fig">
                                                        <a href="{{ url('blogs/'.$post->slug) }}"><img src="/storage/blog_images/{{ $post->image }}" width="100%" alt=""></a>
                                                        <figcaption class="text-justify" style="font-size:13px;line-height:15px;">
                                                            <a href="{{ url('blogs/'.$post->slug) }}"><p class="minor">{!! str_limit($post->content, 50) !!}</p></a>
                                                            <span class="category-minor"><a href="">{{ $post->category->name }}</a></span> <span class="dot-minor"></span> <span class="author-minor">{{ $post->user->name }}</span>
                                                        </figcaption>
                                                    </figure>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="row fifth-row justify-content-center">
                        <div class="col-md-12 text-center">
                            <h4>More Stories</h4>
                        </div>
                        <div class="col-md-8 more-stories">
                            <div class="row">
                                @foreach ($other_posts as $other_post)
                                    <div class="col-md-3 fifth-col">
                                        <figure>
                                            <a href="{{ url('blogs/'.$post->slug) }}"><img src="/storage/blog_images/{{ $other_post->image }}" width="100%" alt=""></a>
                                            <figcaption class="text-justify" style="font-size:13px;line-height:15px;">
                                                <a href="{{ url('blogs/'.$post->slug) }}"><p class="minor">{!! str_limit($other_post->content, 100) !!}</p></a>
                                                <span class="category-minor"><a href="{{ route('category.show', $other_post->category->id) }}">{{ $other_post->category->name }}</a></span> <span class="dot-minor"></span> <span class="author-minor">{{ $other_post->user->name }}</span>
                                            </figcaption>
                                        </figure>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
        </div>
    </div>
@endsection

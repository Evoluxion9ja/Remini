<header class="shadow-sm">
    <nav class="navbar navbar-expand-md">
            <div class="container">
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right dashboard-drop shadow-sm" aria-labelledby="navbarDropdown">
                                <a href=""><div class="dropdown-item"><div class="item">Profile</div></div></a>
                                <a href="{{ route('dashboard.index') }}"><div class="dropdown-item"><div class="item">Dashboard</div></div></a>
                                <a href="{{ route('category.index') }}"><div class="dropdown-item"><div class="item">Categories</div></div></a>
                                <a href="{{ route('tag.index') }}"><div class="dropdown-item"><div class="item">Blog Tags</div></div></a>
                                <a href=""><div class="dropdown-item"><div class="item">User Settings</div></div></a>
                                <hr>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a href="">
                                <div class="social-icon">
                                    <img src="storage/icons/facebook.png" width="100%" alt="">
                                </div>
                            </a>
                            <a href="">
                                <div class="social-icon">
                                    <img src="storage/icons/pintrest.png" width="100%" alt="">
                                </div>
                            </a>
                            <a href="">
                                <div class="social-icon">
                                    <img src="storage/icons/instagram.png" width="100%" alt="">
                                </div>
                            </a>
                            <a href="">
                                <div class="social-icon">
                                    <img src="storage/icons/youtube.png" width="100%" alt="">
                                </div>
                            </a>
                            <a href="">
                                <div class="social-icon">
                                    <img src="storage/icons/twitter.png" width="100%" alt="">
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <nav class="navbar navbar-expand-md navbar-light bottom-nav">
            <div class="container">
                <ul class="navbar-nav ml-auto">
                    <a href="">
                        <div class="logo-icon">
                            <h3>Exclusive-Ng</h3>
                        </div>
                    </a>
                </ul>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('/') }}">{{ __('Home') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('index.health') }}">{{ __('Health ') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('index.people') }}">{{ __('People') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('index.lifestyle') }}">{{ __('Lifestyle') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('index.petroleum') }}">{{ __('Petroleum') }}</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                More <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right text-left more-item" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                {{ Html::linkRoute('index.science', 'Science', [], ['class' => 'btn btn-default dropdown-item']) }}
                                {{ Html::linkRoute('index.foreign', 'Foreign', [], ['class' => 'btn btn-default dropdown-item']) }}
                                {{ Html::linkRoute('index.companies', 'Companies', [], ['class' => 'btn btn-default dropdown-item']) }}
                                {{ Html::linkRoute('index.journalism', 'Journalism', [], ['class' => 'btn btn-default dropdown-item']) }}
                                {{ Html::linkRoute('index.housing', 'Housing', [], ['class' => 'btn btn-default dropdown-item']) }}
                                {{ Html::linkRoute('index.logistics', 'Freight & Logistics', [], ['class' => 'btn btn-default dropdown-item']) }}
                                {{ Html::linkRoute('index.automobile', 'Automobile', [], ['class' => 'btn btn-default dropdown-item']) }}
                                {{ Html::linkRoute('index.programming', 'Programming', [], ['class' => 'btn btn-default dropdown-item']) }}
                                {{ Html::linkRoute('index.happenings', 'Happenings', [], ['class' => 'btn btn-default dropdown-item']) }}
                                {{ Html::linkRoute('index.technology', 'Technology', [], ['class' => 'btn btn-default dropdown-item']) }}
                                {{ Html::linkRoute('index.entertainment', 'Entertainment', [], ['class' => 'btn btn-default dropdown-item']) }}
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                    <form action="" method="POST" class="search-form">
                        {{ csrf_field() }}
                        <input type="search" name="search" placeholder="Search here">
                    </form>
                </div>
            </div>
        </nav>
</header>

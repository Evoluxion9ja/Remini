<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('partials._head')
<body>
    <div id="app">
        @include('partials._nav')
        <main class="py-4">
            @yield('stylesheets')
                @include('partials._validate')
            @yield('content')
            @include('partials._footer')
        </main>
    </div>
    @yield('javascripts')
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'article-ckeditor' );
    </script>
</body>
</html>

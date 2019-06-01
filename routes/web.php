<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route for pages
Route::match(['GET', 'POST'], '/', [
    'uses' => 'PageController@index',
    'as' => '/'
]);
Route::match(['GET', 'POST'], '/health',[
    'uses' => 'PageController@health',
    'as' => 'index.health'
]);
Route::match(['GET', 'POST'], '/people',[
    'uses' => 'PageController@people',
    'as' => 'index.people'
]);
Route::match(['GET', 'POST'], '/lifestyle',[
    'uses' => 'PageController@lifestyle',
    'as' => 'index.lifestyle'
]);
Route::match(['GET', 'POST'], '/petroleum',[
    'uses' => 'PageController@petroleum',
    'as' => 'index.petroleum'
]);
Route::match(['GET', 'POST'], '/science',[
    'uses' => 'PageController@science',
    'as' => 'index.science'
]);
Route::match(['GET', 'POST'], '/foreign',[
    'uses' => 'PageController@foreign',
    'as' => 'index.foreign'
]);
Route::match(['GET', 'POST'], '/companies',[
    'uses' => 'PageController@companies',
    'as' => 'index.companies'
]);
Route::match(['GET', 'POST'], '/journalism',[
    'uses' => 'PageController@journalism',
    'as' => 'index.journalism'
]);
Route::match(['GET', 'POST'], '/housing',[
    'uses' => 'PageController@housing',
    'as' => 'index.housing'
]);
Route::match(['GET', 'POST'], '/logistics',[
    'uses' => 'PageController@logistics',
    'as' => 'index.logistics'
]);
Route::match(['GET', 'POST'], '/automobile',[
    'uses' => 'PageController@automobile',
    'as' => 'index.automobile'
]);
Route::match(['GET', 'POST'], '/programming',[
    'uses' => 'PageController@programming',
    'as' => 'index.programming'
]);
Route::match(['GET', 'POST'], '/happenings',[
    'uses' => 'PageController@happenings',
    'as' => 'index.happenings'
]);
Route::match(['GET', 'POST'], '/technology',[
    'uses' => 'PageController@technology',
    'as' => 'index.technology'
]);
Route::match(['GET', 'POST'], '/entertainment',[
    'uses' => 'PageController@entertainment',
    'as' => 'index.entertainment'
]);

//Route for Blogs
Route::match(['GET', 'POST'], '/blogs', [
    'uses' => 'PageController@index',
    'as' => 'index.index'
]);
Route::match(['GET', 'POST'], 'blogs/{slug}', [
    'uses' => 'PageController@single',
    'as' => 'index.single'
])->where('slug','[\w\d\-\_]+');

//Comment Route
Route::match(['POST'], 'comment/{post_id}', [
    'uses' => 'CommentController@store',
    'as'=> 'comment.store'
]);
Route::match(['PUT'], 'comment/{id}', [
    'uses' => 'CommentController@update',
    'as'=> 'comment.update'
]);
Route::match(['DELETE'], 'comment/{id}', [
    'uses' => 'CommentController@destroy',
    'as'=> 'comment.destroy'
]);

//CReply Route
Route::match(['POST'], 'replies/{comment_id}', [
    'uses' => 'ReplyController@store',
    'as'=> 'reply.store'
]);
Route::match(['PUT'], 'replies/{comment_id}', [
    'uses' => 'ReplyController@update',
    'as'=> 'reply.update'
]);
Route::match(['DELETE'], 'replies/{comment_id}', [
    'uses' => 'ReplyController@destroy',
    'as'=> 'reply.destroy'
]);



//Dashboard Route
Route::match(['GET', 'POST'], '/dashboard', [
    'uses' => 'PostController@index',
    'as' => 'dashboard.index'
]);
Route::match(['POST'], '/dashboard', [
    'uses' => 'PostController@store',
    'as' => 'dashboard.store'
]);
Route::match(['GET','POST'], 'dashboard/{id}', [
    'uses' => 'PostController@show',
    'as' => 'dashboard.show'
]);
Route::match(['PUT'], 'dashboard/{id}', [
    'uses' => 'PostController@update',
    'as' => 'dashboard.update'
]);
Route::match(['DELETE'], 'dashboard/{id}', [
    'uses' => 'PostController@destroy',
    'as' => 'dashboard.destroy'
]);

//Category Route
Route::match(['GET', 'POST'], '/categories',[
    'uses' => 'CategoryController@index',
    'as' => 'category.index'
]);
Route::match(['POST'], 'categories/store',[
    'uses' => 'CategoryController@store',
    'as' => 'category.store'
]);
Route::match(['GET', 'POST'], 'categories/{id}',[
    'uses' => 'CategoryController@show',
    'as' => 'category.show'
]);
Route::match(['PUT'], 'categories/{id}',[
    'uses' => 'CategoryController@update',
    'as' => 'category.update'
]);
Route::match(['DELETE'], 'categories/{id}',[
    'uses' => 'CategoryController@destroy',
    'as' => 'category.destroy'
]);

//Tags Route
Route::match(['GET', 'POST'], '/tags',[
    'uses' => 'TagController@index',
    'as' => 'tag.index'
]);
Route::match(['POST'], 'tags/store',[
    'uses' => 'TagController@store',
    'as' => 'tag.store'
]);
Route::match(['GET', 'POST'], 'tags/{id}',[
    'uses' => 'TagController@show',
    'as' => 'tag.show'
]);
Route::match(['PUT'], 'tags/{id}',[
    'uses' => 'TagController@update',
    'as' => 'tag.update'
]);
Route::match(['DELETE'], 'tags/{id}',[
    'uses' => 'TagController@destroy',
    'as' => 'tag.destroy'
]);

Auth::routes();

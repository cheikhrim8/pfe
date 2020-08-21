<?php

use Illuminate\Support\Facades\Route;

//Route::view('/','welcome');
Route::get('/', 'VideosController@index');
Route::get('forum', 'DiscussionsController@index')->name('forum');
Route::get('discussion/show/{slug}', 'DiscussionsController@show')->name('discussion.show');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

Route::group(['middleware' => ['can:manage_users|instructor']], function () {
    Route::get('icons', ['as' => 'pages.icons', 'uses' => 'PageController@icons']);
    Route::get('maps', ['as' => 'pages.maps', 'uses' => 'PageController@maps']);
    Route::get('notifications', ['as' => 'pages.notifications', 'uses' => 'PageController@notifications']);
    Route::get('rtl', ['as' => 'pages.rtl', 'uses' => 'PageController@rtl']);
    Route::get('tables', ['as' => 'pages.tables', 'uses' => 'PageController@tables']);
    Route::get('typography', ['as' => 'pages.typography', 'uses' => 'PageController@typography']);
    Route::get('upgrade', ['as' => 'pages.upgrade', 'uses' => 'PageController@upgrade']);
});

Route::group(['middleware' => 'auth'], function () {
//    Route::resource('user', 'UserController', ['except' => ['show']]);
    Route::resource('users', 'UsersController');
    Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
    Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
    Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);

});

Route::group(['middleware' => 'auth'], function () {
    Route::resource('channels', 'ChannelsController');
    Route::resource('playlists', 'PlaylistsController');
    Route::resource('comments', 'CommentController');
    Route::resource('discussions', 'DiscussionsController');
    Route::resource('replies', 'RepliesController');
    Route::resource('discussion-comment', 'DiscussionCommentController');
    Route::resource('discussion-comment-reply', 'ReplyDiscussionCommentController');
    Route::get('subscribe-channel/{id}' , 'ChannelsController@subscribe')->name('subscribe.channel');
    Route::get('unsubscribe-channel/{id}' , 'ChannelsController@unsubscribe')->name('unsubscribe.channel');
    Route::get('answered-discussion', 'DiscussionsController@answeredDiscussion')->name('answered-discussion');
    Route::get('playlist/show/{id}/{slug}', 'PlaylistsController@show')->name('playlist.show');
    Route::post('video/store/{id}', 'VideosController@store')->name('video.store');
//    Route::post('discussion-comment/create/{id}', ['as' => 'discussion.comment.create', 'uses' => 'DiscussionsController@create']);
    Route::get('comment/like/{id}', 'CommentController@like')->name('comment.like');
    Route::get('comment/dislike/{id}', 'CommentController@dislike')->name('comment.dislike');
    Route::get('discussion/eye/{id}', 'DiscussionsController@eye')->name('discussion.eye');
    Route::get('discussion/eye-slash/{id}', 'DiscussionsController@eye_slash')->name('discussion.eye-slash');


});


Route::resource('stocks', 'StockController');
Route::get('stock/chart', 'StockController@chart');




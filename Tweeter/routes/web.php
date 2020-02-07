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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/homepage', 'UserController@homepage');
// Route::get('/checkLogin', 'UserController@checkLogin');
// Route::post('/userSignup', 'UserController@userSignup');
Route::post('/userProfile', 'UserController@userProfile');
Route::post('/userProfile', 'UserController@showUserProfile');
Route::post('/editUserProfileForm', 'UserController@editUserProfileForm');
Route::post('/tweetFeed', 'UserController@editUserProfile');
Route::post('/tweetFeed', 'UserController@deleteUserProfile');

Route::get('/tweetFeed', 'TweetController@show');
Route::get('/createTweetForm', 'TweetController@createTweetForm');
Route::get('/createTweet', 'TweetController@createTweet');
Route::post('/deleteTweet', 'TweetController@deleteTweet');
Route::post('/editTweetForm', 'TweetController@showEditForm');
Route::post('/editTweet', 'TweetController@editTweet');

Route::post('/saveLike', 'TweetController@saveLike');
Route::post('/saveComment', 'TweetController@saveComment');
Route::post('/showComments', 'TweetController@showComments');
Route::post('/commentForm', 'TweetController@commentForm');
Route::post('/editComment', 'TweetController@editComment');
Route::post('/deleteComment', 'TweetController@deleteComment');

Route::get('/tweetFeed/{id}', 'TweetController@showTweet');
Route::get('/showAllUsers', 'TweetController@showAllUsers');
Route::post('/followUsers', 'TweetController@followUsers');

?>

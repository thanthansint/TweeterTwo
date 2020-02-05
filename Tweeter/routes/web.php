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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/homepage', 'UserController@homepage');
Route::get('/checkLogin', 'UserController@checkLogin');
Route::post('/userSignup', 'UserController@userSignup');
Route::get('/tweetFeed', 'TweetController@show');

Route::get('/createTweet', 'TweetController@createTweet');
Route::post('/deleteTweet', 'TweeetController@deleteTweet');
Route::post('/tweetFeed', 'TweetController@editTweet');
Route::post('/editTweetForm', 'TweetController@showEditForm');
Route::get('/tweetFeed/{id}', 'TweetController@showTweet');
Route::get('/showProfiles', 'TweetController@showAllUsers');
Route::get('/showProfiles', 'TweetController@followUsers');

?>

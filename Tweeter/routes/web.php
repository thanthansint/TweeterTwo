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
Route::post('/userProfile', 'UserController@userProfile');
Route::post('/userProfile', 'UserController@showUserProfile');
Route::post('/editUserProfileForm', 'UserController@editUserProfileForm');
Route::post('/tweetFeed', 'UserController@editUserProfile');
Route::post('/tweetFeed', 'UserController@deleteUserProfile');

Route::get('/tweetFeed', 'TweetController@show');
Route::get('/createTweetForm', 'TweetController@showCreateForm');
Route::get('/createTweet', 'TweetController@createTweet');

Route::post('/deleteTweet', 'TweeetController@deleteTweet');
Route::post('/tweetFeed', 'TweetController@editTweet');
Route::post('/editTweetForm', 'TweetController@showEditForm');

Route::post('/tweetFeed', 'TweetController@saveLike');
Route::post('/tweetFeed', 'TweetController@saveCommment');
Route::post('/tweetFeed', 'TweetController@showCommments');
Route::post('/commentForm', 'TweetController@commmentForm');
Route::post('/tweetFeed', 'TweetController@editCommment');

Route::get('/tweetFeed/{id}', 'TweetController@showTweet');
Route::get('/showProfiles', 'TweetController@showAllUsers');
Route::get('/showProfiles', 'TweetController@followUsers');

?>

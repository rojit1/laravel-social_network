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
// -------------------  ------------Post
Route::resource('posts','PostsController')->middleware('auth');


// ----------  ---------------------  Profile
Route::get('/profile','ProfileController@createProfile');
Route::post('/profile-create','ProfileController@create');
Route::get('/profile-edit/{id}','ProfileController@editProfile');
Route::post('/profile-update/{id}','ProfileController@updateProfile');
Route::get('/profile/{username}','ProfileController@profile');

//---------------        ------- People

Route::get('/people','PeopleController@showPeople');

//  ------------------------ - - -    Search

Route::post('/search','SearchController@searchResult');
//  ------------------------------  Comment

Route::post('/addcomment/{id}','CommentController@postComment');
Route::get('/comment/{id}','CommentController@showComment');

//  --------------------    ----- Auth

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

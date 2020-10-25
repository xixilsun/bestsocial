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
Route::get('/', function () {
    return view('auth.login');
});
Auth::routes();
// Route::get('/home', function () {
//     return view('home');
// });
Route::resource('/feed','PostController');
Route::resource('/comment','PostCommentController');
Route::get('/delete_comment/{id}','PostCommentController@destroy');
Route::post('/comment/storeProfile','PostCommentController@storeProfile');
Route::post('/like','PostController@like');
Route::post('/dislike/{id}','PostController@dislike');
Route::get('/profile/{id}','ProfileController@show');
Route::post('/profile/{id}','ProfileController@follow');
Route::put('/profile/{id}','ProfileController@update');
Route::post('/post/create', 'PostController@store_from_profile');
Route::post('/post/{id}/edit','PostController@edit');
Route::delete('/post/{id}/delete','PostController@destroy');
//Route::get('/home', 'HomeController@index')->name('home');

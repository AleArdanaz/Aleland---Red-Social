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
Route::get('/prueba', function()
{
  return view('prueba');
});
Auth::routes();

Route::get('/home', 'PostController@index')->name('home');
Route::post('/crearpost', 'PostController@store')->name('crear.post');
Route::get('/borrarpost/{post_id}', 'PostController@borrarPost')->name('borrar.post');
Route::get('/account/{user_id}', 'UserController@postsUser')->name('ir.user');
Route::get('/like/{post_id}/{user_id}', 'PostController@likePost')->name('like.post');

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
use Illuminate\Http\Request;
use App\Http\Controllers\LinkController;

//Route::get('/', function () {
//  return view('welcome');
//});
Route::redirect('/', '/sessions');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function()
  {
    Route::resource('posts', 'Admin\PostsController');
  }
);

Route::resource('sessions', 'SessionController');


Route::get('movies/update', 'MovieController@update');
// Route::get('sessions/create', 'SessionController@create');
// Route::post('sessions/create', 'SessionController@store');

// Route::get('/home', 'HomeController@index')->name('home');

// Route::resource('posts', 'PostsController', ['only' => [
//   'index', 'show'
// ]]);

// Route::get('/articles', 'ArticleController@index');
// Route::get('/articles/create', 'ArticleController@create');
// Route::post('/articles/create', 'ArticleController@store');
// Route::get('/articles/edit/{id}', 'ArticleController@edit');
// Route::post('/articles/edit', 'ArticleController@update');
// Route::get('/articles/delete/{id}', 'ArticleController@show');
// Route::post('/articles/delete', 'ArticleController@delete');

// Route::get('/memos', 'MemosController@index');
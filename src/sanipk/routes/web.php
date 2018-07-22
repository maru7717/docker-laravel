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

Auth::routes();

// User 認証不要
Route::get('/', function () { return redirect('/sessions'); });
Route::get('sessions', 'SessionController@index');

Route::resource('sessions', 'SessionController', ['only' => ['index', 'show']]);


// User ログイン後
Route::group(['middleware' => 'auth:user'], function() {
  Route::get('/home', 'HomeController@index')->name('home');
  Route::resource('sessions', 'SessionController', ['except' => ['index', 'show']]);
});


// Admin 認証不要
Route::group(['prefix' => 'admin'], function() {
  Route::get('/',         function () { return redirect('/admin/home'); });
  Route::get('login',     'Admin\LoginController@showLoginForm')->name('admin.login');
  Route::post('login',    'Admin\LoginController@login');
});


// Admin ログイン後
Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function() {
  Route::post('logout',   'Admin\LoginController@logout')->name('admin.logout');
  Route::get('home',      'Admin\HomeController@index')->name('admin.home');
  Route::get('movies/', 'Admin\MovieController@index')->name('admin.movies');;
  Route::get('movies/get', 'Admin\MovieController@get');
  Route::post('movies/store', 'Admin\MovieController@store');
  Route::get('movies/update', 'Admin\MovieController@update');
});


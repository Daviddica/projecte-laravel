<?php

use App\Http\Controllers\IndexController;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

//Rutes principals

Route::get('/','HomeController@index')->name('home'); 

Route::resources([
    'posts'=>'PostController',
    'users'=>'UserController',
    'comments'=>'CommentsController'
]);

Route::get('/profile','ProfileController@index')->name('profile');

Route::put('/updatepassword','ProfileController@index')->name('updatepassword');

Route::get('/admin','ProfileController@index')->name('admin')->middleware(['auth','role:admin']);

Route::get('/store', 'PostController@store')->name('posts.store');

Auth::routes();







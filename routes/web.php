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
    //'users'=>'UserController',
    'comments'=>'CommentController'
]);

// Route::get('/comments','CommentController@create')->name('comment.create');

//Profile
Route::get('/profile','ProfileController@index')->name('profile');

Route::put('/updatepassword','ProfileController@index')->name('updatepassword');

Route::get('/admin','ProfileController@index')->name('admin')->middleware(['auth','role:admin']);

Route::get('/profile/edit/{id}', 'ProfileController@edit')->name('profile.edit');

Route::put('/profile/update/{user}', 'ProfileController@update')->name('profile.update');

//Post
Route::get('post/store', 'PostController@store')->name('posts.store');

Route::get('/post/edit/{post}', 'PostController@edit')->name('posts.edit');

Route::put('/post/update/{post}', 'PostController@update')->name('posts.update');

Route::delete('/destroy/{post}', 'PostController@destroy')->name('posts.destroy');

//Comments
Route::post('comment/store/{post}', 'CommentController@store')->name('comments.store');

//Tags
Route::post('/tags', 'TagController@store')->name('tags.store');


//Panel de control
Route::get('/controlpanel','ControlPanelController@index')->name('controlpanel');

Route::get('/controlpanel/edit/{id}', 'ControlPanelController@edit')->name('controlpanel.edit');

Route::put('/controlpanel/destroy/{user}', 'ControlPanelController@update')->name('controlpanel.update');


Auth::routes();







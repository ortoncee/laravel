<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
Route::get('about', 'ViewController@getAbout')->name('about');
Route::get('contact', 'ViewController@getContact')->name('contact');
Route::get('blog', 'ViewController@getBlog')->name('blog');
Route::get('project', 'ViewController@getProjectList')->name('project');


Route::get('todo', 'TodoController@index')->name('todo.index');
Route::post('todo/store', 'TodoController@store')->name('todo.store');
Route::get('todo/create', 'TodoController@create')->name('todo.create');
Route::get('todo/{id}/show', 'TodoController@show')->name('todo.show');
Route::post('todo/{id}/update', 'TodoController@update')->name('todo.update');
Route::get('todo/{id}/delete', 'TodoController@destroy')->name('todo.destroy');
Route::get('todo/{id}/edit', 'TodoController@edit')->name('todo.edit');
Route::get('todo/{id}/completed', 'TodoController@completed')->name('todo.completed');


Route::resource('category', 'CategoryController');
Route::resource('post', 'PostController');
Route::get('trashed-post', 'PostController@trashed')->name('post.trashed');
Route::put('restore-post/{post}', 'PostController@restore')->name('restore.post');

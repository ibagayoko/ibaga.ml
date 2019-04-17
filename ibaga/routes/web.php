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


Auth::routes();

// blog
Route::prefix('blog')->group(function () {
    Route::get('/', 'BlogController@index')->name('blog.index');
    Route::middleware('App\Http\Middleware\ViewThrottle')->get('{slug}', 'BlogController@post')->name('blog.post');
    Route::get('tag/{slug}', 'BlogController@tag')->name('blog.tag');
    Route::get('topic/{slug}', 'BlogController@topic')->name('blog.topic');
});



// Media routes...
Route::post('/handler/media/uploads', 'MediaController@store')->name('media.store');

Route::middleware(['auth'])->group(function () {
Route::get('/home', 'HomeController@index')->name('home');

// Post routes...
Route::get('posts', 'PostsController@index')->name('post.index');
Route::get('posts/create', 'PostsController@create')->name('post.create');
Route::post('posts', 'PostsController@store')->name('post.store');
Route::get('posts/{id}/edit', 'PostsController@edit')->name(('post.edit'));
Route::put('posts/{id}', 'PostsController@update')->name('post.update');
Route::delete('posts/{id}', 'PostsController@destroy')->name('post.destroy');


// Tag routes...
Route::get('tags', 'TagController@index')->name('tag.index');
Route::get('tags/create', 'TagController@create')->name('tag.create');
Route::post('tags', 'TagController@store')->name('tag.store');
Route::get('tags/{id}/edit', 'TagController@edit')->name(('tag.edit'));
Route::put('tags/{id}', 'TagController@update')->name('tag.update');
Route::delete('tags/{id}', 'TagController@destroy')->name('tag.destroy');


// Stats routes...
Route::get('stats/', 'StatsController@index')->name('stats.index');
Route::get('stats/{id}', 'StatsController@show')->name('stats.show');
});

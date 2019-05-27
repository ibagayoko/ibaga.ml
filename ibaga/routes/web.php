<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Request;

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

Route::get('cmd/{cmd}', function ($cmd) {
    Artisan::call($cmd);
    dd(Artisan::output());
    // storage:link
});
Auth::routes();

Route::get('/activity', function (Request $request) {
    $h = activity();
    $user = Auth::user();
    $user->load('actions');
    $user->load('activities');

    return $user;

    // return json_encode(->actions());
});

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

    Route::get('@{username}', 'UserProfileController@show')->name('users.showProfile')->where('username', '[A-Za-z0-9.]+');
    Route::put('@{username}/info', 'UserProfileController@updateInfo')->name('user.update.info')->where('username', '[A-Za-z0-9.]+');
    Route::put('@{username}/password', 'UserProfileController@updatePassword')->name('user.update.password')->where('username', '[A-Za-z0-9.]+');
    Route::get('me', 'UserProfileController@me')->name('user.me');

    // Post routes...
    Route::get('posts', 'PostsController@index')->name('post.index');
    Route::get('posts/create', 'PostsController@create')->name('post.create');
    Route::post('posts', 'PostsController@store')->name('post.store');
    Route::get('posts/{id}/edit', 'PostsController@edit')->name(('post.edit'));
    Route::put('posts/{id}', 'PostsController@update')->name('post.update');
    Route::delete('posts/{id}', 'PostsController@destroy')->name('post.destroy');

    // Menu Routes
    Route::get('menus/', ['uses' => 'MenuController@index',    'as' => 'menus.index']);
    Route::get('menus/create', ['uses' => 'MenuController@create',    'as' => 'menus.create']);
    Route::group([
    'as'     => 'menus.',
    'prefix' => 'menus/{menu}',
], function () {
    Route::delete('/', ['uses' => 'MenuController@destroy',    'as' => 'destroy']);
    Route::get('builder', ['uses' => 'MenuController@builder',    'as' => 'builder']);
    Route::get('edit', ['uses' => 'MenuController@edit',    'as' => 'edit']);
    Route::post('order', ['uses' => 'MenuController@order_item', 'as' => 'order']);
    Route::group([
        'as'     => 'item.',
        'prefix' => 'item',
    ], function () {
        Route::delete('{id}', ['uses' => 'MenuController@delete_menu', 'as' => 'destroy']);
        Route::post('/', ['uses' => 'MenuController@add_item',    'as' => 'add']);
        Route::put('/', ['uses' => 'MenuController@update_item', 'as' => 'update']);
    });
});

    Route::group(['middleware' => ['auth']], function () {
        Route::resource('roles', 'RoleController');
        Route::resource('users', 'UserController');
        Route::resource('permissions', 'PermissionController');
    });

    // Tag routes...
    Route::get('tags', 'TagController@index')->name('tag.index');
    Route::get('tags/create', 'TagController@create')->name('tag.create');
    Route::post('tags', 'TagController@store')->name('tag.store');
    Route::get('tags/{id}/edit', 'TagController@edit')->name(('tag.edit'));
    Route::put('tags/{id}', 'TagController@update')->name('tag.update');
    Route::delete('tags/{id}', 'TagController@destroy')->name('tag.destroy');

    // Topic routes...
    Route::get('topics', 'TopicController@index')->name('topic.index');
    Route::get('topics/create', 'TopicController@create')->name('topic.create');
    Route::post('topics', 'TopicController@store')->name('topic.store');
    Route::get('topics/{id}/edit', 'TopicController@edit')->name('topic.edit');
    Route::put('topics/{id}', 'TopicController@update')->name('topic.update');
    Route::delete('topics/{id}', 'TopicController@destroy')->name('topic.destroy');

    // Stats routes...
    Route::get('stats/', 'StatsController@index')->name('stats.index');
    Route::get('stats/{id}', 'StatsController@show')->name('stats.show');

    // Stats routes...
    Route::get('emails/', 'EmailController@index')->name('emails.index');
});

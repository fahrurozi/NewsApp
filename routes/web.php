<?php

use App\Http\Controllers\HomeController;
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

Auth::routes(
    [
        'reset' => false,
        'register' => false,
    ]
);
// Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/', 'HomeController@index')->name('home');
Route::get('/panel/dashboard', 'Creator\PanelController@dashboard')->name('dashboard');
// Route::get('/admin_dashboard', 'HomeController@adminDashboard')->name('home_admin');

//panel article
Route::get('/panel/article', 'Creator\ArticleController@index')->name('article');
Route::get('/panel/article/create', 'Creator\ArticleController@create')->name('article.create');
Route::post('/panel/article', 'Creator\ArticleController@store')->name('article.store');
Route::get('/panel/article/edit/{id}', 'Creator\ArticleController@edit')->name('article.edit');
Route::post('/panel/article/update/{id}', 'Creator\ArticleController@update')->name('article.update');
Route::post('/panel/article/delete/{id}', 'Creator\ArticleController@delete')->name('article.delete');

//panel category
Route::get('/panel/category', 'Creator\CategoryController@index')->name('category');
Route::get('/panel/category/create', 'Creator\CategoryController@create')->name('category.create');
Route::post('/panel/category', 'Creator\CategoryController@store')->name('category.store');
Route::get('/panel/category/edit/{id}', 'Creator\CategoryController@edit')->name('category.edit');
Route::post('/panel/category/update/{id}', 'Creator\CategoryController@update')->name('category.update');
Route::post('/panel/category/delete/{id}', 'Creator\CategoryController@delete')->name('category.delete');

//panel tags
Route::get('/panel/tags', 'Creator\TagsController@index')->name('tags');
Route::get('/panel/tags/create', 'Creator\TagsController@create')->name('tags.create');
Route::post('/panel/tags', 'Creator\TagsController@store')->name('tags.store');
Route::get('/panel/tags/edit/{id}', 'Creator\TagsController@edit')->name('tags.edit');
Route::post('/panel/tags/update/{id}', 'Creator\TagsController@update')->name('tags.update');
Route::post('/panel/tags/delete/{id}', 'Creator\TagsController@delete')->name('tags.delete');

//panel teams
Route::get('/panel/teams', 'Admin\TeamController@index')->name('teams');
Route::get('/panel/teams/create', 'Admin\TeamController@create')->name('teams.create');
Route::post('/panel/teams', 'Admin\TeamController@store')->name('teams.store');
Route::get('/panel/teams/edit/{id}', 'Admin\TeamController@edit')->name('teams.edit');
Route::post('/panel/teams/update/{id}', 'Admin\TeamController@update')->name('teams.update');
Route::post('/panel/teams/delete/{id}', 'Admin\TeamController@delete')->name('teams.delete');

//panel about
Route::get('/panel/about', 'Admin\AboutController@index')->name('about');
Route::post('/panel/about/update/', 'Admin\AboutController@update')->name('about.update');

//panel users
Route::get('panel/users', 'Admin\UserController@index')->name('users');
Route::get('panel/users/create', 'Admin\UserController@create')->name('users.create');
Route::post('panel/users', 'Admin\UserController@store')->name('users.store');
Route::get('panel/users/edit/{id}', 'Admin\UserController@edit')->name('users.edit');
Route::post('panel/users/update/{id}', 'Admin\UserController@update')->name('users.update');
Route::post('panel/users/delete/{id}', 'Admin\UserController@delete')->name('users.delete');

//panel search
Route::get('panel/search', 'UserPageController@search')->name('user.search');

//admin
Route::get('panel/videos', 'Admin\VideoController@index')->name('videos');
Route::get('panel/videos/create', 'Admin\VideoController@create')->name('videos.create');
Route::post('panel/videos', 'Admin\VideoController@store')->name('videos.store');
Route::get('panel/videos/edit/{id}', 'Admin\VideoController@edit')->name('videos.edit');
Route::post('panel/videos/update/{id}', 'Admin\VideoController@update')->name('videos.update');
Route::post('panel/videos/delete/{id}', 'Admin\VideoController@delete')->name('videos.delete');

//panel events
Route::get('/panel/events', 'Admin\EventsController@index')->name('events');
Route::get('/panel/events/create', 'Admin\EventsController@create')->name('events.create');
Route::post('/panel/events', 'Admin\EventsController@store')->name('events.store');
Route::get('/panel/events/edit/{id}', 'Admin\EventsController@edit')->name('events.edit');
Route::post('/panel/events/update/{id}', 'Admin\EventsController@update')->name('events.update');
Route::post('/panel/events/delete/{id}', 'Admin\EventsController@delete')->name('events.delete');

//blog
Route::get('/blog/{slug}', "HomeController@blog_detail")->name('blog.detail');
Route::get('/blog/like/{id}', "HomeController@like")->name('blog.like');
Route::post('/blog/comment/store/{id}', 'HomeController@storeComment')->name('blog.comment');

Route::get('/about_us', 'UserPageController@about_us')->name('about_us');
Route::get('/article', 'UserPageController@article')->name('article_list');

Route::get('/category', 'UserPageController@category')->name('user.category');
Route::get('/category/{slug}', 'UserPageController@category_detail')->name('user.category_detail');

Route::get('/tags', 'UserPageController@tags')->name('user.tags');
Route::get('/tags/{slug}', 'UserPageController@tags_detail')->name('user.tags_detail');

//creator
Route::get('creator/register', 'Creator\UserController@index')->name('creator.register');
Route::post('/creator/register', 'Creator\UserController@store')->name('creator.store');

Route::get('events/{slug}', 'UserPageController@events')->name('user.events');


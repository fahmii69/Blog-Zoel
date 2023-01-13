<?php

use App\Http\Controllers\Back\BackController;
use App\Http\Controllers\Back\PostController;
use App\Http\Controllers\Front\DashboardController;
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


Route::get('/', [DashboardController::class, 'index'])->name('front.index');
Route::get('/article', [DashboardController::class, 'postList'])->name('front.article');
Route::get('/category/{category:category_name}', [DashboardController::class, 'categoryList'])->name('front.category');
Route::get('/tag/{tags:tag_name}', [DashboardController::class, 'tagList'])->name('front.tags');
Route::get('/user/{user:name}', [DashboardController::class, 'userList'])->name('front.user');
Route::get('/search', [DashboardController::class, 'postSearch'])->name('front.search');
Route::get('/detail-post/{post}', [DashboardController::class, 'postDetail'])->name('front.post');


// Route::get('/back', [BackController::class, 'index'])->name('back.post');
Route::get('/back/list', [BackController::class, 'getPost'])->name('back.list');
Route::resource('back', BackController::class);
Route::resource('post', PostController::class);



Route::group([
    'prefix' => 'front',
    'as' => 'front.',
], function () {
});
// /*Route::get('/isi_post', function(){
// 	return view('blog.isi_post');
// });*/
// Route::get('/isi-post/{slug}', 'BlogController@isi_blog')->name('blog.isi');
// Route::get('/list-post', 'BlogController@list_blog')->name('blog.list');
// Route::get('/list-category/{category}', 'BlogController@list_category')->name('blog.category');
// Route::get('/cari', 'BlogController@cari')->name('blog.cari');

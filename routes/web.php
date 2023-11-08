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
	return view('default');
});

Auth::routes();

Route::get('/register', function () {
	return redirect('/login');
});

Route::get('/home', 'HomeController@index')->name('home');

//Routes for Posts
Route::get('posts', 'PostsController@index');
Route::post('posts', 'PostsController@store');
Route::get('posts/create', 'PostsController@create');
Route::get('posts/{post}', 'PostsController@show');

//Routes for Referrals

Route::middleware('role:admin|supervisor')->group(function () {
	Route::post('referrals', 'ReferralController@store');
	Route::get('referrals/upload', 'ReferralController@upload');
	Route::get('referrals/create', 'ReferralController@create')->name('add-referral');
	Route::post('referrals/upload', 'ReferralController@processUpload')->name('process-upload');
});

Route::middleware('auth')->group(function () {
	Route::get('referrals', 'ReferralController@index')->name('view-referrals');
	Route::get('referral/{referral}', 'ReferralController@show')->name('view-referral');
});

//Routes for Comments
Route::post('referral/{referral}/comment', 'CommentController@store')->middleware('role:executive')->name('add.comment');

//Logged in Users
Route::get('my-posts', 'AuthorsController@posts')->name('my-posts');

//Routes for Authors
Route::get('authors', 'AuthorsController@index');
Route::get('authors/{author}', 'AuthorsController@show');

Route::prefix('users')->middleware('role:admin')->group(function () {
	Route::get('/', 'UserController@index')->name('users.index');
	Route::get('/create', 'UserController@create')->name('users.create');
	Route::post('/', 'UserController@store')->name('users.store');
	Route::get('/{user}/edit', 'UserController@edit')->name('users.edit');
	Route::put('/{user}', 'UserController@update')->name('users.update');
	Route::delete('/{user}', 'UserController@destroy')->name('users.destroy');
});

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
    return view('pages.index');
});
Route::get('/logout', function () {
	Auth::logout();
    return redirect('/');
})->name('logout');

Route::get('/profile/{user}','UserController@show')->name('profile');

	Route::get('auth/github', 'GitHubController@redirectToProvider')->name('loginGitHub');
	Route::get('auth/github/callback', 'GitHubController@handleProviderCallback');

	Route::get('auth/google', 'GoogleController@redirectToProvider')->name('loginGoogle');
	Route::get('auth/google/callback','GoogleController@handleProviderCallback');

	Route::get('auth/linkedin', 'LinkedInController@redirectToProvider')->name('loginLinkedIn');
	Route::get('auth/linkedin/callback', 'LinkedInController@handleProviderCallback');

Route::resource('news','NewsController');

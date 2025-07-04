<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
//    return view('welcome');
        return view('login');
})->name("login");
Route::get('/home', function () {
    return view('pages/home');
})->middleware("auth");
//Route::get('/home', 'MainController@home')->name('home');
Route::get('/test', 'App\Http\Controllers\Test@index');
Route::resource('/users', 'App\Http\Controllers\Users')->middleware("auth");
Route::get('/clear-cache', function() {
	Artisan::call('cache:clear');
	Artisan::call('config:cache');
	Artisan::call('view:clear');
    	Artisan::call('route:cache');
	Artisan::call('optimize');
	Artisan::call('optimize:clear');
return redirect("/home");
});

Route::get('/google/auth/redirect','App\Http\Controllers\SocialiteController@redirectToGoogle');

Route::get('/google/auth/callback', 'App\Http\Controllers\SocialiteController@handleGoogleCallback');

Route::get('/down', function() {
     Artisan::call('down');
});

Route::get('/up', function() {
     Artisan::call('up');
});
Route::get('/logout', 'App\Http\Controllers\Users@logout')->middleware("auth");
Route::get('/audits', 'App\Http\Controllers\AuditsController@index')->middleware("auth");
Route::delete('/deleteStudent/{id}', 'App\Http\Controllers\StudentController@destroy')->middleware("auth");
Route::resource('/students', 'App\Http\Controllers\StudentController')->middleware("auth");
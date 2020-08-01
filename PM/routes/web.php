<?php

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





Route::get('/my-work', function () {
    return view('project.my-work');
});

Route::get('/projects', function () {
    return view('project.projects');
});

Route::get('/groups', function () {
    return view('project.groups');
});

Route::get('/notification', function () {
    return view('project.notification');
});

Route::get('/my-account', function () {
    return view('project.my-account');
});







Route::get('/home_page','TasksController@index');

Route::get('/tasks','TasksController@index');
Route::post('/tasks','TasksController@store');
Route::get('/create','TasksController@create');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

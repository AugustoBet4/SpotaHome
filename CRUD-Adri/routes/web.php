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
/*
Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', function () {
    return view('welcome_admin');
});
/*
Route::get('admin/login', 'AuthAdmin\LoginController@showLoginForm') -> name('login.admin');
Route::post('admin/login', 'AuthAdmin\LoginController@login');
Route::post('admin/logout', 'AuthAdmin\LoginController@logout') -> name('logout.admin');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('admin/home', 'HomeAdminController@index')->name('home.admin');
*/
//CRUD

Route::resource('inquilino','InquilinoController');
//Route::get('','InquilinoController@getInquilinos');

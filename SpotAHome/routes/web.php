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
//Welcome.blade.php es la pagina principal
Route::get('/', 'HomeController@index')->name("welcome");
//Route::get('/minor', 'HomeController@minor')->name("minor");
//Sesion de empleados

Route::get('/empleados',function (){
    return view('empleados/sesion');
});
//Route::get('/empleados', 'SesionEmpleadoController@index');
Route::post('sesion','SesionEmpleadoController@login')->name('sesion');
//Route::post('cerrarsesion','SesionEmpleadoController@logout')->name('cerrarsesion');
Route::get('/empleados/dashboard','DashboardController@index')->name('dashboard');

Route::resource('empleados/propiedad','PropiedadEmpleadoController');


//Fin empleados

//Dueños
Route::resource('duenos','DuenoController');

//Route::get('/empleados', 'SesionEmpleadoController@index')->name("sesion");
Route::post('/duenos','DuenoController@store');

Route::get('inquilino/login', 'AuthInquilino\LoginController@showLoginForm') -> name('login.inquilino');
Route::post('inquilino/login','AuthInquilino\LoginController@login')->name('inquilino.sesion');
Route::post('inquilino/logout', 'AuthInquilino\LoginController@logout') -> name('logout.inquilino');


Auth::routes();

Route::get('/inquilino', 'InquilinoController@index')->name("welcome");
Route::get('/inquilino/reservas', 'InquilinoController@reservas')->name("reservas");
Route::get('/inquilino/busqueda', 'InquilinoController@busqueda')->name("busqueda");

/*
Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', function () {
    return view('welcome_admin');
});
Route::get('/', 'HomeController@index')->name("main");
Route::get('/minor', 'HomeController@minor')->name("minor");

//Route::get('admin/login', 'AuthAdmin\LoginController@showLoginForm') -> name('login.admin');
//Route::post('admin/login', 'AuthAdmin\LoginController@login');
//Route::post('admin/logout', 'AuthAdmin\LoginController@logout') -> name('logout.admin');

//Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('admin/home', 'HomeAdminController@index')->name('home.admin');

*/

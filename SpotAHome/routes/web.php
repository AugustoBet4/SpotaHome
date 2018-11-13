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

//Route::get('/empleados',function (){return view('empleados/sesion');});
Route::get('/empleados', 'SesionEmpleadoController@index')->name("empleados.index");
Route::get('/empleados/dashboard', 'SesionEmpleadoController@index');
//Route::post('sesion','SesionEmpleadoController@login')->name('sesion');
//Route::post('cerrarsesion','SesionEmpleadoController@logout')->name('cerrarsesion');

//Dashboard general empleado
Route::get('/empleados/dashboard','DashboardController@index')->name('dashboard');
Route::get('/duenos','DashboardDuenoController@index')->name('index');
Route::resource('empleados/propiedad','PropiedadEmpleadoController');
Route::resource('empleados/duenos','DuenoController');



Route::get('empleados/login', 'AuthEmpleado\LoginController@showLoginForm') -> name('login.empleado');
Route::post('empleados/login','AuthEmpleado\LoginController@login')->name('empleado.sesion');
Route::post('empleados/logout', 'AuthEmpleado\LoginController@logout') -> name('logout.empleado');

//Fin empleados

//Dueños
//Route::resource('duenos','DuenoController');

//Route::get('/empleados', 'SesionEmpleadoController@index')->name("sesion");
Route::post('/duenos','DuenoController@store');


//Inquilinos

Route::resource('inquilino/reservas','AlquilerController');
Route::resource('inquilino/historial', 'ValoracionPropiedadController');
Route::resource('inquilino/enviarConsulta', 'ConsultaController');

Route::get('inquilino/login', 'AuthInquilino\LoginController@showLoginForm') -> name('login.inquilino');
Route::post('inquilino/login','AuthInquilino\LoginController@login')->name('inquilino.sesion');
Route::post('inquilino/logout', 'AuthInquilino\LoginController@logout') -> name('logout.inquilino');

Auth::routes();

Route::get('/inquilino', 'InquilinoController@index')->name("inquilino.index");
Route::get('/inquilino/reservas', 'InquilinoController@reservas')->name("reservas");
Route::get('/inquilino/reservas/{id}', 'InquilinoController@anularReserva')->name("anular");
Route::get('/inquilino/consulta/{id}', 'InquilinoController@consulta')->name("consulta");
Route::get('/inquilino/historial', 'InquilinoController@historial')->name("historial");
Route::get('/inquilino/direcciones/{id}', 'InquilinoController@location')->name("direcciones");
Route::get('/inquilino/busqueda', 'InquilinoController@busqueda')->name("busqueda");
Route::post('/inquilino/propiedades', 'InquilinoController@busqueda_prop')->name("propiedades");
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

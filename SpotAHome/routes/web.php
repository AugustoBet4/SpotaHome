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

//Empleados

//Resources
Route::resource('empleados/duenos','DuenoEmpleadoController');
Route::resource('empleados/propiedad','PropiedadEmpleadoController');
Route::resource('empleados/empleado','EmpleadoController');
Route::resource('empleados/homecheckers','EmpleadoHomecheckersController');
//Route::resource('empleados/mapa','PropiedadEmpleadoController');

//Login Empleados

Route::get('empleados/login', 'AuthEmpleado\LoginController@showLoginForm') -> name('login.empleado');
Route::post('empleados/login','AuthEmpleado\LoginController@login')->name('empleado.sesion');
Route::post('empleados/logout', 'AuthEmpleado\LoginController@logout') -> name('logout.empleado');
Auth::routes();

Route::get('empleados/propiedad', 'PropiedadEmpleadoController@index') -> name('empleados.propiedad.index');
Route::get('empleados/empleado', 'EmpleadoController@index') -> name('empleados.index');
Route::get('empleados/homecheckers', 'EmpleadoHomecheckersController@index') -> name('empleados.propiedad.homecheckers');
Route::get('empleados/agenda', 'AgendaHomecheckersController@index') -> name('empleados.propiedad.agenda');
//Route::get('empleados/agenda/{1}', 'AgendaHomecheckersController@actualizar') -> name('empleados.propiedad.agenda');
Route::post('agendas', 'AgendaPropiedadController@actualizar');
Route::get('empleados/hc_propiedad/{id}', 'AgendaPropiedadController@index') -> name('empleados.propiedad.agenda_propiedad');
Route::get('empleados/inquilino', 'InquilinoEmpleadoController@index') -> name('empleados.inquilino.index');
Route::get('empleados/busqueda', 'PropiedadEmpleadoController@busqueda') -> name('empleados.busqueda');
Route::get('empleados/busqueda_inquilino', 'InquilinoEmpleadoController@busqueda') -> name('empleados.inquilino.busqueda');
Route::get('empleados/estadisticas', 'EstadisticasController@index') -> name('empleados.estadisticas');

//Login Duenos y vistas
Route::post('/propiedades','PropiedadDuenoController@store');

Route::get('duenos/login', 'AuthDueno\LoginController@showLoginForm') -> name('login.dueno');
Route::post('duenos/login','AuthDueno\LoginController@login')->name('dueno.sesion');
Route::post('duenos/logout', 'AuthDueno\LoginController@logout') -> name('logout.dueno');

Auth::routes();
Route::get('/duenos/fecha_propiedad {id}', 'PropiedadDuenoController@fecha');

Route::get('/duenos', 'SesionDuenoController@index');

Route::resource('duenos/propiedad','PropiedadDuenoController');
Route::resource('duenos/perfil','DuenoController');


Route::resource('duenos/verificar','VerificarPropiedadController');

Route::get('duenos/usuario/{id}','DuenoController@usuario');

Route::post('/hola','PropiedadDuenoController@store');
Route::post('/fechas','PropiedadDuenoController@updatefechas');
Route::resource('duenos/fechas','PropiedadFechasController');
Route::resource('duenos/foto','PropiedadFotoController');
Route::get('/duenos/consultas', 'DuenoController@getConsulta')->name('duenos.consultas');
Route::get('duenos/consulta/{id}', 'DuenoController@consulta');
Route::get('duenos/reservas', 'DuenoController@reservas');
Route::resource('duenos/enviarConsulta', 'ConsultaController');
Route::get('/duenos/mapa/{id}', 'MapaDuenoController@location')->name("dueno.mapa");
Route::get('/duenos/mapageneral/{id}', 'MapaDuenoController@mapageneral')->name("dueno.mapageneral");
//Route::post('/duenos/verificar', 'VerificarPropiedadController@index')->name("dueno.verificar");
Route::post('/storing','VerificarPropiedadController@store');
//Demas rutas empleados

//Route::get('/empleados',function (){return view('empleados/sesion');});
Route::get('/empleados', 'SesionEmpleadoController@index')->name("empleados.index");
Route::post('/duenos','DuenoEmpleadoController@store');
Route::resource('empleados/duenos','DuenoEmpleadoController');
Route::get('/empleados/dashboard', 'SesionEmpleadoController@index');
//Route::post('sesion','SesionEmpleadoController@login')->name('sesion');
//Route::post('cerrarsesion','SesionEmpleadoController@logout')->name('cerrarsesion');
Route::get('/empleados/dashboard','DashboardController@index')->name('dashboard');
//Route::get('/empleados/mapa/{id}', 'PropiedadEmpleadoController@mapa')->name('empleados.mapita');

Route::get('/empleados/mapa/{id}', 'MapaEmpleadoController@location')->name("empleado.mapa");
Route::get('/empleados/mapageneral', 'MapaEmpleadoController@mapageneral')->name("empleado.mapageneral");
//Route::get('empleados/mapa/{id}', 'PropiedadEmpleadoController@datosmapa');

Route::get('empleados/propiedad/mapa', function(){
    $config = array();
    $config['center'] = '-16.4897, -68.1193';
    //  $config['center'] = $datos;
    $config['zoom'] = 'auto';
    $config['onboundschanged'] = 'if (!centreGot) {
            var mapCentre = map.getCenter();
            marker_0.setOptions({
                position: new google.maps.LatLng(mapCentre.lat(), mapCentre.lng())
            });
        }
        centreGot = true;';
    app('map')->initialize($config);
    // set up the marker ready for positioning
    // once we know the users location
    $marker = array();
    app('map')->add_marker($marker);
    $map = app('map')->create_map();
    echo "<html><head><script type='text/javascript'>var centreGot = false;</script>".$map['js']."</head><body>".$map['html']."</body></html>";
})->name('empleados.mapa');

//Fin empleados

//Dueños


//Route::get('/empleados', 'SesionEmpleadoController@index')->name("sesion");



//Inquilinos

Route::get('inquilino/perfil','InquilinoController@perfil');
//Route::get('inquilino/edit/{id}','InquilinoController@edit');
Route::resource('Inquilino/perfiles','InquilinoController');

Route::resource('inquilino/busqueda','AlquilerController');

Route::resource('inquilino/historial', 'ValoracionPropiedadController');
Route::resource('inquilino/enviarConsulta', 'ConsultaController');
Route::resource('inquilino/registro', 'RegistroInquilino');

Route::get('inquilino/login', 'AuthInquilino\LoginController@showLoginForm') -> name('login.inquilino');
Route::post('inquilino/login','AuthInquilino\LoginController@login')->name('inquilino.sesion');
Route::post('inquilino/logout', 'AuthInquilino\LoginController@logout') -> name('logout.inquilino');

Auth::routes();

Route::get('/inquilino', 'InquilinoController@index')->name("inquilino.index");
Route::get('/inquilino/reservas', 'InquilinoController@reservas')->name("reservas");
Route::get('/inquilino/reservas/{id}', 'InquilinoController@anularReserva')->name("anular");
Route::get('/inquilino/consulta/{id}', 'InquilinoController@consulta')->name("consulta");
Route::get('/inquilino/consultas', 'InquilinoController@getConsulta')->name("consultas");
Route::get('/inquilino/historial', 'InquilinoController@historial')->name("historial");
Route::get('/inquilino/direcciones/{id}', 'InquilinoController@location')->name("direcciones");
Route::get('/inquilino/busqueda', 'InquilinoController@busqueda')->name("busqueda");
Route::post('/inquilino/propiedades', 'InquilinoController@busqueda2')->name("busqueda2");
Route::post('/inquilino/propiedades', 'InquilinoController@busqueda_prop')->name("propiedades");
Route::get('/inquilino/prop_vista/{id}', 'InquilinoController@getPropiedad')->name("vista_prop");
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

Route::get('/factura/form', array('as'=>'factura.form', 'uses'=>'FacturaController@factura'));
Route::get('/factura/fin/{id}', array('as'=>'factura.fin', 'uses'=>'FacturaController@fin'));
Route::get('/factura/print/{id}', array('as'=>'factura.print', 'uses'=>'FacturaController@print'));
Route::any('/factura/hist', array('as'=>'factura.hist', 'uses'=>'FacturaController@hist'));
Route::get('/factura/datos', array('as'=>'factura.datos', 'uses'=>'FacturaController@datos'));
Route::get('/factura/datos2/{id}', array('as'=>'factura.datos2', 'uses'=>'FacturaController@datos2'));


Route::post('/propiedad/cita', array('as'=>'propiedad.cita', 'uses'=>'EmpleadoHomecheckersController@cita'));
Route::post('/regcita', array('as'=>'propiedad.regcita', 'uses'=>'EmpleadoHomeCheckersController@regcita'));
Route::post('/propiedad/verif', array('as'=>'propiedad.verif', 'uses'=>'EmpleadoHomecheckersController@verif'));
Route::post('/regverif', array('as'=>'propiedad.regverif', 'uses'=>'EmpleadoHomeCheckersController@regverif'));
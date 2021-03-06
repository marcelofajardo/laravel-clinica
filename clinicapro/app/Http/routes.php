<?php

/* |--------------------------------------------------------------------------
| Application Routes
|-------------------------------------------------------------------------- |
| Here is where you can register all of the routes for an application. | It's
a breeze. Simply tell Laravel the URIs it should respond to | and give it the
controller to call when that URI is requested. | */ //----------------inicio
 /*Route::get('/pacientes', 'PacienteController@vista');
Route::post('/pacientes/registro', 'PacienteController@create');
Route::get('/pacientes/actualizar/{id}', 'PacienteController@actualizar');
Route::put('/pacientes/actualizar', 'PacienteController@update');
Route::get('/pacientes/eliminar', 'PacienteController@delete');*/
Route::resource('paciente','PacienteController');
Route::resource('insumo','InsumosController');
Route::resource('atencion','AtencionController');
Route::resource('usuario','UsuariosController');
Route::resource('historial','PdfController');

Route::get('papanicolao', 'AtencionController@papa');

//----------------fin paciete
//------------------------------------------------------------------------
//----------------inicio usuario
//Route::get('/usuarios', '');
//Route::get('/usuarios/registro', '');
//Route::get('/usuarios/actualizar', '');
//Route::get('/usuarios/eliminar', '');
//----------------fin del usuario
//------------------------------------------------------------------------


/*Route::get('usuario', 'UsuarioControlador@index');
Route::get('usuario/id/{id}', 'UsuarioControlador@datos_usuario') ->where('id', '[1-9]+');*/


// Authenticatio    n Routes...
Route::get('login', 'Auth\AuthController@showLoginForm');
Route::post('login', 'Auth\AuthController@login');
Route::get('logout', 'Auth\AuthController@logout');
// Registration Routes...
Route::get('register', 'Auth\AuthController@showRegistrationForm');
Route::post('register', 'Auth\AuthController@register');


Route::get('/home', 'HomeController@index');
Route::get('inicio', 'HomeController@inicio');

Route::get('/', function () {
    return view('main');
});


Route::get('reportes','PdfController@index');
Route::get('crear_reporte_pacientes/{tipo}','PdfController@crear_reporte_pacientes');
Route::get('crear_reporte_insumos/{tipo}','PdfController@crear_reporte_insumos');
Route::get('crear_reporte_insumos_privado/{tipo}/{filtro}','PdfController@crear_reporte_insumos_privado');



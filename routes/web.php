<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
//#############################################################
// Publico
//#############################################################
Route::get('/', 'indexController@lista');
Route::get('/buysalerent', 'buysalerentController@lista');
Route::get('/property-detail/{propiedad}', 'propertydetailController@mostrar');
Route::get('/about', function () {
    return view('sbs/about');
});
Route::get('/contact', function () {
    return view('sbs/contact');
});
//#############################################################
// Administrador
//#############################################################
Route::get('admin', 'propiedadesController@lista');
Route::get('propiedades', 'propiedadesController@lista');

Route::get('propiedades/crear', 'propiedadesController@crear');
Route::post('propiedades', 'propiedadesController@guardar');
Route::put('propiedades/{propiedad}', 'propiedadesController@modificar');

Route::get('propiedades/{propiedad}', 'propiedadesController@mostrar')->where('id', '[0-9]+');

Auth::routes();


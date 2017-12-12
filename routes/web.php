<?php

Route::get('/', function () {    return view('welcome');    });
Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');

//PROCESA
Route::get('/procesa/{modulo}/{lectura1}/{lectura2}/{lectura3}/{lectura4}', 'ProcessorCtrl@store')->name('_procesa');

#PROYECTOS
Route::get('/proyectos', 'ProyectoCtrl@index')->name('proyectos');
Route::get('/proyecto/nuevo', 'ProyectoCtrl@create')->name('proyecto.nuevo');
Route::get('/proyecto/{id}', 'ProyectoCtrl@viewr')->name('proyecto.viewr');
Route::post('proyecto/store', 'ProyectoCtrl@store')->name('proyecto.new');


//DISPOSITIVOS
Route::get('/proyecto/dispositivo/nuevo/{id}', 'NuggetCtrl@create')->name('device.nuevo');
Route::post('dispositivo/store', 'NuggetCtrl@store')->name('device.store');


//MONITOR
Route::get('/proyecto/monitor/{id}', 'MonitorCtrl@show')->name('proyecto.monitor');



//AJAX
Route::group(['prefix'=>'ajax', 'as'=>'ajax::'], function()
{
   #Route::post('proyecto/store', 'ProyectoCtrl@store')->name('proyecto.new');
   #Route::post('dispositivo/store', 'NuggetCtrl@store')->name('device.store');
   Route::post('dispositivo/delete', 'NuggetCtrl@delete')->name('device.delete');

});

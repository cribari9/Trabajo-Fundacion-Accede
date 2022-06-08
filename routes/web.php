<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProyectoController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\VoluntarioController;
use App\Http\Controllers\NosotrosController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ImgproyectosController;
use App\Http\Controllers\InscritoController;
use App\Http\Controllers\OpinionController;
use App\Http\Controllers\ContactoController;

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



Auth::routes();

Route::get('/welcome', [App\Http\Controllers\HomeController::class, 'index'])->name('welcome');

Route::resource('welcome',IndexController::class);
Route::resource('proyectos',ProyectoController::class);
Route::resource('eventos',EventoController::class);
Route::resource('opiniones',OpinionController::class);
Route::resource('nosotros',NosotrosController::class);
Route::resource('contacto',ContactoController::class);
Route::resource('voluntarios',VoluntarioController::class);
Route::resource('usuarios',UsuarioController::class);
Route::resource('imgproyectos',ImgproyectosController::class);
Route::resource('inscritos',InscritoController::class);

Route::get('/','App\Http\Controllers\indexController@index')->name('welcome');
Route::get('/welcome','App\Http\Controllers\indexController@index')->name('welcome');
Route::get('/proyectos','App\Http\Controllers\proyectoController@index')->name('proyectos');
Route::get('/eventos','App\Http\Controllers\eventoController@index')->name('eventos');
Route::get('/opiniones','App\Http\Controllers\opinionController@index')->name('opiniones');
Route::get('/nosotros','App\Http\Controllers\nosotrosController@index')->name('nosotros');
Route::get('/contacto','App\Http\Controllers\contactoController@index')->name('contacto');
Route::get('/voluntarios','App\Http\Controllers\voluntarioController@index')->name('voluntarios');
Route::get('/usuarios','App\Http\Controllers\usuarioController@index')->name('usuarios');

Route::post('/proyectos','App\Http\Controllers\proyectoController@store')->name('proyectos.store');
Route::post('/eventos','App\Http\Controllers\eventoController@store')->name('eventos.store');
Route::post('/nosotros','App\Http\Controllers\nosotrosController@store')->name('nosotros.store');
Route::post('/voluntarios','App\Http\Controllers\voluntarioController@store')->name('voluntarios.store');
Route::post('/usuarios','App\Http\Controllers\usuarioController@store')->name('usuarios.store');
Route::post('/inscripcion','App\Http\Controllers\inscritoController@store')->name('inscripcion.store');

/* Vista para la galeria de imagenes de cada proyecto */
Route::get('proyectos/ver_galeria/{id}', ['as' => 'proyectos/ver_galeria', 'uses' => 'App\Http\Controllers\proyectoController@ver_galeria']);

/* Vista para la galeria de imagenes de cada proyecto */
Route::get('eventos/ver_inscritos/{id}', ['as' => 'eventos/ver_inscritos', 'uses' => 'App\Http\Controllers\eventoController@ver_inscritos']);

Route::get('inscritos.excel', [InscritoController::class,'exportExcel']);


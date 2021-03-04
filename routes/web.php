<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return redirect()->route('home');
});

Auth::routes();


//Grupo home
Route::group(['prefix' => 'home',"middleware" => "auth"], function () {

    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::group(['prefix' => 'obras'], function () {
        Route::get("/crear","ObraController@create")->name("obra.crear");
        Route::post("/crear","ObraController@store")->name("obra.store");
        Route::get("/", "ObraController@index")->name("obra.index");
        Route::get("/ver/{obra}", "ObraController@show")->name("obra.show");
    });

    Route::get("/user/{user}","UserController@show")->name("user.show");
    Route::get("/user/{user}/edit","UserController@edit")->name("user.edit");

    //Solo para cordinadores
    Route::middleware("role:coordinador")->group(function (){
        //Registro de trabajadores
        Route::get("/register","Auth\Trabajador\RegisterController@showRegisterForm")
        ->name("register.trabajadores");

        Route::post("/register","Auth\Trabajador\RegisterController@TrabajadorRegister");

        //Tipos de edificios
        Route::group(['prefix' => 'tipos-edificios'], function () {
            Route::get("/", "TipoEdificioController@index");
            //Crear
            Route::get("/crear", "TipoEdificioController@create")->name("tipoEdificio.crear");
            Route::post("/crear", "TipoEdificioController@store")->name("tipoEdificio.store");
        });

        //Tipos de obras
        Route::group(['prefix' => 'tipos-obras'], function () {
            Route::get("/", "TipoObraController@index");
            //Crear
            Route::get("/crear", "TipoObraController@create")->name("tipoObra.crear");
            Route::post("/crear", "TipoObraController@store")->name("tipoObra.store");
        });

        //Obras
        Route::group(['prefix' => 'obras'], function () {
            //Asignar tecnicos
            Route::post("/ver/{obra}", "ObraController@trabajador")->name("obra.trabajador");
            
        });
    });

    //Solo para tecnicos
    Route::middleware("role:tecnico")->group(function (){
        //Obras
        Route::group(['prefix' => 'obras'], function () {
            //Cambiar el estado
            Route::post("/ver/{obra}/estado" , "ObraController@update")->name("obra.update");
            //Comentarios
            Route::post("/ver/{obra}/comentar", "ComentarioController@store")->name("comentario.store");
            
        });
    });

    //Solo para solicitantes
    Route::middleware("role:solicitante")->group((function (){
        Route::post("/obras/ver/{obra}/fechas", "ObraController@updateDates")->name("obraFechas.update");
    }));


});
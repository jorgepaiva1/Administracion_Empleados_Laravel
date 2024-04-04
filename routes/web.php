<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\ImpersonateController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});
/*
Route::get('/empleado', function () {
    return view('empleado.index');
});
Route::get('/empleado/create', [EmpleadoController::class,'create']);
*/


Route::resource('empleado',EmpleadoController::class)->middleware('auth');

Auth::routes();

Route::get('/home', [EmpleadoController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function() {
    Route::get('/', [EmpleadoController::class, 'index'])->name('home');

});

Auth::routes();

Route::get('/empleado', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::post('/impersonate/start', [ImpersonateController::class, 'start'])->name('start');
Route::post('/impersonate/stop', [ImpersonateController::class, 'stop'])->name('salir_usuario');
Route::get('/usuarios', [ImpersonateController::class, 'index'])->middleware('auth')->name('lista_usuario');
Route::post('/select_user', [ImpersonateController::class, 'selectUser'])->name('select_user');
Route::get('/nombres',[ImpersonateController::class, 'index2'])->middleware('auth')->name('select_name');

Route::get('/empleado', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

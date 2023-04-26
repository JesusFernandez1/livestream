<?php

use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\UserController;
use App\Models\Provincia;
use Illuminate\Support\Facades\Route;

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
    return view('entrada_web');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::controller(EmpleadoController::class)->group(function () {
   
});

Route::resource('empleados', EmpleadoController::class);



Route::controller(UserController::class)->group(function () {

});
Route::resource('usuarios', UserController::class);



Route::controller(PedidoController::class)->group(function () {

});
Route::get('provincias/{comunidad}', [PedidoController::class, 'provinciasDeComunidad']);
Route::resource('pedidos', PedidoController::class);



Route::controller(ProductoController::class)->group(function () {

});
Route::resource('productos', ProductoController::class);

require __DIR__.'/auth.php';

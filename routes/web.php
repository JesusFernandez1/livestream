<?php

use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\githubController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\UserController;
use App\Models\Producto;
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
    $productos = Producto::all();
    return view('entrada_web', compact('productos'));
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::controller(GithubController::class)->group(function () {
    Route::get('/auth/github/redirect', 'redirectGithub')->name('github.redirectGithub');
    Route::get('/auth/github/callback', 'callbackGithub');
});

Route::controller(EmpleadoController::class)->group(function () {
    Route::get('base', [EmpleadoController::class, 'base'])->name('base');
});
Route::resource('empleados', EmpleadoController::class)->middleware('admin');



Route::controller(UserController::class)->group(function () {
    Route::get('entrada_web', [UserController::class, 'entrada_web'])->name('entrada_web');
    Route::get('usuarios/configuracion', [UserController::class, 'configuracion'])->name('usuarios.configuracion');
    Route::post('entrada_web', [UserController::class, 'enviarComentario'])->name('usuarios.enviarComentario');
    Route::get('usuarios/mostrar_usuarios', [UserController::class, 'usuariosRegistrados'])->name('usuarios.usuariosRegistrados');
});
Route::resource('usuarios', UserController::class);



Route::controller(PedidoController::class)->group(function () {
    Route::get('pedidos/mostrarPedidoUnico/{id}', [PedidoController::class, 'verPedido'])->name('pedidos.verPedido');
    Route::get('pedidos/crear_pedido/{total_price}', [PedidoController::class, 'crearPedido'])->name('pedidos.crearPedido');
});
Route::get('provincias/{comunidad}', [PedidoController::class, 'provinciasDeComunidad']);
Route::resource('pedidos', PedidoController::class);



Route::controller(ProductoController::class)->group(function () {

});
Route::resource('productos', ProductoController::class);

require __DIR__.'/auth.php';

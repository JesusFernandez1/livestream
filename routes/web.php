<?php

use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\GithubController;
use App\Http\Controllers\PaypalController;
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
})->name('/');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::controller(GithubController::class)->group(function () {
    Route::get('/auth/github/redirect', 'redirectGithub')->name('github.redirectGithub');
    Route::get('/auth/github/callback', 'callbackGithub');
});

Route::controller(PaypalController::class)->group(function(){
    Route::get('/paypal/pay/{id}', 'payWithPaypal')->name('paypal.pay');
    Route::get('/paypal/status/{id}','payPalStatus')->name('paypal.status');
    Route::get('/pagocorrecto','pagoCorrecto')->name('pagofinalizado');
});

Route::controller(EmpleadoController::class)->group(function () {
    Route::get('base', [EmpleadoController::class, 'base'])->name('base');
});
Route::resource('empleados', EmpleadoController::class)->middleware('admin');



Route::controller(UserController::class)->group(function () {
    Route::get('usuarios/soporte', [UserController::class, 'soporte'])->name('usuarios.soporte');
    Route::post('entrada_web', [UserController::class, 'enviarComentario'])->name('usuarios.enviarComentario');
    Route::get('usuarios/mostrar_usuarios', [UserController::class, 'usuariosRegistrados'])->name('usuarios.usuariosRegistrados');
    Route::get('usuarios/lista_deseados', [UserController::class, 'verLista'])->name('usuarios.verLista');
    Route::get('usuarios/lista_deseados/{id}', [UserController::class, 'eliminarDeseados'])->name('usuarios.eliminarDeseados');
    Route::get('usuarios/mostrar_peticiones', [UserController::class, 'peticiones'])->name('usuarios.peticiones');
    Route::get('usuarios/modificar_datos', [UserController::class, 'modificarDatos'])->name('usuarios.modificarDatos');
    Route::post('usuarios/cambios_realizados', [UserController::class, 'cambiarDatos'])->name('usuarios.cambiarDatos');
    Route::get('usuarios/cambiar_pass', [UserController::class, 'verCambiarPass'])->name('usuarios.verCambiarPass');
    Route::post('usuarios/pass_cambiada', [UserController::class, 'cambiarPass'])->name('usuarios.cambiarPass');
});
Route::resource('usuarios', UserController::class);

Route::get('/agregarListaDeseados', [UserController::class, 'agregarListaDeseados']);

Route::controller(PedidoController::class)->group(function () {
    Route::get('pedidos/pedido_cancelado/{id}', [PedidoController::class, 'cancelarPedido'])->name('pedidos.cancelarPedido');
    Route::post('pedidos/crear_pedido/{total_price}', [PedidoController::class, 'realizarPedido'])->name('pedidos.realizarPedido');
    Route::get('pedidos/pagar_paypal', [PedidoController::class, 'pagarPaypal'])->name('pedidos.pagarPaypal');
    Route::post('pedidos/pago_paypal/{total_price}', [PedidoController::class, 'realizarPagoPaypal'])->name('pedidos.realizarPagoPaypal');
});
Route::get('provincias/{comunidad}', [PedidoController::class, 'provinciasDeComunidad']);
Route::resource('pedidos', PedidoController::class);



Route::controller(ProductoController::class)->group(function () {

});
Route::resource('productos', ProductoController::class);

require __DIR__.'/auth.php';

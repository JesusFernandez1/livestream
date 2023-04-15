<?php

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::group(['prefix' => 'usuarios', 'middleware' => ['auth', 'admin']], function () {

});
Route::resource('usuario', 'UserController')->except([
    'index', 'show'
])->middleware('admin');

Route::group(['prefix' => 'empleados', 'middleware' => ['auth', 'admin']], function () {

});
Route::resource('empleado', 'EmpleadoController')->except([
    'show', 'edit', 'update'
])->middleware('admin');

Route::group(['prefix' => 'pedidos', 'middleware' => ['auth', 'admin']], function () {

});
Route::resource('pedido', 'PedidoController')->except([
    'index', 'show'
])->middleware('admin');

Route::group(['prefix' => 'productos', 'middleware' => ['auth', 'admin']], function () {

});
Route::resource('producto', 'ProductoController')->except([
    'index', 'show'
])->middleware('admin');

Route::get('/provincias/{comunidad_id}', function ($comunidad_id) {
    $provincias = Provincia::where('comunidad_id', $comunidad_id)->get();
    return response()->json($provincias);
});

require __DIR__.'/auth.php';

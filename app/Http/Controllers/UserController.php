<?php

namespace App\Http\Controllers;

use App\Models\AtencionCliente;
use App\Models\Empleado;
use App\Models\GrupoEmpleados;
use App\Models\ListaDeseados;
use App\Models\Producto;
use App\Models\User;
use App\Rules\MinLength;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function entrada_web()
    {
        return view('entrada_web');
    }

    public function soporte()
    {
        return view('usuarios.soporte');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('ordenar_por')) {
            $ordenPor = $request->input('ordenar_por');
            $orden = $request->input('orden', 'asc');
            $usuarios = User::orderBy($ordenPor, $orden)->paginate(11);
            session(['orden' => $orden]);
        } else {
            session(['orden' => null]);
        }

        $usuario = Empleado::where('id', Auth::user()->empleados_id)->first()->grupo_empleados_id;
            if ($usuario == null) {
                $grupo = null;
                $usuarios = User::paginate(11);

                if($request->has('ordenar_por')) {
                    $ordenPor = $request->input('ordenar_por');
                    $orden = $request->input('orden', 'asc');
                    $usuarios = User::orderBy($ordenPor, $orden)->paginate(11);
                    session(['orden' => $orden]);
                } else {
                    session(['orden' => null]);
                }
                return view('usuarios.mostrar_usuarios', compact('usuarios', 'grupo'));
            }
        $grupo = GrupoEmpleados::where('id', $usuario)->first()->nombre;
        $usuarios = User::paginate(11);
        if($request->has('ordenar_por')) {
                    $ordenPor = $request->input('ordenar_por');
                    $orden = $request->input('orden', 'asc');
                    $usuarios = User::orderBy($ordenPor, $orden)->paginate(11);
                    session(['orden' => $orden]);
                } else {
                    session(['orden' => null]);
                }
        return view('usuarios.mostrar_usuarios', compact('usuarios', 'grupo'));
    }

    public function usuariosRegistrados()
    {
        $usuarios = User::where('DNI' != null);
        return view('usuarios.mostrar_usuarios', compact('usuarios'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $usuario = User::find($id);
        return view('usuarios.mostrarDetalles_usuario', compact('usuario'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuario = User::find($id);
        return view('usuarios.modificar_usuario', compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datos = $request->validate([
            'DNI' => ['regex:/((^[A-Z]{1}[0-9]{7}[A-Z0-9]{1}$|^[T]{1}[A-Z0-9]{8}$)|^[0-9]{8}[A-Z]{1}$)/'],
            'name' => ['regex:/^[a-z]+$/i'],
            'email' => ['regex:#^(((([a-z\d][\.\-\+_]?)*)[a-z0-9])+)\@(((([a-z\d][\.\-_]?){0,62})[a-z\d])+)\.([a-z\d]{2,6})$#i'],
            'phone' => ['regex:/(\+34|0034|34)?[ -]*(6|7|8|9)[ -]*([0-9][ -]*){8}/'],
        ]);
        User::where('id', $id)->update($datos);
        return redirect()->route('usuarios.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Empleado::where('correo', User::where('id', $id)->first()->correo)) {
            Empleado::where('correo', User::where('id', $id)->first()->correo)->delete();
        }
        User::find($id)->delete();

        return redirect()->route('usuarios.index');
    }

    public function enviarComentario(Request $request)
    {
        $datos = $request->validate([
            'nombre_usuario' => ['required', 'regex:/^[a-z]+$/i'],
            'correo_usuario' => ['required', 'regex:#^(((([a-z\d][\.\-\+_]?)*)[a-z0-9])+)\@(((([a-z\d][\.\-_]?){0,62})[a-z\d])+)\.([a-z\d]{2,6})$#i'],
            'asunto' => ['nullable'],
            'mensaje' => ['required', 'string', new MinLength(120)],
        ]);
        $datos['users_id'] = User::where('email', $request->correo_cliente);
        AtencionCliente::insert($datos);
        return view('entrada_web');
    }

    public function peticiones()
    {
        $usuario = Empleado::where('id', Auth::user()->empleados_id)->first()->grupo_empleados_id;
            if ($usuario == null) {
                $grupo = null;
                $peticiones = AtencionCliente::paginate(11);
                return view('usuarios.mostrar_peticiones', compact('peticiones', 'grupo'));
            }
        $grupo = GrupoEmpleados::where('id', $usuario)->first()->nombre;
        $peticiones = AtencionCliente::paginate(11);
        return view('usuarios.mostrar_peticiones', compact('peticiones', 'grupo'));
    }

    public function agregarListaDeseados(Request $request)
    {
        $productId = $request->query('productId');
        $productId = intval($productId);
        $productId = Producto::where('id', $productId)->first()->id;
        $nombre_producto = Producto::where('id', $productId)->first()->nombre;
        $precio_producto = Producto::where('id', $productId)->first()->precio;
        $imagen_producto = Producto::where('id', $productId)->first()->imagen;
        $descripcion_producto = Producto::where('id', $productId)->first()->descripcion;
        if (!ListaDeseados::where('users_id', Auth::user()->id)->where('productos_id', $productId)->exists()) {
            ListaDeseados::create([
                'nombre_producto' => $nombre_producto,
                'precio_producto' => $precio_producto,
                'imagen_producto' => $imagen_producto,
                'descripcion_producto' => $descripcion_producto,
                'users_id' => Auth::user()->id,
                'productos_id' => $productId
            ]);
        }
        return response()->json(['message' => 'Producto agregado a la lista de deseos']);
    }

    public function verLista()
    {
        $productos = ListaDeseados::where('users_id', Auth::user()->id)->get();
        return view('usuarios.lista_deseados', compact('productos'));
    }
}

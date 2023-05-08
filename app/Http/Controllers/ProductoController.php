<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $productos = Producto::paginate(10);
        if($request->has('ordenar_por')) {
            $ordenPor = $request->input('ordenar_por');
            $orden = $request->input('orden', 'asc');
            $productos = Producto::orderBy($ordenPor, $orden)->paginate(10);
            session(['orden' => $orden]);
        } else {
            session(['orden' => null]);
        }
        return view('productos.mostrar_productos', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('productos.crear_producto');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datos = $request->validate([
            'nombre' => ['regex:/^[a-z]+$/i'],
            'stock' => ['required'],
            'descripcion' => ['required'],
            'precio' => ['required'],
            'marcas_id' => ['required'],
        ]);
        Producto::insert($datos);
        return redirect()->route('productos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $producto = Producto::find($id);
        return view('productos.mostrarDetalles_producto', compact('producto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $producto = Producto::find($id);
        return view('productos.modificar_producto', compact('producto'));
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
            'nombre' => ['regex:/^[a-z]+$/i'],
            'stock' => ['required'],
            'descripcion' => ['required'],
            'precio' => ['required'],
            'marcas_id' => ['required'],
        ]);
        Producto::where('id', $id)->update($datos);
        return redirect()->route('productos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

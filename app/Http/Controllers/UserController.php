<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function entrada_web()
    {
        return view('entrada_web');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = User::paginate(2);
        return view('usuarios.mostrar_usuarios', compact('usuarios'));
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
        //
    }
}

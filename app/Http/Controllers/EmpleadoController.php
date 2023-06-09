<?php

namespace App\Http\Controllers;

use App\Mail\EmpleadoCreado;
use App\Models\Empleado;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class EmpleadoController extends Controller
{

    public function base()
    {
        return view('base');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $empleados = Empleado::paginate(11);
        if($request->has('ordenar_por')) {
            $ordenPor = $request->input('ordenar_por');
            $orden = $request->input('orden', 'asc');
            $empleados = Empleado::orderBy($ordenPor, $orden)->paginate(11);
            session(['orden' => $orden]);
        } else {
            session(['orden' => null]);
        }
        return view('empleados.mostrar_empleados', compact('empleados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('empleados.crear_empleado');
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
            'DNI' => ['regex:/((^[A-Z]{1}[0-9]{7}[A-Z0-9]{1}$|^[T]{1}[A-Z0-9]{8}$)|^[0-9]{8}[A-Z]{1}$)/', 'unique:empleados'],
            'nombre' => ['regex:/^[a-z]+$/i'],
            'apellido' => ['regex:/^[a-z]+$/i'],
            'correo' => ['regex:#^(((([a-z\d][\.\-\+_]?)*)[a-z0-9])+)\@(((([a-z\d][\.\-_]?){0,62})[a-z\d])+)\.([a-z\d]{2,6})$#i', 'unique:empleados'],
            'telefono' => ['regex:/(\+34|0034|34)?[ -]*(6|7|8|9)[ -]*([0-9][ -]*){8}/'],
            'role' => ['required'],
        ]);
        Empleado::insert($datos);
        $user = User::create([
            'DNI' => $request->DNI,
            'name' => $request->nombre,
            'lastname' => $request->apellido,
            'email' => $request->correo,
            'password' => Hash::make(Str::random(8)),
            'phone' => $request->telefono,
            'empleados_id' => Empleado::where('DNI', $request->DNI)->first()->id
        ]);
        $usuario = Empleado::where('correo', $request->correo)->first();
        $correo = $usuario->email;
        Mail::to($correo)->send(new EmpleadoCreado());
        event(new Registered($user));
        return redirect()->route('empleados.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $empleado = Empleado::find($id);
        return view('empleados.mostrarDetalles_empleado', compact('empleado'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empleado = Empleado::find($id);
        return view('empleados.modificar_empleado', compact('empleado'));
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
            'nombre' => ['regex:/^[a-z]+$/i'],
            'apellido' => ['regex:/^[a-z]+$/i'],
            'correo' => ['regex:#^(((([a-z\d][\.\-\+_]?)*)[a-z0-9])+)\@(((([a-z\d][\.\-_]?){0,62})[a-z\d])+)\.([a-z\d]{2,6})$#i'],
            'telefono' => ['regex:/(\+34|0034|34)?[ -]*(6|7|8|9)[ -]*([0-9][ -]*){8}/'],
            'role' => ['required'],
        ]);
        Empleado::where('id', $id)->update($datos);

        User::where('id', $id)->update([
            'DNI' => $request->DNI,
            'name' => $request->nombre,
            'lastname' => $request->apellido,
            'email' => $request->correo,
            'phone' => $request->telefono
        ]);
        

        return redirect()->route('empleados.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::where('email', Empleado::where('id', $id)->first()->correo)->delete();
        Empleado::find($id)->delete();

        return redirect()->route('empleados.index');
    }
}

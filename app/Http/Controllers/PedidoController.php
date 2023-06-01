<?php

namespace App\Http\Controllers;

use App\Mail\PedidoActualizado;
use App\Models\Comunidad;
use App\Models\Empleado;
use App\Models\GrupoEmpleados;
use App\Models\Pedido;
use App\Models\Provincia;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DateInterval;
use DateTime;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuario = Auth::user()->id;

        if (Auth::user()->empleados_id) {
            $usuario = Empleado::where('id', Auth::user()->empleados_id)->first()->grupo_empleados_id;
            if ($usuario == null) {
                $grupo = null;
                $pedidos = Pedido::paginate(10);
                return view('pedidos.mostrar_pedidos', compact('pedidos', 'grupo'));
            }
            $grupo = GrupoEmpleados::where('id', $usuario)->first()->nombre;
            $pedidos = Pedido::paginate(10);
            return view('pedidos.mostrar_pedidos', compact('pedidos', 'grupo'));
        } else {
            $pedidos = Pedido::where('users_id', $usuario)->paginate(5);
            $grupo = '';
            return view('pedidos.mostrar_pedidos', compact('pedidos', 'grupo'));
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $comunidades = Comunidad::all();
        $totalPrice = $request->query('total');
        return view('pedidos.crear_pedido', compact('comunidades', 'totalPrice'));
    }

    public function provinciasDeComunidad($comunidadId)
    {
        $provincias = Provincia::where('comunidad_id', $comunidadId)->get();
        return response()->json($provincias);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $precio)
    {
       //
    }

    public function realizarPedido(Request $request, $precio)
    {
        $precio_final = substr($precio, 3);
        floatval($precio_final);
        
        $fecha_pedido = new DateTime(); // fecha específica
        $copia = new DateTime();
        $fecha_entrega =$copia->add(new DateInterval('P2D')); // fecha + 2 días
        $datos = $request->validate([
            'DNI' => ['regex:/((^[A-Z]{1}[0-9]{7}[A-Z0-9]{1}$|^[T]{1}[A-Z0-9]{8}$)|^[0-9]{8}[A-Z]{1}$)/'],
            'nombre' => ['regex:/^[a-z]+$/i'],
            'apellido' => ['regex:/^[a-z]+$/i'],
            'telefono' => ['regex:/(\+34|0034|34)?[ -]*(6|7|8|9)[ -]*([0-9][ -]*){8}/'],
            'correo' => ['regex:#^(((([a-z\d][\.\-\+_]?)*)[a-z0-9])+)\@(((([a-z\d][\.\-_]?){0,62})[a-z\d])+)\.([a-z\d]{2,6})$#i'],
            'direccion' => ['required'],
            'datos_adicionales' => ['required'],
            'codigo_postal' => ['required'],
            'comunidades_id' => ['required'],
            'provincias_cod' => ['required'],
        ]);

        $fecha_pedido = Carbon::parse($fecha_pedido);
        $fecha_entrega = Carbon::parse($fecha_entrega);
        
        if ($fecha_pedido->isThursday()) {
            $fecha_entrega = $fecha_pedido->copy()->next(Carbon::MONDAY);
        } elseif ($fecha_pedido->isFriday() || $fecha_pedido->isSaturday() || $fecha_pedido->isSunday()) {
            $fecha_entrega = $fecha_pedido->copy()->next(Carbon::TUESDAY);
        }
        
        $datos['numero_pedido'] = Str::random(9);
        $datos['fecha_pedido'] = $fecha_pedido->format('Y-m-d');
        $datos['fecha_entrega'] = $fecha_entrega->format('Y-m-d');
        $datos['estado'] = "Pendiente";
        $datos['importe_total'] =  $precio_final;
        $datos['users_id'] = Auth::user()->id;
        Pedido::insert($datos);
        return redirect()->route('pedidos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pedido = Pedido::find($id);
        return view('pedidos.modificar_pedido', compact('pedido'));
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
        $fecha_creacion = Pedido::where('id', $id)->first()->fecha_creacion;
        $datos = $request->validate([
            'fecha_entrega' => [
                'nullable', 'date_format:Y-m-d\TH:i',
                function ($atribute, $value, $fail) use ($fecha_creacion) {
                    if (date("Y-m-d\TH", strtotime($value)) <= date("Y-m-d\TH", strtotime($fecha_creacion))) {
                        $fail("La fecha de finalizacion no puede ser menor que la de creacion");
                    }
                }
            ],
            'estado' => ['nullable']
        ]);
        $datos['updated_at'] = date("Y-m-d\TH");
        $datos['autor_modificacion'] = Auth::user()->name;
        
        $correo = User::where('id', Pedido::where('id', $id)->first()->users_id)->first()->email;
        Mail::to(User::where('id', $correo))->send(new PedidoActualizado());
        Pedido::where('id', $id)->update($datos);

        return redirect()->route('pedidos.index');
       
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
    
    public function verPedido(Request $request, $id)
    {
        $pedidos = Pedido::where('users_id', $id)->paginate(10);
        if($request->has('ordenar_por')) {
            $ordenPor = $request->input('ordenar_por');
            $orden = $request->input('orden', 'asc');
            $pedidos = Pedido::orderBy($ordenPor, $orden)->paginate(10);
            session(['orden' => $orden]);
        } else {
            session(['orden' => null]);
        }
        return view('pedidos.mostrar_pedidos', compact('pedidos'));
    }
    public function getTotalPrice(Request $request)
    {
        $totalPrice = $request->input('totalPrice');

        return response()->json(['totalPrice' => $totalPrice]);
    }
}
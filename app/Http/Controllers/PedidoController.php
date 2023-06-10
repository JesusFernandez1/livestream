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
use DateTimeZone;
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
        $usuario = User::where('id', Auth::user()->id);
        $pedido = Pedido::where('users_id', $usuario->first()->id)->first(); // Ejecuta la consulta y obtén el primer pedido
        $fecha_actual = fecha_actual();
        $copia = new DateTime('now', new DateTimeZone('Europe/Madrid'));
        $fecha_entrega = $copia->add(new DateInterval('P2D'));
        $fecha_estimada = cambio_fecha($fecha_actual, $fecha_entrega);
        return view('pedidos.crear_pedido', compact('comunidades', 'totalPrice', 'usuario', 'pedido', 'fecha_actual', 'fecha_estimada'));
    }

    public function pagarPaypal(Request $request)
    {
        $comunidades = Comunidad::all();
        $totalPrice = $request->query('total');
        $usuario = User::where('id', Auth::user()->id);
        $pedido = Pedido::where('users_id', $usuario->first()->id)->first(); // Ejecuta la consulta y obtén el primer pedido
        $fecha_actual = fecha_actual();
        $copia = new DateTime('now', new DateTimeZone('Europe/Madrid'));
        $fecha_entrega = $copia->add(new DateInterval('P2D'));
        $fecha_estimada = cambio_fecha($fecha_actual, $fecha_entrega);
        return view('pedidos.pagar_paypal', compact('comunidades', 'totalPrice', 'usuario', 'pedido', 'fecha_actual', 'fecha_estimada'));
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
        $precio_final = str_replace(",", "", $precio_final);
        $precio_final = str_replace(".", ".", $precio_final);
        $precio_final = floatval($precio_final);
        $fecha_pedido = fecha_actual(); // fecha específica
        $copia = new DateTime('now', new DateTimeZone('Europe/Madrid'));
        $fecha_entrega = $copia->add(new DateInterval('P2D')); // fecha + 2 días
        $datos = $request->validate([
            'DNI' => ['regex:/((^[A-Z]{1}[0-9]{7}[A-Z0-9]{1}$|^[T]{1}[A-Z0-9]{8}$)|^[0-9]{8}[A-Z]{1}$)/'],
            'numero_tarjeta' => ['required'],
            'cv' => ['required'],
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

        $fecha_entrega = cambio_fecha($fecha_pedido, $fecha_entrega);
        $fecha_pedido = Carbon::parse($fecha_pedido);

        $datos['numero_pedido'] = Str::random(9);
        $datos['fecha_pedido'] = $fecha_pedido->format("Y-m-d\TH:i");
        $datos['fecha_entrega'] = $fecha_entrega->format("Y-m-d\TH:i");
        $datos['estado'] = "Pendiente";
        $datos['importe_total'] =  $precio_final;
        $datos['users_id'] = Auth::user()->id;
        Pedido::insert($datos);
        return redirect()->route('pedidos.index');
    }

    public function realizarPagoPaypal(Request $request, $precio)
    {
        $precio_final = substr($precio, 3);
        $precio_final = str_replace(",", "", $precio_final);
        $precio_final = str_replace(".", ".", $precio_final);
        $precio_final = floatval($precio_final);
        $fecha_pedido = fecha_actual(); // fecha específica
        $copia = new DateTime('now', new DateTimeZone('Europe/Madrid'));
        $fecha_entrega = $copia->add(new DateInterval('P2D')); // fecha + 2 días
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

        $fecha_entrega = cambio_fecha($fecha_pedido, $fecha_entrega);
        $fecha_pedido = Carbon::parse($fecha_pedido);

        $datos['numero_pedido'] = Str::random(9);
        $datos['fecha_pedido'] = $fecha_pedido->format("Y-m-d\TH:i");
        $datos['fecha_entrega'] = $fecha_entrega->format("Y-m-d\TH:i");
        $datos['estado'] = "Pendiente";
        $datos['importe_total'] =  $precio_final;
        $datos['users_id'] = Auth::user()->id;
        Pedido::insert($datos);
        $pedido = Pedido::where('correo', $request->correo)->first();
        $pedido_id = $pedido->id;

        return redirect()->route('paypal.pay', ['id' => $pedido_id]);

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
        $fecha_pedido = Pedido::where('id', $id)->first()->fecha_pedido;
        $datos = $request->validate([
            'fecha_entrega' => [
                'nullable', 'date_format:Y-m-d\TH:i',
                function ($atribute, $value, $fail) use ($fecha_pedido) {
                    if (date("Y-m-d\TH", strtotime($value)) <= date("Y-m-d\TH", strtotime($fecha_pedido))) {
                        $fail("La fecha de entrega no puede ser menor que la de creacion");
                    }
                }
            ],
            'estado' => ['required']
        ]);
        $datos['updated_at'] = fecha_actual();
        $datos['autor_modificacion'] = Auth::user()->name;

        $pedido = Pedido::where('id', $id)->first();
        $user = User::where('id', $pedido->users_id)->first();
        $correo = $user->email;

        if ($pedido->estado != $request->estado) {
            Mail::to($correo)->send(new PedidoActualizado());
        }
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

    public function cancelarPedido($id)
    {
        Pedido::where('id', $id)->update(['estado' => 'Cancelado' ]);
        return redirect()->route('pedidos.index');
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

function cambio_fecha($fecha_pedido, $fecha_entrega)
{
    $fecha_pedido = Carbon::parse($fecha_pedido);
    $fecha_entrega = Carbon::parse($fecha_entrega);

        if ($fecha_pedido->isThursday()) {
            $fecha_entrega->modify('next monday');
        } elseif ($fecha_pedido->isFriday() || $fecha_pedido->isSaturday() || $fecha_pedido->isSunday()) {
            $fecha_entrega->modify('next tuesday');
        }
        return $fecha_entrega->setTime(9, 0, 0);
}

function fecha_actual()
{
    $timezone = new DateTimeZone('Europe/Madrid');
    $datetime = new DateTime('now', $timezone);
    $fecha_actual = $datetime->format("Y-m-d\TH:i");

    return $fecha_actual;
}
<?php

namespace App\Http\Controllers;

use App\Models\Comunidad;
use App\Models\Pedido;
use App\Models\Provincia;
use App\Notifications\PedidoActualizado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use DateInterval;
use DateTime;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pedidos = Pedido::paginate(10);
        return view('pedidos.mostrar_pedidos', compact('pedidos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $comunidades = Comunidad::all();
        return view('pedidos/crear_pedido', compact('comunidades'));
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
    public function store(Request $request)
    {
        $fecha_pedido = new DateTime(); // fecha específica
        $fecha_entrega =$fecha_pedido->add(new DateInterval('P2D')); // fecha + 2 días
        $datos = $request->validate([
            'DNI' => ['regex:/((^[A-Z]{1}[0-9]{7}[A-Z0-9]{1}$|^[T]{1}[A-Z0-9]{8}$)|^[0-9]{8}[A-Z]{1}$)/'],
            'nombre' => ['regex:/^[a-z]+$/i'],
            'apellido' => ['regex:/^[a-z]+$/i'],
            'telefono' => ['regex:/(\+34|0034|34)?[ -]*(6|7|8|9)[ -]*([0-9][ -]*){8}/'],
            'correo' => ['regex:#^(((([a-z\d][\.\-\+_]?)*)[a-z0-9])+)\@(((([a-z\d][\.\-_]?){0,62})[a-z\d])+)\.([a-z\d]{2,6})$#i'],
            'direccion' => ['required'],
            'codigo_postal' => ['required'],
            'importe_total' => ['required'],
            'comunidades_id' => ['required'],
            'provincias_cod' => ['required'],
        ]);

        $fecha_pedido = Carbon::parse($datos['fecha_pedido']);
        $fecha_entrega = Carbon::parse($datos['fecha_entrega']);

        if ($fecha_pedido->isThursday()) {
            $fecha_entrega = $fecha_pedido->copy()->next(Carbon::MONDAY);
        } elseif ($fecha_pedido->isFriday() || $fecha_pedido->isSaturday() || $fecha_pedido->isSunday()) {
            $fecha_entrega = $fecha_pedido->copy()->next(Carbon::TUESDAY);
        } else {
            $fecha_entrega->subDays(2);
        }
        
        if (!validarCodigoPostal($request->provincia, $request->codigo_postal)) {
            $validator = Validator::make([], []);
            $validator->errors()->add('codigo_postal', 'El código postal introducido no pertenece a la provincia seleccionada.');
            throw new ValidationException($validator);
        } else {
            $datos['fecha_pedido'] = $fecha_pedido->format('Y-m-d');
            $datos['fecha_entrega'] = $fecha_entrega->format('Y-m-d');
            $datos['estado'] = "Pendiente";
            $datos['users_id'] = Auth::user()->id;
            Pedido::insert($datos);
            return redirect()->route('Pedidos.index');
        } 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pedido = Pedido::find($id);
        return view('pedidos.mostrarDetalles_pedido', compact('pedido'));
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
        ]);

        Pedido::where('id', $id)->update($datos);
        $pedido = Pedido::where('id', $id);
        $cliente = $pedido->user_id;
        $cliente->notify(new PedidoActualizado($pedido));
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

function validarCodigoPostal($provincia, $codigoPostal) {
    // Hacer una consulta a la API de Correos para obtener la provincia del código postal introducido
    $url = 'https://api.correos.es/cpa/consultarCodigosPostalesAction.do?modo=provincia&cp=' . $codigoPostal;
    $json = file_get_contents($url);
    $datos = json_decode($json, true);
    $provinciaCodigoPostal = $datos['provincia'];

    // Comparar la provincia del código postal con la provincia seleccionada por el usuario
    return $provincia == $provinciaCodigoPostal;
}
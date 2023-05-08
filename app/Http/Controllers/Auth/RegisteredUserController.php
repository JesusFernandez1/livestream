<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Empleado;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'name' => ['required', 'string', 'max:255'],
        //     'lastname' => ['required', 'string', 'max:255'],
        //     'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        //     'password' => ['required', 'confirmed', Rules\Password::defaults()],
        //     'phone' => ['regex:/(\+34|0034|34)?[ -]*(6|7|8|9)[ -]*([0-9][ -]*){8}/'],
        //     'empleados_id' => ['nullable'],
        // ]);

        // $user = User::create([
        //     'name' => $request->name,
        //     'lastname' => $request->lastname,
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password),
        //     'phone' => $request->phone,
        //     'empleados_id' => $request->empleados_id
        // ]);

        // event(new Registered($user));

        // Auth::login($user);

        // return redirect(RouteServiceProvider::HOME);

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'phone' => ['regex:/(\+34|0034|34)?[ -]*(6|7|8|9)[ -]*([0-9][ -]*){8}/'],
            'empleados_id' => ['nullable']
        ]);

        $operador = Empleado::where('correo', $request->email)->first();
        if ($operador) {
            dd(Empleado::where('correo', $request->email)->first()->correo);
            $name = Empleado::where('correo', $request->email)->first()->nombre;
            $lastname = Empleado::where('correo', $request->email)->first()->apellido;
            $phone = Empleado::where('correo', $request->email)->first()->telefono;
            $empleado = Empleado::where('correo', $request->email)->first()->id;
        } else {
            $empleado = null;
            $name = $request->name;
            $lastname = $request->lastname;
            $phone = $request->phone;
        }
        
        $user = User::create([
            'name' => $name,
            'lastname' => $lastname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $phone,
            'empleados_id' => $empleado
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);


    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\usuarios;

class UsuarioController2 extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuarios = Usuarios::orderBy('nombre_usuario', 'asc')->paginate(5);
        return view('usuarios.index', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('usuarios.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validacion = Validator::make($request->all(), [
            'nombre_usuario' => 'required | string | min:10',
            'email' => 'required | string | min:10 | email | unique:usuarios',
            'password' => 'required | string | min:10 '
        ]);

        if ($validacion->fails()) {
            return response(['error' => $validation->errors()->all()], 400);

        }

        $usuario = new Usuarios();
        $usuario->nombre_usuario = $request->nombre_usuario;
        $usuario->email = $request->email;
        $usuario->password = $request->password;

        $usuario->save();

        $respuesta = "Insercion correcta";

        //return response(respuesta, 200);
        return redirect()->route('index')->with('exitp', $respuesta);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('show', compact('usuarios'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view ('edit', compact('usuarios'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validacion = Validator::make($request->all(), [
            'nombre_usuario' => 'required | string | min:10',
            'email' => 'required | string | min:10 | email | unique:usuarios',
            'password' => 'required | string | min:10 '
        ]);

        if ($validacion->fails()) {
            return response(['error' => $validation->errors()->all()], 400);

        }

        $usuario = new Usuarios();
        $usuario->nombre_usuario = $request->nombre_usuario;
        $usuario->email = $request->email;
        $usuario->password = $request->password;

        $usuario->save();

        $respuesta = "Actualización correcta";

        //return response(respuesta, 200);
        return redirect()->route('update')->with('exito', $respuesta);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
        $usuario->delete();
        $respuesta = "Eliminación correcta";

        //return response(respuesta, 200);
        return redirect()->route('index')->with('exito', $respuesta);
    }
}

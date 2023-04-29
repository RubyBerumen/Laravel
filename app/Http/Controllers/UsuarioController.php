<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Usuarios;

class UsuarioController extends Controller
{
    //Metodos ABCC
    public function crear_usuario(Request $request)
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

        return response(respuesta, 200);
        
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Directorio;
use App\Models\Contacto;

class DirectoriosController extends Controller
{
    public function mostrarDirectorios(){
        $directorios = Directorio::all();
        return view('directorio', compact('directorios'));
    }

    public function crearDirectorio(){
        return view('crearEntrada');
    }

    public function buscarDirectorio(){
        return view('buscar');
    }

    public function eliminarDirectorio(){
        return view('eliminar');
    }

    public function guardarDirectorio(){
        $nuevoDirectorio = new Directorio();
        $nuevoDirectorio->codigoEntrada = $request->codigo;
        $nuevoDirectorio->nombre = $request->nombre;
        $nuevoDirectorio->apellido = $request->apellido;
        $nuevoDirectorio->telefono = $request->telefono;
        $nuevoDirectorio->correo = $request->correo;
        $nuevoDirectorio->save();
        return redirect('/directorios/mostrar');
    }
}

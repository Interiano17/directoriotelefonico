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

    public function eliminarDirectorio($codigo){
        $directorioBuscado = Directorio::find($codigo);
        return view('eliminar', compact('directorioBuscado'));
    }

    public function guardarDirectorio(Request $request){
        $nuevoDirectorio = new Directorio();
        $nuevoDirectorio->codigoEntrada = $request->codigo;
        $nuevoDirectorio->nombre = $request->nombre;
        $nuevoDirectorio->apellido = $request->apellido;
        $nuevoDirectorio->telefono = $request->telefono;
        $nuevoDirectorio->correo = $request->correo;
        $nuevoDirectorio->save();
        return redirect('/directorios/mostrar');
    }

    public function destroy($codigo){
        $directorioEliminar = Directorio::find($codigo);
        $directorioEliminar->delete();

        $contactosBuscados = Contacto::where('codigoEntrada', $codigo)->get();
        foreach ($contactosBuscados as $contacto) {
            $contacto->delete();
        }

        return redirect('/directorios/mostrar');
    }
}

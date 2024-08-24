<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Directorio;
use App\Models\Contacto;

class ContactosController extends Controller
{
    public function verContactos($codigo){

        $directorioEntrada = Directorio::find($codigo);
        $contactosBuscados = Contacto::where('codigoEntrada', $codigo)->get();
        return view('vercontactos', compact('contactosBuscados', 'directorioEntrada'));
    }

    public function verContactosBusqueda(Request $request){
        $directorioEntrada = Directorio::where('correo', $request->correo)->get();
        $contactosBuscados = Contacto::where('codigoEntrada', $directorioEntrada[0]->codigoEntrada)->get();
        return view('vercontactos2', compact('contactosBuscados', 'directorioEntrada'));
    }

    public function agregarContacto($codigo){

        return view('agregarcontacto', compact('codigo'));
    }

    public function guardarContacto(Request $request){

        $nuevoContacto = new Contacto();
        $nuevoContacto->codigoEntrada = $request->codigo;
        $nuevoContacto->id = $request->id;
        $nuevoContacto->nombre = $request->nombre;
        $nuevoContacto->apellido = $request->apellido;
        $nuevoContacto->correo = $request->correo;
        $nuevoContacto->save();

        //return view('agregarcontacto', compact('codigo'));

        $directorioEntrada = Directorio::find($request->codigo);
        $contactosBuscados = Contacto::where('codigoEntrada', $request->codigo)->get();
        return view('vercontactos', compact('contactosBuscados', 'directorioEntrada'));
    }

    public function destroyContact($id, $codigo){

        $contactoEliminar = Contacto::find($id);
        $contactoEliminar->delete();

        $directorioEntrada = Directorio::find($codigo);
        $contactosBuscados = Contacto::where('codigoEntrada', $codigo)->get();
        
        return view('vercontactos', compact('contactosBuscados', 'directorioEntrada'));
    }
}

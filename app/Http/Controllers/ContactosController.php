<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contacto;

class ContactosController extends Controller
{
    public function verContactos(){
        return view('vercontactos');
    }

    public function agregarContacto(){
        return view('agregarcontacto');
    }
}

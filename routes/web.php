<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DirectoriosController;
use App\Http\Controllers\ContactosController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/directorios/mostrar', [DirectoriosController::class, 'mostrarDirectorios'])->name('directorios.mostrar');

Route::get('/directorios/crear', [DirectoriosController::class, 'crearDirectorio'])->name('directorio.crear');

Route::post('/directorios/guardar', [DirectoriosController::class, 'guardarDirectorio'])->name('directorio.guardar');

Route::get('/directorios/buscar', [DirectoriosController::class, 'buscarDirectorio'])->name('directorio.buscar');

Route::get('/directorios/contactos/ver/{codigo}', [ContactosController::class, 'verContactos'])->name('contactos.ver');

Route::post('/directorios/contactos/ver/buscar', [ContactosController::class, 'verContactosBusqueda'])->name('contactos.ver.busqueda');

Route::get('/directorios/contactos/eliminar/{codigo}', [DirectoriosController::class, 'eliminarDirectorio'])->name('directorio.eliminar');

Route::get('/directorios/contactos/agregar/{codigo}', [ContactosController::class, 'agregarContacto'])->name('contactos.agregar');

Route::post('/directorios/contactos/agregar/guardar', [ContactosController::class, 'guardarContacto'])->name('contacto.agregar.guardar');

Route::get('directorios/borrar/{codigo}', [DirectoriosController::class, 'destroy'])->name('directorio.destroy');

Route::get('contactos/borrar/{id}/{codigo}', [ContactosController::class, 'destroyContact'])->name('contacto.borrar');

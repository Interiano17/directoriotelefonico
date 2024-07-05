<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DirectoriosController;
use App\Http\Controllers\ContactosController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/directorios/mostrar', [DirectoriosController::class, 'mostrarDirectorios'])->name('directorios.mostrar');

Route::get('/directorios/crear', [DirectoriosController::class, 'crearDirectorio'])->name('directorio.crear');

Route::get('/directorios/guardar', [DirectoriosController::class, 'guardarDirectorio'])->name('directorio.guardar');

Route::get('/directorios/buscar', [DirectoriosController::class, 'buscarDirectorio'])->name('directorio.buscar');

Route::get('/directorios/contactos/ver', [ContactosController::class, 'verContactos'])->name('contactos.ver');

Route::get('/directorios/contactos/eliminar', [DirectoriosController::class, 'eliminarDirectorio'])->name('directorio.eliminar');

Route::post('/directorios/contactos/agregar', [ContactosController::class, 'agregarContacto'])->name('contactos.agregar');

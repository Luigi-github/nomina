<?php

use App\Http\Controllers\Api\PaisCiudadController;

// Ruta para obtener todos los países
Route::get('/paises', [PaisCiudadController::class, 'getPaises']);

// Ruta para obtener las ciudades de un país
Route::get('/ciudades/{paisId}', [PaisCiudadController::class, 'getCiudades']);

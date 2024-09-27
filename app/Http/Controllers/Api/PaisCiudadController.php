<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Ciudad;
use App\Models\Pais;
use Illuminate\Http\Request;

class PaisCiudadController extends Controller
{
    // Método para obtener todos los países
    public function getPaises()
    {
        $paises = Pais::all();
        return response()->json($paises);
    }

    // Método para obtener las ciudades de un país específico
    public function getCiudades($paisId)
    {
        $ciudades = Ciudad::where('pais_id', $paisId)->get();
        return response()->json($ciudades);
    }
}

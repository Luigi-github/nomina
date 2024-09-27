<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CiudadSeeder extends Seeder
{
    public function run()
    {
        DB::table('ciudads')->insert([
            ['nombre' => 'Bogotá', 'pais_id' => 1],
            ['nombre' => 'Medellín', 'pais_id' => 1],
            ['nombre' => 'Buenos Aires', 'pais_id' => 2],
            ['nombre' => 'Córdoba', 'pais_id' => 2],
            ['nombre' => 'Ciudad de México', 'pais_id' => 3],
            ['nombre' => 'Guadalajara', 'pais_id' => 3],
            ['nombre' => 'Lima', 'pais_id' => 4],
            ['nombre' => 'Santiago', 'pais_id' => 5],
            ['nombre' => 'Rio de Janeiro', 'pais_id' => 6],
            ['nombre' => 'Montevideo', 'pais_id' => 7],
            ['nombre' => 'Asunción', 'pais_id' => 8],
            ['nombre' => 'La Paz', 'pais_id' => 9],
            ['nombre' => 'Maracaibo', 'pais_id' => 10],
            ['nombre' => 'Ciudad de Panamá', 'pais_id' => 11],
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CargoSeeder extends Seeder
{
    public function run()
    {
        // Insertar cargos de ejemplo
        DB::table('cargos')->insert([
            ['nombre' => 'Gerente General'],
            ['nombre' => 'Jefe de Proyecto'],
            ['nombre' => 'Desarrollador'],
            ['nombre' => 'Analista'],
            ['nombre' => 'Presidente'],
            ['nombre' => 'Secretaria'],
            ['nombre' => 'Vendedor'],
            ['nombre' => 'Practicante'],
        ]);
    }
}

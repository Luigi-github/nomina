<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaisSeeder extends Seeder
{
    public function run()
    {
        // Insertar países de ejemplo
        DB::table('pais')->insert([
            ['nombre' => 'Colombia'],
            ['nombre' => 'Argentina'],
            ['nombre' => 'México'],
            ['nombre' => 'Perú'],
            ['nombre' => 'Chile'],
            ['nombre' => 'Brasil'],
            ['nombre' => 'Uruguay'],
            ['nombre' => 'Paraguay'],
            ['nombre' => 'Bolivia'],
            ['nombre' => 'Venezuela'],
            ['nombre' => 'Panamá'],
        ]);
    }
}

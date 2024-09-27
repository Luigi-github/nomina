<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Empleado;
use App\Models\Cargo;

class JefeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Primero, obtenemos el cargo 'Jefe' desde la tabla de cargos
        $cargoJefe = Cargo::where('nombre', 'Jefe de Proyecto')->first();

        // Creamos un empleado con el cargo de jefe
        Empleado::create([
            'nombres' => 'Juan',
            'apellidos' => 'Pérez',
            'identificacion' => '123456789',
            'direccion' => 'Calle 123',
            'telefono' => '1234567890',
            'pais_id' => 1,  // Suponiendo que ya tienes una ciudad con ID 1
            'ciudad_id' => 1,  // Suponiendo que ya tienes una ciudad con ID 1
        ])->cargos()->attach($cargoJefe->id);

        // Añade más jefes si lo deseas
        Empleado::create([
            'nombres' => 'Ana',
            'apellidos' => 'Gómez',
            'identificacion' => '987654321',
            'direccion' => 'Avenida 456',
            'telefono' => '0987654321',
            'pais_id' => 1,  // Suponiendo otra ciudad con ID 2
            'ciudad_id' => 2,  // Suponiendo otra ciudad con ID 2
        ])->cargos()->attach($cargoJefe->id);
    }
}

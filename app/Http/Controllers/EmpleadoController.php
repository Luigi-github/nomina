<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleado;
use App\Models\Cargo;
use App\Models\Pais;
use App\Models\Ciudad;

class EmpleadoController extends Controller
{
    /**
     * Mostrar lista de empleados.
     */
    public function index()
    {
        // Obtener todos los empleados con sus cargos y jefes
        $empleados = Empleado::with('cargos', 'jefe')->get();
        return view('empleados.index', compact('empleados'));
    }

    /**
     * Mostrar el formulario de creación de un nuevo empleado.
     */
    public function create()
    {
        // Obtener todos los cargos y empleados para asignar jefe
        $cargos = Cargo::all();
        $jefes = Empleado::all();
        $paises= Pais::all();
        $ciudades = Ciudad::all();
        return view('empleados.create', compact('cargos', 'jefes', 'paises', 'ciudades'));
    }

    /**
     * Almacenar un nuevo empleado.
     */
    public function store(Request $request)
    {
        // Validar los datos del formulario
/*        $request->validate([
            'nombres' => 'required',
            'apellidos' => 'required',
            'identificacion' => 'required|unique:empleados',
            'direccion' => 'required',
            'telefono' => 'required',
            'pais_id' => 'required|exists:pais,id',
            'ciudad_id' => 'required|exists:ciudads,id',
            'jefe_id' => 'nullable|exists:empleados,id', // El jefe debe existir en la tabla empleados
            'cargos' => 'required|array', // Los cargos deben ser un array de IDs
            'cargos.*' => 'exists:cargos,id', // Cada ID de cargo debe existir
        ]);*/

        // Crear el empleado
        $empleado = Empleado::create($request->only(['nombres', 'apellidos', 'identificacion', 'direccion', 'telefono', 'pais_id', 'ciudad_id', 'jefe_id']));

        // Asignar los cargos
        $empleado->cargos()->attach($request->cargos);

        // Redirigir a la lista de empleados
        return redirect()->route('empleados.index')->with('success', 'Empleado creado exitosamente');
    }

    /**
     * Mostrar la información de un empleado específico.
     */
    public function show($id)
    {
        $empleado = Empleado::with('cargos', 'jefe')->findOrFail($id);
        return view('empleados.show', compact('empleado'));
    }

    /**
     * Mostrar el formulario de edición de un empleado existente.
     */
    public function edit($id)
    {
        $empleado = Empleado::findOrFail($id);
        $cargos = Cargo::all();
        $paises = Pais::all();
        $ciudades = Ciudad::all();
        $jefes = Empleado::where('id', '!=', $id)->get(); // Excluir al empleado actual para que no sea su propio jefe
        return view('empleados.edit', compact('empleado', 'cargos', 'paises', 'ciudades', 'jefes'));
    }

    /**
     * Actualizar un empleado existente.
     */
    public function update(Request $request, $id)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombres' => 'required',
            'apellidos' => 'required',
            'identificacion' => 'required|unique:empleados,identificacion,' . $id, // Permitir la misma identificación si no ha cambiado
            'direccion' => 'required',
            'telefono' => 'required',
            'pais_id' => 'required',
            'ciudad_id' => 'required',
            'jefe_id' => 'nullable|exists:empleados,id',
            'cargos' => 'required|array',
            'cargos.*' => 'exists:cargos,id',
        ]);

        // Encontrar el empleado
        $empleado = Empleado::findOrFail($id);

        // Actualizar los datos del empleado
        $empleado->update($request->only(['nombres', 'apellidos', 'identificacion', 'direccion', 'telefono', 'ciudad_nacimiento', 'jefe_id']));

        // Sincronizar los cargos
        $empleado->cargos()->sync($request->cargos);

        // Redirigir a la lista de empleados
        return redirect()->route('empleados.index')->with('success', 'Empleado actualizado exitosamente');
    }

    /**
     * Eliminar (lógicamente) un empleado existente.
     */
    public function destroy($id)
    {
        // Soft-delete del empleado
        $empleado = Empleado::findOrFail($id);
        $empleado->delete();

        // Redirigir a la lista de empleados
        return redirect()->route('empleados.index')->with('success', 'Empleado eliminado exitosamente');
    }

    /**
     * Restaurar un empleado eliminado.
     */
    public function restore($id)
    {
        // Restaurar el empleado eliminado
        $empleado = Empleado::withTrashed()->findOrFail($id);
        $empleado->restore();

        // Redirigir a la lista de empleados
        return redirect()->route('empleados.index')->with('success', 'Empleado restaurado exitosamente');
    }
}

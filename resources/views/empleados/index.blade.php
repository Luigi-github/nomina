@extends('layouts.app')

@section('content')
<div class="row mb-4">
    <div class="col-md-6">
        <h2>Lista de Empleados</h2>
    </div>
    <div class="col-md-6 text-end">
        <a href="{{ route('empleados.create') }}" class="btn btn-primary">Crear Empleado</a>
    </div>
</div>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Identificación</th>
            <th>Teléfono</th>
            <th>Cargos</th>
            <th>Jefe</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($empleados as $empleado)
            <tr>
                <td>{{ $empleado->nombres }} {{ $empleado->apellidos }}</td>
                <td>{{ $empleado->identificacion }}</td>
                <td>{{ $empleado->telefono }}</td>
                <td>
                    @foreach($empleado->cargos as $cargo)
                        <span class="badge bg-secondary">{{ $cargo->nombre }}</span>
                    @endforeach
                </td>
                <td>{{ $empleado->jefe ? $empleado->jefe->nombres : 'N/A' }}</td>
                <td>
                    <a href="{{ route('empleados.edit', $empleado->id) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('empleados.destroy', $empleado->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection

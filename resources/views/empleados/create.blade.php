@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Registrar nuevo empleado</h2>

        {{-- Mostrar errores de validación --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Formulario de creación de empleados --}}
        <form action="{{ route('empleados.store') }}" method="POST">
            @csrf

            {{-- Nombres --}}
            <div class="form-group">
                <label for="nombres">Nombres</label>
                <input type="text" class="form-control" id="nombres" name="nombres" value="{{ old('nombres') }}" required>
            </div>

            {{-- Apellidos --}}
            <div class="form-group">
                <label for="apellidos">Apellidos</label>
                <input type="text" class="form-control" id="apellidos" name="apellidos" value="{{ old('apellidos') }}" required>
            </div>

            {{-- Identificación --}}
            <div class="form-group">
                <label for="identificacion">Identificación</label>
                <input type="text" class="form-control" id="identificacion" name="identificacion" value="{{ old('identificacion') }}" required>
            </div>

            {{-- Dirección --}}
            <div class="form-group">
                <label for="direccion">Dirección</label>
                <input type="text" class="form-control" id="direccion" name="direccion" value="{{ old('direccion') }}" required>
            </div>

            {{-- Teléfono --}}
            <div class="form-group">
                <label for="telefono">Teléfono</label>
                <input type="text" class="form-control" id="telefono" name="telefono" value="{{ old('telefono') }}" required>
            </div>

            {{-- País de nacimiento --}}
            <div class="form-group">
                <label for="pais_id">País de Nacimiento</label>
                <select class="form-control" id="pais_id" name="pais_id" required>
                    <option value="" disabled selected>Seleccione un país</option>
                    @foreach($paises as $pais)
                        <option value="{{ $pais->id }}" {{ old('pais_id') == $pais->id ? 'selected' : '' }}>
                            {{ $pais->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Ciudad de nacimiento --}}
            <div class="form-group">
                <label for="ciudad_id">Ciudad de Nacimiento</label>
                <select class="form-control" id="ciudad_id" name="ciudad_id" required>
                    <option value="" disabled selected>Seleccione una ciudad</option>
                    @foreach($ciudades as $ciudad)
                        <option value="{{ $ciudad->id }}" {{ old('ciudad_id') == $ciudad->id ? 'selected' : '' }}>
                            {{ $ciudad->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Cargo --}}
            <div class="form-group">
                <label for="cargo_id">Cargo</label>
                <select class="form-control" id="cargo_id" name="cargo_id" required>
                    <option value="" disabled selected>Seleccione un cargo</option>
                    @foreach($cargos as $cargo)
                        <option value="{{ $cargo->id }}" {{ old('cargo_id') == $cargo->id ? 'selected' : '' }}>
                            {{ $cargo->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Jefe inmediato --}}
            <div class="form-group">
                <label for="jefe_id">Jefe Inmediato</label>
                <select class="form-control" id="jefe_id" name="jefe_id">
                    <option value="" disabled selected>Seleccione un jefe</option>
                    @foreach($jefes as $jefe)
                        <option value="{{ $jefe->id }}" {{ old('jefe_id') == $jefe->id ? 'selected' : '' }}>
                            {{ $jefe->nombres }} {{ $jefe->apellidos }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Botón para guardar --}}
            <button type="submit" class="btn btn-primary">Registrar Empleado</button>
        </form>
    </div>
@endsection

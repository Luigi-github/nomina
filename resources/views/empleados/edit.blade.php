@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Empleado</h1>
        <form action="{{ route('empleados.update', $empleado->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Nombres -->
            <div class="form-group">
                <label for="nombres">Nombres</label>
                <input type="text" class="form-control" id="nombres" name="nombres" value="{{ old('nombres', $empleado->nombres) }}" required>
            </div>

            <!-- Apellidos -->
            <div class="form-group">
                <label for="apellidos">Apellidos</label>
                <input type="text" class="form-control" id="apellidos" name="apellidos" value="{{ old('apellidos', $empleado->apellidos) }}" required>
            </div>

            <!-- Identificación -->
            <div class="form-group">
                <label for="identificacion">Identificación</label>
                <input type="text" class="form-control" id="identificacion" name="identificacion" value="{{ old('identificacion', $empleado->identificacion) }}" required>
            </div>

            <!-- Dirección -->
            <div class="form-group">
                <label for="direccion">Dirección</label>
                <input type="text" class="form-control" id="direccion" name="direccion" value="{{ old('direccion', $empleado->direccion) }}" required>
            </div>

            <!-- Teléfono -->
            <div class="form-group">
                <label for="telefono">Teléfono</label>
                <input type="text" class="form-control" id="telefono" name="telefono" value="{{ old('telefono', $empleado->telefono) }}" required>
            </div>


            <div class="mb-3">
                <label for="pais" class="form-label">País de Nacimiento</label>
                <select v-model="selectedPais" @change="getCiudades" class="form-control" id="pais" name="pais" required>
                    <option value="" disabled>Seleccione un país</option>
                    <option v-for="pais in paises" :value="pais.id">@{{ pais.nombre }}</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="ciudad_nacimiento" class="form-label">Ciudad de Nacimiento</label>
                <select v-model="selectedCiudad" class="form-control" id="ciudad_nacimiento" name="ciudad_nacimiento" required>
                    <option value="" disabled>Seleccione una ciudad</option>
                    <option v-for="ciudad in ciudades" :value="ciudad.id">@{{ ciudad.nombre }}</option>
                </select>
            </div>

            <!-- Cargos -->
            <div class="form-group">
                <label for="cargos">Cargos</label>
                <select multiple class="form-control" id="cargos" name="cargos[]" required>
                    @foreach($cargos as $cargo)
                        <option value="{{ $cargo->id }}"
                            {{ in_array($cargo->id, $empleado->cargos->pluck('id')->toArray()) ? 'selected' : '' }}>
                            {{ $cargo->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Jefe Inmediato -->
            <div class="mb-3">
                <label for="jefe_id" class="form-label">Jefe</label>
                <select name="jefe_id" id="jefe_id" class="form-control">
                    <option value="">Sin jefe</option>
                    @foreach($jefes as $jefe)
                        <option value="{{ $jefe->id }}">{{ $jefe->nombres }} {{ $jefe->apellidos }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Botón Guardar -->
            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        </form>
    </div>
@endsection

@section('scripts')
    <script>
        new Vue({
            el: '#app',
            data: {
                selectedPais: {{ $empleado->pais_id }},
                ciudades: []
            },
            mounted() {
                this.fetchCiudades();
            },
            methods: {
                fetchCiudades() {
                    if (this.selectedPais) {
                        axios.get('/api/ciudades/' + this.selectedPais)
                            .then(response => {
                                this.ciudades = response.data;
                            })
                            .catch(error => {
                                console.log(error);
                            });
                    }
                }
            }
        });
    </script>
@endsection

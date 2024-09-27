<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Empleado extends Model
{
    use HasFactory, SoftDeletes; // Habilita SoftDeletes y HasFactory para crear factories de prueba

    // Campos que se pueden llenar mediante asignación masiva
    protected $fillable = [
        'nombres',
        'apellidos',
        'identificacion',
        'direccion',
        'telefono',
        'pais_id',
        'ciudad_id',
        'jefe_id'
    ];

    /**
     * Relación: Un empleado pertenece a un país
     */
    public function pais()
    {
        return $this->belongsTo(Pais::class);
    }

    /**
     * Relación: Un empleado pertenece a una ciudad
     */
    public function ciudad()
    {
        return $this->belongsTo(Ciudad::class);
    }

    /**
     * Relación: Un empleado puede tener uno o varios cargos
     */
    public function cargos()
    {
        return $this->belongsToMany(Cargo::class, 'empleado_cargo', 'empleado_id', 'cargo_id');
    }

    /**
     * Relación: Un empleado puede tener un jefe inmediato
     */
    public function jefe()
    {
        return $this->belongsTo(Empleado::class, 'jefe_id');
    }

    /**
     * Relación: Un empleado puede ser jefe de otros empleados
     */
    public function subordinados()
    {
        return $this->hasMany(Empleado::class, 'jefe_id');
    }
}

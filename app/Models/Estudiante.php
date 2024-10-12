<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    protected $table = 'estudiantes';
    protected $fillable = [
        'idEstudiantes',
        'nombre',
        'email',
        'telefono',
    ];
    use HasFactory;

    // Relación uno a muchos con seguimientos (Un estudiante tiene muchos seguimientos)
    public function seguimientos()
    {
        return $this->hasMany(Seguimiento::class);
    }

    // Relación uno a muchos con reuniones (Un estudiante tiene muchas reuniones)
    public function reuniones()
    {
        return $this->hasMany(Reunion::class);
    }
}

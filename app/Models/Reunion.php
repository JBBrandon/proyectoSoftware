<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reunion extends Model
{
    protected $table = 'reuniones';
    protected $fillable = [
        'idReuniones',  // Agregar idReuniones a los campos fillable
        'tutor_id',
        'estudiante_id',
        'fecha_reunion',
        'detalles',
        'estado',
    ];
    use HasFactory;
      // Relación inversa con el tutor (Muchas reuniones pertenecen a un tutor)
      public function tutor()
      {
          return $this->belongsTo(Tutor::class);
      }
  
      // Relación inversa con el estudiante (Muchas reuniones pertenecen a un estudiante)
      public function estudiante()
      {
          return $this->belongsTo(Estudiante::class);
      }
}

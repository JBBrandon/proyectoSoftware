<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $table = 'planes';
    protected $fillable = ['idPlanes', 'titulo', 'descripcion', 'estado', 'tutor_id'];
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

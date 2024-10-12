<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reunion extends Model
{
    protected $table = 'reuniones';
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

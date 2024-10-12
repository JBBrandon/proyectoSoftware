<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seguimiento extends Model
{
    protected $table = 'seguimientos';
    protected $fillable = [
        'idSeguimientos', 
        'tutor_id', 
        'estudiante_id', 
        'informe', 
        'progreso',
    ];
    
    use HasFactory;
     // Relación inversa con el tutor (Muchos seguimientos pertenecen a un tutor)
     public function tutor()
     {
         return $this->belongsTo(Tutor::class);
     }
 
     // Relación inversa con el estudiante (Muchos seguimientos pertenecen a un estudiante)
     public function estudiante()
     {
         return $this->belongsTo(Estudiante::class);
     }
}

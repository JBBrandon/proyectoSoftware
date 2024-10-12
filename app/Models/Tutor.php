<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tutor extends Model
{
    protected $table = 'tutores';
    use HasFactory;

    // Relación uno a muchos con seguimientos (Un tutor tiene muchos seguimientos)
    public function seguimientos()
    {
        return $this->hasMany(Seguimiento::class);
    }

    // Relación uno a muchos con reuniones (Un tutor tiene muchas reuniones)
    public function reuniones()
    {
        return $this->hasMany(Reunion::class);
    }

    // Relación uno a muchos con planes (Un tutor tiene muchos planes)
    public function planes()
    {
        return $this->hasMany(Plan::class);
    }
}

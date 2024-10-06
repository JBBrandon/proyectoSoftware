<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $table = 'planes';
    protected $fillable = ['idPlanes', 'titulo', 'descripcion', 'estado', 'tutor_id'];
    use HasFactory;
}

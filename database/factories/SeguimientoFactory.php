<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Seguimiento;
use App\Models\Tutor;
use App\Models\Estudiante;
    
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Seguimiento>
 */
class SeguimientoFactory extends Factory
{
    protected $model = Seguimiento::class;
    public function definition(): array
    {  return [
            'tutor_id' => Tutor::factory(),  // Generar un tutor de prueba
            'estudiante_id' => Estudiante::factory(),  // Generar un estudiante de prueba
            'informe' => $this->faker->paragraph(),
            'progreso' => $this->faker->sentence(),
        ];
    }
}

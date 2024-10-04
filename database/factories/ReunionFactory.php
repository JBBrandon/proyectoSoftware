<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Reunion;
use App\Models\Tutor;
use App\Models\Estudiante;

class ReunionFactory extends Factory
{
   
    protected $model = Reunion::class;
    public function definition(): array
    {
        return [
            'tutor_id' => Tutor::factory(),  // Generar un tutor de prueba
            'estudiante_id' => Estudiante::factory(),  // Generar un estudiante de prueba
            'fecha_reunion' => $this->faker->date(),
            'detalles' => $this->faker->paragraph(),
            'estado' => $this->faker->randomElement(['Programada', 'Completada']),
        ];
    }
}

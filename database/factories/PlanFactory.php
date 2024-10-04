<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Plan;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Plan>
 */
class PlanFactory extends Factory
{
    protected $model = Plan::class;
    public function definition(): array
    {
        return [
            'titulo' => $this->faker->sentence(),
            'descripcion' => $this->faker->paragraph(),
            'estado' => $this->faker->randomElement(['Activo', 'Inactivo']),
            'tutor_id' => \App\Models\Tutor::factory(),  // Relación con el tutor
        ];
    }
}

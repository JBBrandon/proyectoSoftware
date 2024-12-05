<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Plan;
use App\Models\Tutor;


class PlanesTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function almacenar_un_nuevo_plan()
    {
        // Crear un tutor de prueba
        $tutor = Tutor::factory()->create([
            'idTutores' => 'P12345',  // ID de tutor
            'nombre' => 'Juan Pérez',
            'email' => 'juan.perez@example.com',
            'telefono' => '123456789',
        ]);
    
        // Datos de prueba para un nuevo plan
        $data = [
            'idPlanes' => 'P12345',
            'titulo' => 'Plan de Tutoría 2024',
            'descripcion' => 'Plan de tutoría para el ciclo 2024.',
            'estado' => 'activo',
            'tutor_id' => $tutor->id,  // Usamos el ID del tutor creado
        ];
    
        // Enviar solicitud POST para almacenar un nuevo plan
        $response = $this->post('/planes', $data);
    
        // Verificar que el plan fue guardado en la base de datos
        $this->assertDatabaseHas('planes', $data);
    
        // Verificar que la respuesta redirige a la vista correcta
        $plan = Plan::where('idPlanes', 'P12345')->first();
        $response->assertRedirect(route('planes.show', $plan));
    }
    

    /** @test */
    public function actualizar_un_plan_existente()
    {
        // Crear un tutor de prueba
        $tutor = Tutor::factory()->create([
            'idTutores' => '1', // Asume que el ID del tutor será 1, ajusta según sea necesario
            'nombre' => 'Carlos García',
            'email' => 'carlos.garcia@example.com',
            'telefono' => '987654321',
        ]);

        // Crear un plan de prueba
        $plan = Plan::factory()->create([
            'idPlanes' => 'P12345',
            'titulo' => 'Plan de Tutoría 2023',
            'descripcion' => 'Plan de tutoría para el ciclo 2023.',
            'estado' => 'activo',
            'tutor_id' => $tutor->id, // Usamos el ID del tutor que acabamos de crear
        ]);

        // Datos actualizados
        $data = [
            'idPlanes' => 'P12345', // El ID no cambia
            'titulo' => 'Plan de Tutoría 2024',
            'descripcion' => 'Plan de tutoría para el ciclo 2024.',
            'estado' => 'activo',
            'tutor_id' => $tutor->id, // Mantener el mismo tutor_id
        ];

        // Enviar solicitud PUT para actualizar el plan
        $response = $this->put("/planes/{$plan->id}", $data);

        // Verificar que los datos fueron actualizados en la base de datos
        $this->assertDatabaseHas('planes', $data);

        // Verificar que la respuesta redirige a la vista correcta (detalles del plan actualizado)
        $response->assertRedirect(route('planes.show', $plan));
    }






    /** @test */
    public function eliminar_un_plan()
    {
        // Crear un tutor de prueba
        $tutor = Tutor::factory()->create([
            'idTutores' => 'P12345',
            'nombre' => 'Juan Pérez',
            'email' => 'juan.perez@example.com',
            'telefono' => '123456789',
        ]);

        // Crear un plan de prueba
        $plan = Plan::create([
            'idPlanes' => 'P12345',
            'titulo' => 'Plan de Tutoría 2023',
            'descripcion' => 'Plan de tutoría para el ciclo 2023.',
            'estado' => 'activo',
            'tutor_id' => $tutor->id,
        ]);

        // Enviar solicitud DELETE para eliminar el plan
        $response = $this->delete(route('planes.destroy', $plan));

        // Verificar que el plan ha sido eliminado de la base de datos
        $this->assertDatabaseMissing('planes', [
            'idPlanes' => 'P12345',
        ]);

        // Verificar que la respuesta redirige a la página de índice
        $response->assertRedirect(route('planes.index'));
    }


    /** @test */
    public function validacion_de_datos_requeridos_en_plan()
    {
        // Datos incompletos para crear un nuevo plan
        $data = [
            'idPlanes' => '',  // ID de plan vacío
            'titulo' => '',  // Título vacío
            'descripcion' => '',  // Descripción vacía
            'estado' => '',  // Estado vacío
            'tutor_id' => '',  // Tutor ID vacío
        ];

        // Enviar solicitud POST para almacenar un nuevo plan con datos inválidos
        $response = $this->post('/planes', $data);

        // Verificar que la respuesta contiene errores de validación
        $response->assertSessionHasErrors(['idPlanes', 'titulo', 'descripcion', 'estado', 'tutor_id']);

        // Verificar que el plan no fue guardado en la base de datos
        $this->assertDatabaseMissing('planes', $data);
    }
}


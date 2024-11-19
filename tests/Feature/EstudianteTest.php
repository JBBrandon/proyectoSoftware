<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Estudiante;

class EstudianteTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function almacenar_un_nuevo_estudiante()
    {
        // Datos de prueba para un nuevo estudiante
        $data = [
            'idEstudiantes' => '12345',
            'nombre' => 'Juan Perez',
            'email' => 'juan.perez@example.com',
            'telefono' => '123456789',
        ];

        // Enviar solicitud POST para almacenar un nuevo estudiante
        $response = $this->post('/estudiantes', $data);

        // Verificar que el estudiante fue guardado en la base de datos
        $this->assertDatabaseHas('estudiantes', $data);

        // Verificar que la respuesta redirige a la vista correcta (detalles del estudiante recién creado)
        $estudiante = Estudiante::where('idEstudiantes', '12345')->first();
        $response->assertRedirect(route('estudiantes.show', $estudiante));
    }

    /** @test */
    public function actualizar_un_estudiante_existente()
    {
        // Crear un estudiante de prueba
        $estudiante = Estudiante::factory()->create([
            'idEstudiantes' => '12345',
            'nombre' => 'Juan Perez',
            'email' => 'juan.perez@example.com',
            'telefono' => '123456789',
        ]);

        // Datos actualizados
        $data = [
            'idEstudiantes' => '12345',
            'nombre' => 'Juan Actualizado',
            'email' => 'juan.actualizado@example.com',
            'telefono' => '987654321',
        ];

        // Enviar solicitud PUT para actualizar el estudiante
        $response = $this->put("/estudiantes/{$estudiante->id}", $data);

        // Verificar que los datos fueron actualizados en la base de datos
        $this->assertDatabaseHas('estudiantes', $data);

        // Verificar que la respuesta redirige a la vista correcta (detalles del estudiante actualizado)
        $response->assertRedirect(route('estudiantes.show', $estudiante));
    }

    /** @test */
    public function eliminar_un_estudiante()
    {
        // Crear un estudiante de prueba
        $estudiante = Estudiante::factory()->create([
            'idEstudiantes' => '12345',
            'nombre' => 'Juan Perez',
            'email' => 'juan.perez@example.com',
            'telefono' => '123456789',
        ]);

        // Enviar solicitud DELETE para eliminar el estudiante
        $response = $this->delete("/estudiantes/{$estudiante->id}");

        // Verificar que el estudiante fue eliminado de la base de datos
        $this->assertDatabaseMissing('estudiantes', ['idEstudiantes' => '12345']);

        // Verificar que la respuesta redirige a la vista de listado de estudiantes
        $response->assertRedirect(route('estudiantes.index'));
    }
}

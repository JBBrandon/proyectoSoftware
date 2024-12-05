<?php

namespace Tests\Feature;

use App\Models\Estudiante;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EstudiantesControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function se_puede_crear_un_estudiante_a_traves_del_controlador()
    {
        // Datos para crear un estudiante
        $data = [
            'idEstudiantes' => '12345', // Aunque no lo uses, es posible que se necesite por tu validación.
            'nombre' => 'Juan Pérez',
            'email' => 'juan.perez@example.com',
            'telefono' => '123456789',
        ];

        // Enviar una solicitud POST para crear un nuevo estudiante
        $response = $this->post(route('estudiantes.store'), $data);

        // Verificar que el estudiante ha sido guardado en la base de datos
        $this->assertDatabaseHas('estudiantes', [
            'nombre' => 'Juan Pérez',
            'email' => 'juan.perez@example.com',
            'telefono' => '123456789',
        ]);

        // Verificar que la respuesta redirige a la vista correcta
        $response->assertRedirect(route('estudiantes.show', Estudiante::latest()->first()));
    }

    /** @test */
    public function se_puede_ver_un_estudiante_a_traves_del_controlador()
    {
        // Crear un estudiante de prueba
        $estudiante = Estudiante::factory()->create();

        // Enviar una solicitud GET para ver el estudiante
        $response = $this->get(route('estudiantes.show', $estudiante->id));

        // Verificar que la respuesta contenga los datos correctos
        $response->assertStatus(200);
        $response->assertSee($estudiante->nombre);
        $response->assertSee($estudiante->email);
        $response->assertSee($estudiante->telefono);
    }

    /** @test */
    public function se_puede_actualizar_un_estudiante_a_traves_del_controlador()
    {
        // Crear un estudiante de prueba
        $estudiante = Estudiante::factory()->create([
            'nombre' => 'Juan Pérez',
            'email' => 'juan.perez@example.com',
            'telefono' => '123456789',
        ]);

        // Datos a actualizar para el estudiante
        $data = [
            'idEstudiantes' => $estudiante->idEstudiantes, // Mantener el mismo ID
            'nombre' => 'Juan Pérez Actualizado',
            'email' => 'juan.perez.actualizado@example.com',
            'telefono' => '987654321',
        ];

        // Verificar que el estudiante original tiene los datos correctos
        $this->assertDatabaseHas('estudiantes', [
            'idEstudiantes' => $estudiante->idEstudiantes,
            'nombre' => 'Juan Pérez',
            'email' => 'juan.perez@example.com',
            'telefono' => '123456789',
        ]);

        // Enviar una solicitud PUT para actualizar el estudiante
        $response = $this->put(route('estudiantes.update', $estudiante), $data);

        // Verificar que los datos fueron actualizados en la base de datos
        $this->assertDatabaseHas('estudiantes', [
            'idEstudiantes' => $estudiante->idEstudiantes,
            'nombre' => 'Juan Pérez Actualizado',
            'email' => 'juan.perez.actualizado@example.com',
            'telefono' => '987654321',
        ]);

        // Verificar que la respuesta redirige a la vista del estudiante actualizado
        $response->assertRedirect(route('estudiantes.show', $estudiante));
    }


    /** @test */
    public function se_puede_eliminar_un_estudiante_a_traves_del_controlador()
    {
        // Crear un estudiante de prueba
        $estudiante = Estudiante::factory()->create();

        // Enviar una solicitud DELETE para eliminar el estudiante
        $response = $this->delete(route('estudiantes.destroy', $estudiante));

        // Verificar que el estudiante ha sido eliminado de la base de datos
        $this->assertDatabaseMissing('estudiantes', [
            'idEstudiantes' => $estudiante->idEstudiantes,
        ]);

        // Verificar que la respuesta redirige a la vista correcta
        $response->assertRedirect(route('estudiantes.index'));
    }
}

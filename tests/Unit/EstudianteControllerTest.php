<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Estudiante;
use Illuminate\Http\Request;
use App\Http\Controllers\EstudianteController;

class EstudianteControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function almacenar_un_nuevo_estudiante()
    {
        // Crear una instancia de Request con datos válidos
        $request = Request::create('/estudiantes', 'POST', [
            'idEstudiantes' => '12345',
            'nombre' => 'Juan Perez',
            'email' => 'juan.perez@example.com',
            'telefono' => '123456789',
        ]);

        // Crear una instancia del controlador
        $controller = new EstudianteController();

        // Llamar al método store
        $response = $controller->store($request);

        // Verificar que el estudiante fue guardado en la base de datos
        $this->assertDatabaseHas('estudiantes', [
            'idEstudiantes' => '12345',
            'nombre' => 'Juan Perez',
            'email' => 'juan.perez@example.com',
            'telefono' => '123456789',
        ]);

        // Verificar que la redirección ocurrió al perfil del estudiante
        $this->assertEquals(route('estudiantes.show', ['estudiante' => 1]), $response->headers->get('Location'));
    }
    /** @test */
    public function actualizar_un_estudiante_existente()
    {
        // Crear un estudiante en la base de datos
        $estudiante = Estudiante::create([
            'idEstudiantes' => '12345',
            'nombre' => 'Juan Perez',
            'email' => 'juan.perez@example.com',
            'telefono' => '123456789',
        ]);

        // Crear una instancia de Request con datos actualizados
        $request = Request::create('/estudiantes/'.$estudiante->id, 'PUT', [
            'idEstudiantes' => '12345',
            'nombre' => 'Juan Actualizado',
            'email' => 'juan.actualizado@example.com',
            'telefono' => '987654321',
        ]);

        // Crear una instancia del controlador
        $controller = new EstudianteController();

        // Llamar al método update
        $response = $controller->update($request, $estudiante);

        // Verificar que los datos del estudiante fueron actualizados en la base de datos
        $this->assertDatabaseHas('estudiantes', [
            'idEstudiantes' => '12345',
            'nombre' => 'Juan Actualizado',
            'email' => 'juan.actualizado@example.com',
            'telefono' => '987654321',
        ]);

        // Verificar que la redirección ocurrió al perfil del estudiante actualizado
        $this->assertEquals(route('estudiantes.show', ['estudiante' => $estudiante->id]), $response->headers->get('Location'));
    }
    /** @test */
    public function eliminar_un_estudiante()
    {
        // Crear un estudiante en la base de datos
        $estudiante = Estudiante::create([
            'idEstudiantes' => '12345',
            'nombre' => 'Juan Perez',
            'email' => 'juan.perez@example.com',
            'telefono' => '123456789',
        ]);

        // Crear una instancia del controlador
        $controller = new EstudianteController();

        // Llamar al método destroy
        $response = $controller->destroy($estudiante);

        // Verificar que el estudiante ha sido eliminado de la base de datos
        $this->assertDatabaseMissing('estudiantes', ['idEstudiantes' => '12345']);

        // Verificar que la redirección ocurrió a la vista de listado de estudiantes
        $this->assertEquals(route('estudiantes.index'), $response->headers->get('Location'));
    }


}   

<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Tutor;

class TutorTest extends TestCase
{
    use RefreshDatabase;

    // Prueba para almacenar un nuevo tutor correctamente
    public function test_almacenar_un_nuevo_tutor()
    {
        // Datos del nuevo tutor
        $data = [
            'idTutores' => 'T12345',
            'nombre' => 'Juan Pérez',
            'email' => 'juan.perez@example.com',
            'telefono' => '987654321',
        ];
        
        // Enviar solicitud POST para crear el tutor
        $response = $this->post(route('tutorias.store'), $data);
        
        // Verificar que el tutor fue guardado en la base de datos
        $this->assertDatabaseHas('tutores', $data);
        
        // Verificar que la respuesta redirige a la vista correcta (detalles del tutor)
        $tutor = Tutor::where('idTutores', 'T12345')->first();
        $response->assertRedirect(route('tutorias.show', $tutor));
    }

    // Prueba para actualizar un tutor existente
    public function test_actualizar_un_tutor_existente()
    {
        // Crear un tutor inicial
        $tutor = Tutor::factory()->create([
            'idTutores' => 'T12345',
            'nombre' => 'Juan Pérez',
            'email' => 'juan.perez@example.com',
            'telefono' => '987654321',
        ]);
        
        // Datos actualizados para el tutor
        $data = [
            'idTutores' => 'T12345',
            'nombre' => 'Juan Pérez García',
            'email' => 'juan.perez.garcia@example.com',
            'telefono' => '987654321',
        ];
        
        // Enviar solicitud PUT para actualizar el tutor
        $response = $this->put(route('tutorias.update', $tutor), $data);
        
        // Verificar que los datos fueron actualizados en la base de datos
        $this->assertDatabaseHas('tutores', $data);
        
        // Verificar que la respuesta redirige a la vista correcta (detalles del tutor actualizado)
        $response->assertRedirect(route('tutorias.show', $tutor));
    }

    // Prueba para eliminar un tutor
    public function test_eliminar_un_tutor()
    {
        // Crear un tutor inicial
        $tutor = Tutor::factory()->create([
            'idTutores' => 'T12345',
            'nombre' => 'Juan Pérez',
            'email' => 'juan.perez@example.com',
            'telefono' => '987654321',
        ]);
        
        // Enviar solicitud DELETE para eliminar el tutor
        $response = $this->delete(route('tutorias.destroy', $tutor));
        
        // Verificar que el tutor fue eliminado de la base de datos
        $this->assertDatabaseMissing('tutores', ['idTutores' => 'T12345']);
        
        // Verificar que la respuesta redirige a la vista correcta (índice de tutores)
        $response->assertRedirect(route('tutorias.index'));
    }

    // Prueba para verificar la validación de datos requeridos
    public function test_validacion_de_datos_requeridos_en_tutor()
    {
        // Enviar solicitud POST para crear un tutor con datos incompletos
        $response = $this->post(route('tutorias.store'), []);
        
        // Verificar que la respuesta contiene errores de validación
        $response->assertSessionHasErrors(['idTutores', 'nombre', 'email', 'telefono']);
    }
}

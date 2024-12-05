<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Reunion;
use App\Models\Tutor;
use App\Models\Estudiante;



class ReunionesTest extends TestCase
{
    use RefreshDatabase;


    // Prueba para almacenar una nueva reunión correctamente
    public function test_almacenar_una_nueva_reunion()
    {
        // Crear estudiantes y tutores de prueba
        $tutor = Tutor::factory()->create();
        $estudiante = Estudiante::factory()->create();
    
        // Datos de la nueva reunión
        $data = [
            'idReuniones' => 'R12346',
            'tutor_id' => $tutor->id,
            'estudiante_id' => $estudiante->id,
            'fecha_reunion' => '2024-12-05',
            'detalles' => 'Detalles de la nueva reunión',
            'estado' => 'pendiente',
        ];
    
        // Enviar solicitud POST para crear la reunión
        $response = $this->post(route('reuniones.store'), $data);
    
        // Verificar que la reunión fue guardada en la base de datos
        $this->assertDatabaseHas('reuniones', $data);
    
        // Verificar que la respuesta redirige a la vista correcta (detalles de la reunión)
        $reunion = Reunion::where('idReuniones', 'R12346')->first();
        $response->assertRedirect(route('reuniones.show', $reunion));
    }

    public function test_eliminar_una_reunion()
    {
        // Crear estudiantes y tutores de prueba
        $tutor = Tutor::factory()->create();
        $estudiante = Estudiante::factory()->create();
    
        // Crear una reunión inicial
        $reunion = Reunion::factory()->create([
            'idReuniones' => 'R12345',
            'tutor_id' => $tutor->id,
            'estudiante_id' => $estudiante->id,
            'fecha_reunion' => '2024-12-01',
            'detalles' => 'Detalles de la reunión',
            'estado' => 'pendiente',
        ]);
    
        // Enviar solicitud DELETE para eliminar la reunión
        $response = $this->delete(route('reuniones.destroy', $reunion));
    
        // Verificar que la reunión fue eliminada de la base de datos
        $this->assertDatabaseMissing('reuniones', ['idReuniones' => 'R12345']);
    
        // Verificar que la respuesta redirige a la vista correcta
        $response->assertRedirect(route('reuniones.index'));
    }
    
    public function test_validacion_de_datos_requeridos_en_reunion()
    {
        // Enviar solicitud POST para crear una reunión con datos incompletos
        $response = $this->post(route('reuniones.store'), []);

        // Verificar que la respuesta contiene errores de validación
        $response->assertSessionHasErrors(['idReuniones', 'tutor_id', 'estudiante_id', 'fecha_reunion', 'detalles', 'estado']);
    }
      // Prueba para actualizar una reunión correctamente
      public function test_actualizar_una_reunion_existente()
      {
          // Crear estudiantes y tutores de prueba
          $tutor = Tutor::factory()->create();
          $estudiante = Estudiante::factory()->create();
  
          // Crear una reunión inicial
          $reunion = Reunion::factory()->create([
              'idReuniones' => 'R12345',
              'tutor_id' => $tutor->id,
              'estudiante_id' => $estudiante->id,
              'fecha_reunion' => '2024-12-01',
              'detalles' => 'Detalles de la reunión',
              'estado' => 'pendiente',
          ]);
  
          // Datos actualizados para la reunión
          $data = [
              'idReuniones' => 'R12345',
              'tutor_id' => $tutor->id,
              'estudiante_id' => $estudiante->id,
              'fecha_reunion' => '2024-12-02',
              'detalles' => 'Detalles actualizados',
              'estado' => 'confirmada',
          ];
  
          // Enviar solicitud PUT para actualizar la reunión
          $response = $this->put(route('reuniones.update', $reunion), $data);
  
          // Verificar que los datos fueron actualizados en la base de datos
          $this->assertDatabaseHas('reuniones', $data);
  
          // Verificar que la respuesta redirige a la vista correcta (detalles de la reunión actualizada)
          $response->assertRedirect(route('reuniones.show', $reunion));
      }
}

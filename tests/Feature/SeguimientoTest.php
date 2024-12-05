<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Seguimiento;
use App\Models\Tutor;
use App\Models\Estudiante;

class SeguimientoTest extends TestCase
{
    use RefreshDatabase;

    // Prueba para almacenar un nuevo seguimiento correctamente
    public function test_almacenar_un_nuevo_seguimiento()
    {
        // Crear estudiantes y tutores de prueba
        $tutor = Tutor::factory()->create();
        $estudiante = Estudiante::factory()->create();
    
        // Datos del nuevo seguimiento
        $data = [
            'idSeguimientos' => 'S12345',
            'tutor_id' => $tutor->id,
            'estudiante_id' => $estudiante->id,
            'informe' => 'Informe de seguimiento',
            'progreso' => 'progreso en desarrollo',
        ];
    
        // Enviar solicitud POST para crear el seguimiento
        $response = $this->post(route('seguimientos.store'), $data);
    
        // Verificar que el seguimiento fue guardado en la base de datos
        $this->assertDatabaseHas('seguimientos', $data);
    
        // Verificar que la respuesta redirige a la vista correcta (detalles del seguimiento)
        $seguimiento = Seguimiento::where('idSeguimientos', 'S12345')->first();
        $response->assertRedirect(route('seguimientos.show', $seguimiento));
    }

    // Prueba para eliminar un seguimiento correctamente
    public function test_eliminar_un_seguimiento()
    {
        // Crear estudiantes y tutores de prueba
        $tutor = Tutor::factory()->create();
        $estudiante = Estudiante::factory()->create();
    
        // Crear un seguimiento inicial
        $seguimiento = Seguimiento::factory()->create([
            'idSeguimientos' => 'S12345',
            'tutor_id' => $tutor->id,
            'estudiante_id' => $estudiante->id,
            'informe' => 'Informe de seguimiento',
            'progreso' => 'progreso en desarrollo',
        ]);
    
        // Enviar solicitud DELETE para eliminar el seguimiento
        $response = $this->delete(route('seguimientos.destroy', $seguimiento));
    
        // Verificar que el seguimiento fue eliminado de la base de datos
        $this->assertDatabaseMissing('seguimientos', ['idSeguimientos' => 'S12345']);
    
        // Verificar que la respuesta redirige a la vista correcta
        $response->assertRedirect(route('seguimientos.index'));
    }
    
    // Prueba para validar los datos requeridos al intentar crear un seguimiento
    public function test_validacion_de_datos_requeridos_en_seguimiento()
    {
        // Enviar solicitud POST para crear un seguimiento con datos incompletos
        $response = $this->post(route('seguimientos.store'), []);

        // Verificar que la respuesta contiene errores de validación
        $response->assertSessionHasErrors(['idSeguimientos', 'tutor_id', 'estudiante_id', 'informe', 'progreso']);
    }
// Prueba para actualizar un seguimiento correctamente
public function test_actualizar_un_seguimiento_existente()
{
    // Crear estudiantes y tutores de prueba
    $tutor = Tutor::factory()->create();
    $estudiante = Estudiante::factory()->create();

    // Crear un seguimiento inicial
    $seguimiento = Seguimiento::factory()->create([
        'idSeguimientos' => 'S12345',
        'tutor_id' => $tutor->id,
        'estudiante_id' => $estudiante->id,
        'informe' => 'Informe de seguimiento',
        'progreso' => 'progreso en desarrollo',
    ]);

    // Datos actualizados para el seguimiento
    $data = [
        'idSeguimientos' => 'S12345', // Mantener el mismo id
        'tutor_id' => $tutor->id,
        'estudiante_id' => $estudiante->id,
        'informe' => 'Informe actualizado',
        'progreso' => 'progreso completo',
    ];

    // Enviar solicitud PUT para actualizar el seguimiento
    $response = $this->put(route('seguimientos.update', $seguimiento), $data);

    // Asegúrate de que los datos se hayan actualizado correctamente
    $seguimiento->refresh(); // Recargar los datos del seguimiento desde la base de datos

    // Verificar que los datos fueron actualizados en la base de datos
    $this->assertEquals('Informe actualizado', $seguimiento->informe);
    $this->assertEquals('progreso completo', $seguimiento->progreso);

    // Verificar que la respuesta redirige a la vista correcta (detalles del seguimiento actualizado)
    $response->assertRedirect(route('seguimientos.show', $seguimiento));
}

}

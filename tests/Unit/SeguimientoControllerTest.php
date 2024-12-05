<?php

namespace Tests\Feature;

use App\Models\Seguimiento;
use App\Models\Tutor;
use App\Models\Estudiante;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SeguimientoControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function se_puede_crear_un_seguimiento_a_traves_del_controlador()
    {
        // Crear un tutor y un estudiante
        $tutor = Tutor::factory()->create();
        $estudiante = Estudiante::factory()->create();

        // Datos para crear un nuevo seguimiento
        $data = [
            'idSeguimientos' => 'S12345',
            'tutor_id' => $tutor->id,
            'estudiante_id' => $estudiante->id,
            'informe' => 'Informe de seguimiento inicial.',
            'progreso' => 'En progreso',
        ];

        // Enviar una solicitud POST para crear un nuevo seguimiento
        $response = $this->post(route('seguimientos.store'), $data);

        // Verificar que el seguimiento ha sido guardado en la base de datos
        $this->assertDatabaseHas('seguimientos', $data);

        // Verificar que la respuesta redirige al detalle del seguimiento
        $seguimiento = Seguimiento::where('idSeguimientos', 'S12345')->first();
        $response->assertRedirect(route('seguimientos.show', $seguimiento));
    }

    /** @test */
    public function se_puede_actualizar_un_seguimiento_a_traves_del_controlador()
    {
        // Crear un tutor, un estudiante y un seguimiento existente
        $tutor = Tutor::factory()->create();
        $estudiante = Estudiante::factory()->create();
        $seguimiento = Seguimiento::create([
            'idSeguimientos' => 'S12345',
            'tutor_id' => $tutor->id,
            'estudiante_id' => $estudiante->id,
            'informe' => 'Informe de seguimiento inicial.',
            'progreso' => 'En progreso',
        ]);

        // Datos de actualización para el seguimiento
        $data = [
            'idSeguimientos' => 'S12345',
            'tutor_id' => $tutor->id,
            'estudiante_id' => $estudiante->id,
            'informe' => 'Informe actualizado.',
            'progreso' => 'Completado',
        ];

        // Enviar solicitud PUT para actualizar el seguimiento
        $response = $this->put(route('seguimientos.update', $seguimiento), $data);

        // Verificar que los datos fueron actualizados en la base de datos
        $this->assertDatabaseHas('seguimientos', $data);

        // Verificar que la respuesta redirige al detalle del seguimiento actualizado
        $response->assertRedirect(route('seguimientos.show', $seguimiento));
    }

    /** @test */
    public function se_puede_eliminar_un_seguimiento_a_traves_del_controlador()
    {
        // Crear un tutor, un estudiante y un seguimiento existente
        $tutor = Tutor::factory()->create();
        $estudiante = Estudiante::factory()->create();
        $seguimiento = Seguimiento::create([
            'idSeguimientos' => 'S12345',
            'tutor_id' => $tutor->id,
            'estudiante_id' => $estudiante->id,
            'informe' => 'Informe de seguimiento inicial.',
            'progreso' => 'En progreso',
        ]);

        // Enviar solicitud DELETE para eliminar el seguimiento
        $response = $this->delete(route('seguimientos.destroy', $seguimiento));

        // Verificar que el seguimiento fue eliminado de la base de datos
        $this->assertDatabaseMissing('seguimientos', ['idSeguimientos' => 'S12345']);

        // Verificar que la respuesta redirige a la lista de seguimientos
        $response->assertRedirect(route('seguimientos.index'));
    }

    /** @test */
    public function se_puede_ver_un_seguimiento_a_traves_del_controlador()
    {
        // Crear un tutor, un estudiante y un seguimiento
        $tutor = Tutor::factory()->create();
        $estudiante = Estudiante::factory()->create();
        $seguimiento = Seguimiento::create([
            'idSeguimientos' => 'S12345',
            'tutor_id' => $tutor->id,
            'estudiante_id' => $estudiante->id,
            'informe' => 'Informe de seguimiento inicial.',
            'progreso' => 'En progreso',
        ]);

        // Enviar una solicitud GET para ver los detalles del seguimiento
        $response = $this->get(route('seguimientos.show', $seguimiento));

        // Verificar que la respuesta contenga los datos correctos
        $response->assertStatus(200);
        $response->assertSee($seguimiento->idSeguimientos);
        $response->assertSee($seguimiento->informe);
        $response->assertSee($seguimiento->progreso);
        $response->assertSee($seguimiento->tutor->name); // Asegúrate de que el tutor se muestra
        $response->assertSee($seguimiento->estudiante->name); // Asegúrate de que el estudiante se muestra
    }
}

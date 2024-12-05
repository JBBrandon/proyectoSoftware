<?php

namespace Tests\Feature;

use App\Models\Reunion;
use App\Models\Tutor;
use App\Models\Estudiante;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ReunionControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function se_puede_crear_una_reunion_a_traves_del_controlador()
    {
        // Crear un tutor y un estudiante
        $tutor = Tutor::factory()->create();
        $estudiante = Estudiante::factory()->create();

        // Datos para crear una nueva reunión
        $data = [
            'idReuniones' => 'R12345',
            'tutor_id' => $tutor->id,
            'estudiante_id' => $estudiante->id,
            'fecha_reunion' => '2024-12-01',
            'detalles' => 'Reunión inicial del plan de tutoría.',
            'estado' => 'Pendiente',
        ];

        // Enviar una solicitud POST para crear una nueva reunión
        $response = $this->post(route('reuniones.store'), $data);

        // Verificar que la reunión ha sido guardada en la base de datos
        $this->assertDatabaseHas('reuniones', $data);

        // Verificar que la respuesta redirige al detalle de la reunión
        $reunion = Reunion::where('idReuniones', 'R12345')->first();
        $response->assertRedirect(route('reuniones.show', $reunion));
    }

    /** @test */
    public function se_puede_actualizar_una_reunion_a_traves_del_controlador()
    {
        // Crear un tutor, un estudiante y una reunión existente
        $tutor = Tutor::factory()->create();
        $estudiante = Estudiante::factory()->create();
        $reunion = Reunion::create([
            'idReuniones' => 'R12345',
            'tutor_id' => $tutor->id,
            'estudiante_id' => $estudiante->id,
            'fecha_reunion' => '2024-12-01',
            'detalles' => 'Reunión inicial del plan de tutoría.',
            'estado' => 'Pendiente',
        ]);

        // Datos de actualización para la reunión
        $data = [
            'idReuniones' => 'R12345',
            'tutor_id' => $tutor->id,
            'estudiante_id' => $estudiante->id,
            'fecha_reunion' => '2024-12-02',
            'detalles' => 'Reunión actualizada con detalles adicionales.',
            'estado' => 'Confirmada',
        ];

        // Enviar solicitud PUT para actualizar la reunión
        $response = $this->put(route('reuniones.update', $reunion), $data);

        // Verificar que los datos fueron actualizados en la base de datos
        $this->assertDatabaseHas('reuniones', $data);

        // Verificar que la respuesta redirige al detalle de la reunión actualizada
        $response->assertRedirect(route('reuniones.show', $reunion));
    }

    /** @test */
    public function se_puede_eliminar_una_reunion_a_traves_del_controlador()
    {
        // Crear un tutor, un estudiante y una reunión existente
        $tutor = Tutor::factory()->create();
        $estudiante = Estudiante::factory()->create();
        $reunion = Reunion::create([
            'idReuniones' => 'R12345',
            'tutor_id' => $tutor->id,
            'estudiante_id' => $estudiante->id,
            'fecha_reunion' => '2024-12-01',
            'detalles' => 'Reunión inicial del plan de tutoría.',
            'estado' => 'Pendiente',
        ]);

        // Enviar solicitud DELETE para eliminar la reunión
        $response = $this->delete(route('reuniones.destroy', $reunion));

        // Verificar que la reunión fue eliminada de la base de datos
        $this->assertDatabaseMissing('reuniones', ['idReuniones' => 'R12345']);

        // Verificar que la respuesta redirige a la lista de reuniones
        $response->assertRedirect(route('reuniones.index'));
    }

    /** @test */
    public function se_puede_ver_una_reunion_a_traves_del_controlador()
    {
        // Crear un tutor, un estudiante y una reunión
        $tutor = Tutor::factory()->create();
        $estudiante = Estudiante::factory()->create();
        $reunion = Reunion::create([
            'idReuniones' => 'R12345',
            'tutor_id' => $tutor->id,
            'estudiante_id' => $estudiante->id,
            'fecha_reunion' => '2024-12-01',
            'detalles' => 'Reunión inicial del plan de tutoría.',
            'estado' => 'Pendiente',
        ]);

        // Enviar una solicitud GET para ver los detalles de la reunión
        $response = $this->get(route('reuniones.show', $reunion));

        // Verificar que la respuesta contenga los datos correctos
        $response->assertStatus(200);
        $response->assertSee($reunion->idReuniones);
        $response->assertSee($reunion->fecha_reunion);
        $response->assertSee($reunion->detalles);
        $response->assertSee($reunion->estado);
    }
}

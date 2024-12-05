<?php

namespace Tests\Feature;

use App\Models\Plan;
use App\Models\Tutor;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PlanControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function se_puede_crear_un_plan_a_traves_del_controlador()
    {
        // Preparar los datos para crear un nuevo plan
        $tutor = Tutor::factory()->create(); // Crear un tutor para asignarlo al plan

        $data = [
            'idPlanes' => '12345',
            'titulo' => 'Plan Estratégico 2024',
            'descripcion' => 'Descripción detallada del plan estratégico.',
            'estado' => 'Activo',
            'tutor_id' => $tutor->id, // Asociamos el tutor
        ];

        // Enviar solicitud POST para crear un nuevo plan
        $response = $this->post(route('planes.store'), $data);

        // Verificar que el plan ha sido guardado correctamente en la base de datos
        $this->assertDatabaseHas('planes', [
            'idPlanes' => '12345',
            'titulo' => 'Plan Estratégico 2024',
            'descripcion' => 'Descripción detallada del plan estratégico.',
            'estado' => 'Activo',
            'tutor_id' => $tutor->id,
        ]);

        // Verificar que la respuesta redirige al detalle del plan creado
        $plan = Plan::where('idPlanes', '12345')->first();
        $response->assertRedirect(route('planes.show', $plan));
    }

    /** @test */
    public function se_puede_actualizar_un_plan_a_traves_del_controlador()
    {
        // Crear un plan existente con un tutor asignado
        $tutor = Tutor::factory()->create();
        $plan = Plan::create([
            'idPlanes' => '12345',
            'titulo' => 'Plan Estratégico 2023',
            'descripcion' => 'Descripción inicial del plan.',
            'estado' => 'Inactivo',
            'tutor_id' => $tutor->id,
        ]);

        // Datos de actualización para el plan
        $data = [
            'idPlanes' => '12345',
            'titulo' => 'Plan Estratégico 2024',
            'descripcion' => 'Descripción detallada del plan estratégico 2024.',
            'estado' => 'Activo',
            'tutor_id' => $tutor->id, // No cambiamos el tutor
        ];

        // Enviar solicitud PUT para actualizar el plan
        $response = $this->put(route('planes.update', $plan), $data);

        // Verificar que los datos del plan fueron actualizados en la base de datos
        $this->assertDatabaseHas('planes', [
            'idPlanes' => '12345',
            'titulo' => 'Plan Estratégico 2024',
            'descripcion' => 'Descripción detallada del plan estratégico 2024.',
            'estado' => 'Activo',
            'tutor_id' => $tutor->id,
        ]);

        // Verificar que la respuesta redirige al detalle del plan actualizado
        $response->assertRedirect(route('planes.show', $plan));
    }

    /** @test */
    public function se_puede_eliminar_un_plan_a_traves_del_controlador()
    {
        // Crear un plan con un tutor
        $tutor = Tutor::factory()->create();
        $plan = Plan::create([
            'idPlanes' => '12345',
            'titulo' => 'Plan Estratégico 2023',
            'descripcion' => 'Descripción inicial del plan.',
            'estado' => 'Inactivo',
            'tutor_id' => $tutor->id,
        ]);

        // Enviar solicitud DELETE para eliminar el plan
        $response = $this->delete(route('planes.destroy', $plan));

        // Verificar que el plan ha sido eliminado de la base de datos
        $this->assertDatabaseMissing('planes', [
            'idPlanes' => '12345',
        ]);

        // Verificar que la respuesta redirige a la lista de planes
        $response->assertRedirect(route('planes.index'));
    }

    /** @test */
    public function se_puede_ver_un_plan_a_traves_del_controlador()
    {
        // Crear un plan con un tutor asignado
        $tutor = Tutor::factory()->create();
        $plan = Plan::create([
            'idPlanes' => '12345',
            'titulo' => 'Plan Estratégico 2023',
            'descripcion' => 'Descripción del plan estratégico.',
            'estado' => 'Inactivo',
            'tutor_id' => $tutor->id,
        ]);

        // Enviar una solicitud GET para ver los detalles del plan
        $response = $this->get(route('planes.show', $plan));

        // Verificar que la respuesta contenga los datos correctos
        $response->assertStatus(200);
        $response->assertSee($plan->titulo);
        $response->assertSee($plan->descripcion);
        $response->assertSee($plan->estado);
        $response->assertSee($plan->tutor->name); // Verificar que el nombre del tutor también se muestre
    }
}

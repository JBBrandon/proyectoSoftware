<?php

namespace Tests\Feature;

use App\Models\Tutor;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TutorControllerTest extends TestCase
{
    use RefreshDatabase;

   /** @test */
public function se_puede_crear_un_tutor_a_traves_del_controlador()
{
    $data = [
        'idTutores' => 'T12345',
        'nombre' => 'Carlos Pérez',
        'email' => 'carlos.perez@example.com',
        'telefono' => '987654321',
    ];

    $response = $this->post(route('tutorias.store'), $data);

    $this->assertDatabaseHas('tutores', $data);

    $tutor = Tutor::where('idTutores', 'T12345')->first();
    $response->assertRedirect(route('tutorias.show', $tutor));
}

/** @test */
public function se_puede_actualizar_un_tutor_a_traves_del_controlador()
{
    $tutor = Tutor::create([
        'idTutores' => 'T12345',
        'nombre' => 'Carlos Pérez',
        'email' => 'carlos.perez@example.com',
        'telefono' => '987654321',
    ]);

    $data = [
        'idTutores' => 'T12345',
        'nombre' => 'Carlos Pérez Actualizado',
        'email' => 'carlos.actualizado@example.com',
        'telefono' => '123456789',
    ];

    $response = $this->put(route('tutorias.update', $tutor), $data);

    $this->assertDatabaseHas('tutores', $data);

    $response->assertRedirect(route('tutorias.show', $tutor));
}

/** @test */
public function se_puede_eliminar_un_tutor_a_traves_del_controlador()
{
    $tutor = Tutor::create([
        'idTutores' => 'T12345',
        'nombre' => 'Carlos Pérez',
        'email' => 'carlos.perez@example.com',
        'telefono' => '987654321',
    ]);

    $response = $this->delete(route('tutorias.destroy', $tutor));

    $this->assertDatabaseMissing('tutores', ['idTutores' => 'T12345']);

    $response->assertRedirect(route('tutorias.index'));
}

/** @test */
public function se_puede_ver_un_tutor_a_traves_del_controlador()
{
    $tutor = Tutor::create([
        'idTutores' => 'T12345',
        'nombre' => 'Carlos Pérez',
        'email' => 'carlos.perez@example.com',
        'telefono' => '987654321',
    ]);

    $response = $this->get(route('tutorias.show', $tutor));

    $response->assertStatus(200);
    $response->assertSee($tutor->nombre);
    $response->assertSee($tutor->email);
    $response->assertSee($tutor->telefono);
}

}

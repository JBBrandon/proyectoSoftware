<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PlanTest extends TestCase
{
    use RefreshDatabase; // Limpia la base de datos después de cada prueba

    /** @test */
    public function la_pagina_de_listado_de_planes_se_carga_correctamente()
    {
        // Simular acceso a la ruta /planes
        $response = $this->get('/planes');

        // Verificar que la respuesta tiene el estado 200 (OK)
        $response->assertStatus(200);

        // Opcional: verificar que la vista contiene algún texto específico
        $response->assertSee('Listado de Planes de Tutorías');
    }
}

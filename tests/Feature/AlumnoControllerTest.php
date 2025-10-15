<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Alumno;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AlumnoControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function se_listan_alumnos()
    {
        // Crear 2 registros de prueba
        $alumnos = Alumno::factory()->count(2)->create();

        $response = $this->get(route('alumnos.index'));

        $response->assertStatus(200);
        $response->assertSee($alumnos[0]->nombre);
        $response->assertSee($alumnos[1]->nombre);
    }

    /** @test */
    public function se_muestra_formulario_de_creacion()
    {
        $response = $this->get(route('alumnos.create'));
        $response->assertStatus(200);
        $response->assertSee('Crear Alumno');
    }

    /** @test */
    public function se_muestra_formulario_de_edicion()
    {
        $alumno = Alumno::factory()->create();

        $response = $this->get(route('alumnos.edit', $alumno));
        $response->assertStatus(200);
        $response->assertSee('Editar Alumno');
    }

    /** @test */
    public function se_muestra_detalle_de_alumno()
    {
        $alumno = Alumno::factory()->create();

        $response = $this->get(route('alumnos.show', $alumno));
        $response->assertStatus(200);
        $response->assertSee($alumno->nombre);
    }

    /** @test */
    public function se_puede_crear_un_alumno()
    {
        $data = Alumno::factory()->make()->toArray();

        $response = $this->post(route('alumnos.store'), $data);

        $response->assertRedirect(route('alumnos.index'));
        $this->assertDatabaseHas('alumnos', ['codigo' => $data['codigo']]);
    }

    /** @test */
    public function se_puede_editar_un_alumno()
    {
        $alumno = Alumno::factory()->create();

        // Datos a actualizar
        $data = [
            'codigo' => $alumno->codigo,
            'nombre' => 'Nombre Actualizado',
            'correo' => $alumno->correo,
            'fecha_nacimiento' => $alumno->fecha_nacimiento,
            'sexo' => $alumno->sexo,
            'carrera' => $alumno->carrera,
        ];

        $response = $this->put(route('alumnos.update', $alumno), $data);

        $response->assertRedirect(route('alumnos.index'));
        $this->assertDatabaseHas('alumnos', [
            'id' => $alumno->id,
            'nombre' => 'Nombre Actualizado'
        ]);
    }

    /** @test */
    public function se_puede_eliminar_un_alumno()
    {
        $alumno = Alumno::factory()->create();

        $response = $this->delete(route('alumnos.destroy', $alumno));

        $response->assertRedirect(route('alumnos.index'));
        $this->assertDatabaseMissing('alumnos', ['id' => $alumno->id]);
    }
}

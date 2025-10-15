<?php

namespace Database\Factories;

use App\Models\Alumno;
use Illuminate\Database\Eloquent\Factories\Factory;

class AlumnoFactory extends Factory
{
    protected $model = Alumno::class;

    public function definition()
    {
        return [
            'codigo' => $this->faker->unique()->numerify('#####'), // Código único tipo A1234
            'nombre' => $this->faker->name(),                      // Nombre aleatorio
            'correo' => $this->faker->unique()->safeEmail(),       // Correo único
            'fecha_nacimiento' => $this->faker->dateTimeBetween('-100 years', '-1 years')->format('Y-m-d'), // Fecha válida
            'sexo' => $this->faker->randomElement(['M','F']),      // M o F
            'carrera' => $this->faker->word(),                     // Nombre de carrera ficticio
        ];
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use Illuminate\Http\Request;

class AlumnoController extends Controller
{
    public function index()
    {
        $alumnos = Alumno::all();
        return view('alumnos.index', compact('alumnos'));
    }

    public function create()
    {
        return view('alumnos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
        'codigo' => 'required|unique:alumnos,codigo,',
        'nombre' => 'required',
        'correo' => 'required|email|unique:alumnos,correo',
        'fecha_nacimiento' => 'required|date|before:' . now()->subYears(0)->toDateString() . '|after:' . now()->subYears(100)->toDateString(),
        'sexo' => 'required|in:M,F',
        'carrera' => 'required',
        ], [
        'codigo.required' => 'El código del alumno es obligatorio.',
        'codigo.unique' => 'Este código ya ha sido registrado, por favor usa otro.',
        'nombre.required' => 'El nombre es obligatorio.',
        'correo.required' => 'El correo es obligatorio.',
        'correo.email' => 'El correo debe ser válido.',
        'correo.unique' => 'Este correo ya está registrado.',
        'fecha_nacimiento.required' => 'La fecha de nacimiento es obligatoria.',
        'sexo.required' => 'Debes seleccionar el sexo.',
        'sexo.in' => 'El sexo debe ser Masculino (M) o Femenino (F).',
        'carrera.required' => 'La carrera es obligatoria.',
        'fecha_nacimiento.after' => 'La fecha de nacimiento indica una edad mayor a 100 años.',
        'fecha_nacimiento.before' => 'La fecha de nacimiento indica una edad proxima.',
       ]);


    
        Alumno::create($request->only([
            'codigo',
            'nombre',
            'correo',
            'fecha_nacimiento',
            'sexo',
            'carrera',
        ]));

        
        return redirect()->route('alumnos.index')->with('success', 'Alumno creado correctamente.');
    }

    public function show(Alumno $alumno)
    {
        return view('alumnos.show', compact('alumno'));
    }

    public function edit(Alumno $alumno)
    {
        return view('alumnos.edit', compact('alumno'));
    }

    public function update(Request $request, Alumno $alumno)
    {
        $request->validate([
        'codigo' => 'required|unique:alumnos,codigo,' . $alumno->id,
        'nombre' => 'required',
        'correo' => 'required|email|unique:alumnos,correo,' . $alumno->id,
        'fecha_nacimiento' => 'required|date|before:' . now()->subYears(0)->toDateString() . '|after:' . now()->subYears(100)->toDateString(),
        'sexo' => 'required|in:M,F',
        'carrera' => 'required',
        ], [
        'codigo.required' => 'El código del alumno es obligatorio.',
        'codigo.unique' => 'Este código ya ha sido registrado, por favor usa otro.',
        'nombre.required' => 'El nombre es obligatorio.',
        'correo.required' => 'El correo es obligatorio.',
        'correo.email' => 'El correo debe ser válido.',
        'correo.unique' => 'Este correo ya está registrado.',
        'fecha_nacimiento.required' => 'La fecha de nacimiento es obligatoria.',
        'sexo.required' => 'Debes seleccionar el sexo.',
        'sexo.in' => 'El sexo debe ser Masculino (M) o Femenino (F).',
        'carrera.required' => 'La carrera es obligatoria.',
        'fecha_nacimiento.after' => 'La fecha de nacimiento indica una edad mayor a 100 años.',
        'fecha_nacimiento.before' => 'La fecha de nacimiento indica una edad proxima.',
       ]);

        
        $alumno->update($request->only([
            'codigo',
            'nombre',
            'correo',
            'fecha_nacimiento',
            'sexo',
            'carrera',
        ]));

        return redirect()->route('alumnos.index')->with('success', 'Alumno actualizado correctamente.');
    }

    public function destroy(Alumno $alumno)
    {
        $alumno->delete();
        return redirect()->route('alumnos.index')->with('success', 'Alumno eliminado correctamente.');
    }
}

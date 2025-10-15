@extends('layouts.app')

@section('content')
<h1>Detalle del Alumno</h1>

<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <td>{{ $alumno->id }}</td>
    </tr>
    <tr>
        <th>Código</th>
        <td>{{ $alumno->codigo }}</td>
    </tr>
    <tr>
        <th>Nombre</th>
        <td>{{ $alumno->nombre }}</td>
    </tr>
    <tr>
        <th>Correo</th>
        <td>{{ $alumno->correo }}</td>
    </tr>
    <tr>
        <th>Fecha de nacimiento</th>
        <td>{{ $alumno->fecha_nacimiento }}</td>
    </tr>
    <tr>
        <th>Sexo</th>
        <td>{{ $alumno->sexo }}</td>
    </tr>
    <tr>
        <th>Carrera</th>
        <td>{{ $alumno->carrera }}</td>
    </tr>
</table>

<a href="{{ route('alumnos.index') }}" class="btn btn-secondary">Regresar</a>
@endsection

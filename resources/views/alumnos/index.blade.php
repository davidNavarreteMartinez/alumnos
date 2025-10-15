@extends('layouts.app')

@section('content')
<h1>Lista de Alumnos</h1>
<a href="{{ route('alumnos.create') }}" class="btn btn-primary mb-3">Crear Alumno</a>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Código</th>
            <th>Nombre</th>
            <th>Correo</th>
            <th>Sexo</th>
            <th>Carrera</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($alumnos as $alumno)
        <tr>
            <td>{{ $alumno->id }}</td>
            <td>{{ $alumno->codigo }}</td>
            <td>{{ $alumno->nombre }}</td>
            <td>{{ $alumno->correo }}</td>
            <td>{{ $alumno->sexo }}</td>
            <td>{{ $alumno->carrera }}</td>
            <td>
                <a href="{{ route('alumnos.show', $alumno) }}" class="btn btn-info btn-sm">Ver</a>
                <a href="{{ route('alumnos.edit', $alumno) }}" class="btn btn-warning btn-sm">Editar</a>
                <form action="{{ route('alumnos.destroy', $alumno) }}" method="POST" style="display:inline-block">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro?')">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection

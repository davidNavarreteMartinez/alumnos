@extends('layouts.app')

@section('content')
<h1>Editar Alumno</h1>

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('alumnos.update', $alumno) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label>Código</label>
        <input type="text" name="codigo" class="form-control" value="{{ old('codigo', $alumno->codigo) }}">
    </div>
    <div class="mb-3">
        <label>Nombre</label>
        <input type="text" name="nombre" class="form-control" value="{{ old('nombre', $alumno->nombre) }}">
    </div>
    <div class="mb-3">
        <label>Correo</label>
        <input type="email" name="correo" class="form-control" value="{{ old('correo', $alumno->correo) }}">
    </div>
    <div class="mb-3">
        <label>Fecha de nacimiento</label>
        <input type="date" name="fecha_nacimiento" class="form-control" value="{{ old('fecha_nacimiento', $alumno->fecha_nacimiento) }}">
    </div>
    <div class="mb-3">
        <label>Sexo</label>
        <select name="sexo" class="form-control">
            <option value="M" {{ old('sexo', $alumno->sexo)=='M' ? 'selected' : '' }}>Masculino</option>
            <option value="F" {{ old('sexo', $alumno->sexo)=='F' ? 'selected' : '' }}>Femenino</option>
        </select>
    </div>
    <div class="mb-3">
        <label>Carrera</label>
        <input type="text" name="carrera" class="form-control" value="{{ old('carrera', $alumno->carrera) }}">
    </div>
    <button class="btn btn-primary">Actualizar</button>
</form>
@endsection
